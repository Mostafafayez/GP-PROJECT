<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Des_Categories;
class ChildGrowth extends Controller
{
      public function get_ChildGrowth() 
       {
        $ChildGrowth = Des_Categories::select('title', 'description','month')
        ->where('category_id','=','8')
        ->get();
    
        if ($ChildGrowth->isEmpty()) {
            return response()->json(['message' => 'No exercise details found'], 404);
        }
    
         return response()->json($ChildGrowth, 200);
     
    }
}
