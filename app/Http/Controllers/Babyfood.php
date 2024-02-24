<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Des_Categories;
class Babyfood extends Controller
{
    public function get_weaning($month)
    {
        $monthsToCheck = [1,6,12,18,24]; 
    
        if (!in_array($month, $monthsToCheck)) {
            return response()->json(['message' => 'Invalid month provided'], 404);
        }
    
        $food = Des_Categories::select('title', 'description', 'month')
            ->where('category_id', '=', '9')
            ->where('month', '=', $month)
            ->get();
    
        if ($food->isEmpty()) {
            return response()->json(['message' => 'No data details found'], 404);
        }
    
        return response()->json($food, 200);
    }
    public function get_BreastFeeding($month)
    {
        $monthsToCheck = [1, 6,12,18,24]; 
    
        if (!in_array($month, $monthsToCheck)) {
            return response()->json(['message' => 'Invalid month provided'], 404);
        }
    
        $food = Des_Categories::select('title', 'description', 'month')
            ->where('category_id', '=', '10')
            ->where('month', '=', $month)
            ->get();
    
        if ($food->isEmpty()) {
            return response()->json(['message' => 'No data details found'], 404);
        }
    
        return response()->json($food, 200);
    }




    public function get_BottleFeeding($month)
    {
        $monthsToCheck = [1, 6,12,18,24]; 
    
        if (!in_array($month, $monthsToCheck)) {
            return response()->json(['message' => 'Invalid month provided'], 404);
        }
    
        $food = Des_Categories::select('title', 'description', 'month')
            ->where('category_id', '=', '11')
            ->where('month', '=', $month)
            ->get();
    
        if ($food->isEmpty()) {
            return response()->json(['message' => 'No data details found'], 404);
        }
    
        return response()->json($food, 200);
    }






}
