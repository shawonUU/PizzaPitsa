<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Size;
use Illuminate\Support\Str;
use App\Models\Admin\Toping;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\ProductSize;
use App\Models\Admin\ProductImage;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\ProductToping;
use App\Http\Controllers\Controller;

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
        return view('admin.pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            $destinationPath = 'frontend/product_images/';
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
        $product = Product::where('id', $id)->first();
        $categories = Category::where('status', '1')->get();
        return view('admin.pages.product.edit', compact('categories', 'product'));
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
            $destinationPath = 'frontend/product_images/';
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
            $destinationPath = 'frontend/product_images/';
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

        return redirect()->route('product_size', $request->product_id);
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
                $destinationPath = 'frontend/product_images/';
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
        ->orderBy('categories.order_by') // Order by category order_by column
        ->orderBy('products.id') // Optionally, you can add product sorting here
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
    // return $groupedCategories;
}
// $sortedCategories = collect($groupedCategories)->sortBy('order_by')->toArray();

return $groupedCategories;
    
    }

    public function getProductDetails(Request $request)
    {
        $productId = $request->query('id');
        $product = Product::where('id', $productId)->first();
        $productSizes = ProductSize::join('sizes', 'sizes.id', '=', 'product_sizes.size_id')
            ->where('product_id', $productId)
            ->where('product_sizes.status', '1')
            ->select('product_sizes.*', 'sizes.name')
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

        $tem = [];
        foreach($productTopings as $row){
            $tem[$row->id] = $row;
        }
        $productTopings = $tem;

           
        $maxMin = [$minPrice,$maxPrice];
        return response()->json([$product, $productSizes,$productTopings,$maxMin]);
    }
}
