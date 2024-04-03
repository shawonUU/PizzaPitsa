<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index(Request $request){
        if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2){
            return view('admin/index'); 
        }else{
            Auth::logout();
            return redirect('/');
        }
    }
    public function create(){
        return "fd";
    }
}
