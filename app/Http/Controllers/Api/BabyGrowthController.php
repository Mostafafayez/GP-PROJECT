<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Des_Categories;
use Illuminate\Http\Request;


class BabyGrowthController extends Controller
{

    public function get_babyGrowth_1()
    {
        $babyGrowth_1 = Des_Categories::where('category_id', '=', '2')
            ->where('Month', '=', '1')
            ->get();
        return response()->json($babyGrowth_1, 200);
    }
    
    public function get_babyGrowth_2()
    {
        $babyGrowth_2 = Des_Categories::where('category_id', '=', '2')
            ->where('Month', '=', '2')
            ->get();
        return response()->json($babyGrowth_2, 200);
    }
    public function get_babyGrowth_3()
    {

        
            // Select specific columns and add conditions to filter records
            $babyGrowth_3 = Des_Categories::where('category_id', '=', '2')
                ->where('Month', '=', '3')
                ->get();
    
            return response()->json($babyGrowth_3, 200);
        $babyGrowth_3 = Des_Categories::where('category_id', '=', '2')
            ->where('Month', '=', '3')
            ->get();
        return response()->json($babyGrowth_3, 200);

    }
    
    
    public function get_babyGrowth_4()
    {

        
            // Select specific columns and add conditions to filter records
            $babyGrowth_4 = Des_Categories::where('category_id', '=', '2')
                ->where('Month', '=', '3')
                ->get();
    
            return response()->json($babyGrowth_4, 200);

            $babyGrowth_4 = Des_Categories::where('category_id', '=', '2')
            ->where('Month', '=', '4')
            ->get();
        return response()->json($babyGrowth_4, 200);

    }
            
    
    public function get_babyGrowth_5()
    {
        $babyGrowth_5 = Des_Categories::where('category_id', '=', '2')
            ->where('Month', '=', '5')
            ->get();
        return response()->json($babyGrowth_5, 200);
    }
    public function get_babyGrowth_6()
    {
        $babyGrowth_6 = Des_Categories::where('category_id', '=', '2')
            ->where('Month', '=', '6')
            ->get();
        return response()->json($babyGrowth_6, 200);
    }
    public function get_babyGrowth_7()
    {
        $babyGrowth_7 = Des_Categories::where('category_id', '=', '2')
            ->where('Month', '=', '7')
            ->get();
        return response()->json($babyGrowth_7, 200);
    }
    public function get_babyGrowth_8()
    {
        $babyGrowth_8 = Des_Categories::where('category_id', '=', '2')
            ->where('Month', '=', '8')
            ->get();
        return response()->json($babyGrowth_8, 200);
    }
    public function get_babyGrowth_9()
    {
        $babyGrowth_9 = Des_Categories::where('category_id', '=', '2')
            ->where('Month', '=', '9')
            ->get();
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
            ->get();
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


