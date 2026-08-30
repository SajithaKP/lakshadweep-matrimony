<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TestimonialController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [ProfileController::class, 'dashboard'])
        ->name('dashboard');

    // Customer's own profile - VIEW
    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');

    // Customer's own profile - EDIT
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::post('/profile/toggle', [ProfileController::class, 'toggleStatus'])
        ->name('profile.toggle');

    Route::delete('/account', [ProfileController::class, 'deleteAccount'])
        ->name('account.delete');

    Route::get('/search', [SearchController::class, 'index'])
        ->name('search');

    // Other customer's profile
    Route::get('/profile/view/{user}', [SearchController::class, 'show'])
        ->name('customer.profile.show');

    Route::get('/matched-profiles', [SearchController::class, 'matches'])
        ->name('matches');

    Route::get('/shortlist', [SearchController::class, 'shortlist'])
        ->name('shortlist');
});
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // USERS
        Route::get('/users', [UserController::class, 'index'])
            ->name('users');

        Route::get('/users/{user}', [UserController::class, 'show'])
            ->name('users.show');

        Route::post('/users/{user}/approve', [UserController::class, 'approve'])
            ->name('users.approve');

        Route::post('/users/{user}/reject', [UserController::class, 'reject'])
            ->name('users.reject');

        Route::post('/users/{user}/toggle', [UserController::class, 'toggle'])
            ->name('users.toggle');

        Route::delete('/users/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');


        // TESTIMONIALS
        Route::get('/testimonials', [TestimonialController::class, 'index'])
            ->name('testimonials');

        Route::post('/testimonials', [TestimonialController::class, 'store'])
            ->name('testimonials.store');

        Route::post('/testimonials/{testimonial}/toggle', [TestimonialController::class, 'toggle'])
            ->name('testimonials.toggle');

        Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])
            ->name('testimonials.destroy');


        // SLIDES
        Route::get('/slides', [SlideController::class, 'index'])
            ->name('slides');

        Route::post('/slides', [SlideController::class, 'store'])
            ->name('slides.store');

        Route::post('/slides/{slide}/toggle', [SlideController::class, 'toggle'])
            ->name('slides.toggle');

        Route::delete('/slides/{slide}', [SlideController::class, 'destroy'])
            ->name('slides.destroy');
    });
