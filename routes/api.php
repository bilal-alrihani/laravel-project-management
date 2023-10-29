<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('projects', ProjectController::class);
Route::resource('tags', TagController::class);
Route::resource('tasks', TaskController::class);
