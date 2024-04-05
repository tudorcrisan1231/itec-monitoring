<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        //check is user is active in db
        $user = User::where('email', $request->email)->first();
        if($user->status != 'approved'){
            return redirect("login")->withError('Your account is not active yet, please wait for admin approval');
        }

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }
        return redirect("login")->withError('Login details are not valid');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function customRegister(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $data = $request->all();

        $user = new User();
        $user->role_id = 1;
        $user->name = $data['full_name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();

        return redirect()->route('login')->with('Your account has been created, an admin will approve your account');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect('login')->withSuccess('You are signed out!');
    }
}
