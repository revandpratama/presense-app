<?php

use App\Models\Subject;
use App\Models\Presense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LookoutController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index',  [
        'pageTitle' => 'Home',
        'subjects' => Subject::all()
    ]);
})->middleware('auth');

Route::get('/presense/{subject:slug}', function(Subject $subject) {
    return view('presenseForm', [
        'subject' => $subject->load(['presense'])    
    ]);
});

Route::post('/presense', function(Request $request) {
    $validatedData = $request->validate([
        'user_id' => 'required',
        'subject_id' => 'required',
        'appointment' => 'required',
        'status' => 'required'
    ]);
    Presense::create($validatedData);

    return redirect('/')->with('success', 'Presense Succes');
});

// * Login Controller
Route::get('/login', [LoginController::class, 'index'])->name('login')
->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])
->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])
->middleware('auth');

// * Register Controller
Route::get('/register', [RegisterController::class, 'index'])
->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])
->middleware('guest');


// * Dashboard Route
Route::get('/dashboard', function (){
        $user = auth()->user();
    return view('user.index', [
        'user' => $user,
        'pageTitle' => 'Dashboard',
        'presenses' => Presense::with(['subject'])->where('user_id', $user->id)->get()
    ]);
})
->middleware('auth');

Route::resource('/dashboard/account', UsersController::class)
->middleware('auth');


// * LookoutController

Route::get('/dashboard/lookout/{subject}', function(Subject $subject){
    return view('user.lookout.show', [
        'users' => Presense::where('appointment', request('app'))->where('subject_id', $subject->id)->get(),
        'pageTitle' => 'Lookout'
    ]);
})->middleware('admin');

Route::delete('/dashboard/lookout/{presense:id}', function (Presense $presense) {
    Presense::destroy($presense->id);

    return back()->with('success', 'Presense Deleted');
});

Route::resource('/dashboard/lookout', LookoutController::class)->only('index')->middleware('admin');

