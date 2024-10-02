<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

//Admin Routes
Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->middleware('can:admin')->name('adminDashboard');
Route::get('/user-tasks', [AdminController::class, 'viewTasks'])->middleware('can:admin')->name('viewTasks');

//User Routes
Route::get('/', [UserController::class, 'showCorrectHomepage'])->name('login');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Task Routes
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');
//View the create task form
Route::get('/tasks', [TaskController::class, 'taskform'])->middleware('auth')->name('createTask');
//Submit the create task form
Route::post('/create-task', [TaskController::class, 'addtask'])->middleware('auth')->name('submitCreateTask');
//View single task
Route::get('/task/{task}', [TaskController::class, 'singleTask'])->middleware('can:view,task')->name('viewSingleTask');
//View all tasks
Route::get('/all-tasks', [TaskController::class, 'allTasks'])->middleware('auth')->name('viewAllTasks');
//View the edit task form
Route::get('/edit-task/{task}', [TaskController::class, 'editTask'])->middleware('can:update,task')->name('editTask');
//Submit the edit task form
Route::put('/edit/task/{task}', [TaskController::class, 'updateTask'])->middleware('can:update,task')->name('submitEditTask');
//Delete a task
Route::delete('/task/{task}', [TaskController::class, 'deleteTask'])->middleware('can:delete,task')->name('deleteTask');

