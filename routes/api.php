<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::get('students', [UserController::class, 'index']);

Route::get('teachers', [UserController::class, 'index2']);

Route::get('teacher/courses/{id}', [UserController::class, 'show']);

Route::get('course/students/{id}', [UserController::class, 'show2']);

Route::post('teacher/courses/{id}', [UserController::class, 'createCourses']);

Route::put('courses/{id}/students', [UserController::class, 'syncStudents']);

