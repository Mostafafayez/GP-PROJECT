<?php

namespace App\Http\Controllers;
use App\Models\exercise_details;
use Illuminate\Http\Request;
use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;
class ExercisesController extends Controller
{

    public function get_exercise($num, $language)
    {
        try {
            // Initialize exerciseDetails variable
            $exerciseDetails = null;

            // Define array of course titles
            $courseTitles = ['Exercise1', 'Exercise2', 'Exercise3', 'Exercise4'];

            // Check if $num is within the range of courseTitles array
            if ($num > 0 && $num <= count($courseTitles)) {
                // Get the index corresponding to $num
                $index = $num - 1;

                // Select exercise details based on language and course title
                if ($language == "en") {
                    $exerciseDetails = Exercise_details::select('description', 'video','id')
                        ->where('category_id', '=', '5')
                        ->where('title', $courseTitles[$index])
                        ->first();
                } elseif ($language == "ar") {
                    $exerciseDetails = Exercise_details::select('description_ar', 'video','id')
                        ->where('category_id', '=', '5')
                        ->where('title', $courseTitles[$index])
                        ->first();
                }
            }

            // Check if exerciseDetails is still null after the loop
            if ($exerciseDetails === null) {
                return response()->json(['message' => 'Exercise not found'], 404);
            }

            return response()->json($exerciseDetails, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }










    public function get_Exercises($language)
    {
        if ($language == "en") {
            $exerciseDetails = Exercise_details::select('video','description','id')
                ->where('category_id','=','5')
                ->get();
        } elseif ($language == "ar") {
            $exerciseDetails = Exercise_details::select('video','description_ar','id')
                ->where('category_id','=','5')
                ->get();
        }

        // Check if exerciseDetails is empty and return appropriate response
        if ($exerciseDetails->isEmpty()) {
            return response()->json(['message' => 'No exercise details found'], 404);
        }

        return response()->json($exerciseDetails, 200);
    }


    public function add_Exercise(Request $req)
    {
        $exercise = new exercise_details;
        // $exercise->title = $req->input('title');
        // $exercise->title = $req->input('title_ar');
        $exercise->description = $req->input('description');
        $exercise->description_ar = $req->input('description_ar');
        // Automatically set category_id to 5
        $exercise->category_id = 5;

        try {
            if ($req->has('video_url')) {
                $exercise->video = $req->input('video_url');
            } else {
                return ["Result" => "Error: Video URL not provided"];
            }

            $exercise->save();

            return ["Result" => " uploaded successfully"];
        } catch (\Exception $e) {
            // Handle errors
            return ["Result" => "Error: " . $e->getMessage()];
        }
    }




    public function update_exercise(Request $req, $id)
    {
        $exercise = exercise_details::find($id);

        if (!$exercise) {
            return ["Result" => "Record not found"];
        }


        // if ($req->has('category_id')) {
        //     $exercise->category_id = $req->input('category_id');
        // }
        // if ($req->has('title')) {
        //     $exercise->title = $req->input('title');
        // }
        if ($req->has('description')) {
            $exercise->description = $req->input('description');
        }
        if ($req->has('description_ar')) {
            $exercise->description_ar = $req->input('description_ar');
        }
        // if ($req->has('title_ar')) {
        //     $exercise->title_ar = $req->input('title_ar');
        // }



        if ($req->has('video_url')) {
            $exercise->video = $req->input('video_url');
        }

        // Save the updated exercise details
        $result = $exercise->save();

        if ($result) {
            return ["Result" => "Updated Successfully"];
        } else {
            return ["Result" => "There is something wrong"];
        }
    }
    public function delete($id)
    {
        $delet = exercise_details::findOrFail($id);

        if ($delet) {
            $delet->delete();
            return response()->json(['message' => 'Data deleted successfully']); // Deletion successful
        } else {
            return response()->json(['message' => 'Data didn’t deleted successfully']); // Record not found
        }
    }



    public function get_desc($language, $id)
    {
        $bodyChange = null;


        if ($language == "en") {
            $bodyChange = exercise_details::select('video','description')
                ->where('id', $id)
                ->first();
        } elseif ($language == "ar") {
            $bodyChange = exercise_details::select('video','description_ar')
                ->where('id', $id)
                ->first();
        }

        if ($bodyChange) {
            // If a record is found, return it as JSON response
            return response()->json($bodyChange, 200);
        } else {
            // If no record is found, return a suitable response
            return response()->json(['error' => 'Record not found'], 404);
        }
    }




    }




















    // public function add_Exercise(Request $req)
    // {
    //     $exercise = new exercise_details;
    //     $exercise->title = $req->input('title');
    //     $exercise->description = $req->input('description');
    //     info($req);
    //     try {
    //         // Create a new instance of the Vimeo class with your Vimeo access token
    //         $vimeo = new Vimeo('9fdd059f3726495895399b9c2a5c61cade4fb356', 'NFm3UhUgVGayIjRGtrpM+537pS3BQwVYBgF+rAmLRbJsz7Hb/wT92OIJ2w0Tp4u/kKl/V4EDrhuDCrF0qvFxsCzz8skAV0meO+QUSACcZdP4rDm9xqQfJUvgn7Dfbn5B
    //         ', '56c1fc7b2bfec368a8a3de979c016880');

    //         // Upload the video to Vimeo
    //         $uri = $vimeo->upload($req->file('video')->getPathname());
    //         info($uri);
    //         // Store the Vimeo video URI in the exercise_details model
    //         $exercise->video = $uri;

    //         // Save the exercise details to the database
    //         $exercise->save();

    //         // Return success response
    //         return ["Result" => "Video uploaded successfully"];
    //     } catch (VimeoUploadException $e) {
    //         // Handle upload errors
    //         return ["Result" => "Error uploading video: " . $e->getMessage()];
    //     } catch (\Exception $e) {
    //         // Handle other errors
    //         return ["Result" => "Error: " . $e->getMessage()];
    //     }
    // }
    // }


