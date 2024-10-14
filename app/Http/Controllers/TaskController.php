<?php

namespace App\Http\Controllers;

// use App\Policies\TaskPolicy;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function taskform(){
        $users = User::all();
        return view('taskform', ['users'=>$users]);
    }
    public function addtask(Request $request){
        $newtask = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'priority' => 'required|string',
            'assignedTo' => 'required|exists:users,id',
            'status' => 'required',
            
        ]);
        $newtask['title'] = strip_tags($newtask['title']);
        $newtask['body'] = strip_tags($newtask['body']);
        $newtask['user_id'] = auth()->id();

        $tasking = Task::create($newtask);

        // if ($request->hasFile('image')) {
        //     $media = $tasking->addMediaFromRequest('image')->toMediaCollection();
        //     $newtask['image_id'] = $media->id;
        // }
        if ($request->hasFile('image')) {
            $tasking->addMediaFromRequest('image')->toMediaCollection('images');
        }

        // $tasking->update(['image_id' => $newtask['image_id']]);
        return redirect()->route('viewSingleTask', ['task'=>$tasking->id]);
    }
    public function singleTask(Task $task){
        // $task = Task::findOrFail($task);
        // $task = Task::where('id', $task)->get();
        $images = $task->getMedia('images'); // Get media from the 'images' collection

        return view('single-task', [
            'task' => $task,
            'images' => $images,
        ]);

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
            ]);

            $updatesTask['title'] = strip_tags($updatesTask['title']);
            $updatesTask['body'] = strip_tags($updatesTask['body']);

            $task->update($updatesTask);
            
            if ($request->hasFile('image')) {
                $task->addMediaFromRequest('image')->toMediaCollection('images');
            }

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
