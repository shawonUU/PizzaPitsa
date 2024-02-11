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
        return view("admin.productManagement.category", compact('categories'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'category' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->redirect()->back()->with(['errors' => $validator->errors()], 422);
        }

        $category = new Category;
        $category->name = $request->category;
        $category->created_by = auth()->user()->id;
        $category->save();
        return redirect()->route('categories.index');
    }
}
