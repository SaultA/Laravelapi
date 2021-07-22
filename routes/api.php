<?php

use App\Http\Controllers\studentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Route::get('students', 'App\Http\Controllers\studentController@getStudents');
Route::get('students', [studentController::class, 'getStudents']);
Route::get('students/{id}', [studentController::class, 'getStudentId']);
Route::post('addStudent', [studentController::class, 'addStudent']);
Route::put('updateStudent/{id}', [studentController::class, 'updateStudent']);
Route::delete('deleteStudent/{id}', [studentController::class, 'deleteStudent']);
