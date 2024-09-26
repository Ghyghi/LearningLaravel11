<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        User::create($incomingFields);
        return redirect('/')->with('success', 'You have been registered, please login to continue');
    }
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginusername'=> 'required',
            'loginpassword'=> 'required'
        ]);
        if (auth()->attempt(['name'=>$incomingFields['loginusername'], 'password'=>$incomingFields['loginpassword']])){
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success', 'You have been logged in');
        }
        else{
            return redirect('/')->with('error', 'Invalid login. Please try again.');
        }
    }
    public function dashboard(){
        return view('dashboard');
    }
}
