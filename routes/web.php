<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ComplaintController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('profile')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('complaints')->group(function () {
        Route::get('/', [ComplaintController::class, 'index'])->name('complaints.index');
        Route::get('/edit/{id}', [ComplaintController::class, 'edit'])->name('complaints.edit');
        Route::get('/{id}', [ComplaintController::class, 'show'])->name('complaints.show');
        Route::patch('/{id}', [ComplaintController::class, 'update'])->name('complaints.update');
        Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');
        Route::delete('/{id}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');
    });

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::patch('/settings/update', [SettingsController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';
