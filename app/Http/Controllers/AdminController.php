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

    public function viewTasks(){
        $users = User::get();
        $userIds = [];
        $Tasks = collect(); 

        foreach ($users as $usr){
            $userIds[] = $usr->id;
        }
        foreach($userIds as $id){
            $userTasks = Task::where('user_id', $id)->get();
            $Tasks = $Tasks->merge($userTasks);
            // $Tasks = Task::where('user_id', $usr->id)->get();
        }
        
        return view('viewTasks', ['Tasks'=>$Tasks]);
    }
}
