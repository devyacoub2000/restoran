<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\FrontController;
use App\Http\Controllers\User\ContactController;


Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::prefix('front')->name('front.')->group(function() {
    
      Route::get('about', [FrontController::class, 'about'])->name('about');
      Route::get('menue', [FrontController::class, 'menue'])->name('menue');
      Route::get('service', [FrontController::class, 'service'])->name('service');
      // ... 
      Route::get('team', [FrontController::class, 'team'])->name('team');
      Route::get('booking', [FrontController::class, 'booking'])->name('booking');
      Route::get('contact', [FrontController::class, 'contact'])->name('contact');
      Route::get('testimonial', [FrontController::class, 'testimonial'])->name('testimonial');
      Route::post('store_booking', [FrontController::class, 'store_booking'])->middleware('auth')->name('store_booking');
      Route::post('store_contact', [ContactController::class, 'store_contact'])->middleware('auth')->name('store_contact');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
