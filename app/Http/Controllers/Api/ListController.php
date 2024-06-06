<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Friends;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\To_do_list;
use Carbon\Carbon;

use App\Models\User;

class ListController extends Controller
{


    public function addList(Request $req)
    {
        $list = new To_do_list;
        $list->title = $req->title;
        $list->content = $req->content;
        $list->user_id = $req->user_id;
        $list->due_date =$req->due_date;


        $result = $list->save();

        if ($result) {
            return ["Result" => "Data has been saved"];
        } else {
            return ["Result" => "Operation Failed"];
        }
    }

    public function deleteList($id)
    {

        try {

        $list  = To_do_list::findOrFail($id);


      $list ->delete();

        return ["Result" => "Deleted successfully"];
    } catch (\Exception $e) {

        return ["Result" => "Error: " . $e->getMessage()];
    }
    }




    public function updateList(Request $request, $id)
    {
        $list = To_do_list::find($id);


        if (!$list) {
            return response()->json(['message' => 'List not found'], 404);
        }


        $validatedData = [];
        if ($request->filled('title')) {
            $validatedData['title'] = $request->input('title');
        }
        if ($request->filled('content')) {
            $validatedData['content'] = $request->input('content');
        }


        if (empty($validatedData)) {
            return response()->json(['message' => 'No fields provided for update'], 400);
        }


        $list->fill($validatedData);
        $list->save();

        return ["Result" => "Updated successfully"];
    }





    public function getListById($user_id)
    {
        $lists = To_do_list::where('user_id', $user_id)->get();

        if ($lists->count() > 0) {
            return response()->json($lists, 200);
        } else {
            return response()->json(['message' => 'TO DO LISTS NOT FOUND'], 404);
        }
    }








    public function calculateWeeksDifference($inputDate)
    {

        $startDate = Carbon::parse($inputDate);

        $currentDate = Carbon::now();

        $weeksDifference = $startDate->diffInWeeks($currentDate);

        return $weeksDifference;
    }

    public function calculateDaysDifference($inputDate)
    {

        $startDate = Carbon::parse($inputDate);

        $currentDate = Carbon::now();

        $daysDifference = $startDate->diffInDays($currentDate);

        return $daysDifference;
    }


    public function calculateWeeksAndDaysPregrency($inputDate)
    {
        $startDate = Carbon::parse($inputDate);

        $currentDate = Carbon::now();

        $weeksDifference = $startDate->diffInWeeks($currentDate);
        $remainingDays = $startDate->diffInDays($currentDate) % 7;

        if ($remainingDays === 7) {
            $weeksDifference++;
            $remainingDays = 0;
        }
        return [
            'weeks' => $weeksDifference,
            'days' => $remainingDays,
        ];
    }


    public function addFriend(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'user_id' => 'required',
            'friend_id' => 'required',
        ]);
   // Check if the friend relationship already exists
          $friendExists = Friends::where('user_id', $validatedData['user_id'])
           ->where('friend_id', $validatedData['friend_id'])
          ->exists();

                 if ($friendExists) {
                  return response()->json(["message" => "Friend already exists"], 400);
                 }
        // Create a new Friend instance
        $friend = new Friends;

        // Set the user_id and friend_id attributes
        $friend->user_id = $validatedData['user_id'];
        $friend->friend_id = $validatedData['friend_id'];

        // Save the friend relationship
        $result = $friend->save();

        // Return response
        if ($result) {
            return response()->json(["message" => "Friend added successfully"], 200);
        } else {
            return response()->json(["message" => "Added Failed "], 500);
        }
    }

//     public function getFriend(Request $request, $id)
// {
//     // Find the user by their ID
//     $user = User::findOrFail($id);

//     // Load the user's friends using the relationship
//     $friends = $user->friend;

//     // Array to store user data and their friends' names
//     $userData = [
//         'user_name' => $user->name,
//         'friends' => [],
//     ];

//     // Iterate over the user's friends
//     foreach ($friends as $friend) {
//         $userData['friends'][] = $friend->name;
//     }

//     // Return user data and friends' names
//     return response()->json($userData);
// }
public function getFriend(Request $request, $id)
{

    $user = User::findOrFail($id);

    $friends = $user->friends;


    $userData = [
        'user_name' => $user->name,
        'user_id' => $user->id,

        'friends' => [],
    ];


    foreach ($friends as $friend) {

        $friendName = $friend -> name;
        $friendId = $friend->id;
        $friendimage = $friend->image;

        if ($friendName !== null) {
            $userData['friends'][] = [
                'friend_name' => $friendName,
                'friend_id' => $friendId,
                'image' => $friendimage,

            ];
    }
    }

    return response()->json($userData);
}



public function update_one(Request $req, $id)
{
try {
        $req->validate([
            'image' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $description = User::find($id);

        if ($req->hasFile('image')) {
            $fileName = $req->file('image')->store('posts', 'public');
            $description->image = $fileName;
        }
        if ($description->save()) {
            return response()->json(["Result" => "Updated Successfully"]);
        } else {
            return response()->json(["Result" => "There is something wrong"], 500);
        }
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json(["Result" => "Validation Error: " . $e->getMessage()], 400);
    } catch (\Exception $e) {
        return response()->json(["Result" => "An error occurred: " . $e->getMessage()], 500);
    }
}
}





























