<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function userRegister(Request $re)
    {
        $validation = $re->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user=new User();
        $user->name=$re->name;
        $user->email=$re->email;
        $user->password=Hash::make($re->password);
        $user->save();
    }
    public function login()
    {
        return view("login");
    }
    public function postlogin(Request $re)
    {
        $r = $re->only('email', 'password');

        if (Auth::attempt($r)) {
            return redirect("home");
        } else {
            return redirect("login");   

        }
      
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
