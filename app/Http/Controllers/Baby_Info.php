<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BabyInfo;
class Baby_Info extends Controller
{
    public function add(Request $request)
    {
        $baby = new BabyInfo();
        // Validate the request data
        $baby->name = $request->input('name');
        $baby->birthday = $request->input('birthday');
        $baby->sex = $request->input('sex');
    
        // Create a new BabyInfo instance and fill it with the validated data
   
        // Save the baby record
      $baby->save();
    
        // Return a response indicating success or failure
        if ($baby) {
            return response()->json(['message' => 'Baby record created successfully', ], 201);
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
        $age = $carbonBirthday->diff(\Carbon\Carbon::now());
    
        // Return the age as a response with separate attributes for years, months, and days
        return response()->json([
            'years' => $age->y,
            'months' => $age->m,
            'days' => $age->d
        ], 200);
    }
    







}
