<?php

namespace App\Http\Controllers\Api;
use App\Models\Des_Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BodyChangeController extends Controller
{
    public function get_bodyChange_1($language)
    {
        if ($language == "en") {
            $bodyChange_1 = Des_Categories::select('image','title','description','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '1')
                ->first();
        } elseif ($language == "ar") {
            $bodyChange_1= Des_Categories::select('image','title_ar','description_ar','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '1')
                ->first();
        }
        return response()->json($bodyChange_1, 200);
    }
    public function get_bodyChange_2($language)
    {
        if ($language == "en") {
            $bodyChange_2 = Des_Categories::select('image','title','description','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '2')
                ->first();
        } elseif ($language == "ar") {
            $bodyChange_2= Des_Categories::select('image','title_ar','description_ar','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '2')
                ->first();
        }
        return response()->json($bodyChange_2, 200);
    }
    public function get_bodyChange_3($language)
    {
        if ($language == "en") {
            $bodyChange_3 =Des_Categories::select('image','title','description','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '3')
                ->first();
        } elseif ($language == "ar") {
            $bodyChange_3= Des_Categories::select('image','title_ar','description_ar','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '3')
                ->first();
        }
        return response()->json($bodyChange_3, 200);
    }
    public function get_bodyChange_4($language)
    {
        // Add two conditions to filter records
        if ($language == "en") {
            $bodyChange_4 = Des_Categories::select('image','title','description','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '4')
                ->first();
        } elseif ($language == "ar") {
            $bodyChange_4= Des_Categories::select('image','title_ar','description_ar','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '4')
                ->first();
        }
        return response()->json($bodyChange_4, 200);
    }
    public function get_bodyChange_5($language)
    {
        // Add two conditions to filter records
        if ($language == "en") {
            $bodyChange_5 = Des_Categories::select('image','title','description','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '5')
                ->first();
        } elseif ($language == "ar") {
            $bodyChange_5= Des_Categories::select('image','title_ar','description_ar','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '5')
                ->first();
        }
        return response()->json($bodyChange_5, 200);
    }
    public function get_bodyChange_6($language)
    {
        // Add two conditions to filter records
        if ($language == "en") {
            $bodyChange_6 =Des_Categories::select('image','title','description','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '6')
                ->first();
        }
        elseif ($language == "ar") {
            $bodyChange_6= Des_Categories::select('image','title_ar','description_ar','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '6')
                ->first();
        }
        return response()->json($bodyChange_6, 200);
    }
    public function get_bodyChange_7($language)
    {
        // Add two conditions to filter records
        if ($language == "en") {
            $bodyChange_7 = Des_Categories::select('image','title','description','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '7')
                ->first();
        } elseif ($language == "ar") {
            $bodyChange_7= Des_Categories::select('image','title_ar','description_ar','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '7')
                ->first();
        }
        return response()->json($bodyChange_7, 200);
    }
    public function get_bodyChange_8($language)
    {
        // Add two conditions to filter records
        if ($language == "en") {
            $bodyChange_8 = Des_Categories::select('image','title','description','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '8')
                ->first();
        } elseif ($language == "ar") {
            $bodyChange_8= Des_Categories::select('image','title_ar','description_ar','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '8')
                ->first();
        }
        return response()->json($bodyChange_8, 200);
    }
    public function get_bodyChange_9($language)
    {
        // Add two conditions to filter records
        if ($language == "en") {
            $bodyChange_9 = Des_Categories::select('image','title','description','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '9')
                ->first();
        } elseif ($language == "ar") {
            $bodyChange_9= Des_Categories::select('image','title_ar','description_ar','month','id')
                ->where('category_id', '=', '1')
                ->where('Month', '=', '9')
                ->first();}
        return response()->json($bodyChange_9, 200);
    }



    public function get_bodyChange($language, $id)
    {
        $bodyChange = null;

        // Add conditions to filter records based on language
        if ($language == "en") {
            $bodyChange = Des_Categories::select('image', 'title', 'description', 'month', 'id')
                ->where('id', $id)
                ->where('Month', '6')
                ->first();
        } elseif ($language == "ar") {
            $bodyChange = Des_Categories::select('image', 'title_ar', 'description_ar', 'month')
                ->where('id', $id)
                ->first();
        }

        if ($bodyChange) {
            // If a record is found, return it as JSON response
            return response()->json($bodyChange, 200);
        } else {
            // If no record is found, return a suitable response
            return response()->json(['error' => 'Record not found'], 404);
        }
    }



}



