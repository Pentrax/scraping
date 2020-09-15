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
//Route::any('/search', function(){
//    if (request()->has("fravega")){
//        $paginate = App\Busquedas::where("empresa","Fravega")->paginate(15);
//        return view('show.list', compact('paginate',"search"))->with("fravega");
//    }else{
//
//
//    }
//})->name('search');
Route::any('/fravega/{search}/{empresa}', 'DefaultController@fravega')->name('fravega');

