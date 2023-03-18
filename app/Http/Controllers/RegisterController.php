<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [

        ]);
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required|min:4|max:50',
            'username' => 'required|unique:users|min:4|max:15|regex:/^[^\s]+$/',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:8|max:20'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Account successfully created');
    }
}
