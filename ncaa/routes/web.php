<?php

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

// Welcome page with links to home, laravel, & laracasts
// Also log in to application
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Home page of the application
// Shows that you are logged in
Route::get('/home', 'HomeController@index')->name('home');
