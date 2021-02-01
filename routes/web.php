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

Route::get('/contact', function () {
    return view('contact.contact');
});

Route::post('/submit', 'ContactFormController@submit')->name('submit');

Auth::routes();

Route::get('/candidate/{id}', 'CandidateController@edit')->name('candidate');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testpage', 'TestController@test')->name('testpage');

Route::put('candidate/{id}/edit', 'CandidateController@update')->name('update');
Route::any('{slug}', function() {
    return view('welcome');
});
