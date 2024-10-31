<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Filter\V1\UserFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use App\Http\Resources\V1\UserCollection;

class UserApiController extends Controller
{
    public function index(Request $request)
    {
        $filter = new UserFilter();
        $queryitems = $filter->transform($request);

        $includeTasks = $request->query('includeTasks');

        $users = User::where($queryitems);

        if ($includeTasks){
            $users = $users->with('tasks');
        }
        return new UserCollection($users->paginate()->appends($request->query()));
    }
    public function show(User $user)
    {
        $includeTasks = request()->query('includeTasks');
        if ($includeTasks){
            return new UserResource($user->loadMissing('tasks'));
        }
        return new UserResource($user);
    }
}
