<?php

namespace App\Http\Controllers;

// use App\Policies\TaskPolicy;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests; // This trait is used to authorize actions in the controller

    public function taskform(){
        return view('taskform');
    }
    public function addtask(Request $request){
        $newtask = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $newtask['titile'] = strip_tags($newtask['title']);
        $newtask['body'] = strip_tags($newtask['body']);
        $newtask['user_id'] = auth()->id();

        $tasking = Task::create($newtask);
        return redirect()->route('viewSingleTask', ['task'=>$task->id]);
    }

    public function singleTask(Task $task){
        return view('single-task', ['task' => $task])->with('success', 'Task created successfully!');
    }
    public function allTasks(){
        $id = auth()->id();
        $tasks = Task::where('user_id', $id)->get();
        return view('all-tasks', ['tasks' => $tasks]);
    }
    public function editTask(Task $task){
        return view('edit-task', ['task' => $task]);
    }
    public function updateTask(Request $request, Task $task){
        $updatesTask = $request->validate([
            'title' => 'required',
            'body' => 'required'
            ]);
            $updatesTask['title'] = strip_tags($updatesTask['title']);
            $updatesTask['body'] = strip_tags($updatesTask['body']);
            $task->update($updatesTask);

            return redirect()->route('viewAllTasks')->with('success', 'Task updated successfully!');
        
    }
    public function deleteTask(Task $task){
        if ($this->authorize('delete', $task)){
            $task->delete();
        return redirect()->route('viewAllTasks')->with('success', 'Task deleted successfully!');
        }
        else{
            return redirect()->route('dashboard')->with('error', 'You are not authorized to delete this task!');
        }
        
    }
}
