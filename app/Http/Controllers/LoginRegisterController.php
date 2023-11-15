<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginRegisterController extends Controller
{
    public function login(){
        return view('login.login', [
            'title' => 'login'
        ]);
    }

    public function register(){
        return view('login.register', [
            'title' => 'Register'
        ]);
    }

    public function loginControl(Request $request){
        $dataValidation = $request->validate([
            'username' => 'required',
            'password' =>'required'
        ]);

        if(Auth::attempt($dataValidation)){
            $request->session()->regenerate();

            return redirect('/dashboard');
        }
        return back()->with('loginFailed', 'Failed To Login');
    }

    public function registerControl(Request $request){
        $dataValidation = $request->validate([
            'username' => 'required',
            'password' =>'required',
            'name' => 'required',
            'gender' => 'required',
            'card_id' => 'required|unique:users',
        ]);

        User::create($dataValidation);

        return redirect('/')->with('registerSuccess', 'Registration Success');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
