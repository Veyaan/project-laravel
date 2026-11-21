<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index']);

Route::get('/admin/about', [AboutController::class, 'index']);

Route::get('/admin/student', [StudentController::class, 'index'])->name('admin.student.index');

Route::post('/admin/student', [StudentController::class, 'store'])->name('admin.student.store');

Route::get('/admin/classroom', [ClassroomController::class, 'index'])->name('admin.classroom');

Route::post('/admin/classroom', [ClassroomController::class, 'store'])->name('admin.classroom.store');

Route::get('/admin/subjects', [SubjectController::class, 'index'])->name('admin.subjects');

Route::post('/admin/subjects', [SubjectController::class, 'store'])->name('admin.subjects.store');

Route::get('/admin/teachers', [TeacherController::class, 'index'])->name('admin.teachers');

Route::post('/admin/teachers', [TeacherController::class, 'store'])->name('admin.teachers.store');
