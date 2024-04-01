<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation;

use App\Models\User;



class AUthController extends Controller
{
    function Login()
    {
        return view('Login');
    }
    function LoginPost(Request $request)
    {
        $request->validate(
            [
                'password' => 'required',
                'Email' => 'required'
            ]
        );

        $credentials = $request->only('Email', 'password');
        if (Auth::attempt($credentials)) {
            return Redirect()->intended(route('home'));
        } {
            return redirect(route('Login.index'))->with('error', 'Login details not valid');
        }
    }
    function Signup()
    {
        return view('signup');
    }
    function SignupPost(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'required|email|unique:users',
            'name' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if (!$user) {
            return redirect(route('Signup.index'))->with('error', 'not valid');
        }
        return redirect(route('Login.index'))->with('Success', 'please login');
    }
    function logout()
    {
        session::flush();
        Auth::logout();
        return redirect(route('Login.index'));
    }
}
