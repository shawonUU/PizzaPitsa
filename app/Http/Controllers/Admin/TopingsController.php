<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Toping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductToping;

class TopingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topings = Toping::orderBy('.id','desc')->get();
        return view('admin.pages.toping.index',compact('topings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {       
        return view('admin.pages.toping.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'name' => 'required|string',           
            'price' => 'required|numeric',            
            'status' => 'required|in:0,1',                   
        ]);

        if ($image = $request->file('images')) {
            $destinationPath = 'frontend/toping_images/';
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
        }
           // Create a new product instance
        $product = new Toping([
            'name' => $request->input('name'),              
            'image'=>   $imageName,        
            'price' => $request->input('price'),          
            'status' => $request->input('status'),
            'created_by' => auth()->user()->id,
        ]);

        // Save the product
        $product->save();   

        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Toping added success',
        ]);
        // Redirect or return a response as needed
        return redirect()->route('topings.index')->with('success', 'Toping created successfully');
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
        $toping = Toping::where('id',$id)->first();          
        return view('admin.pages.toping.edit',compact('toping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Toping::where('id',$id)->first(); 
        $request->validate([
            'name' => 'required|string',            
            'price' => 'required|numeric',          
            'status' => 'required|in:0,1',        
            // Add any other validation rules as needed
        ]);

        $imageName = "";
        if ($image = $request->file('images')) {
            if ($product->image !=NULL) {
                unlink(public_path('frontend/toping_images/' . $product->image));
            }
            $destinationPath = 'frontend/toping_images/';
            $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
        } else {
            $imageName = $product->image;
        }
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'image' => $imageName,
            'updated_by' => auth()->user()->id,
        ]);
        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Toping update success',
        ]);
        // Redirect or return a response as needed
        return redirect()->route('topings.index')->with('success', 'Toping update successfully');     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {      
        if ($request->deleteProductToping == '1') {
            $product = ProductToping::where('id',$id)->first(); 
            $product->delete();           
        } else {
            $product = Toping::where('id',$id)->first();
            $product->delete();
            if ($product->image !=NULL) {
                unlink(public_path('frontend/toping_images/' . $product->image));
            }
          
        }

        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Toping delete success',
        ]);
        
        if ($request->deleteProductToping == '1') {
            return redirect()->route('product_topting',$request->product_id)->with('warning', 'Toping delete successfully');  
        } else {
            return redirect()->route('topings.index')->with('warning', 'Toping delete successfully');  
        }

    }
}

