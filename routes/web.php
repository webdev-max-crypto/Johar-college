<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdmissionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TeacherApplicationController;

// show form
Route::get('/teacher/application', function () {
    return view('teacher.teacher_application');
});

// submit form
Route::post('/teacher-application', [TeacherApplicationController::class, 'store'])
    ->name('teacher.application.store');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/admission', [AdmissionController::class, 'create'])
    ->name('admission.create');

Route::post('/admission', [AdmissionController::class, 'store'])
    ->name('admission.store');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->name('admin.dashboard');
    Route::get('/admin/student/{id}', [AdminController::class, 'viewStudent'])
    ->name('admin.student.view');
    Route::get('/teacher/application', function () {
    return view('teacher.teacher_application');
    
});
Route::post('/teacher/{id}/approve', [AdminController::class, 'approveTeacher'])
    ->name('teacher.approve');

Route::post('/admin/student/{id}/approve', [AdminController::class, 'approveStudent'])
    ->name('admin.student.approve');
    Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});

require __DIR__.'/auth.php';
