<?php

namespace App\Http\Controllers\actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\User;

class UpdateStaffProfileController extends Controller
{
    //
    public function edit($id){
        $staff = User::find($id);
        return view('staff/editProfile', compact('staff'));
    }

    public function update($id, Request $request){
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'username' => 'required',
            'phone' => 'bail|required|regex:/^(\+255)[0-9]{9}$/',

        ]);
        $update = User::find($id);// getting all details of a user with id = $id

        $phone_check = User::where('id', '!=', $id)->where('phone', $request->input('phone'));
        $email_check = User::where('id', '!=', $id)->where('email', $request->input('email'));

        if($phone_check->exists() || $email_check->exists()){
            return redirect ('profile/'.$id)->with('err', 'The phone number or email entered belongs to another user!');

        }elseif(!empty($request->input('current_password'))){
            $user = User::where('id', $id)->first(); //this returns the first match, but password doesn't returned
            // here the iput password is being hashed before compare it with the hased one in the users table
            $validCredentials = Hash::check($request->input('current_password'), $user->getAuthPassword()); // getAuthPassword helps to return the hashed password from users table

            if(!$validCredentials){
                return redirect ('profile/'.$id)->with('err', 'The current password entered does not match!');
            }else{
                $validatedData = $request->validate([
                    'password' => ['required', 'string', 'min:8', 'confirmed'], //password validation
        
                ]);
               $update->password = Hash::make($request->input('password'));

            }
        }

        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file -> getClientOriginalExtension();
            $filename = time() . '.'. $extension;
            $file-> move('uploads/staff/', $filename);
            $update->image = $filename;
        }
        $update->firstname = $request->input('firstname');
        $update->lastname = $request->input('lastname');
        $update->email = $request->input('email');
        $update->username = $request->input('username');
        $update->phone = $request->input('phone');

        $update->save();

        return redirect ('profile/'.$id)->with('info', 'user details updated successfully');

        
    }
}
