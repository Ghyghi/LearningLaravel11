<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserApiController extends Controller
{
    public function index()
    {
        return User::all();
    }
}
