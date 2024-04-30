<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Des_Categories;
class VitaminsController extends Controller
{
    public function get_omega_3($language)
    {
        if ($language == "en") {
        $omga_3 = Des_Categories::  select('image','title','description')
        ->where('category_id', '=', '4')
            ->where('title', '=', 'omega_3')
            ->first();
        }
        if ($language == "ar") {
            $omga_3 = Des_Categories
            ::  select('image','title_ar','description_ar')
          ->  where('category_id', '=', '4')
                ->where('title_ar', '=', 'اوميجا_3')
                ->first();
            }

        return response()->json($omga_3, 200);
    }
    public function get_zinc($language)
    {
        if ($language == "en") {
            $zinc = Des_Categories::  select('image','title','description')
            ->where('category_id', '=', '4')
                ->where('title', '=', 'zinc')
                ->first();
            }
            if ($language == "ar") {
                $zinc = Des_Categories
                ::  select('image','title_ar','description_ar')
              ->  where('category_id', '=', '4')
                    ->where('title_ar', '=', 'زنك')
                    ->first();
                }

        return response()->json($zinc, 200);
    }
    public function get_vitamin_c($language)
    {
        if ($language == "en") {
            $vitamin_c = Des_Categories::  select('image','title','description')
            ->where('category_id', '=', '4')
                ->where('title', '=', 'vitamin_c')
                ->first();
            }
            if ($language == "ar") {
                $vitamin_c = Des_Categories
                ::  select('image','title_ar','description_ar')
              ->  where('category_id', '=', '4')
                    ->where('title_ar', '=', 'فيتامين سي')
                    ->first();
                }

        return response()->json($vitamin_c, 200);
    }
    public function get_iron($language )
    {
        if ($language == "en") {
            $iron  = Des_Categories::  select('image','title','description')
            ->where('category_id', '=', '4')
                ->where('title', '=', 'iron')
                ->first();
            }
            if ($language == "ar") {
                $iron = Des_Categories
                ::  select('image','title_ar','description_ar')
              ->  where('category_id', '=', '4')
                    ->where('title_ar', '=',  'حديد')
                    ->first();
                }


        return response()->json($iron, 200);
    }
    public function get_vitamins($language)
    {
        if ($language == "en") {
            $vitamins  = Des_Categories::  select('image','title','description')
            ->where('category_id', '=', '4')

                ->get();
            }
            if ($language == "ar") {
                $vitamins = Des_Categories
                ::  select('image','title_ar','description_ar')
              ->  where('category_id', '=', '4')

                    ->get();
                }

        return response()->json($vitamins, 200);
    }
}
