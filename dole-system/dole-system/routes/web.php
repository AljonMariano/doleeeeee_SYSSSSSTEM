<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\RouteSlipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    });

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

    // Vouchers
    Route::get('/vouchers', [VoucherController::class, 'index'])->name('vouchers.index');
    Route::get('/vouchers/create', [VoucherController::class, 'create'])->name('vouchers.create');
    Route::post('/vouchers', [VoucherController::class, 'store'])->name('vouchers.store');
    Route::get('/vouchers/{voucher}', [VoucherController::class, 'show'])->name('vouchers.show');
    Route::get('/vouchers/{voucher}/edit', [VoucherController::class, 'edit'])->name('vouchers.edit');
    Route::put('/vouchers/{voucher}', [VoucherController::class, 'update'])->name('vouchers.update');
    Route::delete('/vouchers/{voucher}', [VoucherController::class, 'destroy'])->name('vouchers.destroy');

    // Purchase Requests
    Route::get('/purchase-requests', [PurchaseRequestController::class, 'index'])->name('purchase-requests.index');
    Route::get('/purchase-requests/create', [PurchaseRequestController::class, 'create'])->name('purchase-requests.create');
    Route::post('/purchase-requests', [PurchaseRequestController::class, 'store'])->name('purchase-requests.store');
    Route::get('/purchase-requests/{purchaseRequest}', [PurchaseRequestController::class, 'show'])->name('purchase-requests.show');
    Route::get('/purchase-requests/{purchaseRequest}/edit', [PurchaseRequestController::class, 'edit'])->name('purchase-requests.edit');
    Route::put('/purchase-requests/{purchaseRequest}', [PurchaseRequestController::class, 'update'])->name('purchase-requests.update');
    Route::delete('/purchase-requests/{purchaseRequest}', [PurchaseRequestController::class, 'destroy'])->name('purchase-requests.destroy');

    // Purchase Orders
    Route::get('/purchase-orders', [PurchaseOrderController::class, 'index'])->name('purchase-orders.index');
    Route::get('/purchase-orders/create', [PurchaseOrderController::class, 'create'])->name('purchase-orders.create');
    Route::post('/purchase-orders', [PurchaseOrderController::class, 'store'])->name('purchase-orders.store');
    Route::get('/purchase-orders/{purchaseOrder}', [PurchaseOrderController::class, 'show'])->name('purchase-orders.show');
    Route::get('/purchase-orders/{purchaseOrder}/edit', [PurchaseOrderController::class, 'edit'])->name('purchase-orders.edit');
    Route::put('/purchase-orders/{purchaseOrder}', [PurchaseOrderController::class, 'update'])->name('purchase-orders.update');
    Route::delete('/purchase-orders/{purchaseOrder}', [PurchaseOrderController::class, 'destroy'])->name('purchase-orders.destroy');

    // Route Slips
    Route::get('/route-slips', [RouteSlipController::class, 'index'])->name('route-slips.index');
    Route::get('/route-slips/create', [RouteSlipController::class, 'create'])->name('route-slips.create');
    Route::post('/route-slips', [RouteSlipController::class, 'store'])->name('route-slips.store');
    Route::get('/route-slips/{routeSlip}', [RouteSlipController::class, 'show'])->name('route-slips.show');
    Route::get('/route-slips/{routeSlip}/edit', [RouteSlipController::class, 'edit'])->name('route-slips.edit');
    Route::put('/route-slips/{routeSlip}', [RouteSlipController::class, 'update'])->name('route-slips.update');
    Route::delete('/route-slips/{routeSlip}', [RouteSlipController::class, 'destroy'])->name('route-slips.destroy');
    
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
