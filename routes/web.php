<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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
Route::get('/faqs', function () {return view('pages.faqs');})->name('faqs');
Route::get('/privacy-policy', function () {return view('pages.privacy-policy');})->name('privacy-policy');
Route::get('/terms-conditions', function () {return view('pages.terms-conditions');})->name('terms-conditions');
Route::get('/doctor-detail', function () {return view('pages.doctor-detail');})->name('doctor-detail');
Route::get('/blog-detail', function () {return view('pages.blog-detail');})->name('blog-detail');
Route::get('/appointment', function () {return view('pages.appointment');})->name('appointment');
Route::get('/payment', function () {return view('pages.payment');})->name('payment');

// web.php
Route::get('email-verify', [RegisteredUserController::class, 'showVerificationNotice'])->name('verification.email');
Route::get('/verify-otp', [AuthenticatedSessionController::class, 'showOtpForm'])->name('otp.verify');
Route::post('/verify-otp', [AuthenticatedSessionController::class, 'verifyOtp'])->name('otp.check');
Route::post('/resend-otp', [RegisteredUserController::class, 'resend'])->name('verification.resend');

//register routes
Route::get('/register-otp-verify', [RegisteredUserController::class, 'showOtpForm'])->name('register.otp.verify');
Route::post('/register-otp-verify', [RegisteredUserController::class, 'verifyOtp'])->name('register.otp.check');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('/admin')->middleware('prevent-back-history')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::prefix('/doctors')->middleware('prevent-back-history')->group(function () {
    Route::get('/dashboard', [ProfessionalController::class, 'dashboard'])->name('doctors.dashboard');
});

Route::prefix('/family')->middleware('prevent-back-history')->group(function () {
    Route::get('/dashboard', [FamilyController::class, 'dashboard'])->name('family.dashboard');
});

Route::prefix('/patient')->middleware('prevent-back-history')->group(function () {
    Route::get('/dashboard', [PatientController::class, 'dashboard'])->name('patients.dashboard');
});


Route::get("/logout", [AdminController::class, 'logout'])->name("logout");





require __DIR__ . '/auth.php';
