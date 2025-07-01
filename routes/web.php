<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AdminController;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute autentikasi default dari Breeze
require __DIR__.'/auth.php';

// Rute publik
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');
Route::get('/subscription/{id}', [SubscriptionController::class, 'showModal'])->name('subscription.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');

// Rute yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/subscribe', [SubscriptionController::class, 'store']);
    Route::post('/testimony', [TestimonialController::class, 'store'])->name('testimony.store')->middleware('auth');
    Route::patch('/subscriptions/{subscription}/pause', [SubscriptionController::class, 'pause'])->name('subscriptions.pause');
    Route::delete('/subscriptions/{subscription}/cancel', [SubscriptionController::class, 'cancel'])->name('subscriptions.cancel');
});

// Rute untuk admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});
