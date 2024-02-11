<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\ProductImage;
use App\Http\Controllers\Controller;

class ProductContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'status' => 'required|in:0,1',        
            // Add any other validation rules as needed
        ]);

           // Create a new product instance
        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status'),
            'created_by' => auth()->user()->id,
        ]);

        // Save the product
        $product->save();   

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Generate a unique image name based on the current date and time
                $imageName = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
        
                // Save the image to the 'product_images' directory with the generated name
                $filename = $image->storeAs('product_images', $imageName, 'public');
        
                // Save image information to the 'product_images' table
                $productImage = new ProductImage();
                $productImage->product_id = $product->id; // Assuming $product is the product you just saved
                $productImage->image = $imageName; // Save the generated image name           
                $productImage->save();
            }
        }

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
