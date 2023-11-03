<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;


Route::middleware('auth:sanctum')->get('/me',function(Request $request){
    return $request->user();
});
Route::get('/', function () { return view('welcome');});

Route::middleware('auth:sanctum')->get('/myprojects',[ProjectController::class,'index']);
Route::middleware(['auth:sanctum','math_project'])->get('/myprojects/{project}',[ProjectController::class,'show']);


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::apiResource('projects', ProjectController::class);
Route::apiResource('tags', TagController::class);
Route::apiResource('tasks', TaskController::class);


Rout::get
('test',function(){
    $users=User::with('projects')->get();
    return $users;
})
