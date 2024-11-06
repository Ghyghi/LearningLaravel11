<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Filter\V1\TaskFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TaskResource;
use App\Http\Resources\V1\TaskCollection;
use App\Http\Requests\V1\storeTaskRequest;
use App\Http\Requests\V1\updateTaskRequest;

class TaskApiController extends Controller
{
    public function index(Request $request)
    {
        $filter = new TaskFilter();
        $queryitems = $filter->transform($request);

        if (count($queryitems) == 0){
            return new TaskCollection(Task::paginate());
        }
        else
        {
            $tasks = Task::where($queryitems)->paginate();
            return new TaskCollection($tasks->appends($request->query()));
        }
        
    }
    public function show(Task $task)
    {
        return new TaskResource($task);
    }
    public function store(storeTaskRequest $request)
    {
        $task = Task::create($request->all());
        return new TaskResource($task);
    }
    public function update(updateTaskRequest $request, Task $task)
    {
        $task->update($request->all());
    }
}

