<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\issue_des;
class issues extends Controller
{
    public function get_issues() 
    {
     $issues = issue_des::all();
  
 
     if ($issues->isEmpty()) {
         return response()->json(['message' => 'No issue details found'], 404);
     }
 
      return response()->json($issues, 200);
  
 }


 public function add_issue(Request $req)
 {
     try {
         // Validate the request data
         $req->validate([
             'issue_id' => 'required|exists:issues,id',
             'title' => 'required',
             'description' => 'required',
         ]);
 
         $issue = new issue_des;
 
       
         $issue->issue_id = $req->input('issue_id');
         $issue->title = $req->input('title');
         $issue->description = $req->input('description');
 
      
         $issue->save();
 
     
         return ["Result" => "Uploaded successfully"];
     } catch (\Exception $e) {
        
         if ($e instanceof \Illuminate\Validation\ValidationException) {
             return ["Result" => "Validation Error: " . $e->getMessage()];
         }
 
     
         return ["Result" => "Error: " . $e->getMessage()];
     }
 }
 
 




 public function update_ISSUE(Request $req, $id)
 {
     try {
         // Find the issue_des record by ID
         $issue = issue_des::findOrFail($id);
 
         // Update title if provided in the request
         if ($req->has('title')) {
             $issue->title = $req->input('title');
         }
 
         // Update description if provided in the request
         if ($req->has('description')) {
             $issue->description = $req->input('description');
         }
 
         // Check if any fields were updated
         $fieldsUpdated = $issue->isDirty();
 
         if ($fieldsUpdated) {
             $issue->save();
             return ["Result" => "Updated successfully"];
         } else {
             // No fields were updated, return an error message
             return ["Result" => "Error: No fields provided for update"];
         }
     } catch (\Exception $e) {
         // Handle errors
         return ["Result" => "Error: " . $e->getMessage()];
     }
 }
 




public function delete_ISSUE($id)
{
    try {

        $issue = issue_des::findOrFail($id);


        $issue->delete();

        return ["Result" => "Deleted successfully"];
    } catch (\Exception $e) {
   
        return ["Result" => "Error: " . $e->getMessage()];
    }
}




public function get_issue($num)
{
    try {
        // Initialize exerciseDetails variable
        $issue = null;

        // Check if $num is within the valid range (1 to 10)
        if ($num < 1 || $num > 10) {
            return response()->json(['message' => 'Invalid issue number.'], 400);
        }

        // Iterate through numbers from 1 to 10
        for ($i = 1; $i <= 10; $i++) {
            if ($num == $i) {
                $issue = issue_des::where('issue_id', $i)->get();
                break; // Exit loop if issue found
            }
        }

        // Check if any issue details were found
        if ($issue === null) {
            return response()->json(['message' => 'No issue details found'], 404);
        }

        // Return issue details as JSON response
        return response()->json($issue, 200);
    } catch (\Exception $e) {
        // Handle any exceptions
        return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
    }
}


}






