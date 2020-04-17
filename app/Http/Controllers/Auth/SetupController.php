<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\User;
class SetupController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function add(Request $request){
        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'occupation' => ['required'],
            'gender' => ['required'],
            'phone' => ['required', 'regex:/^(\+255)[0-9]{9}$/', 'max:13'],
            'permission' => ['required', 'string', 'max:15'],
            'gender' => ['required', 'string', 'max:5'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
       $user = new User;
      
        if( $request->has('image')) {
            $file = $request->file('image');
            $extension = $file -> getClientOriginalExtension();
            $filename = time() . '.'. $extension;
            $file-> move('uploads/staff/', $filename);
            $user->image = $filename;
        } 

        $user -> firstname = $request -> input('firstname');
        $user -> lastname = $request -> input('lastname');
        $user -> email = $request -> input('email');
        $user -> password = Hash::make($request -> input('password'));
        $user -> username = $request -> input('username');
        $user -> permission = $request -> input('permission');
        $user -> phone = $request -> input('phone');
        $user -> gender = $request -> input('gender');
        $user -> occupation = $request -> input('occupation');
        $user->save();
        return redirect('/home');
    }
}
