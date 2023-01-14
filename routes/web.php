<?php
use Illuminate\Support\Facades\Route;

route::group(['prefix' => 'sz-admin'],function (){

        route::get('/',[App\Http\Controllers\Dashboard\Auth\AuthController::class,'index'])->name('login');
        route::post('/',[App\Http\Controllers\Dashboard\Auth\AuthController::class,'login'])->name('login.post');
        route::get('/home',[App\Http\Controllers\Dashboard\Home\HomeController::class,'index'])->middleware('auth:admin');
        route::post('/logout',[App\Http\Controllers\Dashboard\Auth\AuthController::class,'logout'])->name('logout');

   route::group(['prefix' => '/users','middleware'=>'auth:admin'],function () {
        route::get('/',[App\Http\Controllers\Dashboard\Users\UsersController::class,'index']);
        route::post('/',[App\Http\Controllers\Dashboard\Users\UsersController::class,'remove'])->name('user.delete');
        route::get('/{id}',[App\Http\Controllers\Dashboard\Users\UsersController::class,'edit']);
        route::post('/update',[App\Http\Controllers\Dashboard\Users\UsersController::class,'update'])->name('user.edit');
   });

   route::group(['prefix' => '/questions','middleware'=>'auth:admin'],function() {
        route::get('/',[App\Http\Controllers\Dashboard\Questions\QuestionsController::class,'index']);
        route::post('/',[App\Http\Controllers\Dashboard\Questions\QuestionsController::class,'remove'])->name('question.delete');
        route::get('/{id}',[App\Http\Controllers\Dashboard\Questions\QuestionsController::class,'edit']);
        route::post('/update',[App\Http\Controllers\Dashboard\Questions\QuestionsController::class,'update'])->name('question.edit');
   });

   route::group(['prefix' => '/comments','middleware'=>'auth:admin'],function () {
        route::get('/',[App\Http\Controllers\Dashboard\Comments\CommentsController::class,'index']);
        route::post('/',[App\Http\Controllers\Dashboard\Comments\CommentsController::class,'remove'])->name('comment.delete');
        route::get('/{id}',[App\Http\Controllers\Dashboard\Comments\CommentsController::class,'question_comnents']);
   });

   route::group(['prefix' => '/ads','middleware'=>'auth:admin'],function () {

        route::get('/',[App\Http\Controllers\Dashboard\Ads\AdsController::class,'index']);
        route::post('/',[App\Http\Controllers\Dashboard\Ads\AdsController::class,'remove'])->name('ad.delete');

        route::get('/new',[App\Http\Controllers\Dashboard\Ads\AdsController::class,'addAd']);
        route::post('/new',[App\Http\Controllers\Dashboard\Ads\AdsController::class,'store'])->name('ad.create');

        route::get('/{id}',[App\Http\Controllers\Dashboard\Ads\AdsController::class,'edit']);
        //route::post('/update',[App\Http\Controllers\Dashboard\Questions\QuestionsController::class,'update'])->name('question.edit');
   });

   route::group(['prefix' => '/reports','middleware'=>'auth:admin'],function () {
        route::get('/',[App\Http\Controllers\Dashboard\Reports\ReportsController::class,'index']);
        route::post('/',[App\Http\Controllers\Dashboard\Reports\ReportsController::class,'remove'])->name('report.delete');
        route::get('/{id}',[App\Http\Controllers\Dashboard\Reports\ReportsController::class,'question_comnents']);
   });

   route::group(['prefix' => '/words','middleware'=>'auth:admin'],function () {
     route::get('/',[App\Http\Controllers\Dashboard\Words\BadWordsController::class,'index']);
     route::post('/',[App\Http\Controllers\Dashboard\Words\BadWordsController::class,'remove'])->name('word.delete');
     route::get('/add',[App\Http\Controllers\Dashboard\Words\BadWordsController::class,'add']);
     route::post('/add',[App\Http\Controllers\Dashboard\Words\BadWordsController::class,'store'])->name('word.create');
     //route::get('/{id}',[App\Http\Controllers\Dashboard\Words\BadWordsController::class,'question_comnents']);
});


});
