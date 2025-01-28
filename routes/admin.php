<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\User\ContactController;

Route::prefix('admin')->name('admin.')->middleware('auth', 'is_admin')->group(function() {

   Route::get('/', [AdminController::class, 'index'])->name('index');
   Route::get('profile', [AdminController::class, 'profile'])->name('profile');
   Route::put('profile', [AdminController::class, 'profile_data'])->name('profile_data');
   Route::post('check-password', [AdminController::class, 'check_password'])
    ->name('check_password'); 

   Route::resource('service', ServiceController::class); 
   Route::resource('meal', MealController::class); 
   Route::resource('food', FoodController::class); 
   Route::resource('chef', ChefController::class); 
   Route::get('reservation', [AdminController::class, 'show_booking'])->name('show_booking');
   Route::put('updat_status/{id}', [AdminController::class, 'updat_status'])->name('updat_status');

   Route::get('contact', [ContactController::class, 'contact'])->name('contact');

});