<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;

class UserProfileController extends Controller
{

    // public function index()
    // {
    //     return view('/user/main',[
    //         'users'=>User::all()
    //     ]);
    // }


    public function show(User $user)
    {
        return view('/components/profile', [
            'user'=>$user
        ]);
    }

    
    // public function index(User $user)
    // {
    //     return view('/components/menu', [
    //         'user'=>$user
    //     ]);
    // }

    // public function detail(User $user) {
    //     return view('/components/navbar',[
    //         'user' => $user

    //     ]);
    // }

    public function edit(User $user)
    {
        return view('/user/edit_profile', 
        [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        $formData=request()->validate([
            "name" => ["required"],
            "content" => 'required | min:0 | max:100'
        ]);

        $formData['id'] = auth()->id();
        $formData['avatar'] = request()->file('avatar') ? 
        request()->file('avatar')->store('avatars') : $user->avatar;

        $user->update($formData);

        return redirect('/');

    }

}
