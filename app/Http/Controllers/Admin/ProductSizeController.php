<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Size;

class ProductSizeController extends Controller
{
    public function index($id)
    {
        return view("admin.pages.product.size");
    }
}
