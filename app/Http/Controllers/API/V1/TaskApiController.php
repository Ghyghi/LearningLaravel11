<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TaskResource;

class TaskApiController extends Controller
{
    public function index()
    {
        return Task::all();
    }
    public function show(Task $task)
    {
        return new TaskResource($task);
    }
}

