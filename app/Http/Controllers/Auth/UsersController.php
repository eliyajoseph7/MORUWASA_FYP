<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function users()
    {
        $users = User::all();
        if(auth()->user()->permission == 'superuser')
        {
            return view('staff\users', compact('users'));
        }
        else{return redirect('/home');}
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'occupation' => ['required'],
            'phone' => ['required', 'regex:/^(\+255)[0-9]{9}$/', 'max:13'],
            'permission' => ['required', 'string', 'max:15'],
            'gender' => ['required', 'string', 'max:5'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        $user = User::find($id);

        $email_check = $request -> input('email');
        if(User::where('id', '!=', $id)->where('email', $email_check)->exists()){
            return redirect('/users')->with('err', 'email belongs to another user');
        }
        else{
            $user -> firstname = $request -> input('firstname');
            $user -> lastname = $request -> input('lastname');
            $user -> email = $request -> input('email');
            $user -> username = $request -> input('username');
            $user -> permission = $request -> input('permission');
            $user -> phone = $request -> input('phone');
            $user -> gender = $request -> input('gender');
            $user -> occupation = $request -> input('occupation');
            $user->save();
    
            return redirect('/users')->with('info', 'user updated successfully');
        }
    }
}
