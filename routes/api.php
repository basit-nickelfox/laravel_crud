<?php

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/ 

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getStudents','StudentController@index');
Route::post('addStudents','StudentController@store');
Route::get('editStudent/{id}/edit','StudentController@edit');
Route::post('updateStudent/{id}','StudentController@update');
