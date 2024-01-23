<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BabyGrowthController;
use App\Http\Controllers\Api\BodyChangeController;
use App\Http\Controllers\Api\FoodController;
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
Route ::post('/registerAdmin', [AuthController ::class,'registerAdmin']);
Route ::post('/loginAdmin',  [AuthController ::class,'loginAdmin']);
Route ::post('/addList',  [ListController ::class,'addList']);
Route ::delete('/deleteList',  [ListController ::class,'deleteList']);
Route ::get('/babyGrowth_1',[BabyGrowthController::class,'get_babyGrowth_1']);
Route::get('/getListById/{user_id}', [ListController::class, 'getListById']);
//Route::put('/updatellist/{user_id}/{id}', [ListController::class, 'updateList']);
Route::put('/updateList/{id}', [ListController::class, 'updateList']);
Route::get('/calculateWeeksDifference/{date}', [ListController::class, 'calculateWeeksDifference']);
Route::get('/calculateDaysDifference/{date}', [ListController::class, 'calculateDaysDifference']);
Route::get('/calculateWeeksAndDaysPregrency/{date}', [ListController::class, 'calculateWeeksAndDaysPregrency']);
Route::get('/get_babyGrowth_1', [BabyGrowthController::class, 'get_babyGrowth_1']);
Route::get('/get_babyGrowth_2', [BabyGrowthController::class, 'get_babyGrowth_2']);
Route::get('/get_babyGrowth_3', [BabyGrowthController::class, 'get_babyGrowth_3']);
Route::get('/get_babyGrowth_4', [BabyGrowthController::class, 'get_babyGrowth_4']);
Route::get('/get_babyGrowth_5', [BabyGrowthController::class, 'get_babyGrowth_5']);
Route::get('/get_babyGrowth_6', [BabyGrowthController::class, 'get_babyGrowth_6']);
Route::get('/get_babyGrowth_7', [BabyGrowthController::class, 'get_babyGrowth_7']);
Route::get('/get_babyGrowth_8', [BabyGrowthController::class, 'get_babyGrowth_8']);
Route::get('/get_babyGrowth_9', [BabyGrowthController::class, 'get_babyGrowth_9']);
Route::get('/get_babyGrowth', [BabyGrowthController::class, 'get_babyGrowth']);
Route::get('/get_bodyChange_1', [BodyChangeController::class, 'get_bodyChange_1']);
Route::get('/get_bodyChange_2', [BodyChangeController::class, 'get_bodyChange_2']);
Route::get('/get_bodyChange_3', [BodyChangeController::class, 'get_bodyChange_3']);
Route::get('/get_bodyChange_4', [BodyChangeController::class, 'get_bodyChange_4']);
Route::get('/get_bodyChange_5', [BodyChangeController::class, 'get_bodyChange_5']);
Route::get('/get_bodyChange_6', [BodyChangeController::class, 'get_bodyChange_6']);
Route::get('/get_bodyChange_7', [BodyChangeController::class, 'get_bodyChange_7']);
Route::get('/get_bodyChange_8', [BodyChangeController::class, 'get_bodyChange_8']);
Route::get('/get_bodyChange_9', [BodyChangeController::class, 'get_bodyChange_9']);
Route::put('/update_DescriptionCategory/{id}', [BabyGrowthController::class, 'update_DescriptionCategory']);
Route::get('/get_Food_1', [FoodController::class, 'get_Food_1']);
Route::get('/get_Food_3', [FoodController::class, 'get_Food_3']);
Route::get('/get_Food_6', [FoodController::class, 'get_Food_6']);
Route::delete('/delete/{id}', [BabyGrowthController::class, 'delete']);

