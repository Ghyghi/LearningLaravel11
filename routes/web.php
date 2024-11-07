<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PermissionController;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


Route::get('/register', function(){
    return view('register');
})->name('Register');


//Permission Routes
Route::resource('permissions', PermissionController::class);

Route::get('permissions/{permission}/delete', [PermissionController::class,'destroy'])->middleware('permission:Delete Permission');

//Role routes
Route::resource('roles', RoleController::class);
Route::get('roles/{role}/delete', [RoleController::class,'destroy'])->middleware('permission:Delete Role');
Route::get('roles/{role}/givePermission', [RoleController::class,'givePermission'])->middleware('permission:Edit Role');
Route::put('roles/{role}/givePermission', [RoleController::class,'updatePermission'])->middleware('permission:Edit Role');

//User role and permission route
Route::resource('users', UsersController::class);
Route::get('users/{userId}/delete', [UsersController::class, 'destroy'])->middleware('permission:Delete User');


//Admin Routes
Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->name('adminDashboard');
Route::get('/user-tasks', [AdminController::class, 'viewTasks'])->name('viewTasks')->middleware('permission:View All');


//User Routes
Route::get('/', [UserController::class, 'showCorrectHomepage'])->name('login');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Task Routes
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');
//View the create task form
Route::get('/tasks', [TaskController::class, 'taskform'])->middleware('permission:Create Task')->name('createTask');
//Submit the create task form
Route::post('/create-task', [TaskController::class, 'addtask'])->middleware('permission:Create Task')->name('submitCreateTask');
//View single task
Route::get('/task/{task}', [TaskController::class, 'singleTask'])->middleware('permission:View Task')->name('viewSingleTask');
//View all tasks
Route::get('/all-tasks', [TaskController::class, 'allTasks'])->middleware('permission:View Task')->name('viewAllTasks');
//View the edit task form
Route::get('/edit-task/{task}', [TaskController::class, 'editTask'])->middleware('permission:Edit Task')->name('editTask');
//Submit the edit task form
Route::put('/edit/task/{task}', [TaskController::class, 'updateTask'])->middleware('permission:Edit Task')->name('submitEditTask');
//Delete a task
Route::delete('/task/{task}', [TaskController::class, 'deleteTask'])->middleware('permission:Delete Task')->name('deleteTask');

