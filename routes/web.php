<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AUthController;


route::get('/login', [AUthController::class, 'Login'])->name('Login.index');
route::post('/login', [AUthController::class, 'LoginPost'])->name('Login.post');
route::get('/signup', [AUthController::class, 'Signup'])->name('Signup.index');
route::post('/signup', [AUthController::class, 'SignupPost'])->name('Signup.post');
route::get('/logout', [AUthController::class, 'logout'])->name('logout.index');

route::get('/', function () {
    return view('home');
})->name('home');
