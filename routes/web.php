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

Route::get('/teacher/dashboard', function () {
    return view('teacher.dashboard');
})->name('teacher.dashboard');

Route::get('/teacher/students', function () {
    return view('teacher.students');
})->name('teacher.students');

Route::get('/teacher/reviews', function () {
    return view('teacher.reviews');
})->name('teacher.reviews');

Route::get('/teacher/assessments', function () {
    return view('teacher.assessments');
})->name('teacher.assessments');

Route::get('/teacher/notifications', function () {
    return view('teacher.notifications');
})->name('teacher.notifications');

Route::get('/teacher/profile', function () {
    return view('teacher.profile');
})->name('teacher.profile');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/students', function () {
    return view('admin.students');
})->name('admin.students');

Route::get('/admin/teachers', function () {
    return view('admin.teachers');
})->name('admin.teachers');

Route::get('/admin/companies', function () {
    return view('admin.companies');
})->name('admin.companies');

Route::get('/admin/reports', function () {
    return view('admin.reports');
})->name('admin.reports');

Route::get('/admin/settings', function () {
    return view('admin.settings');
})->name('admin.settings');

