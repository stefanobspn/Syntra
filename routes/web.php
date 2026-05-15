<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\JournalController;
use App\Http\Controllers\Student\NotificationController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\TaskController;
use App\Http\Controllers\Teacher\JournalReviewController;
use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\TaskAssignmentController;
use App\Http\Middleware\CheckTeacherRole;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/student/dashboard', [DashboardController::class, 'index'])->name('student.dashboard');

    Route::get('/student/journals', [JournalController::class, 'index'])->name('student.journals');
    Route::post('/student/journals', [JournalController::class, 'store'])->name('student.journals.store');

    Route::get('/student/tasks', [TaskController::class, 'index'])->name('student.tasks');

    Route::get('/student/progress', function () {
        return view('student.progress');
    })->name('student.progress');

    Route::get('/student/notifications', [NotificationController::class, 'index'])->name('student.notifications');
    Route::post('/student/notifications/mark-read', [NotificationController::class, 'markAllAsRead'])->name('student.notifications.mark_read');

    Route::get('/student/profile', [ProfileController::class, 'index'])->name('student.profile');
});

Route::middleware(['auth', CheckTeacherRole::class])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Teacher\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

    Route::get('/reviews', [JournalReviewController::class, 'index'])->name('reviews');
    Route::post('/reviews/{journal}/approve', [JournalReviewController::class, 'approve'])->name('reviews.approve');
    Route::post('/reviews/{journal}/reject', [JournalReviewController::class, 'reject'])->name('reviews.reject');

    Route::get('/assessments', [TaskAssignmentController::class, 'index'])->name('assessments');
    Route::post('/assessments', [TaskAssignmentController::class, 'store'])->name('assessments.store');

    Route::get('/notifications', [\App\Http\Controllers\Teacher\NotificationController::class, 'index'])->name('notifications');
    Route::post('/notifications/mark-read', [\App\Http\Controllers\Teacher\NotificationController::class, 'markAllAsRead'])->name('notifications.mark_read');

    Route::get('/profile', function () {
        return view('teacher.profile');
    })->name('profile');
});

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
