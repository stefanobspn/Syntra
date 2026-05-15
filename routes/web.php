<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\JournalController;
use App\Http\Controllers\Student\NotificationController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\TaskController;
use App\Http\Controllers\Teacher\JournalReviewController;
use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\TaskAssignmentController;
use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckTeacherRole;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

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

    Route::get('/notifications', [App\Http\Controllers\Teacher\NotificationController::class, 'index'])->name('notifications');
    Route::post('/notifications/mark-read', [App\Http\Controllers\Teacher\NotificationController::class, 'markAllAsRead'])->name('notifications.mark_read');

    Route::get('/profile', function () {
        return view('teacher.profile');
    })->name('profile');
});

Route::middleware(['auth', CheckAdminRole::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/students', [App\Http\Controllers\Admin\StudentController::class, 'index'])->name('students');
    Route::post('/students', [App\Http\Controllers\Admin\StudentController::class, 'store'])->name('students.store');
    Route::put('/students/{user}', [App\Http\Controllers\Admin\StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{user}', [App\Http\Controllers\Admin\StudentController::class, 'destroy'])->name('students.destroy');

    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');
    Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
    Route::put('/teachers/{user}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/teachers/{user}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

    // Keep static for now
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
    Route::get('/reports/export/journals', [ReportController::class, 'exportJournals'])->name('reports.export.journals');
    Route::get('/reports/export/students', [ReportController::class, 'exportStudents'])->name('reports.export.students');
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');
});
