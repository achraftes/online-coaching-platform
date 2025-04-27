<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\SupportController;

Auth::routes();




Route::get('/', function () {
    return view('welcome');
});
Route::get('/coaching-blog', function () {
    return view('pages.coaching-blog');
})->name('coaching');
Route::get('/leadership-blog', function () {
    return view('pages.leadership-blog');
})->name('leadership');
Route::get('/stress-management-blog', function () {
    return view('pages.stress-blog');
})->name('stress');
Route::post('/send-test-email', [TestController::class, 'sendTestEmail']);

// Route::get('/rdv', [AppointmentController::class, 'showForm'])->name('appointment.form');
// Route::post('/rdv', [AppointmentController::class, 'schedule'])->name('appointment.schedule');




Route::post('/clients', [ClientController::class, 'store']);
Route::post('/check-email', [ClientController::class, 'checkEmail']);
Route::post('/api/process-payment', [PaymentController::class, 'processPayment']);
Route::post('/api/confirm-payment', [PaymentController::class, 'confirmPayment']);
Route::post('/confirm-payment', [PaymentController::class, 'confirmPayment']);


Route::get('/appointment', [AppointmentController::class, 'showForm'])->name('appointment.form');
Route::post('/appointment/schedule', [AppointmentController::class, 'scheduleAppointment'])->name('appointment.schedule');



Route::post('/send-message', [ContactController::class, 'send'])->name('contact.send');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/compte', [CompteController::class, 'index'])->name('compte.index');
    Route::get('/compte/edit', [CompteController::class, 'edit'])->name('compte.edit'); // Nom modifié
    Route::post('/compte/update', [CompteController::class, 'updateProfile'])->name('compte.update'); // Nom modifié
    Route::post('/compte/update-photo', [CompteController::class, 'updatePhoto'])->name('compte.updatePhoto');
});



Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');



Route::get('/support', [App\Http\Controllers\SupportController::class, 'showForm'])->name('support.contact');
Route::post('/support/send', [App\Http\Controllers\SupportController::class, 'sendSupportEmail'])->name('support.send');
