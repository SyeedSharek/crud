<?php

use App\Http\Controllers\EducationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('information/index');
// });


Route::get('/', [EducationController::class, 'index'])->name('education.index');

Route::get('/education/create', [EducationController::class, 'create'])->name('education.create');

Route::post('/education', [EducationController::class, 'store']);

Route::delete('/education/{id}', [EducationController::class, 'destroy']);
Route::get('/education/{id}/edit', [EducationController::class, 'edit'])->name('education.edit');
Route::put('/education/{id}', [EducationController::class, 'update'])->name('education.update');