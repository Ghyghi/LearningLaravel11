<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Filter\V1\TaskFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TaskResource;
use App\Http\Resources\V1\TaskCollection;

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
}

