<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.pages.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            // 'role_id' => 'required',
            'user_role' => 'required',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'unique:users,phone',
            'password' => 'required|string|min:6',
            'status' => 'required|in:0,1',
            // You might need additional validation rules for file uploads
        ];

        $validatedData = $request->validate($rules);

        $imageName = "";
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $destinationPath = 'frontend/users/';
            $imageName = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
        }
        // Create a new product instance
        $user = new User();
        $user->role_id = $validatedData['user_role'];
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->password = bcrypt($validatedData['password']); // Hash password
        $user->images = $imageName; // Hash password
        $user->status = $validatedData['status'];
        $user->save();

        $role = Role::where('id', $validatedData['user_role'])->first();
        $user->assignRole($role);

        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'User added success',
        ]);
        // Redirect or return a response as needed
        return redirect()->route('users.index')->with('success', 'User created successfully');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
