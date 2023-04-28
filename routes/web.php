<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/note',[NoteController::class,'index'])->name('note.index');
Route::get('/note/create',[NoteController::class,'create'])->name('note.create');
Route::get('/note/{note}/edit',[NoteController::class,'edit'])->name('note.edit');
Route::delete('/note/{note}',[NoteController::class,'destroy'])->name('note.destroy');
Route::post('/note',[NoteController::class,'store'])->name('note.store');
Route::put('/note/{note}',[NoteController::class,'update'])->name('note.update');

//EmployeeController 의 CASE

Route::get('/employees',[EmployeeController::class,'index'])->name('employees.index');
Route::get('/employees/create',[EmployeeController::class,'create'])->name('employees.create');
Route::get('/employees/{employee}/edit',[EmployeeController::class,'edit'])->name('employees.edit');
Route::delete('/employees/{employee}',[EmployeeController::class,'destroy'])->name('employees.destroy');
Route::post('/employees',[EmployeeController::class,'store'])->name('employees.store');
Route::put('/employees/{employee}',[EmployeeController::class,'update'])->name('employees.update');