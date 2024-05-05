<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Friend;
use Illuminate\Database\QueryException;
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

        return response()->json(['message' => 'Login successful', 'user' => $user]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Email or Password is incorrect'], 401);
    }
}


public function loginAdmin(Request $req)
{
    // Check if required fields are empty
    if (empty($req->input('email')) || empty($req->input('password'))) {
        return response()->json(['error' => 'Please provide email and password'], 400);
    }

    try {
        $Admin = Admin::where('email', $req->input('email'))
                      ->where('type_num', 1)
                      ->firstOrFail();

        if (!Hash::check($req->input('password'), $Admin->password)) {
            return response()->json(['error' => 'Email or Password is incorrect'], 401);
        }

        return response()->json(['message' => 'Login successful', 'user' => $Admin]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Email or Password is incorrect'], 401);
    }
}


public function logindoc(Request $req)
{
    // Check if required fields are empty
    if (empty($req->input('email')) || empty($req->input('password'))) {
        return response()->json(['error' => 'Please provide email and password'], 400);
    }

    try {
        $Admin = Admin::where('email', $req->input('email'))
                      ->where('type_num', 2)
                      ->firstOrFail();

        if (!Hash::check($req->input('password'), $Admin->password)) {
            return response()->json(['error' => 'Email or Password is incorrect'], 401);
        }

        return response()->json(['message' => 'Login successful', 'user' => $Admin]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Email or Password is incorrect'], 401);
    }
}

    public function registerAdmin(Request $req)
    {
        // Check if required fields are empty
        if (empty($req->input('name')) || empty($req->input('email')) || empty($req->input('password')) || empty($req->input('phone'))) {
            return response()->json(['error' => 'Please provide all required fields'], 400);
        }

        $admin = new Admin;
        $admin->name = $req->input('name');
        $admin->email = $req->input('email');
        $admin->password = $req->input('password');
        $admin->phone = $req->input('phone');

        try {
            // Save the user
            $admin->save();
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




    public function getAllDocs()
    {
        // Fetch all documents from users with type_num equal to '2'
        $docs = User::select('name', 'id', 'image','position')
            ->where('type_num', '=', '2')
            ->get();

        // Return the documents as a JSON response
        return response()->json($docs, 200);
    }


    public function uploadImage(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust file types and size limit as needed
        ]);

        // Find the user by their ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Handle the file upload
        if ($request->hasFile('image')) {
            // Get the uploaded file instance
            $image = $request->file('image');

            // Store the image file
            $fileName = $image->store('posts', 'public');

            // Update the user's image path in the database
            $user->image = $fileName;

            try {
                // Save the user
                $user->save();

                // Return success response
                return response()->json(['message' => 'Image added successfully']);
            } catch (\Exception $e) {
                // Handle exceptions
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        // If no image is provided or an error occurs, return an error response
        return response()->json(['error' => 'No image provided'], 400);
    }












}
