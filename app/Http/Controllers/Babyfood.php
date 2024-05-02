<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Des_Categories;
class Babyfood extends Controller
{
    public function get_weaning($month, $language)
    {
        $monthsToCheck = [1, 6, 12, 18, 24];

        // Check if the provided month is valid
        if (!in_array($month, $monthsToCheck)) {
            return response()->json(['message' => 'Invalid month provided'], 404);
        }

        // Select food details based on language and month
        if ($language == "en") {
            $food = Des_Categories::select('title', 'description', 'month','id')
                ->where('category_id', 9)
                ->where('month', $month)
                ->get();
        } elseif ($language == "ar") {
            $food = Des_Categories::select('title_ar', 'description_ar', 'month','id')
                ->where('category_id', 9)
                ->where('month', $month)
                ->get();
        }

        // Check if any food details were found
        if ($food->isEmpty()) {
            return response()->json(['message' => 'No food details found'], 404);
        }

        return response()->json($food, 200);
    }

    public function get_BreastFeeding($month,$language)
    {
        $monthsToCheck = [1, 6,12,18,24];

        if (!in_array($month, $monthsToCheck)) {
            return response()->json(['message' => 'Invalid month provided'], 404);
        }

        if ($language == "en") {
            $food = Des_Categories::select('title', 'description', 'month','id')
                ->where('category_id', 10)
                ->where('month', $month)
                ->get();
        } elseif ($language == "ar") {
            $food = Des_Categories::select('title_ar', 'description_ar', 'month','id')
                ->where('category_id', 10)
                ->where('month', $month)
                ->get();
        }
        if ($food->isEmpty()) {
            return response()->json(['message' => 'No data details found'], 404);
        }

        return response()->json($food, 200);
    }




    public function get_BottleFeeding($month,$language)
    {
        $monthsToCheck = [1, 6,12,18,24];

        if (!in_array($month, $monthsToCheck)) {
            return response()->json(['message' => 'Invalid month provided'], 404);
        }

        if ($language == "en") {
            $food = Des_Categories::select('title', 'description', 'month','id')
                ->where('category_id', 11)
                ->where('month', $month)
                ->get();
        } elseif ($language == "ar") {
            $food = Des_Categories::select('title_ar', 'description_ar', 'month','id')
                ->where('category_id', 11)
                ->where('month', $month)
                ->get();
        }
        if ($food->isEmpty()) {
            return response()->json(['message' => 'No data details found'], 404);
        }

        return response()->json($food, 200);
    }






}
