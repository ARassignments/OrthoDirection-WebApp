<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Main Route
Route::get('/', [PageController::class, 'index'])->name('home');

// User Pages Routes
Route::get('/about', function () {return view('pages.about-us');})->name('about');
Route::get('/services', function () {return view('pages.services');})->name('services');
Route::get('/blogs', function () {return view('pages.blogs');})->name('blogs');
Route::get('/pricing', function () {return view('pages.pricing-plans');})->name('pricing');
Route::get('/contact', function () {return view('pages.contact-us');})->name('contact');

// web.php
Route::get('email-verify', [RegisteredUserController::class, 'showVerificationNotice'])->name('verification.email');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('admin/')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.index');
});
Route::prefix('professionals/')->group(function () {
    Route::get('/', [ProfessionalController::class, 'dashboard'])->name('professionals.index');
});
Route::get("/logout", [AdminController::class, 'logout'])->name("logout");





require __DIR__ . '/auth.php';
