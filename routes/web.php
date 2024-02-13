<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
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

Route::get('/note', [NoteController::class, 'index'])->name('note.index');
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
Route::post('/note/store',[NoteController::class, 'store'])->name('note.store');
Route::get('/note/edit/{note}',[NoteController::class,'edit'])->name('note.edit');
Route::patch('/note/update/{note}',[NoteController::class,'update'])->name('note.update');
Route::get('/note/show/{note}',[NoteController::class,'show'])->name('note.show');
Route::delete('/note/eliminar/{note}',[NoteController::class,'eliminar'])->name('note.eliminar');