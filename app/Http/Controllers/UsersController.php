<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $username)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $username)
    {
        $user = auth()->user();
        return view('user.edit', [
            'user' => $user,
            'pageTitle' => 'Edit Account'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:50',
            'username' => 'required|regex:/^[^\s]+$/|max:15',
            'email' => 'required|email|max:50'
        ];

        $validatedData = $request->validate($rules, ['username.regex' => 'Username must not contain space']);

        User::where('id', Auth::user()->id)->update($validatedData);

        return redirect('/dashboard')->with('success', 'User Has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
