<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\issue_des;
use App\Models\issues;


class issue extends Controller
{
    public function get_issues($language)
    {
        try {
            if ($language == "en") {
                $issues = issues::select('name', 'id')->get();
            } elseif ($language == "ar") {
                $issues = Issues::select('name_ar', 'id')->get();
            }

            if ($issues->isEmpty()) {
                return response()->json(['message' => 'No issue details found'], 404);
            }

            return response()->json($issues, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occurred: ' . $e->getMessage()], 500);
        }
    }





    public function getIssues($language) {

        if($language=='en'){
        $issues = Issue_des::select('issue_des.title', 'issue_des.description', 'issues.name')
            ->join('issues', 'issue_des.issue_id', '=', 'issues.id')
            ->get();
        }

        elseif($language=='ar'){
            $issues = Issue_des::select('issue_des.title_ar', 'issue_des.description_ar', 'issues.name_ar')
                ->join('issues', 'issue_des.issue_id', '=', 'issues.id')
                ->get();
            }





        return $issues;
    }
    public function createIssue( Request $req) {
        // Validate the request data based on language

            $req->validate([
                'name' => 'required',
                'title' => 'required',
                'description' => 'required',
                'name_ar' => 'required',
                'title_ar' => 'required',
                'description_ar' => 'required',
            ]);



        // Create a new issue
        $issue = new issues();

            $issue->name = $req->input('name');

            $issue->name_ar = $req->input('name_ar');

        $issue->save();

        // Create a new issue description
        $issueDes = new issue_des();
        $issueDes->issue_id = $issue->id; // Set the issue_id to the ID of the newly created issue
            $issueDes->title = $req->input('title');
            $issueDes->description = $req->input('description');
            $issueDes->title_ar = $req->input('title_ar');
            $issueDes->description_ar = $req->input('description_ar');

        $issueDes->save();

        return "Issue and its description created successfully!";
    }





    public function get_desc($language, $id)
    {
        $bodyChange = null;


        if ($language == "en") {
            $bodyChange = issue_des::select('title','description')
                ->where('id', $id)
                ->first();
        } elseif ($language == "ar") {
            $bodyChange = issue_des::select('title_ar','description_ar')
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







// public function add_issue(Request $req)
//  {
//      try {
//          // Validate the request data
//          $req->validate([
//              'issue_id' => 'required|exists:issues,id',
//              'title' => 'required',
//              'description' => 'required',
//          ]);

//          $issue = new issue_des;


//          $issue->issue_id = $req->input('issue_id');
//          $issue->title = $req->input('title');
//          $issue->description = $req->input('description');


//          $issue->save();


//          return ["Result" => "Uploaded successfully"];
//      } catch (\Exception $e) {

//          if ($e instanceof \Illuminate\Validation\ValidationException) {
//              return ["Result" => "Validation Error: " . $e->getMessage()];
//          }


//          return ["Result" => "Error: " . $e->getMessage()];
//      }
//  }
  public function add_issue(Request $req,$id)
 {
     try {
         // Validate the request data
         $req->validate([

             'title' => 'required',
             'description' => 'required',
             'title_ar' => 'required',
             'description_ar' => 'required',
         ]);

         $issue = new issue_des;



         $issue->title = $req->input('title');
         $issue->description = $req->input('description');
         $issue->title_ar = $req->input('title_ar');
         $issue->description_ar = $req->input('description_ar');

         $issue->issue_id = $id;
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

         // Update title_ar if provided in the request
         if ($req->has('title_ar')) {
             $issue->title_ar = $req->input('title_ar');
         }

         // Update description if provided in the request
         if ($req->has('description')) {
             $issue->description = $req->input('description');
         }

         // Update description_ar if provided in the request
         if ($req->has('description_ar')) {
             $issue->description_ar = $req->input('description_ar');
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








    public function add_issues(Request $req)
    {
        try {
            // Validate the request data
            $req->validate([

                'name' => 'required',

                'name_ar' => 'required',
            ]);

            $issue = new issues;



            $issue->name = $req->input('name');

            $issue->name_ar = $req->input('name_ar');

            $issue->save();


            return ["Result" => "Uploaded successfully"];
        } catch (\Exception $e) {

            if ($e instanceof \Illuminate\Validation\ValidationException) {
                return ["Result" => "Validation Error: " . $e->getMessage()];
            }


            return ["Result" => "Error: " . $e->getMessage()];
        }



    }




    public function update_issues(Request $req, $id)
    {
        try {
            // Find the issue record by ID
            $issue = Issues::findOrFail($id);

            // Check if the issue was found
            if (!$issue) {
                return response()->json(['message' => 'No issue details found'], 404);
            }

            // Update the name field if provided in the request
            if ($req->has('name')) {
                $issue->name = $req->input('name');
            }

            // Update the name_ar field if provided in the request
            if ($req->has('name_ar')) {
                $issue->name_ar = $req->input('name_ar');
            }

            // Check if any field was updated
            if ($issue->isDirty()) {
                // Save the changes
                $issue->save();
                return response()->json(["Result" => "Issue updated successfully"], 200);
            } else {
                // No changes were made to any field, return an error message
                return response()->json(["Result" => "Error: No new data provided for update"], 400);
            }
        } catch (\Exception $e) {
            // Handle errors
            return response()->json(["Result" => "Error: " . $e->getMessage()], 500);
        }
    }





public function delete_ISSUEs($id)
{
    try {

        $issue = issues::findOrFail($id);


        $issue->delete();

        return ["Result" => "Deleted successfully"];
    } catch (\Exception $e) {

        return ["Result" => "Error: " . $e->getMessage()];
    }
}


public function get_issue($issue_id,$language)
{
    try {
        if ($language == "en") {
        // Find all issue details with the given issue_id
        $issues = issue_des::
      select('title','description','id')
        ->where('issue_id', $issue_id)->get();
        }
        if ($language == "ar") {
            // Find all issue details with the given issue_id
            $issues = issue_des::select('title_ar','description_ar','id')
           -> where('issue_id', $issue_id)->get();
            }

        // Check} if any issue details were found
        if ($issues->isEmpty()) {
            return response()->json(['message' => 'No issue details found for the given issue_id'], 404);
        }

        // Return issue details as JSON response
        return response()->json($issues, 200);
    } catch (\Exception $e) {
        // Handle any exceptions
        return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
    }
}





    }











