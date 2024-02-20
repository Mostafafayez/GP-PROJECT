<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Des_Categories;
class tipsANDactivities extends Controller
{
  public function get_tips() 
   {
    $tips = Des_Categories::select('title', 'description','month')
    ->where('category_id','=','7')
    ->get();

    if ($tips->isEmpty()) {
        return response()->json(['message' => 'No exercise details found'], 404);
    }

     return response()->json($tips, 200);
 
}
// public function get_tip($num)
//     {
//         try {
//             // Initialize exerciseDetails variable
//             $tips = null;
    
//             // Determine which course title to retrieve based on $num
//             if ($num == 1) {
//               $tips = Des_Categories::select('title', 'description','month')->where('category_id','=','7')->where('title','tips1')->get();
//             }  elseif ($num == 3) {
//               $tips = Des_Categories::select('title', 'description','month')->where('category_id','=','7')->where('title','tips3')->get();
//             }
//               elseif ($num == 6) {
//                 $tips = Des_Categories::select('title', 'description','month')->where('category_id','=','7')->where('title','tips6')->get();
//             }
    
         
//             if ($tips === null) {
//                 return response()->json(['message' => 'No tips details found'], 404);
//             }
            
           
//             return response()->json($tips, 200);
//         } catch (\Exception $e) {
           
//             return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
//         }
//     }
public function get_tip($month)
{
    $monthsToCheck = [1, 3, 6, 9, 12,15,18,21,24]; // Months to check

    if (!in_array($month, $monthsToCheck)) {
        return response()->json(['message' => 'Invalid month provided'], 404);
    }

    $ChildGrowth = Des_Categories::select('title', 'description', 'month')
        ->where('category_id', '=', '7')
        ->where('month', '=', $month)
        ->get();

    if ($ChildGrowth->isEmpty()) {
        return response()->json(['message' => 'No data details found'], 404);
    }

    return response()->json($ChildGrowth, 200);
}

}
