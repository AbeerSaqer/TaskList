<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\DB;

Route::get('/',[TaskController::class,'index']);
Route::get('/tasks/{id}',[TaskController::class,'show'])->name('show');
Route::post('store',[TaskController::class,'store'])->name('store');
Route::delete('/delete/{id}',[TaskController::class,'delete'])->name('delete');
Route::post('/edit/{id}',[TaskController::class,'edit']);
Route::put('/update/{id}',[TaskController::class,'update']);


