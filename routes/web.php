<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;

Route::get('/download/{event_id}', [EventController::class, 'download_file'])->name('download.file')->middleware('auth');
Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
Route::get('/dashboard',[EventController::class,'dashboard'])->middleware('auth');
Route::delete('/events/{id}',[EventController::class, 'destroy']);
Route::get('/events/edit/{id}',[EventController::class, 'edit'])->middleware('auth');
route::put('/events/update/{id}',[EventController::class,'update'])->middleware('auth');
route::post('/events/join/{id}',[EventController::class, 'joinEvent'])->middleware('auth');
route::delete('/events/leave/{id}',[EventController::class, 'leaveEvent'])->middleware('auth');

//Modelo básico de rota//
Route::get('/contact', function () {
    return view('contact');
});


//Parte adicionada do Tutorial//
// cadastrar usuário
Route::view('/register', 'auth.register')->name('auth.register');
Route::post('/register/post', [AuthController::class, 'post'])->name('auth.post');

// login e logout
Route::view('/login', 'auth.login')->name('auth.login');
Route::post('/login/auth', [AuthController::class, 'auth'])->name('auth.auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');


