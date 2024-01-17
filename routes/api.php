<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BabyGrowthController;
use App\Http\Controllers\Api\ListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route ::post('/register', [AuthController ::class,'register']);
Route ::post('/login',  [AuthController ::class,'login']);
Route ::post('/addList',  [ListController ::class,'addList']);
Route ::delete('/deleteList',  [ListController ::class,'deleteList']);
Route ::get('/babyGrowth_1',[BabyGrowthController::class,'get_babyGrowth_1']);
Route::get('/getListById/{user_id}', [ListController::class, 'getListById']);
Route::get('/get_babyGrowth_1', [BabyGrowthController::class, 'get_babyGrowth_1']);
Route::get('/get_babyGrowth_2', [BabyGrowthController::class, 'get_babyGrowth_2']);
Route::get('/get_babyGrowth_3', [BabyGrowthController::class, 'get_babyGrowth_3']);
Route::get('/get_babyGrowth_4', [BabyGrowthController::class, 'get_babyGrowth_4']);
Route::get('/get_babyGrowth_5', [BabyGrowthController::class, 'get_babyGrowth_5']);
Route::get('/get_babyGrowth_6', [BabyGrowthController::class, 'get_babyGrowth_6']);
Route::get('/get_babyGrowth_7', [BabyGrowthController::class, 'get_babyGrowth_7']);
Route::get('/get_babyGrowth_8', [BabyGrowthController::class, 'get_babyGrowth_8']);
Route::get('/get_babyGrowth_9', [BabyGrowthController::class, 'get_babyGrowth_9']);
