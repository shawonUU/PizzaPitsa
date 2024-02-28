<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    protected function customerSignUp(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if ($validator->fails()) {
            $errors = implode('<br>', $validator->errors()->all());
            $response = [
                'success' => false,
                'message' => $errors,
            ];
            return response()->json($response);
        }

        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_customer' => '1',
            'is_verified' => false,
            'verification_code' => 123456, //rand(100000, 999999),
        ]);

        //Mail::to($user->email)->send(new VerificationMail($user->verification_code));
        $response = [
            'success' => true,
            'message' => 'Successfully Registered',
        ];

        return response()->json($response);
    }

    public function customerLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if ($validator->fails()) {
            $errors = implode('<br>', $validator->errors()->all());
            $response = [
                'success' => false,
                'isVerification' => false,
                'message' => $errors,
            ];
            return response()->json($response);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {  // Authentication passed...
            $user = auth()->user();
            if ($user) {
                if (!$user->is_verified) {
                    Auth::logout();
                    $response = [
                        'success' => false,
                        'isVerification' => true,
                        'message' => 'Account is not verified',
                    ];
                    return response()->json($response);
                }
                $response = [
                    'success' => true,
                    'message' => 'Verified',
                    'user' => $user,
                ];
                return response()->json($response);
            }
        }
        $response = [
            'success' => false,
            'isVerification' => false,
            'message' => 'Invalid credentials',
        ];
        return response()->json($response);
    }

    public function sendVerificationMail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->verification_code = '123456'; //rand(100000, 999999);
            $user->update();
            //Mail::to($user->email)->send(new VerificationMail($user->verification_code));
            $response = [
                'success' => true,
                'message' => 'Verification code sended',
            ];
            return response()->json($response);
        }
        $response = [
            'success' => false,
            'message' => 'Invalid Operation',
        ];
        return response()->json($response);
    }

    public function verifyAccount(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if ($user->verification_code == $request->code) {
                    $user->is_verified = true;
                    $user->update();
                    $response = [
                        'success' => true,
                        'message' => 'Verified',
                        'user' => $user,
                    ];
                    return response()->json($response);
                } else {
                    Auth::logout();
                    $response = [
                        'success' => false,
                        'message' => 'Verification code is not matched',
                    ];
                    return response()->json($response);
                }
            }
        }
        $response = [
            'success' => false,
            'message' => 'Invalid Operation',
        ];
        return response()->json($response);
    }

    public function updateCustomerData(Request $request)
    {
        // Get current authenticated user
        $user = Auth::user();

        // Validate request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'newPassword' => 'nullable|min:6|different:password',
            'confirmNewPassword' => 'same:newPassword',
        ]);

        // Check if the provided password matches the user's current password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Current password does not match.'], 401);
        }

        // Update user data
        $user->name = $request->name;
        $user->email = $request->email;

        // If new password is provided, update password
        if ($request->filled('newPassword')) {
            $user->password = Hash::make($request->newPassword);
        }

        $user->save();
        $user = User::where('email', $user->email)->first();
        return response()->json(['message' => 'User updated successfully.', 'user' => $user]);
    }
}
