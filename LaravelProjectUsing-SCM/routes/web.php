<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
Route::get('/', [StudentController::class, 'index']);
Route::get('students', [StudentController::class, 'index']);
Route::get('add-student', [StudentController::class, 'create']);
Route::post('add-student', [StudentController::class, 'store']);
Route::get('edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);
//export excel
Route::get('/export-excel', [StudentController::class, 'exportExcel'])->name('exportexcel');
Route::post('/import-excel', [StudentController::class, 'importExcel'])->name('importexcel');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
