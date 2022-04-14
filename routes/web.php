<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'adminView'])->name('admin.view')->middleware('admin');
Route::get('/', [HomeController::class, 'adminView'])->name('admin.view')->middleware('user');

// admin
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin-view', [HomeController::class, 'adminView'])->name('admin.view');

    // professors
    Route::resource('/professors', App\Http\Controllers\API\ProfessorController::class);
    Route::get('/professors', [App\Http\Controllers\API\ProfessorController::class, 'index']);
    Route::post('/add-professor', [App\Http\Controllers\API\ProfessorController::class, 'store']);
    Route::delete('/professor/{id}', [App\Http\Controllers\API\ProfessorController::class, 'destroy']);
    Route::get('/professorsTeaching', [App\Http\Controllers\API\ProfessorController::class, 'indexWithTeaching']);
    Route::get('/professors-number', [App\Http\Controllers\API\ProfessorController::class, 'number']);

    // students
    Route::delete('/students/{registration_number}', [App\Http\Controllers\API\StudentController::class, 'destroy']);
    Route::put('/students/{registration_id}', [App\Http\Controllers\API\StudentController::class, 'update']);
    Route::get('/students', [App\Http\Controllers\API\StudentController::class, 'index']);
    Route::get('/top-students', [App\Http\Controllers\API\StudentController::class, 'topStudents']);
    Route::get('/students-number', [App\Http\Controllers\API\StudentController::class, 'number']);
    Route::post('/add-student', [App\Http\Controllers\API\StudentController::class, 'store']);

    // grades
    Route::get('/grades', [App\Http\Controllers\API\GradesController::class, 'index']);
    Route::get('/grades-chart', [App\Http\Controllers\API\GradesController::class, 'percentage']);
    Route::put('/grades/{id}', [App\Http\Controllers\API\GradesController::class, 'updateGrade']);
    Route::post('/grades', [App\Http\Controllers\API\GradesController::class, 'store']);
    Route::get('/grades/{registration_number}', [App\Http\Controllers\API\GradesController::class, 'verify']);
    Route::delete('/grades/{id}', [App\Http\Controllers\API\GradesController::class, 'destroy']);

    // absences
    Route::get('/failing-students', [App\Http\Controllers\API\AbsencesController::class, 'showFailingStudents']);
    Route::get('/absences', [App\Http\Controllers\API\AbsencesController::class, 'showAbsences']);

    // classes
    Route::resource('/classes', App\Http\Controllers\API\ClassStudController::class);
    Route::get('/classes', [App\Http\Controllers\API\ClassStudController::class, 'index']);
    Route::get('/classes/{year}/{group}', [App\Http\Controllers\API\ClassStudController::class, 'show']);
    Route::get('/classes-number', [App\Http\Controllers\API\ClassStudController::class, 'number']);

    // subjects
    Route::get('/subjects/{subject_title}', [App\Http\Controllers\API\SubjectController::class, 'show']);
    Route::get('/subjects-number', [App\Http\Controllers\API\SubjectController::class, 'number']);

    // teaching
    Route::post('/store-teaching', [App\Http\Controllers\API\TeachingController::class, 'store']);
});

// user
Route::get('user-view', [HomeController::class, 'userView'])->name('user.view');
Route::get('/students-grades/{registration_number}', [App\Http\Controllers\API\StudentController::class, 'showIndividualGrades']);
Route::get('/average/{registration_number}', [App\Http\Controllers\API\StudentController::class, 'showAverage']);
