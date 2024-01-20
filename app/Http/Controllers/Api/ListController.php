<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\To_do_list;
use Carbon\Carbon;

class ListController extends Controller
{
    public function addList(Request $req ){

        $list = new To_do_list;
        $list->description = $req->description;
        $list->user_id = $req->user_id;
        $result = $list->save();
        if ($result)
        {
            return ["Result" => "Data has been saved"];
        }
        else
        {
            return ["Result" => "Operation Failed"];
        }
    }

    public function deleteList($id)
    {
       $list = To_do_list::find($id);
       $result=$list->delete();
       if ($result)
       {
           return ["result"=>"record has been delete"];
       }
       else
       {
           return ["Result" => "Operation Failed"];
       }

    }

    // public function getListById($user_id)
    // {
    //     // Find the record by ID
    //     $list = To_do_list::find($user_id);

    //     // Check if the record is found
    //     if ($list) {
    //         return response()->json($list, 200);
    //     } else {
    //         return response()->json(['message' => 'TO DO LIST NOT FOUND'], 404);
    //     }
    public function getListById($user_id)
    {
        $list = To_do_list::find($user_id);
        if ($list) {
            return response()->json($list, 200);
        } else {
            return response()->json(['message' => 'TO DO LIST NOT FOUND'], 404);
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
}






