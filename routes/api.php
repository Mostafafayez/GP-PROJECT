<?php

use App\Http\Controllers\AdminBabyGrowthController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BabyGrowthController;
use App\Http\Controllers\Api\BodyChangeController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\ListController;
use App\Http\Controllers\ExercisesController;
use App\Http\Controllers\VitaminsController;
use App\Http\Controllers\courses;
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
Route ::post('/registerAdmin', [AuthController ::class,'registerAdmin']);
Route ::post('/loginAdmin',  [AuthController ::class,'loginAdmin']);
Route ::post('/login',  [AuthController ::class,'login']);

Route ::post('/addList',  [ListController ::class,'addList']);
Route ::delete('/deleteList/{id}',  [ListController ::class,'deleteList']);
Route::get('/getListById/{user_id}', [ListController::class, 'getListById']);
Route::put('/updatellist/{id}', [ListController::class, 'updateList']);

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
Route::get('/get_bodyChange_1', [BodyChangeController::class, 'get_bodyChange_1']);
Route::get('/get_bodyChange_2', [BodyChangeController::class, 'get_bodyChange_2']);
Route::get('/get_bodyChange_3', [BodyChangeController::class, 'get_bodyChange_3']);
Route::get('/get_bodyChange_4', [BodyChangeController::class, 'get_bodyChange_4']);
Route::get('/get_bodyChange_5', [BodyChangeController::class, 'get_bodyChange_5']);
Route::get('/get_bodyChange_6', [BodyChangeController::class, 'get_bodyChange_6']);
Route::get('/get_bodyChange_7', [BodyChangeController::class, 'get_bodyChange_7']);
Route::get('/get_bodyChange_8', [BodyChangeController::class, 'get_bodyChange_8']);
Route::get('/get_bodyChange_9', [BodyChangeController::class, 'get_bodyChange_9']);
Route::get('/get_Food_1', [FoodController::class, 'get_Food_1']);
Route::get('/get_Food_3', [FoodController::class, 'get_Food_3']);
Route::get('/get_Food_6', [FoodController::class, 'get_Food_6']);
 //admin//
 Route ::post('/add_description',  [AdminBabyGrowthController ::class,'add_DESC']);
 Route::post('/update_DESC/{id}', [AdminBabyGrowthController ::class,'update_all']);
 Route::post('/update_one/{id}', [AdminBabyGrowthController ::class,'update_one']);
 Route::get('/get_des', [AdminBabyGrowthController ::class,'get_all_DESC']);
 Route::get('/getAllBabyGrowth', [AdminBabyGrowthController::class, 'getAllBabyGrowth']);
 Route::get('/getAllBodyChanges', [AdminBabyGrowthController::class, 'getAllBodyChanges']);
 Route ::delete('/delet/{id}',[AdminBabyGrowthController::class,'delete']);

 Route::get('/get_vitamin_1', [VitaminsController ::class,'get_omega_3']);
 Route::get('/get_vitamin_2', [VitaminsController ::class,'get_zinc']);
 Route::get('/get_vitamin_3', [VitaminsController ::class,'get_iron']);
 Route::get('/get_vitamin_4', [VitaminsController ::class,'get_vitamin_c']);
 Route::get('/get_vitamins', [VitaminsController ::class,'get_vitamins']);
 
 Route::get('/get_exercises',[ExercisesController :: class,'get_Exercises'] );
 Route::get('/get_exercise_1',[ExercisesController :: class,'get_yoga'] );
 Route::post('/add_exercise',[ExercisesController :: class,'add_Exercise'] );



 Route::get('/get_courses',[courses :: class,'get_courses'] );
 Route::post('/add_course',[courses :: class,'add_courses'] );

 //https://gradhub.hwnix.com/api/update_one/{id}/////////////////////////////register
