<?php

namespace App\Http\Controllers\Api;
use App\Models\Des_Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BodyChangeController extends Controller
{
    public function get_bodyChange_1()
    {
        $bodyChange_1 = Des_Categories::where('category_id', '=', '1')
            ->where('Month', '=', '1')
            ->get();
        return response()->json($bodyChange_1, 200);
    }
    public function get_bodyChange_2()
    {
        $bodyChange_2 = Des_Categories::where('category_id', '=', '1')
            ->where('Month', '=', '2')
            ->get();
        return response()->json($bodyChange_2, 200);
    }
    public function get_bodyChange_3()
    {
        $bodyChange_3 = Des_Categories::where('category_id', '=', '1')
            ->where('Month', '=', '3')
            ->get();
        return response()->json($bodyChange_3, 200);
    }
    public function get_bodyChange_4()
    {
        // Add two conditions to filter records
        $bodyChange_4 = Des_Categories::where('category_id', '=', '1')
            ->where('Month', '=', '4')
            ->get();
        return response()->json($bodyChange_4, 200);
    }
    public function get_bodyChange_5()
    {
        // Add two conditions to filter records
        $bodyChange_5 = Des_Categories::where('category_id', '=', '1')
            ->where('Month', '=', '5')
            ->get();
        return response()->json($bodyChange_5, 200);
    }
    public function get_bodyChange_6()
    {
        // Add two conditions to filter records
        $bodyChange_6 = Des_Categories::where('category_id', '=', '1')
            ->where('Month', '=', '6')
            ->get();
        return response()->json($bodyChange_6, 200);
    }
    public function get_bodyChange_7()
    {
        // Add two conditions to filter records
        $bodyChange_7 = Des_Categories::where('category_id', '=', '1')
            ->where('Month', '=', '7')
            ->get();
        return response()->json($bodyChange_7, 200);
    }
    public function get_bodyChange_8()
    {
        // Add two conditions to filter records
        $bodyChange_8 = Des_Categories::where('category_id', '=', '1')
            ->where('Month', '=', '8')
            ->get();
        return response()->json($bodyChange_8, 200);
    }
    public function get_bodyChange_9()
    {
        // Add two conditions to filter records
        $bodyChange_9 = Des_Categories::where('category_id', '=', '1')
            ->where('Month', '=', '9')
            ->get();
        return response()->json($bodyChange_9, 200);
    }
}
