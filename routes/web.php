<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'TasksController@index');



Route::post('store-tasks', 'TasksController@store');

Route::get('{id}/edit', 'TasksController@edit');

Route::post('{id}/update', 'TasksController@update');

Route::get('/{id}/delete', 'TasksController@destroy');


// Route::get('/tasks/create', 'TasksController@create');

// Route::post('/tasks/store', 'TasksController@store');
