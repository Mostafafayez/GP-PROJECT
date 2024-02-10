<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Des_Categories;
class VitaminsController extends Controller
{
    public function get_omega_3()
    {
        $omga_3 = Des_Categories::where('category_id', '=', '4')
            ->where('title', '=', 'omega_3')
            ->first();
           
    
        return response()->json($omga_3, 200);
    }
    public function get_zinc()
    {
        $zinc = Des_Categories::where('category_id', '=', '4')
            ->where('title', '=', 'zinc')
            ->first();
           
    
        return response()->json($zinc, 200);
    }
    public function get_vitamin_c()
    {
        $vitamin_c = Des_Categories::where('category_id', '=', '4')
            ->where('title', '=', 'vitamin_c')
            ->first();
           
    
        return response()->json($vitamin_c, 200);
    }
    public function get_iron()
    {
        $iron = Des_Categories::where('category_id', '=', '4')
            ->where('title', '=', 'iron')
            ->first();
           
    
        return response()->json($iron, 200);
    }
}
