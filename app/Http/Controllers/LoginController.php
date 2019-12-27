<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function teacher(){
        return view('login.teacher');
    }

    public function student(){
        return view('login.student');
    }

    public function bursary(){
        return view('login.bursary');
    }

    public function principal(){
        return view('login.principal');
    }

    public function director(){
        return view('login.director');
    }

    public function showLogin(){
        return view('login');
    }

    public function authenticate(Request $request){
//dd('all');
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (!empty(Auth::user()->roles)) {
                if(Auth::user()->roles[0]->id == 1)
                {
                    return redirect()->route('login.teacher');
                }
                elseif(Auth::user()->roles[0]->id == 2)
                {
                    return redirect()->route('login.bursary');
                }
                elseif(Auth::user()->roles[0]->id == 3)
                {
                    return redirect()->route('login.student');
                }
                elseif(Auth::user()->roles[0]->id == 4)
                {
                    return redirect()->route('login.principal');
                }
                elseif(Auth::user()->roles[0]->id == 5)
                {
                    return redirect()->route('login.director');
                }
            };
        }else{
            return redirect()->route('login.show');
        }
    }
}
