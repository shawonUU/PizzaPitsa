<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Size;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::get();
        return view("admin.pages.product.size", compact('sizes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'size' => 'required|string|max:255',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->redirect()->back()->with(['errors' => $validator->errors()], 422);
        }

        $size = new Size;
        $size->name = $request->size;
        $size->status = $request->status;
        $size->created_by = auth()->user()->id;
        $size->save();
        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Size Added success',
        ]);
        return redirect()->route('sizes.index');
    }
    public function destroy($id)
    {
        $category = Size::findOrFail($id);
        $category->delete();
        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Size Delete success',
        ]);
        return redirect()->route('sizes.index');
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'size' => 'required|string|max:255',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->redirect()->back()->with(['errors' => $validator->errors()], 422);
        }
        $size = Size::find($id);
        if ($size) {
            $size->name = $request->size;
            $size->status = $request->status;
            $size->created_by = auth()->user()->id;
            $size->save();
        }
        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'size update success',
        ]);
        return redirect()->route('sizes.index');
    }
}
