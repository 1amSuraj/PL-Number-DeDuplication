<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PriceListController;

Route::get('/price-lists', [PriceListController::class, 'index']);
Route::post('/price-lists/merge', [PriceListController::class, 'merge']);
Route::delete('/price-lists/{id}', [PriceListController::class, 'destroy']);
Route::put('/price-lists/{id}', [PriceListController::class, 'update']);
Route::post('/price-lists', [PriceListController::class, 'store']);


Route::get('/pl-form', [PriceListController::class, 'create'])->name('pl.create');
Route::post('/pl-submit', [PriceListController::class, 'submitViaForm'])->name('pl.submit');

// Route::get('/pl-duplicates', [PriceListController::class, 'showDuplicates'])->name('pl.duplicates');

Route::get('/pl-manage', [PriceListController::class, 'showDuplicates'])->name('pl.manage');
Route::post('/pl-merge', [PriceListController::class, 'merge'])->name('pl.merge');
Route::delete('/pl-delete/{id}', [PriceListController::class, 'destroy'])->name('pl.delete');
Route::put('/pl-update/{id}', [PriceListController::class, 'update'])->name('pl.update');