<?php

namespace App\Http\Controllers;

use App\Models\Iot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginRegisterController extends Controller
{
    public function login(){
        Iot::where('id', 1)->get()->first()->update([
            'status' => 'idle',
            'card_id' => null
        ]);
        return view('login.login', [
            'title' => 'IoTAbs | Login'
        ]);
    }

    public function register(){
        Iot::where('id', 1)->get()->first()->update([
            'status' => 'register',
        ]);
        return view('login.register', [
            'title' => 'IoTAbs | Register'
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
            'card_id' => 'required|unique:users,card_id',
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
