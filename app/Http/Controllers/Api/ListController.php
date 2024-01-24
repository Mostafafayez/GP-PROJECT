<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\To_do_list;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
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


    public function getListById($user_id)
    {
        $lists = To_do_list::where('user_id', $user_id)->get();
    
        if ($lists->count() > 0) {
            return response()->json($lists, 200);
        } else {
            return response()->json(['message' => 'TO DO LISTS NOT FOUND'], 404);
        }

    }



  
    public function updateList(Request $request, $user_id, $id)
{
    $list = To_do_list::where('id', $id)
        ->where('user_id', $user_id)
        ->first();
    if ($list) {
        if ($request->has('description')) {
            $list->description = $request->description;
        

            return ["Result" => "Data has been updated"];
        } else {
            return ["Result" => "Error: 'description' field is missing in the request"];
        }
    } else {
        return ["Result" => "TO DO LIST NOT FOUND"];
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









