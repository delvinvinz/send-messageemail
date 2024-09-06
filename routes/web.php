<?php

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('emails', EmailController::class);

Route::get('/create', [EmailController::class, 'create'])->name('emails.create');
Route::post('/emails/send', [EmailController::class, 'send'])->name('emails.send');
