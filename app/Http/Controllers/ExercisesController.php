<?php

namespace App\Http\Controllers;
use App\Models\exercise_details;
use Illuminate\Http\Request;
use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;
class ExercisesController extends Controller
{

    public function get_yoga()
    {
        $exerciseDetail = Exercise_details::where('title', 'yoga')->first();
    
        if (!$exerciseDetail) {
            return response()->json(['message' => 'No exercise details found with the title "yoga"'], 404);
        }
    
        // Return the exercise detail with the title "yoga" as JSON response
        return response()->json($exerciseDetail, 200);
    }
    









    public function get_Exercises()
    {
        $exerciseDetails = Exercise_details::all();

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
        info($req);
        try {
        
            if ($req->has('video_url')) {
             
                $exercise->video = $req->input('video_url');
            } else {
               
                return ["Result" => "Error: Video URL not provided"];
            }
    
           
            $exercise->save();
            
           
            return ["Result" => "Video uploaded successfully"];
        } catch (\Exception $e) {
            // Handle errors
            return ["Result" => "Error: " . $e->getMessage()];
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


}
