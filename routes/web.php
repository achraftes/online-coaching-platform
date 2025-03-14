<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;



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
