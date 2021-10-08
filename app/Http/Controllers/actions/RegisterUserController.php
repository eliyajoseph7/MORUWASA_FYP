<?php

namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers\actions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
class RegisterUserController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function register(Request $request){
        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'occupation' => ['required'],
            'phone' => ['required', 'regex:/^(\+255)[0-9]{9}$/', 'max:13', 'unique:users'],
            'permission' => ['required', 'string', 'max:15'],
            'gender' => ['required', 'string', 'max:5'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
       $user = new User;
      
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
        return redirect('/users')->with('info', 'user registered successfully');
    }

    public function delete($id){
        User::find($id)->delete();
        return redirect('/users')->with('info', 'user deleted successfully');
    }
}
