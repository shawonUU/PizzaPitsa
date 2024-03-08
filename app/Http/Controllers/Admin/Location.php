<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Location as AdminLocation;
use Illuminate\Http\Request;

class Location extends Controller
{

    public function index()
    {
        $coupons = AdminLocation::get();
        return view('admin.pages.settings.location.index', compact('coupons'));
    }

    public function store(Request $request)
    {
        $request->validate([                   
            'longitude' => 'required',
            'latitude' => 'required',   
            'address' => 'required',  
            'status' => 'required',
        ]);

        $coupon = new AdminLocation();
        $coupon->longitude = $request->input('longitude');      
        $coupon->latitude = $request->input('latitude');
        $coupon->address = $request->input('address');
        $coupon->status = $request->input('status');
        $coupon->save();
        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Location added success',
        ]);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {

        $request->validate([                   
            'longitude' => 'required',
            'latitude' => 'required',   
            'status' => 'required',
        ]);


        $coupon = AdminLocation::findOrFail($id);
        $coupon->longitude = $request->input('longitude');      
        $coupon->latitude = $request->input('latitude');
        $coupon->status = $request->input('status');
        $coupon->update();
        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Location update success',
        ]);
        return redirect()->back();
    }
}
