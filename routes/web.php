<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MyController;
use App\Http\Controllers\MangerController;
use App\Http\Controllers\CategoriesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
   return ('test1');
});

Route::get('/test2', function () {
    return ('test2');
});


Route::get('/test3/{id}', function ($id) {

    return $id ;
});

Route::get('/test3/{id}', function ($id) {

    return 'welcome';
});*/

/*Route::get('/',[MyController::class,'create']);

Route::get('/update',[MyController::class,'update']);

Route::get('/add',[MyController::class,'add']);

Route::get('/delete',[MyController::class,'delete']);

Route::get('/manger',[MangerController::class,'index']);*/

//Route::get('/',[MyController::class,'index']);
Route::get('categories',[CategoriesController::class,'index']);
Route::get('categories/create',[CategoriesController::class,'create']);
Route::get('categories/{id}',[CategoriesController::class,'show']);
Route::post('categories',[CategoriesController::class,'store']);
Route::get('categories/edit/{id}',[CategoriesController::class,'edit']);
Route::put('categories/{id}',[CategoriesController::class,'update']);
Route::delete('categories/{id}',[CategoriesController::class,'destroy']);