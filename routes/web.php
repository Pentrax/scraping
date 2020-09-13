<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Busquedas;

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

//Route::get('/', function () {
//   // return view('welcome');
//    Route::resource('contacts', 'DefaultController');
//});
Route::get('/', 'DefaultController@index')->name('home');
Route::any('/search', 'DefaultController@search')->name('search');
//Route::any('/search', function (){
//    $search = \request()->input("search");
//    if ($search !=""){
//        DB::table("Busquedas")
//            ->where("busqueda",$search)
//            ->orderBy("precio","desc")
//            ->paginate(5)
//            ->setpath('');
//    }
//
//})->name("search");

