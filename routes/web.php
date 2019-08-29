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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Project
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/project/', 'ProjectController@create')->name('projects.create');
Route::post('/project/', 'ProjectController@store')->name('projects.store');
Route::get('/project/{project}', 'ProjectController@show')->name('projects.show');
// Sprint
Route::get('/project/{project}/sprint/', 'SprintController@create')->name('sprints.create');
Route::post('/project/{project}/sprint/', 'SprintController@store')->name('sprints.store');
Route::get('/project/{project}/sprint/{sprint}', 'SprintController@show')->name('sprints.show');
// Task
Route::get('/project/{project}/task', 'TaskController@create')->name('tasks.create');
Route::post('/project/{project}/task', 'TaskController@store')->name('tasks.store');
Route::get('/project/{project}/sprint/{sprint}/task', 'TaskController@create')->name('sprints.tasks.create');
Route::post('/project/{project}/sprint/{sprint}/task', 'TaskController@store')->name('sprints.tasks.store');