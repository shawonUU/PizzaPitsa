<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('order_by')->get();
        return view("admin.pages.product.category", compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'order_by' => 'required',
            'status' => 'required',
        ]);
        $category = new Category;
        $category->name = $request->category;
        $category->order_by = $request->order_by;
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'order_by' => 'required',
            'status' => 'required',
        ]);
        $category = Category::find($id);
        if ($category) {
            $category->name = $request->category;
            $category->order_by = $request->order_by;
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

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Category Delete success',
        ]);
        return redirect()->route('categories.index');
    }
    //For get data with axios

    public function getCategories()
    {
        return $categories = Category::where('status', '1')->orderBy('id', 'asc')->get();
    }
}
