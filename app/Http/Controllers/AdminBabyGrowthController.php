<?php

namespace App\Http\Controllers;
use App\Models\Des_Categories;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class AdminBabyGrowthController extends Controller
{
    // public function add_DESC(Request $req )
    // {
    //     $description = new Des_Categories;
    //     $fileName = "";
    //     $description->category_id = $req->input('category_id');
    //     $description->title = $req->input('title');
    //     $description->description = $req->input('description');
    //     $description->month = $req->input('month');

    //     if ($req->hasFile('image')){
    //         $fileName = $req->file('image')->store('posts', 'public');
    //     } else {
    //         $fileName = null;
    //     }

    //     $description->image = $fileName;

    //     $result = $description->save();

    //     if ($result) {
    //         return ["Result" => "saved Successfully"];
    //     } else {
    //         return ["Result" => "there is SomeThing wrong"];
    //     }
    // }
    public function add_DESC(Request $req, $num)
{
    try {
        // Validate the request data
        $req->validate([
            'month' => 'nullable|integer|min:1|max:24',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'title_ar' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'image' => ($num >= 1 && $num <= 3) ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($num >= 1 && $num <= 12 && $num != 5 && $num != 6 ) {
            $description = new Des_Categories;

            $description->month = $req->input('month');
            $description->title = $req->input('title');
            $description->description = $req->input('description');
            $description->description_ar = $req->input('description_ar');
            $description->title_ar = $req->input('title_ar');


            if ($req->hasFile('image')) {
                $fileName = $req->file('image')->store('posts', 'public');
                $description->image = $fileName;
            }

            $description->category_id = $num;

            $description->save();

            return response()->json(["Result" => "Uploaded successfully"], 200);
        } else {
            return response()->json(["Result" => "Invalid month"], 400);
        }
    } catch (\Exception $e) {
        if ($e instanceof \Illuminate\Validation\ValidationException) {
            return response()->json(["Result" => "Validation Error: " . $e->getMessage()], 400);
        } else {
            return response()->json(["Result" => "Error: " . $e->getMessage()], 500);
        }
    }
}



public function update_one(Request $req, $id)

{
    try {


    $req->validate([

        'image' => 'jpg,jpeg,png,gif|max:2048',

    ]);

    $description = Des_Categories::find($id);

    if (!$description) {
        return ["Result" => "Record not found"];
    }


    if ($req->has('category_id')) {
        $description->category_id = $req->input('category_id');
    }
    if ($req->has('title')) {
        $description->title = $req->input('title');
    }
    if ($req->has('description')) {
        $description->description = $req->input('description');
    }

    if ($req->has('month')) {
        $description->month = $req->input('month');
    }
    if ($req->has('description_ar')) {
        $description->description_ar = $req->input('description_ar');
    }
    if ($req->has('title_ar')) {
        $description->title_ar = $req->input('title_ar');
    }


    if ($req->hasFile('image')){
        $fileName = $req->file('image')->store('posts', 'public');
        $description->image = $fileName;
    }


    $result = $description->save();

    if ($result) {
        return ["Result" => "Updated Successfully"];
    } else {
        return ["Result" => "There is something wrong"];
    }

} catch (\Exception $e) {
    if ($e instanceof \Illuminate\Validation\ValidationException) {
        return response()->json(["Result" => "Validation Error: " . $e->getMessage()], 400);
    } else {
        return response()->json(["plz check image format"]);
    }

}}





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
        // Attempt to retrieve all records from the Des_Categories model
        $descriptions = Des_Categories::all();

        // Check if there are any records
        if ($descriptions->isEmpty()) {
            // If no records are found, return a message indicating so
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

        // Return the result
        return $result;
    } catch (\Exception $e) {
        // If an exception occurs, catch it here and handle it
        // You can log the error or perform other error-handling actions here
        return ["Error" => $e->getMessage()];
    }
}


public function getAllBabyGrowth($language)
    {
        if ($language == "en") {
        $bodyChange = Des_Categories::
        select('image','title','description','id')
        ->where('category_id', '=', '2')
            ->get();
        }
        if ($language == "ar") {
            $bodyChange = Des_Categories::
            select('image','title_ar','description_ar','id')
            ->where('category_id', '=', '2')
                ->get();
            }
        return response()->json($bodyChange, 200);
    }

    public function getAllBodyChanges($language)
    {
        if ($language == "en") {
            $bodyChange = Des_Categories::
            select('image','title','description','id')
            ->where('category_id', '=', '1')
                ->get();
            }
            if ($language == "ar") {
                $bodyChange = Des_Categories::
                select('image','title_ar','description_ar','id')
                ->where('category_id', '=', '1')
                    ->get();
                }


        return response()->json($bodyChange, 200);
    }



    public function delete($id)
    {
        try {
            $delet = Des_Categories::findOrFail($id);
            $delet->delete();

            return response()->json(['message' => 'Data deleted successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Data not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting data'], 500);
        }
    }


    // public function update_DESC(Request $req, $num)
    // {
    //     try {
    //         // Retrieve the existing description
    //         $description = Des_Categories::findOrFail($num);

    //         // Initialize fieldsToUpdate array
    //         $fieldsToUpdate = [
    //             'title' => $req->input('new_title'),
    //             'description' => $req->input('new_description'),
    //             'month' => $req->input('new_month'),
    //         ];

    //         // Check if there's a new image file uploaded
    //         if ($req->hasFile('image')) {
    //             $fileName = $req->file('image')->store('posts', 'public');
    //             $fieldsToUpdate['image'] = $fileName; // Update image field in fieldsToUpdate
    //         }

    //         // Update other fields provided in $fieldsToUpdate array
    //         foreach ($fieldsToUpdate as $key => $value) {
    //             $description->$key = $value;
    //         }

    //         // Save the updated description
    //         $result = $description->save();

    //         if ($result) {
    //             return "Updated successfully.";
    //         } else {
    //             return "Failed to update.";
    //         }
    //     } catch (\Exception $e) {
    //         return "Failed to update: " . $e->getMessage();
    //     }
    // }



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





}
