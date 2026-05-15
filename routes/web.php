<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->name('student.dashboard');

Route::get('/student/journals', function () {
    return view('student.journals');
})->name('student.journals');

Route::get('/student/tasks', function () {
    return view('student.tasks');
})->name('student.tasks');

Route::get('/student/progress', function () {
    return view('student.progress');
})->name('student.progress');

Route::get('/student/notifications', function () {
    return view('student.notifications');
})->name('student.notifications');

Route::get('/student/profile', function () {
    return view('student.profile');
})->name('student.profile');

