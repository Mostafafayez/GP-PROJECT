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
    


    public function update_all(Request $req, $id)
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
    try {
       
        $descriptions = Des_Categories::all();

       
        $result = $descriptions->map(function ($description) {
          
            $filteredData = collect($description->toArray())->except(['created_at', 'updated_at']);

            return $filteredData;
        });

        return response()->json($result, 200);
    } catch (\Exception $e) {
        return response()->json(["error" => $e->getMessage()], 500);
    }
}





public function update_DESC(Request $req, $id)
{
    $description = Des_Categories::find($id);

    if (!$description) {
        return ["Result" => "Record not found"];
    }

    // Update only the fields that are provided in the request
    if ($req->filled('category_id')) {
        $description->category_id = $req->input('category_id');
    }

    if ($req->filled('title')) {
        $description->title = $req->input('title');
    }

    if ($req->filled('description')) {
        $description->description = $req->input('description');
    }

    if ($req->filled('month')) {
        $description->month = $req->input('month');
    }

    $fileName = "";
    if ($req->hasFile('image')) {
        $fileName = $req->file('image')->store('posts', 'public');
        $description->image = $fileName;
    }

    $result = $description->save();

    if ($result) {
        return ["Result" => "Updated Successfully"];
    } else {
        return ["Result" => "There is something wrong"];
    }
}
}