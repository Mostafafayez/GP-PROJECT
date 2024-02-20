<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Des_Categories;
class ChildGrowth extends Controller
{
    //   public function get_ChildGrowth() 
    //    {
    //     $ChildGrowth = Des_Categories::select('title', 'description','month')
    //     ->where('category_id','=','8')
    //     ->get();
    
    //     if ($ChildGrowth->isEmpty()) {
    //         return response()->json(['message' => 'No exercise details found'], 404);
    //     }
    
    //      return response()->json($ChildGrowth, 200);
     
    // }


    public function get_ChildGrowth($month)
    {
        $monthsToCheck = [1, 3, 6, 9, 12,15,18,21,24]; 
    
        if (!in_array($month, $monthsToCheck)) {
            return response()->json(['message' => 'Invalid month provided'], 404);
        }
    
        $ChildGrowth = Des_Categories::select('title', 'description', 'month')
            ->where('category_id', '=', '8')
            ->where('month', '=', $month)
            ->get();
    
        if ($ChildGrowth->isEmpty()) {
            return response()->json(['message' => 'No data details found'], 404);
        }
    
        return response()->json($ChildGrowth, 200);
    }
}
