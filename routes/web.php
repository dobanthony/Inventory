<?php

use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleBasedDashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/getStarted', function () {
    return Inertia::render('GetStarted');
})->name('getStarted');

// ✅ Updated dashboard route with role-based logic
Route::get('/dashboard', [RoleBasedDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/shops', [ShopController::class, 'index'])->name('admin.shops.index');
    Route::get('/admin/shops/create', [ShopController::class, 'create'])->name('admin.shops.create');
    Route::post('/admin/shops', [ShopController::class, 'store'])->name('admin.shops.store');
    Route::get('/admin/shops/{shop}/edit', [ShopController::class, 'edit'])->name('admin.shops.edit');
    Route::put('/admin/shops/{shop}', [ShopController::class, 'update'])->name('admin.shops.update');
    Route::delete('/admin/shops/{shop}', [ShopController::class, 'destroy'])->name('admin.shops.destroy');
});

require __DIR__.'/auth.php';
