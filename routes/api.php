<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Questions\QuestionsController;
use App\Http\Controllers\Api\Comments\CommentsController;
use App\Http\Controllers\Api\Home\HomeController;
use App\Http\Controllers\Api\Reports\ReportsController;
use App\Http\Controllers\Api\Ads\AdsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

route::match(['GET','POST'],'/',function(){
    return response()->json(['info'=>'Hi there, nothing you will found here']);
});

route::post('login',[AuthController::class,'login']);

route::post('register',[AuthController::class,'register']);

route::get('home',[HomeController::class,'index']);

route::get('search',[HomeController::class,'search']);



route::group(['middleware'=> 'auth:sanctum'],function(){

    route::post('logout',[AuthController::class,'logout']);
    route::get('/user', function (Request $request) { return $request->user(); });

});



route::group(['prefix'=>'question'],function(){

    route::get('/{id}',[QuestionsController::class,'index']);

    route::post('/create',[QuestionsController::class,'create'])->middleware('auth:sanctum');

    route::post('/remove',[QuestionsController::class,'remove'])->middleware('auth:sanctum');

});


route::group(['prefix'=>'comment'],function(){

   // route::get('/{id}',[CommentsController::class,'index']);

    route::post('/create',[CommentsController::class,'create'])->middleware('auth:sanctum');

    route::post('/remove',[CommentsController::class,'remove'])->middleware('auth:sanctum');

});

route::group(['prefix'=>'report'],function(){
    //route::get('/{id}',[QuestionsController::class,'index']);
    route::post('/create',[ReportsController::class,'create'])->middleware('auth:sanctum');
    //route::post('/remove',[QuestionsController::class,'remove'])->middleware('auth:sanctum')
});

route::group(['prefix'=>'ads'],function(){
    //route::get('/{id}',[QuestionsController::class,'index']);
    route::get('/',[AdsController::class,'index']);
    //route::post('/remove',[QuestionsController::class,'remove'])->middleware('auth:sanctum')
});

