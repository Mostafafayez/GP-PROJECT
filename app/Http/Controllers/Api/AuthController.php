<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $req)
{
    // Check if required fields are empty
    if (empty($req->input('name')) || empty($req->input('email')) || empty($req->input('password')) || empty($req->input('phone'))) {
        return response()->json(['error' => 'Please provide all required fields'], 400);
    }

    // Create a new user instance
    $user = new User;
    $user->name = $req->input('name');
    $user->email = $req->input('email');
    $user->password = $req->input('password');
    $user->phone = $req->input('phone');

    try {
        // Save the user
        $user->save();
        return response()->json(['message' => 'User added successfully']);
    } catch (\Exception $e) {
        // Handle exceptions
        if ($e->getCode() == 23000) {
            return response()->json(['error' => 'Email already exists'], 400);
        } else {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}

    
public function login(Request $req)
{
    // Check if required fields are empty
    if (empty($req->input('email')) || empty($req->input('password'))) {
        return response()->json(['error' => 'Please provide email and password'], 400);
    }

    try {
        $user = User::where('email', $req->input('email'))->firstOrFail();
        
        if (!Hash::check($req->input('password'), $user->password)) {
            return response()->json(['error' => 'Email or Password is incorrect'], 401);
        }
        
        return response()->json($user);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}

    
    public function loginAdmin (Request $req){

        $admin = Admin :: where('email',$req->email)->first();
        if(!$admin || !Hash ::check($req->password,$admin->password))
        {
            return response([
                'error' => ["Email or Password is not mached"]
            ]);
        }
        return $admin;
    }

    public function registerAdmin(Request $req)
    {
        $admin = new Admin;
        $admin->name=$req->input('name');
        $admin->email=$req->input('email');
        $admin->password=$req->input('password');
        $admin->phone=$req->input('phone');
        $admin->save();
        return $admin;
    }

}
