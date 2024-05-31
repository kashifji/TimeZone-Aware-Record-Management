<?php

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


Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'showProfile']);
Route::post('/updateProfile', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('profile.update');

Route::get('/addRecord', [App\Http\Controllers\RecordController::class, 'addRecord']);
Route::post('/addRecord', [App\Http\Controllers\RecordController::class, 'store'])->name('records.store');
Route::get('/showRecords', [App\Http\Controllers\RecordController::class, 'showRecords'])->name('records.show');
Route::get('/loadRecords', [App\Http\Controllers\RecordController::class, 'loadRecords'])->name('records.load');
Route::delete('/records/delete/{id}', [App\Http\Controllers\RecordController::class, 'deleteRecord'])->name('records.delete')->middleware('check.ownership');
});