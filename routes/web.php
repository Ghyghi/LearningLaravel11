<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PermissionController;

//Admin Routes
Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->middleware('can:admin')->name('adminDashboard');
Route::get('/user-tasks', [AdminController::class, 'viewTasks'])->middleware('can:admin')->name('viewTasks');

//Permission Routes
Route::resource('permissions', PermissionController::class)->middleware('can:admin');
Route::get('permissions/{permission}/delete', [PermissionController::class,'destroy'])->middleware('can:admin');


//Role routes
Route::resource('roles', RoleController::class)->middleware('can:admin');
Route::get('roles/{role}/delete', [RoleController::class,'destroy'])->middleware('can:admin');
Route::get('roles/{role}/givePermission', [RoleController::class,'givePermission'])->middleware('can:admin');
Route::put('roles/{role}/givePermission', [RoleController::class,'updatePermission'])->middleware('can:admin');

//User role and permission route
Route::resource('users', UsersController::class);


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

