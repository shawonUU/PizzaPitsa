<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('admin.pages.content.slider.index', compact('sliders'));
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
        $attributes = $request->all();
        $rules = [
            'sequence' => 'required',
            'status' => 'required',
            'image' => [
                'image',
                'mimes:jpg,png,jpeg,gif',
                'max:2048',
                'dimensions:min_width=746 ,min_height=374,',
            ],
        ];
        $validation = Validator::make($attributes, $rules);
        $messages = [
            'sequence.required' => 'The sequence field is required.',
            'status.required' => 'The status field is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpg, png, jpeg, gif.',
            'image.max' => 'The image size should not exceed 2MB.',
            'image.dimensions' => 'The image dimensions should be 746x374 pixels.',
        ];
        $validation->setCustomMessages($messages);
        if ($validation->fails()) {
            return back()->with(['error_code' => 'Add'])->withErrors($validation)->withInput();
        } else {

            // Handling the image upload
            $name = "";
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $destinationPath = public_path('frontend/assets/images/slider/');
                $name = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $name);
            }

            // Create a new Slider instance
            $slider = new Slider();
            $slider->image = $name;
            $slider->sequence = $request->input('sequence');
            $slider->status = $request->input('status');
            $slider->created_by = auth()->user()->id;
            $slider->save();

            // Flash success message
            session()->flash('sweet_alert', [
                'type' => 'success',
                'title' => 'Success!',
                'text' => 'Slider added successfully',
            ]);

            // Redirect to the slider index page with a success message
            return redirect()->route('slider.index')->with('success', 'Slider created successfully');
        }
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
        $attributes = $request->all();
        $rules = [
            'usequence' => 'required',
            'ustatus' => 'required',
            'uimage' => [
                'image',
                'mimes:jpg,png,jpeg,gif',
                'max:2048',
                'dimensions:min_width=746 ,min_height=374,',
            ],
        ];
        $validation = Validator::make($attributes, $rules);
        $messages = [
            'usequence.required' => 'The sequence field is required.',
            'ustatus.required' => 'The status field is required.',
            'uimage.image' => 'The uploaded file must be an image.',
            'uimage.mimes' => 'The image must be a file of type: jpg, png, jpeg, gif.',
            'uimage.max' => 'The image size should not exceed 2MB.',
            'uimage.dimensions' => 'The image dimensions should be 746x374 pixels.',
        ];
        $validation->setCustomMessages($messages);
        if ($validation->fails()) {
            return back()->with(['error_code' => $id])->withErrors($validation)->withInput();
        } else {

            $slider = Slider::findOrFail($id);

            // Handling the image upload
            if ($request->hasFile('uimage')) {
                if ($slider->image) {
                    unlink(public_path('frontend/assets/images/slider/' . $slider->image));
                }
                $image = $request->file('uimage');
                $destinationPath = public_path('frontend/assets/images/slider/');
                $name = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $name);
                $slider->image = $name;
            }

            $slider->sequence = $request->input('usequence');
            $slider->status = $request->input('ustatus');
            $slider->created_by = auth()->user()->id;
            $slider->save();

            // Flash success message
            session()->flash('sweet_alert', [
                'type' => 'success',
                'title' => 'Success!',
                'text' => 'Slider updated successfully',
            ]);

            // Redirect to the slider index page with a success message
            return redirect()->route('slider.index')->with('success', 'Slider updated successfully');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
