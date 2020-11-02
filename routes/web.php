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


Route::get('/', 'DefaultController@index')->name('home');
Route::any('/search', 'DefaultController@search')->name('search');

Route::any('/filter', 'FilterController@filter')->name('filter');

Route::post('/ajax-request', 'AjaxController@store');

Route::get('/comentarios','ComentariosController@ver')->name("ver");

Route::any('/remov-filter', 'FilterController@removeFilter')->name('remove-filter');

Route::get('/comentarios', 'ComentariosController@getComentarios')->name('comentarios');

Route::get('/login', array('uses' => 'AuthController@showLogin'))->name("login");
// route to process the form
Route::post('/doLogin', array('uses' => 'AuthController@doLogin'))->name('doLogin') ;

Route::get('/logout', array('uses' => 'AuthController@doLogout'))->name('logout');

Route::post('/register', array('uses' => 'AuthController@register'));

Route::post('/add-favorito','FavoritosController@addFavorito')->name("add-favorito");

Route::get('/show-favorito','FavoritosController@showFavorito')->name("show-favorito");

Route::any('/delete-favorito', 'FavoritosController@delete')->name('delete-favorito');
