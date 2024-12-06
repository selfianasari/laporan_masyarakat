<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk semua pengguna 
Route::middleware(['auth'])->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // route profile
    Route::prefix('profile')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // route complaint
    Route::prefix('complaints')->group(function () {
        Route::get('/', [ComplaintController::class, 'index'])->name('complaints.index');
        Route::get('/create', [ComplaintController::class, 'create'])->name('complaints.create'); 
        Route::get('/edit/{id}', [ComplaintController::class, 'edit'])->name('complaints.edit');
        Route::get('/{id}', [ComplaintController::class, 'show'])->name('complaints.show'); 
        Route::patch('/{id}', [ComplaintController::class, 'update'])->name('complaints.update');
        Route::post('/', [ComplaintController::class, 'store'])->name('complaints.store'); 
        Route::delete('/{id}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');
    });
});

// Route untuk admin complaint
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/complaints', [ComplaintController::class, 'index'])->name('admin.complaints.index');
    Route::patch('/admin/complaints/{id}/update-status', [ComplaintController::class, 'updateStatus'])->name('complaints.updateStatus');
    Route::get('/admin/complaints/{id}', [ComplaintController::class, 'show'])->name('admin.complaints.show'); // Admin juga bisa lihat detail
});

// Route kontak
Route::get('/hubungi-kami', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/hubungi-kami', [ContactController::class, 'send'])->name('contact.send');

require __DIR__.'/auth.php';
