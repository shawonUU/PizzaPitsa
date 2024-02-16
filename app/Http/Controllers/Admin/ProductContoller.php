<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\ProductImage;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\ProductToping;
use App\Models\Admin\ProductSize;
use App\Models\Admin\Toping;
use App\Models\Admin\Size;

class ProductContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::join('categories','categories.id','=','products.category_id')->select('products.*','categories.name as category')->orderBy('products.id','desc')->get();
        return view('admin.pages.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status','1')->get();
        return view('admin.pages.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            // 'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'status' => 'required|in:0,1',
            // Add any other validation rules as needed
        ]);

           // Create a new product instance
        $product = new Product([
            'name' => $request->input('name'),
            'category_id' => $request->category,
            'description' => $request->input('description'),
            // 'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status'),
            'created_by' => auth()->user()->id,
        ]);

        // Save the product
        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $destinationPath = 'frontend/product_images/';
                $imageName = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imageName);
                // Save image information to the 'product_images' table
                $productImage = new ProductImage();
                $productImage->product_id = $product->id; // Assuming $product is the product you just saved
                $productImage->image = $imageName; // Save the generated image name
                $productImage->save();
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
        $product = Product::where('id',$id)->first();
        $categories = Category::where('status','1')->get();
        $productImages = ProductImage::where('product_id',$product->id)->get();
        return view('admin.pages.product.edit',compact('categories','product','productImages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::where('id',$id)->first();
        $productImages = ProductImage::where('product_id',$product->id)->get();
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            // 'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'status' => 'required|in:0,1',
            // Add any other validation rules as needed
        ]);

        $product->update([
            'name' => $request->input('name'),
            'category_id' => $request->category,
            'description' => $request->input('description'),
            // 'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status'),
            'updated_by' => auth()->user()->id,
        ]);


        if ($request->hasFile('images')) {
            foreach($productImages as $item) {
                $productImage = ProductImage::where('id',$item->id)->first();
                if($productImage) {
                    unlink(public_path('frontend/product_images/' . $item->image));
                    $productImage->delete();
                }
            }
            foreach ($request->file('images') as $image) {
                $destinationPath = 'frontend/product_images/';
                $imageName = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imageName);
                // Save image information to the 'product_images' table
                $productImage = new ProductImage();
                $productImage->product_id = $product->id; // Assuming $product is the product you just saved
                $productImage->image = $imageName; // Save the generated image name
                $productImage->save();
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
        $product = Product::where('id',$id)->first();
        $productImages = ProductImage::where('product_id',$product->id)->get();
        foreach($productImages as $item) {
            $productImage = ProductImage::where('id',$item->id)->first();
            if($productImage) {
                unlink(public_path('frontend/product_images/' . $item->image));
                $productImage->delete();
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

    public function size($id){
        $productSizes = ProductSize::join('sizes', 'sizes.id','=','product_sizes.size_id')
                                ->where('product_id', $id)
                                ->select('product_sizes.*','sizes.name')->get();
        $sizes = Size::where('status', '1')->get();
        return view('admin.pages.product.product_size', compact('id','sizes','productSizes'));
    }

    public function storeSize(Request $request){
        $request->validate([
            'product_id' => 'required|numeric',
            'size_id' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => 'required|in:0,1',
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
        $size->status = $request->status;
        $size->created_by = auth()->user()->id;
        $size->image = $imageName;
        $size->save();

        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Product Size Added',
        ]);

        return redirect()->back();
    }
    //Assign topings
    public function topings ($id) {
        $productTopings = ProductToping::join('topings','topings.id','=','product_topings.toping_id')->where('product_topings.product_id',$id)->select('topings.*','product_topings.id as topId')->get();
        $topings = Toping::where('status','1')->get();
        return view('admin.pages.product.topings', compact('productTopings','topings','id'));
    }

    public function storeToping(Request $request){
        $request->validate([
            'product_id' => 'required|numeric',
            'toping' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);

        $checkExist = ProductToping::where('product_id',$request->product_id)->where('toping_id',$request->toping)->first();
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

    public function updateSize(Request $request, $id){
        // return $request->all();
        $request->validate([
            'product_id' => 'required|numeric',
            'size_id' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);
        $size = ProductSize::find($id);
        if($size){

            $imageName = $size->image;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $destinationPath = 'frontend/product_images/';
                $imageName = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imageName);
                if($size->image)
                    unlink(public_path('frontend/product_images/' . $size->image));
            }


            $size->size_id = $request->size_id;
            $size->price = $request->price;
            $size->status = $request->status;
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

    public function deleteProductSize($id){
        $productSizes = ProductSize::find($id);
        if($productSizes)
            $productSizes->delete();
        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Product Size delete success',
        ]);
        return redirect()->back();
    }

}
