<?php

use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

Route::get('/',[RentalController::class,'index'])->name('index');
Route::post('/rental/save',[RentalController::class,'store'])->name('rental.store');
Route::get('/rental/edit/{t_biaya_rental}',[RentalController::class,'edit'])->name('edit');
Route::put('/transactions/{t_biaya_rental}', [RentalController::class, 'update'])->name('update');
Route::delete('/transactions/{t_biaya_rental}', [RentalController::class, 'destroy'])->name('destroy');
