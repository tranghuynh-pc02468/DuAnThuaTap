<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SmellController;
use App\Http\Controllers\BrandController;

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


Route::get('/', [HomeController::class, 'index'])->name('HomePage');

Route::prefix('smell')->group(function () {
    Route::get('/', [SmellController::class, 'index'])->name('Smell');
    Route::post('/', [SmellController::class, 'store'])->name('SmellStore');

    Route::get('/edit/{id}', [SmellController::class, 'edit'])->name('SmellEdit');
    Route::post('/edit/{id}', [SmellController::class, 'update'])->name('SmellUpdate');

    Route::post('/delete/{id}', [SmellController::class, 'delete'])->name('SmellDelete');
});

Route::prefix('brand')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('Brand');
    Route::post('/', [BrandController::class, 'store'])->name('BrandStore');

    Route::get('edit/{id}', [BrandController::class, 'edit'])->name('BrandEdit');
    Route::post('edit/{id}', [BrandController::class, 'update'])->name('BrandUpdate');

    Route::post('delete/{id}',[BrandController::class, 'delete'])->name('BrandDelete');
});

