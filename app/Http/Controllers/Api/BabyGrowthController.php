<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Des_Categories;
use Illuminate\Http\Request;


class BabyGrowthController extends Controller
{

    public function get_babyGrowth_1()
    {
        // Add two conditions to filter records
        $babyGrowth_1 = Des_Categories::where('category_id', '=', '2')
        ->where('Month', '=', '1')
        ->get();
        return response()->json($babyGrowth_1, 200);
    }
    public function get_babyGrowth_2()
    {
        // Add two conditions to filter records
        $babyGrowth_2 = Des_Categories::where('category_id', '=', '2')
        ->where('Month', '=', '2')
        ->get();
        return response()->json($babyGrowth_2, 200);
    }
    public function get_babyGrowth_3()
    {
        // Add two conditions to filter records
        $babyGrowth_3 = Des_Categories::where('category_id', '=', '2')
        ->where('Month', '=', '3')
        ->get();
        return response()->json($babyGrowth_3, 200);
    }
    public function get_babyGrowth_4()
    {
        // Add two conditions to filter records
        $babyGrowth_4 = Des_Categories::where('category_id', '=', '2')
        ->where('Month', '=', '4')
        ->get();
        return response()->json($babyGrowth_4, 200);
    }
    public function get_babyGrowth_5()
    {
        // Add two conditions to filter records
        $babyGrowth_5 = Des_Categories::where('category_id', '=', '2')
        ->where('Month', '=', '5')
        ->get();
        return response()->json($babyGrowth_5, 200);
    }
    public function get_babyGrowth_6()
    {
        // Add two conditions to filter records
        $babyGrowth_6 = Des_Categories::where('category_id', '=', '2')
        ->where('Month', '=', '6')
        ->get();
        return response()->json($babyGrowth_6, 200);
    }
    public function get_babyGrowth_7()
    {
        // Add two conditions to filter records
        $babyGrowth_7 = Des_Categories::where('category_id', '=', '2')
        ->where('Month', '=', '7')
        ->get();
        return response()->json($babyGrowth_7, 200);
    }
    public function get_babyGrowth_8()
    {
        // Add two conditions to filter records
        $babyGrowth_8 = Des_Categories::where('category_id', '=', '2')
        ->where('Month', '=', '8')
        ->get();
        return response()->json($babyGrowth_8, 200);
    }
    public function get_babyGrowth_9()
    {
        // Add two conditions to filter records
        $babyGrowth_9 = Des_Categories::where('category_id', '=', '2')
        ->where('Month', '=', '9')
        ->get();
        return response()->json($babyGrowth_9, 200);
    }
}
