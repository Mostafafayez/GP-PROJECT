<?php

namespace App\Http\Controllers\Api;
use App\Models\Des_Categories;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    public function get_Food_1()
    {
        $Food_1 = Des_Categories::where('category_id', '=', '3')
            ->where('Month', '=', '1')
            ->first();
        return response()->json($Food_1, 200);
    }
    public function get_Food_3()
    {
        $Food_3 = Des_Categories::where('category_id', '=', '3')
            ->where('Month', '=', '3')
            ->first();
        return response()->json($Food_3, 200);
    }
    public function get_Food_6()
    {
        $Food_6 = Des_Categories::where('category_id', '=', '3')
            ->where('Month', '=', '6')
            ->first();
        return response()->json($Food_6, 200);
    }

    public function get_ChildGrowth($month)
    {
        $monthsToCheck = [1, 3, 6, 9, 12,15,18,21,24]; // Months to check
    
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
