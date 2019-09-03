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
Route::group(['middleware' => 'auth'], function () {
// Project
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/project/', 'ProjectController@create')->name('projects.create');
    Route::get('/project/{project}/show', 'ProjectController@show')->name('projects.show');
    Route::post('/project/store', 'ProjectController@store')->name('projects.store');
    Route::get('/project/{project}/edit', 'ProjectController@edit')->name('projects.edit');
    Route::put('/project/{project}/update', 'ProjectController@update')->name('projects.update');
// Sprint
    Route::get('/project/{project}/sprint/', 'SprintController@create')->name('sprints.create');
    Route::post('/project/{project}/sprint/', 'SprintController@store')->name('sprints.store');
    Route::get('/project/{project}/sprint/{sprint}/show', 'SprintController@show')->name('sprints.show');
    Route::get('/project/{project}/sprint/{sprint}/edit', 'SprintController@edit')->name('sprints.edit');
    Route::put('/project/{project}/sprint/{sprint}/update', 'SprintController@update')->name('sprints.update');
// Task
    Route::get('/project/{project}/task/create/{sprint?}', 'TaskController@create')->name('tasks.create');
    Route::get('/project/{project}/task/{task}/show/{sprint?}', 'TaskController@show')->name('tasks.show');
    Route::get('/project/{project}/task/{task}/edit/{sprint?}', 'TaskController@edit')->name('tasks.edit');
    Route::post('/project/{project}/task/store/{sprint?}', 'TaskController@store')->name('tasks.store');
    Route::put('/project/{project}/task/{task}/update/{sprint?}', 'TaskController@update')->name('tasks.update');

// Api
    Route::put('/task/change-column', 'TaskController@changeColumn')->name('tasks.change-column');
});

