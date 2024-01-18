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
            ->get();
        return response()->json($Food_1, 200);
    }
    public function get_Food_3()
    {
        $Food_3 = Des_Categories::where('category_id', '=', '3')
            ->where('Month', '=', '3')
            ->get();
        return response()->json($Food_3, 200);
    }
    public function get_Food_6()
    {
        $Food_6 = Des_Categories::where('category_id', '=', '3')
            ->where('Month', '=', '6')
            ->get();
        return response()->json($Food_6, 200);
    }
}
