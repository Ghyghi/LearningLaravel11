<?php

namespace App\Http\Controllers;

// use App\Policies\TaskPolicy;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests; // This trait is used to authorize actions in the controller

    public function taskform(){
        $users = User::all();
        return view('taskform', ['users'=>$users]);
    }
    public function addtask(Request $request){
        $newtask = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'priority' => 'required|string',
            'assignedTo' => 'required',
            'status' => 'required',
            
        ]);
        $newtask['title'] = strip_tags($newtask['title']);
        $newtask['body'] = strip_tags($newtask['body']);
        // $assigned = User::where('name', $newtask['assign'])->first();
        // $newtask['assign'] = $assigned->id;

        $newtask['user_id'] = auth()->id();

        $tasking = Task::create($newtask);
        return redirect()->route('viewSingleTask', ['task'=>$tasking->id]);
    }
    public function singleTask(Task $task){
        return view('single-task', ['task' => $task])->with('success', 'Task created successfully!');
    }
    public function allTasks(){
        $id = auth()->id();
        $tasks = Task::where('assignedTo', $id)->get();
        return view('all-tasks', ['tasks' => $tasks]);
    }
    public function editTask(Task $task){
        $users = User::all();
        return view('edit-task', ['task' => $task, 'users'=>$users]);
    }
    public function updateTask(Request $request, Task $task){
        $updatesTask = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'priority' => 'required|string',
            'assignedTo' => 'required',
            'status' => 'required',
            ]);
            $updatesTask['title'] = strip_tags($updatesTask['title']);
            $updatesTask['body'] = strip_tags($updatesTask['body']);
            $task->update($updatesTask);

            return redirect()->route('viewTasks')->with('success', 'Task updated successfully!');
        
    }
    public function deleteTask(Task $task, User $user){
        $task->delete();

        if($user->hasRole('User')){
            return redirect()->route('viewAllTasks')->with('success', 'Task deleted successfully!');
        }
        else{
            return redirect()->route('viewTasks')->with('success', 'Task deleted successfully!');
        }
    }
}
