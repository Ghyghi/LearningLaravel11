<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('adminDashboard');
    }

    // public function viewTasks(){
    //     $users = User::get();
    //     $tasks = Task::with('user', 'assignedUser')->get();
    //     $userIds = [];
    //     $Tasks = collect(); 

    //     foreach ($users as $usr){
    //         $userIds[] = $usr->id;
    //     }
    //     foreach($userIds as $id){
    //         $userTasks = Task::where('user_id', $id)->get();
    //         $Tasks = $Tasks->merge($userTasks);
    //         // $Tasks = Task::where('user_id', $usr->id)->get();
    //     }
        
    //     return view('viewTasks', ['Tasks'=>$Tasks, 'users'=>$users]);
    // }

    public function viewTasks()
{
    // Retrieve all users and their related tasks with a single query using eager loading
    $users = User::with('tasks')->get();

    // Create a collection to hold all tasks
    $Tasks = collect();

    // Loop through each user and collect their tasks
    foreach ($users as $user) {
        $Tasks = $Tasks->merge($user->tasks);
    }

    return view('viewTasks', ['Tasks' => $Tasks, 'users' => $users]);
}

}
