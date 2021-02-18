<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
     public function users()
    {
        $users = User::orderBy('created_at', 'DESC')->get();

        return view('users.list', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {   
        $user = User::find($id);  
        $user -> name = $request -> input('name');
        $user -> email = $request -> input('email');
        if ($request -> input('role') == 1) {
            $user -> is_admin = true;   
        }
            else {
                $user -> is_admin = false;
        }
        $user->save();

        return redirect()->route('users')->with('success', 'User successfully Edited!');
    }
}
