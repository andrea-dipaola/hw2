<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('/signup', 'App\Http\Controllers\SignupController@index')->name('signup');
Route::post('/signup', 'App\Http\Controllers\SignupController@signup');
Route::get('/signup/username/{q}', 'App\Http\Controllers\SignupController@checkUsername');
Route::get('/signup/email/{query}', 'App\Http\Controllers\SignupController@checkEmail');

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
    
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/create_review', 'App\Http\Controllers\ReviewController@index')->name('create_review');
Route::post('/create_review', 'App\Http\Controllers\ReviewController@createReview');
Route::get('/fetch_review', 'App\Http\Controllers\ReviewController@fetchReview');

Route::get('/preferiti_review/id_rec/{id}', 'App\Http\Controllers\PreferitiController@preferitiReview');


Route::get('/lista_preferiti', 'App\Http\Controllers\PreferitiController@index')->name('lista_preferiti');
Route::get('/fetch_review_preferiti', 'App\Http\Controllers\PreferitiController@fetchReviewPreferiti');
Route::get('/rimuovi_preferito/rec_id/{id_recensione}', 'App\Http\Controllers\PreferitiController@rimuoviPreferito');

Route::get('/search_content_podcast/podcast/{podcastValue}', 'App\Http\Controllers\ApiController@searchContentPodcast');
Route::get('/search_content_ricetta/ricetta/{ricettaValue}', 'App\Http\Controllers\ApiController@searchContentRicetta');





?>