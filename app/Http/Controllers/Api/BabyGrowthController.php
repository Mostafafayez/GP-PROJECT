<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Des_Categories;
use Illuminate\Http\Request;


class BabyGrowthController extends Controller
{

    public function get_babyGrowth_1($language)
    {
        if ($language == "en") {
            $babyGrowth_1 = Des_Categories::select('image','title','description','month')
                ->where('category_id', '=', '2')
                ->where('Month', '=', '1')
                ->first();
        } elseif ($language == "ar") {
            $babyGrowth_1 = Des_Categories::select('image','title_ar','description_ar','month')
                ->where('category_id', '=', '2')
                ->where('Month', '=', '1')
                ->first();
        }

        return response()->json($babyGrowth_1, 200);
    }

    public function get_babyGrowth_2($language)
    {
        if ($language == "en") {
        $babyGrowth_2 =Des_Categories::select('image','title','description','month')
        ->where('category_id', '=', '2')
        ->where('Month', '=', '2')
        ->first(); }// Use first() instead of get() if you expect only one result

     elseif ($language == "ar") {
        $babyGrowth_2 = Des_Categories::select('image','title_ar','description_ar','month')
            ->where('category_id', '=', '2')
            ->where('Month', '=', '2')
            ->first();
    }

    return response()->json($babyGrowth_2, 200);

    }
    public function get_babyGrowth_3($language)
    {
        if ($language == "en") {
            $babyGrowth_3 =Des_Categories::select('image','title','description','month')
            ->where('category_id', '=', '2')
            ->where('Month', '=', '3')
            ->first(); }

         elseif ($language == "ar") {
            $babyGrowth_3 = Des_Categories::select('image','title_ar','description_ar','month')
                ->where('category_id', '=', '2')
                ->where('Month', '=', '3')
                ->first();
        }

        return response()->json($babyGrowth_3, 200);

    }


    public function get_babyGrowth_4($language)
    {
           if ($language == "en") {
            $babyGrowth_4 =Des_Categories::select('image','title','description','month')
            ->where('category_id', '=', '2')
            ->where('Month', '=', '4')
            ->first(); }

         elseif ($language == "ar") {
            $babyGrowth_4 = Des_Categories::select('image','title_ar','description_ar','month')
                ->where('category_id', '=', '2')
                ->where('Month', '=', '4')
                ->first();
        }
        return response()->json($babyGrowth_4, 200);
    }


    public function get_babyGrowth_5($language)
    {
        if ($language == "en") {
            $babyGrowth_5 =Des_Categories::select('image','title','description','month')
            ->where('category_id', '=', '2')
            ->where('Month', '=', '5')
            ->first(); }

         elseif ($language == "ar") {
            $babyGrowth_5 = Des_Categories::select('image','title_ar','description_ar','month')
                ->where('category_id', '=', '2')
                ->where('Month', '=', '5')
                ->first();
        }
        return response()->json($babyGrowth_5, 200);
    }
    public function get_babyGrowth_6($language)
    {
        if ($language == "en") {
            $babyGrowth_6 =Des_Categories::select('image','title','description','month')
            ->where('category_id', '=', '2')
            ->where('Month', '=', '6')
            ->first(); }

         elseif ($language == "ar") {
            $babyGrowth_6 = Des_Categories::select('image','title_ar','description_ar','month')
                ->where('category_id', '=', '2')
                ->where('Month', '=', '6')
                ->first();
        }
        return response()->json($babyGrowth_6, 200);
    }
    public function get_babyGrowth_7($language)
    {
        if ($language == "en") {
            $babyGrowth_7 =Des_Categories::select('image','title','description','month')
            ->where('category_id', '=', '2')
            ->where('Month', '=', '7')
            ->first(); }

         elseif ($language == "ar") {
            $babyGrowth_7 = Des_Categories::select('image','title_ar','description_ar','month')
                ->where('category_id', '=', '2')
                ->where('Month', '=', '7')
                ->first();
        }
        return response()->json($babyGrowth_7, 200);
    }
    public function get_babyGrowth_8($language)
    {
        if ($language == "en") {
            $babyGrowth_8 =Des_Categories::select('image','title','description','month')
            ->where('category_id', '=', '2')
            ->where('Month', '=', '8')
            ->first(); }

         elseif ($language == "ar") {
            $babyGrowth_8 = Des_Categories::select('image','title_ar','description_ar','month')
                ->where('category_id', '=', '2')
                ->where('Month', '=', '8')
                ->first();
        }
        return response()->json($babyGrowth_8, 200);
    }
    public function get_babyGrowth_9($language)
    {
        if ($language == "en") {
            $babyGrowth_9 =Des_Categories::select('image','title','description','month')
            ->where('category_id', '=', '2')
            ->where('Month', '=', '9')
            ->first(); }

         elseif ($language == "ar") {
            $babyGrowth_9 = Des_Categories::select('image','title_ar','description_ar','month')
                ->where('category_id', '=', '2')
                ->where('Month', '=', '9')
                ->first();
        }
        return response()->json($babyGrowth_9, 200);
    }







    public function update_DescriptionCategory(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'description' => 'required|string',
        ]);

        $updatedCescription = Des_Categories::find($id);

        // Check if the babyGrowth exists
        if (!$updatedCescription) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $updatedCescription->update([
            'description' => $request->input('description'),
        ]);

        return response()->json(['message' => 'Data updated successfully']);
    }
    public function get_babyGrowth()
    {
        $babyGrowth_7 = Des_Categories::where('category_id', '=', '2')
            ->first();
        return response()->json($babyGrowth_7, 200);
    }


    public function delete($id)
    {
        $delet = $this->find($id);

        if ($delet) {
            $delet->delete();
            return true; // Deletion successful
        } else {
            return false; // Record not found
        }
    }
}


