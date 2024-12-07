<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $formData= request()->validate([
            'name'=>'required|max:255|min:3',
            'username'=>['required','max:255','min:3', Rule::unique('users', 'username')],
            'email'=>['required','email', Rule::unique('users', 'email')],
            'password'=>'required|min:8'
        ]);

        $user= User::create($formData);

        auth()->login($user);
        
        return redirect('/')->with('success','Welcome Dear, '.$user->name);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function post_login()
    {
        $formData= request()->validate([
            'email'=>['required','email','max:255', Rule::exists('users','email')],
            'password'=>['required','min:8','max:255']
        ],[
            'email.required'=>'Please type your Email correctly',
            'password.required'=>'Please type your Password correctly'
        ]);

        if(auth()->attempt($formData))
        {
            if(auth()->user()->is_admin)
            {   
                return redirect('/admin/blogs');
            }
            else 
            {
                return redirect('/')->with('success', 'Welcome Back '.auth()->user()->name);
            }
        }
        else 
        {
            return redirect()->back()->withErrors(['email'=>'User Credentials Wrong']);
        }
    
    }
    
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success','You are Logged Out');
    }

}
