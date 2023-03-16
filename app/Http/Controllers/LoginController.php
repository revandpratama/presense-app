<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'pageTitle' => 'Login'
        ]);
    }

    public function authenticate(Request $request){
        $rules = [
            'email' => 'required|email',
            'password'  => 'required|max:20'
        ];
        
        $validatedData  = $request->validate($rules);

        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }

        return back()->with('error', 'Login Failed');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
