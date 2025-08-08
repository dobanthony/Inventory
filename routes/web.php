<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
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

Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Shops
    Route::get('/shops', [ShopController::class, 'index'])->name('shops.index');
    Route::get('/shops/create', [ShopController::class, 'create'])->name('shops.create');
    Route::post('/shops', [ShopController::class, 'store'])->name('shops.store');
    Route::get('/shops/{shop}', [ShopController::class, 'show'])->name('shops.show'); // Added show route
    Route::get('/shops/{shop}/edit', [ShopController::class, 'edit'])->name('shops.edit');
    Route::put('/shops/{shop}', [ShopController::class, 'update'])->name('shops.update');
    Route::delete('/shops/{shop}', [ShopController::class, 'destroy'])->name('shops.destroy');

    // Products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/{product}/buy', [ProductController::class, 'buyForm'])->name('products.buy');
    Route::post('/products/{product}/buy', [ProductController::class, 'buyStore'])->name('products.buy.store');

    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');

    // Product buy
    Route::get('/products/{product}/buy', [ProductController::class, 'buy'])->name('products.buy');
    Route::post('/products/{product}/buy', [ProductController::class, 'buyStore'])->name('products.buy.store');
});

use App\Http\Controllers\Admin\ProductBuyController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/products/{product}/buy', [ProductBuyController::class, 'create'])
        ->name('products.buy');
    Route::post('/products/{product}/buy', [ProductBuyController::class, 'store'])
        ->name('products.buy.store');
});


require __DIR__.'/auth.php';
