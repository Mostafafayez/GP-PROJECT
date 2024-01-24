<?php

namespace App\Http\Controllers;
use App\Models\Des_Categories;
use Illuminate\Http\Request;

class AdminBabyGrowthController extends Controller
{
    public function add_DESC(Request $req )
    {
        $description = new Des_Categories;
        $fileName = "";
        $description->category_id = $req->input('category_id');
        $description->title = $req->input('title');
        $description->description = $req->input('description');
        $description->month = $req->input('month');

        if ($req->hasFile('image')){
            $fileName = $req->file('image')->store('posts', 'public');
        } else {
            $fileName = null;
        }
    
        $description->image = $fileName;
    
        $result = $description->save();
    
        if ($result) {
            return ["Result" => "saved Successfully"];
        } else {
            return ["Result" => "there is SomeThing wrong"];
        }
    }
    


    public function update_DESC(Request $req, $id)
{
    $description = Des_Categories::find($id);

    if (!$description) {
       
        return ["Result" => "Record not found"];
    }

   
    $description->category_id = $req->input('category_id');
    $description->title = $req->input('title');
    $description->description = $req->input('description');
    $description->month = $req->input('month');

    
    $fileName = "";
    if ($req->hasFile('image')){
        $fileName = $req->file('image')->store('posts', 'public');
    }

    
    $description->image = $fileName;

    
    $result = $description->save();

    if ($result) {
        return ["Result" => "Updated Successfully"];
    } else {
        return ["Result" => "There is something wrong"];
    }
}


public function get_DESC($id)
{
   
    $description = Des_Categories::find($id);

    if (!$description) {
       
        return ["Result" => "Record not found"];
    }

    
    return [
        "category_id" => $description->category_id,
        "title" => $description->title,
        "description" => $description->description,
        "month" => $description->month,
        "image" => $description->image,
    ];
}


public function get_all_DESC()
{
    // Retrieve all records from the Des_Categories table
    $descriptions = Des_Categories::all();

    // Check if there are any records
    if ($descriptions->isEmpty()) {
        return ["Result" => "No records found"];
    }

    // Transform the collection of records into an array of arrays
    $result = $descriptions->map(function ($description) {
        return [
            "category_id" => $description->category_id,
            "title" => $description->title,
            "description" => $description->description,
            "month" => $description->month,
            "image" => $description->image,
        ];
    })->toArray();

    return $result;
}


}
