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

        if (count($queryitems) == 0){
            return new UserCollection(User::paginate());
        }
        else
        {
            $users = User::where($queryitems)->paginate();
            return new UserCollection($users->appends($request->query()));
        }
        
    }
    public function show(User $user)
    {
        return new UserResource($user);
    }
}
