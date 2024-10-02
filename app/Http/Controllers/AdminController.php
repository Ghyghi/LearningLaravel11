<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_dashboard(){
        $count = User::where('isAdmin', '!=', 1)->count();
        $records = User::where('isAdmin', '!=', 1)->get();
        $admin_count = User::where('isAdmin', '=', 1)->count();
        $admin_records = User::where('isAdmin', '=', 1)->get();
        return view('adminDashboard', ['count'=>$count, 'records'=> $records, 'admin_count' => $admin_count, 'admin_records'=>$admin_records]);
    }
    public function viewTasks(){
        $users = User::where('isAdmin', '!=', 1)->get();
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
