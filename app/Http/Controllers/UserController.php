<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success', 'You have been logged out');
    }
    public function showCorrectHomepage(){
        if (auth()->check()){
            return view('dashboard');
        }
        else{
            return view('welcome');
        }
    }
    public function register(Request $request){
        $incomingFields = $request->validate([
            'name'=> ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
            'email'=> ['required', 'email', Rule::unique('users', 'email')],
            'password'=> ['required', 'min:8', 'confirmed']
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        $user->assignRole('Super Admin');
        return redirect('/')->with('success', 'You have been registered, please login to continue');
    }
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginusername'=> 'required',
            'loginpassword'=> 'required'
        ]);
        if (auth()->attempt(['name'=>$incomingFields['loginusername'], 'password'=>$incomingFields['loginpassword']])){
            $request->session()->regenerate();
            //Redirect Admin to admin dashboard, else redirect to normal dashboard
            if (auth()->user()->hasRole(['Admin', 'Super Admin'])){
                return redirect()->route('adminDashboard')->with('success', 'Login Success');
            }
            else{
                return redirect()->route('dashboard')->with('success', 'You have been logged in');
            }
        }
        else{
            return redirect('/')->with('error', 'Invalid login. Please try again.');
        }
    }
    public function dashboard(){
        $tasks = Task::where('assignedTo', auth()->id())->count();

        $completed = Task::where('assignedTo', auth()->id())->where('status', 'Completed')->count();
        $assigned = Task::where('assignedTo', auth()->id())->where('status', 'Assigned')->count();
        $pending = Task::where('assignedTo', auth()->id())->where('status', 'In Progress')->count();

        $high = Task::where('assignedTo', auth()->id())->where('priority', 'High')->count();
        $medium = Task::where('assignedTo', auth()->id())->where('priority', 'Medium')->count();
        $low = Task::where('assignedTo', auth()->id())->where('priority', 'Low')->count();
        return view('dashboard', ['tasks'=>$tasks, 'completed'=>$completed, 'assigned'=>$assigned, 'pending'=>$pending, 'high'=>$high, 'medium'=>$medium, 'low'=>$low]);
    }
}
