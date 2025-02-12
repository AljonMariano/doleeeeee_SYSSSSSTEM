<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\RouteSlipController;
use Illuminate\Support\Facades\Route;

// Root route - show login page
Route::get('/', [LoginController::class, 'showLoginForm'])->middleware('guest');

// Public Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Records Module
    Route::prefix('records')->group(function () {
        // Documents
        Route::get('/', [RecordsController::class, 'index'])->name('records.index');
        Route::get('/create', [RecordsController::class, 'create'])->name('records.create');
        Route::post('/', [RecordsController::class, 'store'])->name('records.store');
        Route::get('/{document}', [RecordsController::class, 'show'])->name('records.show');
        Route::post('/{document}/route', [RecordsController::class, 'route'])->name('records.route');
        Route::post('/{document}/receive', [RecordsController::class, 'receive'])->name('records.receive');
        Route::get('/search', [RecordsController::class, 'search'])->name('records.search');

        // Orders
        Route::get('/orders', [OrderController::class, 'index'])->name('records.orders.index');
        Route::get('/orders/create', [OrderController::class, 'create'])->name('records.orders.create');
        
        // Vouchers
        Route::get('/vouchers', [VoucherController::class, 'index'])->name('records.vouchers.index');
        Route::get('/vouchers/create', [VoucherController::class, 'create'])->name('records.vouchers.create');
        
        // Purchase Requests
        Route::get('/pr', [PurchaseRequestController::class, 'index'])->name('records.pr.index');
        Route::get('/pr/create', [PurchaseRequestController::class, 'create'])->name('records.pr.create');
        
        // Purchase Orders
        Route::get('/po', [PurchaseOrderController::class, 'index'])->name('records.po.index');
        Route::get('/po/create', [PurchaseOrderController::class, 'create'])->name('records.po.create');
        
        // Route Slips
        Route::get('/route-slips', [RouteSlipController::class, 'index'])->name('records.route-slips.index');
        Route::get('/route-slips/create', [RouteSlipController::class, 'create'])->name('records.route-slips.create');
    });
    
    // Budget Module
    Route::get('budget', [BudgetController::class, 'index'])->name('budget.index');
    
    // Accounting Module
    Route::get('accounting', [AccountingController::class, 'index'])->name('accounting.index');
    
    // Cashier Module
    Route::get('cashier', [CashierController::class, 'index'])->name('cashier.index');
});

// Logout Route (available for authenticated users)
Route::post('logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');
