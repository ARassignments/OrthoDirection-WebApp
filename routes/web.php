<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Main Route
Route::get('/', [PageController::class, 'index'])->name('home');

// Static Pages
Route::prefix('/')->group(function () {
    Route::view('/about', 'pages.about-us')->name('about');
    Route::view('/services', 'pages.services')->name('services');
    Route::view('/blogs', 'pages.blogs')->name('blogs');
    Route::view('/pricing', 'pages.pricing-plans')->name('pricing');
    Route::view('/contact', 'pages.contact-us')->name('contact');
    Route::view('/faqs', 'pages.faqs')->name('faqs');
    Route::view('/privacy-policy', 'pages.privacy-policy')->name('privacy-policy');
    Route::view('/terms-conditions', 'pages.terms-conditions')->name('terms-conditions');
    Route::view('/doctor-detail', 'pages.doctor-detail')->name('doctor-detail');
    Route::view('/blog-detail', 'pages.blog-detail')->name('blog-detail');
    Route::view('/appointment', 'pages.appointment')->name('appointment');
    Route::view('/payment', 'pages.payment')->name('payment');
});
Route::post('/send-contact',[PatientController::class,'contact_store'])->name('contact.send');

// OTP and Email Verification Routes
Route::get('email-verify', [RegisteredUserController::class, 'showVerificationNotice'])->name('verification.email');
Route::get('/verify-otp', [AuthenticatedSessionController::class, 'showOtpForm'])->name('otp.verify');
Route::post('/verify-otp', [AuthenticatedSessionController::class, 'verifyOtp'])->name('otp.check');
Route::post('/resend-otp', [RegisteredUserController::class, 'resend'])->name('verification.resend');

// Register OTP Verification
Route::get('/register-otp-verify', [RegisteredUserController::class, 'showOtpForm'])->name('register.otp.verify');
Route::post('/register-otp-verify', [RegisteredUserController::class, 'verifyOtp'])->name('register.otp.check');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/admin/')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');
    Route::view('/family', 'admin.family')->name('admin.family');
    Route::view('/patients', 'admin.patients')->name('admin.patients');
    Route::view('/doctors', 'admin.doctors')->name('admin.doctors');
    Route::get('/getFamilies', [AdminController::class, 'getFamilies'])->name('admin.getFamilies');
    Route::get('/getPatients', [AdminController::class, 'getPatients'])->name('admin.getPatients');
    Route::get('/getDoctors', [AdminController::class, 'getDoctors'])->name('admin.getDoctors');
    Route::post('/updateStatus/{id}', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
});

Route::prefix('/doctor/')->middleware(['auth', 'verified', 'role:doctor'])->group(function () {
    Route::get('/', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
});

Route::prefix('/family/')->middleware(['auth', 'verified', 'role:family'])->group(function () {
    Route::get('/', [FamilyController::class, 'dashboard'])->name('family.dashboard');
});

Route::prefix('/patient/')->middleware(['auth', 'verified', 'role:patient'])->group(function () {
    Route::get('/', [PatientController::class, 'dashboard'])->name('patient.dashboard');
});

// Export Route (Protected)
Route::get('/export', function () {
    Artisan::call('export');
    return 'Export complete!';
});
// Logout Route
Route::get("/logout", [AdminController::class, 'logout'])->name("logout");

require __DIR__ . '/auth.php';
