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

// Users
Route::get('/users',             'UserController@index');
Route::get('/users/create',      'UserController@create');
Route::post('/users',            'UserController@store');
Route::get('/users/{user}',      'UserController@show');
Route::delete('/users/{user}',   'UserController@destroy');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::patch('/users/{user}',    'UserController@update');

// Teams
Route::get('/teams',             'TeamController@index');
Route::get('/teams/create',      'TeamController@create');
Route::post('/teams',            'TeamController@store');
Route::get('/teams/{team}',      'TeamController@show');
Route::delete('/teams/{team}',   'TeamController@destroy');
Route::get('/teams/{team}/edit', 'TeamController@edit');
Route::patch('/teams/{team}',    'TeamController@update');

// Drafts
Route::get('/drafts/create', 'DraftController@create');
Route::post('/drafts',        'DraftController@store');

// Brackets
Route::get('/brackets',                'BracketController@index');
Route::get('/brackets/selectUsers',    'BracketController@selectUsers');
Route::get('brackets/selectRegions',   'BracketController@selectRegions');
Route::post('/brackets/selectRegions', 'BracketController@selectRegions');
Route::post('/brackets/selectTeams',   'BracketController@selectTeams');
Route::post('/brackets',               'BracketController@store');

Auth::routes();

// Home page of the application
// Shows that you are logged in
Route::get('/home', 'HomeController@index')->name('home');
