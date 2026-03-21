<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('student')->controller(StudentController::class)->group(function()
{
    Route::get('/', 'index');
    Route::view('add-student', 'students.add');
    Route::post('create', 'addStudents');
    Route::get('edit/{id}', 'editStudent');
    Route::post('update/{id}', 'updateStudent');
    Route::post('delete/{id}', 'deletetudent');
    Route::get('student-classes', 's_with_classes');
    Route::get('student_teacher', 'student_teacher');
});

Route::prefix('teacher')->controller(TeachersController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('edit/{id}', 'editTeacher');
    Route::post('update/{id}', 'updateTeacher');
    Route::get('all-classes', 'techers_classes');
    Route::get('get_students', 'get_students');
    
});
require __DIR__.'/auth.php';
