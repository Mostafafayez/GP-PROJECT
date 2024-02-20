<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BabyInfo;
class Baby_Info extends Controller
{
    public function add(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'sex' => 'required|in:Male,Female,Other',
            'birthday' => 'required|date',
        ]);

        // Create a new baby record using the add function from the BabyInfo model
        $baby = BabyInfo::add($request->all());

        // Return a response indicating success or failure
        if ($baby) {
            return response()->json(['message' => 'Baby record created successfully', 'data' => $baby], 201);
        } else {
            return response()->json(['message' => 'Failed to create baby record'], 500);
        }
    }

    public function calculateAge(Request $request)
    {
        // Validate the request data
        $request->validate([
            'birthday' => 'required|date',
        ]);

        // Get the birthday from the request
        $birthday = $request->input('birthday');

        // Create a Carbon instance from the birthday
        $carbonBirthday = \Carbon\Carbon::createFromFormat('Y-m-d', $birthday);

        // Calculate the age using Carbon
        $age = $carbonBirthday->diff(\Carbon\Carbon::now())->format('%y years, %m months, and %d days');

        // Return the age as a response
        return response()->json(['age' => $age], 200);
    }







}
