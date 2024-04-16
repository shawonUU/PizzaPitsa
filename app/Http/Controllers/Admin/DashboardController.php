<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
       return $assignedRoles = $user->getRoleNames();
        // // Get the permissions of the user
        // return $permissions = $user->getAllPermissions(); 
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
