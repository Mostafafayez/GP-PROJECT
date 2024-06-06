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
        $request->validate([
            'birthday' => 'required|date',
        ]);

        $birthday = $request->input('birthday');
        $carbonBirthday = \Carbon\Carbon::createFromFormat('Y-m-d', $birthday);

        // Check if the birthday is in the future
        if ($carbonBirthday->isFuture()) {
            return response()->json([
                'error' => 'The birthday cannot be a future date.'
            ], 400);
        }

        $age = $carbonBirthday->diff(\Carbon\Carbon::now());

        return response()->json([
            'years' => $age->y,
            'months' => $age->m,
            'days' => $age->d
        ], 200);
    }








}
