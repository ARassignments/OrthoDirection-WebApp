<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DeviceLogController;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    // Form Submission Routes
    Route::post('/send-contact', [PatientController::class, 'contactStore'])->name('contact.send');
});

// OTP and Email Verification Routes
Route::get('email-verify', [RegisteredUserController::class, 'showVerificationNotice'])->name('verification.email');
Route::get('/verify-otp', [AuthenticatedSessionController::class, 'showOtpForm'])->name('otp.verify');
Route::post('/verify-otp', [AuthenticatedSessionController::class, 'verifyOtp'])->name('otp.check');
Route::post('/resend-otp', [RegisteredUserController::class, 'resend'])->name('verification.resend');

// Register OTP Verification
Route::get('/register-otp-verify', [RegisteredUserController::class, 'showOtpForm'])->name('register.otp.verify');
Route::post('/register-otp-verify', [RegisteredUserController::class, 'verifyOtp'])->name('register.otp.check');

Route::post('/store-newsletter', [AdminController::class, 'storeNewsletter'])->name('admin.newsletter.store');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/admin')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::view('/', 'general.dashboard')->name('admin.dashboard');
    Route::view('/newsletter', 'admin.newsletter')->name('admin.newsletter');
    Route::prefix('/services')->group(function () {
        Route::view('/', 'admin.services.services')->name('admin.services');
        Route::view('/add-service', 'admin.services.add-service')->name('admin.add-service');
        Route::get('/serviceFetch', [AdminController::class, 'serviceFetch'])->name('service.fetch');
        Route::post('/serviceStore', [AdminController::class, 'serviceStore'])->name('service.store');
        Route::get('/serviceEdit/{id}', [AdminController::class, 'serviceEdit'])->name('service.edit');
        Route::post('/serviceUpdate/{id}', [AdminController::class, 'serviceUpdate'])->name('service.update');
        Route::get('/serviceDestroy/{id}', [AdminController::class, 'serviceDestroy'])->name('service.destroy');
        Route::get('/serviceToggleStatus/{id}', [AdminController::class, 'serviceToggleStatus'])->name('service.toggleStatus');
    });
    Route::prefix('/blogs')->group(function () {
        Route::view('/', 'admin.blogs.blogs')->name('admin.blogs');
        Route::view('/add-blog', 'admin.blogs.add-blog')->name('admin.add-blog');
        Route::get('/blogDetail/{id}', [AdminController::class, 'blogDetail'])->name('blogs.detail');
        Route::get('/blogFetch', [AdminController::class, 'blogFetch'])->name('blogs.fetch');
        Route::post('/blogStore', [AdminController::class, 'blogStore'])->name('blogs.store');
        Route::get('/blogEdit/{id}', [AdminController::class, 'blogEdit'])->name('blogs.edit');
        Route::post('/blogUpdate/{id}', [AdminController::class, 'blogUpdate'])->name('blogs.update');
        Route::get('/blogDestroy/{id}', [AdminController::class, 'blogDestroy'])->name('blogs.destroy');
        Route::get('/blogToggleStatus/{id}', [AdminController::class, 'blogToggleStatus'])->name('blogs.toggleStatus');
    });
    Route::view('/messages', 'admin.messages.messages')->name('admin.messages');
    Route::view('/faqs', 'admin.faqs.faqs')->name('admin.faqs');
    Route::view('/family', 'admin.family')->name('admin.family');
    Route::view('/patients', 'admin.patients')->name('admin.patients');
    Route::view('/doctors', 'admin.doctors')->name('admin.doctors');
    Route::prefix('/contact')->group(function () {
        Route::view('/', 'admin.contact.contact')->name('admin.contact');
        Route::get('/contactFetch', [AdminController::class, 'contactFetch'])->name('contact.fetch');
    });
    Route::prefix('/profile')->group(function () {
        Route::get('/', [GeneralController::class, 'getProfileDetails'])->name('admin.profile');
        Route::get('/edit-profile', [GeneralController::class, 'getProfile'])->name('admin.profile.edit');
        Route::post('/profileUpload', [GeneralController::class, 'profileUpload'])->name('admin.profile.update');
    });
    Route::prefix('/appointments')->group(function () {
        Route::view('/', 'admin.appointments.appointments')->name('admin.appointments');
    });
    Route::get('/getFamilies', [AdminController::class, 'getFamilies'])->name('admin.getFamilies');
    Route::get('/getPatients', [AdminController::class, 'getPatients'])->name('admin.getPatients');
    Route::get('/getDoctors', [AdminController::class, 'getDoctors'])->name('admin.getDoctors');
    Route::get('/getNewsletter', [AdminController::class, 'getNewsletter'])->name('admin.getNewsletter');
    Route::post('/updateStatus/{id}', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
});

Route::prefix('/doctor/')->middleware(['auth', 'verified', 'role:doctor'])->group(function () {
    Route::view('/', 'general.dashboard')->name('doctor.dashboard');
    Route::prefix('/profile')->group(function () {
        Route::get('/', [GeneralController::class, 'getProfileDetails'])->name('doctor.profile');
        Route::get('/edit-profile', [GeneralController::class, 'getProfile'])->name('doctor.profile.edit');
        Route::post('/profileUpload', [GeneralController::class, 'profileUpload'])->name('doctor.profile.update');
    });
    Route::prefix('slots')->group(function () {
        Route::get('/slotFetch', [DoctorController::class, 'slotFetch'])->name('doctor.slots');
        Route::post('/slotStore', [DoctorController::class, 'slotStore'])->name('doctor.slots.store');
        Route::post('/slotUpdate/{id}', [DoctorController::class, 'slotUpdate'])->name('doctor.slots.update');
        Route::delete('/slotDestroy/{id}', [DoctorController::class, 'slotDestroy'])->name('doctor.slots.destroy');
        Route::post('/slotStatusUpdate/{id}', [DoctorController::class, 'slotStatusUpdate'])->name('doctor.slots.status');
    });
    Route::prefix('/appointments')->group(function () {
        Route::view('/', 'doctor.appointments.appointments')->name('doctor.appointments');
        Route::get('/appointmentFetch', [DoctorController::class, 'appointmentFetch'])->name('doctor.appointments.fetch');
        Route::post('/appointmentCancel/{id}', [DoctorController::class, 'appointmentCancel'])->name('doctor.appointments.cancel');
    });
    Route::prefix('/patients')->group(function () {
        Route::view('/', 'doctor.patients.patients')->name('doctor.patients');
        Route::get('/patientFetch', [DoctorController::class, 'patientFetch'])->name('doctor.patients.fetch');
        Route::get('/patientDetail/{id}', [PatientController::class, 'patientDetail'])->name('doctor.patients.detail');
    });
});

Route::prefix('/family/')->middleware(['auth', 'verified', 'role:family'])->group(function () {
    Route::view('/', 'general.dashboard')->name('family.dashboard');
    Route::view('/messages', 'family.messages.messages')->name('family.messages');
    Route::prefix('/profile')->group(function () {
        Route::get('/', [GeneralController::class, 'getProfileDetails'])->name('family.profile');
        Route::get('/edit-profile', [GeneralController::class, 'getProfile'])->name('family.profile.edit');
        Route::post('/profileUpload', [GeneralController::class, 'profileUpload'])->name('family.profile.update');
    });
});

Route::prefix('/patient/')->middleware(['auth', 'verified', 'role:patient'])->group(function () {
    Route::view('/', 'general.dashboard')->name('patient.dashboard');
    Route::view('/messages', 'patient.messages.messages')->name('patient.messages');
    Route::prefix('/profile')->group(function () {
        Route::get('/', [GeneralController::class, 'getProfileDetails'])->name('patient.profile');
        Route::get('/edit-profile', [GeneralController::class, 'getProfile'])->name('patient.profile.edit');
        Route::post('/profileUpload', [GeneralController::class, 'profileUpload'])->name('patient.profile.update');
    });
    Route::prefix('/appointments')->group(function () {
        Route::view('/', 'patient.appointments.appointments')->name('patient.appointments');
        Route::post('/appointmentStore', [PatientController::class, 'appointmentStore'])->name('patient.appointments.store');
        Route::get('/appointmentFetch', [PatientController::class, 'appointmentFetch'])->name('patient.appointments.fetch');
        Route::post('/appointmentCancel/{id}', [PatientController::class, 'appointmentCancel'])->name('patient.appointments.cancel');
    });
    Route::prefix('/doctors')->group(function () {
        Route::view('/', 'patient.doctors.doctors')->name('patient.doctors');
        Route::get('/doctorFetch', [PatientController::class, 'doctorFetch'])->name('patient.doctors.fetch');
        Route::get('/doctorDetail/{id}', [PatientController::class, 'doctorDetail'])->name('patient.doctors.detail');
    });
});

// Devices Login Logs
Route::prefix('/devices/')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [GeneralController::class, 'getDevices'])->name('devices.getDevices');
    Route::post('/logout/{id}', [GeneralController::class, 'logoutDevice'])->name('devices.logout');
    Route::post('/logout-all', [GeneralController::class, 'logoutAllDevices'])->name('devices.logout.all');
    Route::post('/tracking/ignore', [GeneralController::class, 'ignoreTracking'])->name('tracking.ignore');
    Route::post('/notifications/update', [GeneralController::class, 'updateNotification'])->name('notifications.update');
});

// Export Route (Protected)
Route::get('/export', function () {
    Artisan::call('export');
    return 'Export complete!';
});
// Logout Route
Route::get("/logout", [AdminController::class, 'logout'])->name("logout");

require __DIR__ . '/auth.php';
