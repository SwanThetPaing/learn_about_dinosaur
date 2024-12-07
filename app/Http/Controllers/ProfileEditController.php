<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileEditController extends Controller
{
    public function edit(User $user)
    {
        return view('components.form.edit_profile', 
        [
            'user' => $user,
            // 'categories' => Category::all()
        ]);
    }

    public function update(User $user)
    {

        $formData=request()->validate([
            "name" => ["required"],
        ]);

        $formData['user_id'] = auth()->id();

        $user->update($formData);

        return redirect('/');

  
    }
    
}
