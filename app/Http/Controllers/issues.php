<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\issue_des;
class issues extends Controller
{
    public function get_issues() 
    {
     $issues = issue_des::where('issue_id','=','1')
     ->get();
 
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
      
        $issue = issue_des::findOrFail($id);

     
      
        if ($req->has('title')) {
            $issue->title = $req->input('title');
        }
        if ($req->has('description')) {
            $issue->description = $req->input('description');
        }

  
        if (!$req->has('issue_id') && !$req->has('title') && !$req->has('description')) {
            $issue->fill($req->all());
        }

   
        $issue->save();

       
        return ["Result" => "Updated successfully"];
    } catch (\Exception $e) {
        
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


}






