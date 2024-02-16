<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Des_Categories;
class tipsANDactivities extends Controller
{
  public function get_tips() 
   {
    $tips = Des_Categories::select('title', 'description','month')
    ->where('category_id','=','7')
    ->get();

    if ($tips->isEmpty()) {
        return response()->json(['message' => 'No exercise details found'], 404);
    }

     return response()->json($tips, 200);
 
}











}
