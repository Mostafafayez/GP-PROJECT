<?php

namespace App\Http\Controllers;
use App\Models\exercise_details;
use Illuminate\Http\Request;
use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;
class ExercisesController extends Controller
{

    public function get_exercise($num)
    {
        try {
            // Initialize exerciseDetails variable
            $exerciseDetails = null;
    
            // Determine which course title to retrieve based on $num
            if ($num == 1) {
                $exerciseDetails = Exercise_details::where('category_id', 5)->where('title', 'exercise1')->first();
            } elseif ($num == 2) {
                $exerciseDetails = Exercise_details::where('category_id', 5)->where('title', 'exercise2')->first();
            } elseif ($num == 3) {
                $exerciseDetails = Exercise_details::where('category_id', 5)->where('title', 'exercise3')->first();
            }
              elseif ($num == 4) {
            $exerciseDetails = Exercise_details::where('category_id', 5)->where('title', 'exercise4')->first();
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
    








    public function get_Exercises()
    {
        $exerciseDetails = Exercise_details::where('category_id','=','5')
        ->get();

        if ($exerciseDetails->isEmpty()) {
            return response()->json(['message' => 'No exercise details found'], 404);
        }
    
         return response()->json($exerciseDetails, 200);
        
    }

    
    public function add_Exercise(Request $req)
    {
        $exercise = new exercise_details;
        $exercise->title = $req->input('title');
        $exercise->description = $req->input('description');
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
    
       
        if ($req->has('category_id')) {
            $exercise->category_id = $req->input('category_id');
        }
        if ($req->has('title')) {
            $exercise->title = $req->input('title');
        }
        if ($req->has('description')) {
            $exercise->description = $req->input('description');
        }
      
    
        
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


