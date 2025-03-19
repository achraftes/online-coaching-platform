<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AppointmentController;


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

Route::get('/rdv', [AppointmentController::class, 'showForm'])->name('appointment.form');
Route::post('/rdv', [AppointmentController::class, 'schedule'])->name('appointment.schedule');




Route::post('/clients', [ClientController::class, 'store']);
Route::post('/check-email', [ClientController::class, 'checkEmail']);
Route::post('/api/process-payment', [PaymentController::class, 'processPayment']);
Route::post('/api/confirm-payment', [PaymentController::class, 'confirmPayment']);
Route::post('/confirm-payment', [PaymentController::class, 'confirmPayment']);