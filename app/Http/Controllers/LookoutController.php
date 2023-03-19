<?php

namespace App\Http\Controllers;

use App\Models\Presense;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class LookoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Presense $presense)
    {
        return view('user.lookout.index', [
            'pageTitle' => 'Lookout',
            'subjects' => Subject::all()
        ]);
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
    public function show(Subject $subject)
    {
        return view('user.lookout.show', [
            'users' => Presense::where('appointment', request('app'))->where('subject_id', $subject->id)->get(),
            'pageTitle' => 'Lookout'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presense $presense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presense $presense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presense $presense)
    {
        //
    }
}
