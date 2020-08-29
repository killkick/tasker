<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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



Auth::routes();



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::middleware('auth')->group(function() {

        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/projects' , 'ProjectController@index')->name('projects');
        Route::post('/projects' , 'ProjectController@store');
        Route::get('/project/{project}' ,   'ProjectController@show')->name('project_item');
        Route::delete('/project/{project}/delete' , 'ProjectController@destroy')->name('project_delete');
        Route::post('/tasks' ,'TaskController@store');
        Route::get('/tasks/{task}' ,'TaskController@show')->name('task_item');
        Route::get('/statuses/{status}' ,'StatusController@show')->name('status_item');
        Route::get('/tasks/{task}', 'TaskController@show')->name('task_item');

        Route::patch('/tasks/{task}/edit' , 'TaskController@update')->name('task_edit');
        Route::delete('/tasks/{task}/delete' , 'TaskController@destroy')->name('task_delete');

    });


});
