<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Size;
use Illuminate\Support\Str;
use App\Models\Admin\Toping;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\ProductTag;
use App\Models\Admin\OptionTitle;
use App\Models\Admin\ProductSize;
use App\Models\SizeVsTopingPrice;
use App\Models\Admin\ProductImage;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\ProductOption;
use App\Models\Admin\ProductToping;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductOptionTopping;

class ProductContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::join('categories', 'categories.id', '=', 'products.category_id')->select('products.*', 'categories.name as category')->orderBy('products.id', 'desc')->get();
        return view('admin.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', '1')->get();
        $optionTitles = OptionTitle::where('status','1')->get();
        $toppings = Toping::where('status','1')->get();
        return view('admin.pages.product.create', compact('categories','optionTitles','toppings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string',
            // 'description' => 'string',
            // 'price' => 'required|numeric',
            'status' => 'required|in:0,1',
            // Add any other validation rules as needed
        ]);

        $imageName = "";
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $destinationPath = public_path('frontend/product_images/');
            $imageName = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
        }
        // Create a new product instance
        $product = new Product([
            'name' => $request->input('name'),
            'category_id' => $request->category,
            'description' => $request->input('description'),
            'image' => $imageName,
            'status' => $request->input('status'),
            'created_by' => auth()->user()->id,
        ]);

        $product->save();
        $newTitles = $request->input('newTitles');
        $newTypes = $request->input('newTypes');

        // Combine all newToppings arrays
        $newToppings = [];
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'newToppings') !== false) {
                $newToppings = array_merge($newToppings, $value);
            }
        }

        // Debugging: Check if arrays are not null
        if (!$newTitles || !$newToppings || !$newTypes) {
            dd("Input arrays are null or empty");
        }

        $startIndex = 0;
        foreach ($newTitles as $key => $titleId) {
            $type = $newTypes[$key] ?? null;

            if ($titleId && $type) {
                // Create a new ProductOption
                $productOption = new ProductOption();
                $productOption->title_id = $titleId;
                $productOption->product_id = $product->id; // Assuming you have a default product ID or set it dynamically
                $productOption->type = $type;
                $productOption->save();

                // Determine the end index for toppings based on the current title
                $endIndex = $startIndex + count($request->input("newToppings" . ($key + 1)));
                
                // Get toppings for the current title
                $toppingsForCurrentTitle = array_slice($newToppings, $startIndex, $endIndex - $startIndex);

                foreach ($toppingsForCurrentTitle as $toppingId) {
                    $productOptionTopping = new ProductOptionTopping();
                    $productOptionTopping->product_option_id = $productOption->id;
                    $productOptionTopping->topping_id = $toppingId;
                    $productOptionTopping->created_at = now();
                    $productOptionTopping->updated_at = now();
                    $productOptionTopping->save();
                }

                // Update the start index for the next iteration
                $startIndex = $endIndex;
            }
        }

        
        // Save tags and removeables
        $tags = $request->input('tags', []);
        $removeables = $request->input('removeable', []);

        $limitTags = count($tags);
        $limitRemoveables = count($removeables);

        $limit = max($limitTags, $limitRemoveables);

        for ($key = 0; $key < $limit; $key++) {
            $tag = $tags[$key] ?? null;
            $isRemovable = isset($removeables[$key]) && $removeables[$key] == 'on' ? '1' : '0';

            if ($tag) {                            
                $row = new ProductTag();
                $row->pro_id = $product->id;
                $row->tag_name = $tag;
                $row->is_removeable = $isRemovable;
                $row->save();                
            }
        }

        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Product added success',
        ]);

        // Redirect or return a response as needed
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productSizes = ProductSize::join('sizes', 'sizes.id', '=', 'product_sizes.size_id')
            ->where('product_id', $id)
            ->select('product_sizes.*', 'sizes.name')->get();
        $productTopings = ProductToping::join('topings', 'topings.id', '=', 'product_topings.toping_id')->where('product_topings.product_id', $id)->select('topings.*', 'product_topings.id as topId')->get();
        $topings = Toping::where('status', '1')->get();
        $product = Product::where('id', $id)->first();
        $categories = Category::where('status', '1')->get();
        $sizes = Size::where('status', '1')->get();
        $productTags = ProductTag::where('pro_id',$id)->get();
        $optionTitles = OptionTitle::where('status','1')->get();       
        $productOptions = ProductOption::join('option_titles','option_titles.id','=','product_options.title_id')->select('product_options.*','option_titles.name')->where('product_options.product_id',$id)->get();
        return view('admin.pages.product.edit', compact('categories', 'product','productSizes','productTopings','topings','id','sizes','productTags','productOptions','optionTitles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $product = Product::where('id', $id)->first();
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|in:0,1',
            // Add any other validation rules as needed
        ]);

        $imageName = "";
        if ($image = $request->file('images')) {
            if ($product->image != NULL) {
                unlink(public_path('frontend/product_images/' . $product->image));
            }
            $destinationPath = public_path('frontend/product_images/');
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
        } else {
            $imageName = $product->image;
        }

        $product->update([
            'name' => $request->input('name'),
            'category_id' => $request->category,
            'description' => $request->input('description'),
            'image' => $imageName,
            'status' => $request->input('status'),
            'updated_by' => auth()->user()->id,
        ]);


        $newTitles = $request->input('newTitles');
        $newTypes = $request->input('newTypes');
        $options = ProductOption::where('product_id',$id)->get();
        foreach ($options as $option) {
            ProductOptionTopping::where('product_option_id', $option->id)->delete();
            $option->delete();
        }

        // return 'dd';
        // Combine all newToppings arrays
        $newToppings = [];
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'newToppings') !== false) {
                $newToppings = array_merge($newToppings, $value);
            }
        }

        // Debugging: Check if arrays are not null
        if (!$newTitles || !$newToppings || !$newTypes) {
            dd("Input arrays are null or empty");
        }

        $startIndex = 0;
        foreach ($newTitles as $key => $titleId) {
            $type = $newTypes[$key] ?? null;

            if ($titleId && $type) {
                // Create a new ProductOption
                $productOption = new ProductOption();
                $productOption->title_id = $titleId;
                $productOption->product_id = $product->id; // Assuming you have a default product ID or set it dynamically
                $productOption->type = $type;
                $productOption->save();

                // Determine the end index for toppings based on the current title
                $endIndex = $startIndex + count($request->input("newToppings" . ($key + 1)));
                
                // Get toppings for the current title
                $toppingsForCurrentTitle = array_slice($newToppings, $startIndex, $endIndex - $startIndex);

                foreach ($toppingsForCurrentTitle as $toppingId) {
                    $productOptionTopping = new ProductOptionTopping();
                    $productOptionTopping->product_option_id = $productOption->id;
                    $productOptionTopping->topping_id = $toppingId;
                    $productOptionTopping->created_at = now();
                    $productOptionTopping->updated_at = now();
                    $productOptionTopping->save();
                }

                // Update the start index for the next iteration
                $startIndex = $endIndex;
            }
        }

        




        $tags = $request->tags;
        $removeables = $request->removeable;
        
        // Delete existing ProductTag items
        ProductTag::where('pro_id', $product->id)->delete();
        
        // Determine the number of tags and removable checkboxes
        $numberOfTags = count($tags);
        $numberOfRemoveables = count($removeables);
        
        // Use the larger count to ensure all tags are processed
        $limit = max($numberOfTags, $numberOfRemoveables);
        
        for($key = 0; $key < $limit; $key++) {
            $tag = $tags[$key] ?? null;
            $isRemovable = isset($removeables[$key]) && $removeables[$key] == 'on' ? '1' : '0';
        
            if($tag) {
                // Check if the ProductTag already exists, if so, update it; otherwise, create a new one
                $existingTag = ProductTag::where('pro_id', $product->id)
                                         ->where('tag_name', $tag)
                                         ->first();
        
                if($existingTag) {
                    $existingTag->is_removeable = $isRemovable;
                    $existingTag->save();
                } else {
                    $row = new ProductTag();
                    $row->pro_id = $product->id;
                    $row->tag_name = $tag;
                    $row->is_removeable = $isRemovable;
                    $row->save();
                }
            }
        }
        


        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Product update success',
        ]);
        // Redirect or return a response as needed
        return redirect()->route('products.index')->with('success', 'Product update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id', $id)->first();
        if ($product->image != NULL) {
            unlink(public_path('frontend/product_images/' . $product->image));
        }
        $productTags = ProductTag::where('pro_id',$id)->get();
        if ($productTags) {
            foreach($productTags as $item) {
                $item->delete();
            }
        }
        $options = ProductOption::where('product_id',$id)->get();
        if ($options) {
            foreach ($options as $option) {
                ProductOptionTopping::where('product_option_id', $option->id)->delete();
                $option->delete();
            }
        }
     
        $product->delete();

        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Product delete success',
        ]);
        // Redirect or return a response as needed
        return redirect()->route('products.index')->with('warning', 'Product delete successfully');
    }

    public function size($id)
    {
        $productSizes = ProductSize::join('sizes', 'sizes.id', '=', 'product_sizes.size_id')
            ->where('product_id', $id)
            ->select('product_sizes.*', 'sizes.name')->get();
        return view('admin.pages.product.product_size', compact('id', 'productSizes'));
    }

    public function createProductSize($id)
    {
        $sizes = Size::where('status', '1')->get();
        return view('admin.pages.product.create_product_size', compact('id', 'sizes'));
    }

    public function editProductSize($id)
    {
        $productSize = ProductSize::find($id);
        $sizes = Size::where('status', '1')->get();
        if ($productSize) {
            return view('admin.pages.product.edit_product_size', compact('productSize', 'sizes'));
        }
        return redirect()->back();
    }

    public function storeSize(Request $request)
    {
        $request->validate([
            'product_id' => 'required|numeric',
            'size_id' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => 'required|in:0,1',
            // 'description' => 'required',
            'offer_price' => 'nullable|numeric',
            'offer_from' => 'nullable|date',
            'offer_to' => 'nullable|date',
            'quantity' => 'numeric|nullable'
        ]);

        $imageName = "";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = public_path('frontend/product_images/');
            $imageName = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
        }

        $size = new ProductSize;
        $size->product_id = $request->product_id;
        $size->size_id = $request->size_id;
        $size->price = $request->price;
        $size->offer_price = $request->offer_price;
        $size->offer_from = $request->offer_from;
        $size->offer_to = $request->offer_to;
        $size->quantity = $request->quantity;
        $size->description = $request->description;
        $size->status = $request->status;
        $size->created_by = auth()->user()->id;
        $size->image = $imageName;
        $size->save();

        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Product Size Added',
        ]);

        // return redirect()->route('product_size', $request->product_id);
        return redirect()->back();
    }
    //Assign topings
    public function topings($id)
    {
        $productTopings = ProductToping::join('topings', 'topings.id', '=', 'product_topings.toping_id')->where('product_topings.product_id', $id)->select('topings.*', 'product_topings.id as topId')->get();
        $topings = Toping::where('status', '1')->get();
        return view('admin.pages.product.topings', compact('productTopings', 'topings', 'id'));
    }

    public function storeToping(Request $request)
    {
        $request->validate([
            'product_id' => 'required|numeric',
            'toping' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);

        $checkExist = ProductToping::where('product_id', $request->product_id)->where('toping_id', $request->toping)->first();
        if (!$checkExist) {
            $size = new ProductToping();
            $size->product_id = $request->product_id;
            $size->toping_id = $request->toping;
            $size->status = $request->status;
            $size->created_by = auth()->user()->id;
            $size->save();
            session()->flash('sweet_alert', [
                'type' => 'success',
                'title' => 'Success!',
                'text' => 'Product toping added success',
            ]);
        } else {
            session()->flash('sweet_alert', [
                'type' => 'warning',
                'title' => 'warning!',
                'text' => 'Already exists this toping! Try another',
            ]);
        }


        return redirect()->back();
    }

    public function updateSize(Request $request, $id)
    {
        // return $request->all();
        $request->validate([
            'product_id' => 'required|numeric',
            'size_id' => 'required|numeric',
            // 'description' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|in:0,1',
            'offer_price' => 'nullable|numeric',
            'offer_from' => 'nullable|date',
            'offer_to' => 'nullable|date',
            'quantity' => 'numeric|nullable'
        ]);
        $size = ProductSize::find($id);
        if ($size) {

            $imageName = $size->image;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $destinationPath = public_path('frontend/product_images/');
                $imageName = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imageName);
                if ($size->image)
                    unlink(public_path('frontend/product_images/' . $size->image));
            }


            $size->size_id = $request->size_id;
            $size->price = $request->price;
            $size->offer_price = $request->offer_price;
            $size->offer_from = $request->offer_from;
            $size->offer_to = $request->offer_to;
            $size->quantity = $request->quantity;
            $size->status = $request->status;
            $size->description = $request->description;
            $size->image = $imageName;
            $size->updated_by = auth()->user()->id;
            $size->update();

            session()->flash('sweet_alert', [
                'type' => 'success',
                'title' => 'Success!',
                'text' => 'Product Size Updated',
            ]);

            return redirect()->back();
        }
    }

    public function deleteProductSize($id)
    {
        $productSizes = ProductSize::find($id);
        if ($productSizes)
            $productSizes->delete();
        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Product Size delete success',
        ]);
        return redirect()->back();
    }

    public function getProducts()
    {
        $categories = Category::leftJoin('products', 'categories.id', '=', 'products.category_id')
        ->leftJoin('product_sizes', function ($join) {
            $join->on('products.id', '=', 'product_sizes.product_id')
                ->whereRaw('NOW() BETWEEN product_sizes.offer_from AND product_sizes.offer_to');
        })
        ->select(
            'categories.id as category_id',
            'categories.order_by as OrderBY',
            'categories.name as category_name',
            'products.id as product_id',
            'products.name as product_name',
            'products.description as description',
            'products.image as image',
            DB::raw('(SELECT MIN(price) FROM product_sizes WHERE product_sizes.product_id = products.id) as min_price'),
            'product_sizes.offer_price as calculated_offer_price'
        )
        ->where('products.status','1')
        ->orderBy('categories.order_by')
        ->orderBy('products.id') 
        ->get();
        // return $categories;
        // Organize the result into a more usable format
        $groupedCategories = [];
        $categories = $categories->sortBy('order_by');
        foreach ($categories as $category) {
            $categoryId = $category->category_id;
            if (!isset($groupedCategories[$categoryId])) {
                $groupedCategories[$categoryId] = [
                    'category_id' => $category->category_id,
                    'category_name' => $category->category_name,
                    'order_by' => $category->OrderBY,
                    'products' => [],
                ];
            }
            if ($category->product_id) {
                $groupedCategories[$categoryId]['products'][] = [
                    'id' => $category->product_id,
                    'name' => $category->product_name,
                    'description' => $category->description,
                    'image' => $category->image,
                    'min_price' => $category->min_price,
                    'calculated_offer_price' => $category->calculated_offer_price,
                ];
            }
        }
        $productAllTages = ProductTag::pluck('tag_name','id');

        return [$groupedCategories,$productAllTages];
    
    }

    public function getProductDetails(Request $request)
    {
        $productId = $request->query('id');
        $product = Product::where('id', $productId)->first();
        $productSizes = ProductSize::join('sizes', 'sizes.id', '=', 'product_sizes.size_id')
            ->where('product_id', $productId)
            ->where('product_sizes.status', '1')
            ->select('product_sizes.*', 'sizes.name', 'sizes.id as size_id')
            ->get();
        $maxPrice = $productSizes->max('price');
        $minPrice = $productSizes->min('price');
        $tem = [];
        foreach($productSizes as $row){
            $tem[$row->id] = $row;
        }
        $productSizes = $tem;
        $productTopings = ProductToping::join('topings', 'topings.id', '=', 'product_topings.toping_id')
            ->where('product_topings.product_id', $productId)
            ->where('product_topings.status', '1')
            ->select('topings.*')
            ->get();
        $favoritToppingsIds = [];
        foreach($productTopings as $toping){
            $favoritToppingsIds[$toping->id] = $toping->id;
        }


        $tem = [];
        foreach($productTopings as $row){
            $tem[$row->id] = $row;
        }
        $productTopings = $tem;

        $allTopings = Toping::where('status', '1')->get();

        $tem = [];
        foreach($allTopings as $row){
            $tem[$row->id] = $row;
        }
        $allTopings = $tem;

        $moreTopings = Toping::whereNotIn('id',$favoritToppingsIds)->where('status', '1')->get();

        $tem = [];
        foreach($moreTopings as $row){
            $tem[$row->id] = $row;
        }
        $moreTopings = $tem;

        $sizeVsTopings = SizeVsTopingPrice::get();
        $bindData = [];
        foreach($sizeVsTopings as $item){
            $bindData[$item->toping_id][$item->size_id] = $item->price;
        }
        $sizeVsTopings = $bindData;

        $maxMin = [$minPrice,$maxPrice];

        $productTages = ProductTag::where('pro_id',$productId)->get()->toArray();
        
        return response()->json([$product, $productSizes,$productTopings,$maxMin,$allTopings,$moreTopings,$sizeVsTopings,$productTages]);
    }
}
