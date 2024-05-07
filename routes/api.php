<?php

use App\Http\Controllers\AdminBabyGrowthController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BabyGrowthController;
use App\Http\Controllers\Api\BodyChangeController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\ListController;
use App\Http\Controllers\Baby_Info;
use App\Http\Controllers\Babyfood;
use App\Http\Controllers\ExercisesController;
use App\Http\Controllers\VitaminsController;
use App\Http\Controllers\courses;
use App\Http\Controllers\tipsANDactivities;
use App\Http\Controllers\ChildGrowth;
use App\Http\Controllers\issue;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoiceRecognitionController;
use App\Http\Controllers\reset_password;
use App\Http\Controllers\chatting;
use Illuminate\Support\Facades\Artisan;
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
Route ::post('/login_Doc',  [AuthController ::class,'logindoc']);
Route ::post('/login',  [AuthController ::class,'login']);
Route ::get('/get_doc',  [AuthController ::class,'getAllDocs']);
Route ::post('/uploadImage/{id}',  [AuthController ::class,'uploadImage']);



Route ::post('/addList',  [ListController ::class,'addList']);
Route ::delete('/deleteList/{id}',  [ListController ::class,'deleteList']);
Route::get('/getListById/{user_id}', [ListController::class, 'getListById']);
Route::put('/updatellist/{id}', [ListController::class, 'updateList']);

Route ::post('/addfriend',  [ListController ::class,'addFriend']);
Route::get('/getfriend/{user_id}', [ListController::class, 'getfriend']);

Route::get('/calculateWeeksDifference/{date}', [ListController::class, 'calculateWeeksDifference']);
Route::get('/calculateDaysDifference/{date}', [ListController::class, 'calculateDaysDifference']);
Route::get('/calculateWeeksAndDaysPregrency/{date}', [ListController::class, 'calculateWeeksAndDaysPregrency']);

Route::get('/get_babyGrowth_1/{language}', [BabyGrowthController::class, 'get_babyGrowth_1']);
Route::get('/get_babyGrowth_2/{language}', [BabyGrowthController::class, 'get_babyGrowth_2']);
Route::get('/get_babyGrowth_3/{language}', [BabyGrowthController::class, 'get_babyGrowth_3']);
Route::get('/get_babyGrowth_4/{language}', [BabyGrowthController::class, 'get_babyGrowth_4']);
Route::get('/get_babyGrowth_5/{language}', [BabyGrowthController::class, 'get_babyGrowth_5']);
Route::get('/get_babyGrowth_6/{language}', [BabyGrowthController::class, 'get_babyGrowth_6']);
Route::get('/get_babyGrowth_7/{language}', [BabyGrowthController::class, 'get_babyGrowth_7']);
Route::get('/get_babyGrowth_8/{language}', [BabyGrowthController::class, 'get_babyGrowth_8']);
Route::get('/get_babyGrowth_9/{language}', [BabyGrowthController::class, 'get_babyGrowth_9']);
Route::get('/get_bodyChange_1/{language}', [BodyChangeController::class, 'get_bodyChange_1']);
Route::get('/get_bodyChange_2/{language}', [BodyChangeController::class, 'get_bodyChange_2']);
Route::get('/get_bodyChange_3/{language}', [BodyChangeController::class, 'get_bodyChange_3']);
Route::get('/get_bodyChange_4/{language}', [BodyChangeController::class, 'get_bodyChange_4']);
Route::get('/get_bodyChange_5/{language}', [BodyChangeController::class, 'get_bodyChange_5']);
Route::get('/get_bodyChange_6/{language}', [BodyChangeController::class, 'get_bodyChange_6']);
Route::get('/get_bodyChange_7/{language}', [BodyChangeController::class, 'get_bodyChange_7']);
Route::get('/get_bodyChange_8/{language}', [BodyChangeController::class, 'get_bodyChange_8']);
Route::get('/get_bodyChange_9/{language}', [BodyChangeController::class, 'get_bodyChange_9']);
Route::get('/get_Food_1/{language}', [FoodController::class, 'get_Food_1']);
Route::get('/get_Food_3/{language}', [FoodController::class, 'get_Food_3']);
Route::get('/get_Food_6/{language}', [FoodController::class, 'get_Food_6']);




Route::get('/get_bodyChange/{language}/{$id}', [BodyChangeController::class, 'get_bodyChange']);




 //admin//
 Route ::post('/add_DESC/{id}',  [AdminBabyGrowthController ::class,'add_DESC']);
 Route::post('/update_DESCs/{id}', [AdminBabyGrowthController ::class,'update_all']);
 Route::post('/update_DESC/{id}', [AdminBabyGrowthController ::class,'update_one']);
//  Route::post('/update_one/{id}', [AdminBabyGrowthController ::class,'update_DESC']);

 Route::get('/get_des', [AdminBabyGrowthController ::class,'get_all_DESC']);
 Route::get('/getAllBabyGrowth/{language}', [AdminBabyGrowthController::class, 'getAllBabyGrowth']);
 Route::get('/getAllBodyChanges/{language}', [AdminBabyGrowthController::class, 'getAllBodyChanges']);
 Route ::delete('/delete_desc/{id}',[AdminBabyGrowthController::class,'delete']);
//  Route ::delete('/deletes_desc/{id}',[AdminBabyGrowthController::class,'delete']);

 Route::get('/get_vitamin_1/{language}', [VitaminsController ::class,'get_omega_3']);
 Route::get('/get_vitamin_2/{language}', [VitaminsController ::class,'get_zinc']);
 Route::get('/get_vitamin_3/{language}', [VitaminsController ::class,'get_iron']);
 Route::get('/get_vitamin_4/{language}', [VitaminsController ::class,'get_vitamin_c']);
 Route::get('/get_vitamins/{language}', [VitaminsController ::class,'get_vitamins']);

 Route::get('/get_exercises/{language}',[ExercisesController :: class,'get_Exercises'] );
 Route::get('/get_exercise/{id}/{language}',[ExercisesController :: class,'get_exercise'] );
 Route::post('/add_exercise',[ExercisesController :: class,'add_Exercise'] );

 //update & delete exercise or course
 Route::delete('/delete/{id}',[ExercisesController :: class,'delete'] );
 Route::post('/update/{id}',[ExercisesController :: class,'update_exercise'] );

 Route::get('/get_courses/{language}',[courses :: class,'get_cours'] );

 Route::get('/get_courses/{language}',[courses :: class,'get_courses'] );
 Route::get('/get_course/{num}/{language}',[courses :: class,'get_course'] );
 Route::post('/add_course',[courses :: class,'add_courses'] );


 Route::get('/get_tip/{id}/{language}',[tipsANDactivities :: class,'get_tip'] );
 Route::get('/get_tips/{language}',[tipsANDactivities :: class,'get_tips'] );
//  Route::get('/get_ChildGrowth',[ChildGrowth :: class,'get_ChildGrowth'] );
Route::get('/get_ChildGrowth/{id}/{language}',[ChildGrowth :: class , 'get_ChildGrowth']);



Route::get('/get_issue/{id}/{language}',[issue :: class , 'get_issue']);
 Route::get('/get_AllIssues/{language}',[issue :: class , 'getIssues']);
Route::get('/get_issues/{language}', [Issue::class, 'get_issues']);
Route::post('/add_issue/{id}',[issue :: class , 'add_issue']);
Route::post('/add_issues',[issue :: class , 'add_issues']);
Route::post('/create_issue',[issue :: class , 'createIssue']);
Route::post('/update_issues/{id}',[issue :: class , 'update_issues']);
Route::delete('/delete_issue/{id}',[issue :: class , 'delete_ISSUEs']);


Route::post('/update_issue/{id}',[issue :: class , 'update_ISSUE']);
Route::delete('/delete_issue/{id}',[issue :: class , 'delete_ISSUE']);



Route::get('/get_weaning/{month}/{language}',[Babyfood :: class , 'get_weaning']);
Route::get('/get_BreastFeeding/{month}/{language}',[Babyfood :: class , 'get_BreastFeeding']);
Route::get('/get_BottleFeeding/{month}/{language}',[Babyfood :: class , 'get_BottleFeeding']);

Route::post('/reset-password', [Reset_Password::class, 'resetPassword']);
Route::post('/verify-and-reset-password', [Reset_Password::class, 'verifyAndResetPassword']);

Route::post('/add_BabyInfo', [Baby_Info::class, 'add']);

Route::post('/calculateAge', [Baby_Info::class, 'calculateAge']);


Route::post('/recognize-voice', [VoiceRecognitionController::class, 'recognize']);


Route::post('/recognizيe-voice', [VoiceRecognitionController::class, 'predict']);


Route::post('/send', [chatting::class, 'sendMessage']);
Route::post('/receive', [chatting::class, 'receiveMessages']);
Route::post('/sendai', [chatting::class, 'sendaiMessage']);
Route::get('/runmode', [chatting::class, 'trainModelAndReturnJSON']);



 //https://gradhub.hwnix.com/api/update_one/{id}/////////////////////////////register
 Route::get('/test',function(){
    Artisan::call('require', [
        'packages' => 'predis/predis',
    ]);
 });
