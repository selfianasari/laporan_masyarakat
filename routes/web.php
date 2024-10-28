<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Complaints Routes
    Route::prefix('complaints')->group(function () {
        Route::get('/', [ComplaintController::class, 'index'])->name('complaints.index');
        Route::get('/create', [ComplaintController::class, 'create'])->name('complaints.create'); 
        Route::get('/edit/{id}', [ComplaintController::class, 'edit'])->name('complaints.edit');
        Route::get('/{id}', [ComplaintController::class, 'show'])->name('complaints.show');
        Route::patch('/{id}', [ComplaintController::class, 'update'])->name('complaints.update');
        Route::post('/', [ComplaintController::class, 'store'])->name('complaints.store'); 
        Route::delete('/{id}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');
    });


    // Settings Routes
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::patch('/settings/update', [SettingsController::class, 'update'])->name('settings.update');
}); 

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/complaints', [ComplaintController::class, 'index'])->name('complaints.index');
    Route::get('/admin/complaints/{id}', [ComplaintController::class, 'show'])->name('complaints.show');
    
    Route::patch('/admin/complaints/{id}/update-status', [ComplaintController::class, 'updateStatus'])->name('complaints.updateStatus');
});

Route::middleware(['auth', 'admin'])->prefix('report')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('reports.index'); 
    Route::get('/{report}', [ReportController::class, 'show'])->name('reports.show'); 
    Route::post('/{report}/update', [ReportController::class, 'update'])->name('reports.update'); 
});



require __DIR__.'/auth.php';
