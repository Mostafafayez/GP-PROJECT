<?php

namespace App\Http\Controllers;
use App\Models\Des_Categories;
use Illuminate\Http\Request;
use App\Models\exercise_details;
class courses extends Controller
{



    public function add_courses(Request $req)
    {
        $course = new exercise_details;
        $course->title = $req->input('title');
        $course->description = $req->input('description');
        $course->description_ar = $req->input('description');
        $course->category_id = 6;
        info($req);
        try {

            if ($req->has('video_url')) {

                $course->video = $req->input('video_url');
            } else {

                return ["Result" => "Error: Video URL not provided"];
            }


            $course->save();


            return ["Result" => "Video uploaded successfully"];
        } catch (\Exception $e) {
            // Handle errors
            return ["Result" => "Error: " . $e->getMessage()];
        }
}
public function get_cours($language)

{
    if ($language=='ar'){
    $exerciseDetails = Exercise_details::select('description','video_url')::where('category_id','=','6')
    ->first();

   if ($exerciseDetails->isEmpty()) {
        return response()->json(['message' => 'No courses details found'], 404);
   }



   return response()->json($exerciseDetails, 200);

    }
    else {
        return response()->json(['message' => 'Invalid language specified'], 400);
    }}



    public function get_courses($language)
    {

        try {
            if ($language=='en'){
            // Fetch exercise details with category_id = 6
            $exerciseDetails = Exercise_details::select('description', 'video','id')
                                ->where('category_id', '=', '6')
                                ->get(); // Execute the query to fetch the results
        }
        elseif ($language=='ar'){
            // Fetch exercise details with category_id = 6
            $exerciseDetails = Exercise_details::select('description_ar', 'video','id')
                                ->where('category_id', '=', '6')
                                ->get(); // Execute the query to fetch the results
        }
            // Check if any exercise details were found
            if ($exerciseDetails->isEmpty()) {
                return response()->json(['message' => 'No course details found'], 404);
            }

            // Return exercise details as JSON response
            return response()->json($exerciseDetails, 200);
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }



    public function get_course($num,$language)
    {
        try {
            // Initialize exerciseDetails variable
            $exerciseDetails = null;

            // Define array of course titles
            $courseTitles = ['course1', 'course2', 'course3', 'course4'];

            // Loop through the course titles based on $num
            if ($num > 0 && $num <= count($courseTitles)) {
                // Get the index corresponding to $num
                $index = $num - 1;

                // Select exercise details based on language and course title
                if ($language == "en") {
                    $exerciseDetails = Exercise_details::select('description', 'video','id')
                        ->where('category_id', '=', '6')
                        ->where('title', $courseTitles[$index])
                        ->first();
                } elseif ($language == "ar") {
                    $exerciseDetails = Exercise_details::select('description_ar', 'video','id')
                        ->where('category_id', '=', '6')
                        ->where('title', $courseTitles[$index])
                        ->first();
                }

            }

            // Check if any exercise details were found
            if ($exerciseDetails === null) {
                return response()->json(['message' => 'No course details found'], 404);
            }

            // Return exercise details as JSON response
            return response()->json($exerciseDetails, 200);
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }













    }









