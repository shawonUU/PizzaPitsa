<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view("admin.pages.product.category", compact('categories'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'category' => 'required|string|max:255',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->redirect()->back()->with(['errors' => $validator->errors()], 422);
        }

        $category = new Category;
        $category->name = $request->category;
        $category->status = $request->status;
        $category->created_by = auth()->user()->id;
        $category->save();
        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Category Added success',
        ]);
        return redirect()->route('categories.index');
    }
    
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'category' => 'required|string|max:255',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->redirect()->back()->with(['errors' => $validator->errors()], 422);
        }
        $category = Category::find($id);
        if($category){
            $category->name = $request->category;
            $category->status = $request->status;
            $category->created_by = auth()->user()->id;
            $category->save();
        }
        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Category update success',
        ]);
        return redirect()->route('categories.index');
    }

    //For get data with axios

    public function getCategories () {
        return $categories = Category::where('status','1')->orderBy('id','asc')->get();
    }
}
