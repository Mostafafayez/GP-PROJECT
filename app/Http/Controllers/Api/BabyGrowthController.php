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

}
