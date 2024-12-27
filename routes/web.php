<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Main route
Route::get('/', [PageController::class, 'index'])->name('home');

// AJAX Page Loader
Route::get('user-side/{page}', [PageController::class, 'loadPage'])->name('page.load');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('admin/')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
Route::prefix('professionals/')->group(function () {
    Route::get('/dashboard', [ProfessionalController::class, 'dashboard'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';
