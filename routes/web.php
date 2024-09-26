<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

//User Routes
Route::get('/', [UserController::class, 'showCorrectHomepage'])->name('login');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Task Routes
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth');
Route::get('/tasks', [TaskController::class, 'taskform'])->middleware('auth');//Create task form
Route::post('/create-task', [TaskController::class, 'addtask'])->middleware('auth');//Submit form
Route::get('/task/{task}', [TaskController::class, 'singleTask'])->middleware('auth');//View single task
Route::get('/all-tasks', [TaskController::class, 'allTasks'])->middleware('auth');//All tasks
Route::get('/edit-task/{task}', [TaskController::class, 'editTask']);//See edit Form
Route::put('/edit/task/{task}', [TaskController::class, 'updateTask'])->middleware('auth');
Route::delete('/task/{task}', [TaskController::class, 'deleteTask'])->middleware('auth');

