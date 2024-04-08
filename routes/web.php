<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', [StudentController::class,'index'])->name('index');
Route::get('/create', [StudentController::class,'create'])->name('create');
Route::post('/store', [StudentController::class,'store'])->name('store');
Route::get('/edit/{id}', [StudentController::class,'edit'])->name('edit');
Route::post('/update', [StudentController::class,'update'])->name('update');
Route::get('/delete/{id}', [StudentController::class,'delete'])->name('delete');