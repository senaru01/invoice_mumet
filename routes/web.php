<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\PurchaseOrderController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('tickets.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Supplier Routes
Route::middleware(['auth', 'role:supplier'])->group(function () {
    Route::resource('tickets', TicketController::class);
    Route::get('tickets/{ticket}/print', [TicketController::class, 'print'])->name('tickets.print');
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    
});


// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/tickets/{ticket}', [AdminDashboardController::class, 'show'])->name('tickets.show');
    Route::get('/admin/dashboard/export', [AdminDashboardController::class, 'export'])
    ->name('dashboard.export');
    Route::get('/purchase-orders', [PurchaseOrderController::class, 'index'])->name('purchase-orders.index');
    Route::get('/purchase-orders/import', [PurchaseOrderController::class, 'import'])->name('purchase-orders.import');
    Route::post('/purchase-orders/import', [PurchaseOrderController::class, 'processImport'])->name('purchase-orders.process-import');
    Route::get('/purchase-orders/{purchaseOrder}', [PurchaseOrderController::class, 'show'])->name('purchase-orders.show');
    Route::delete('/purchase-orders/{purchaseOrder}', [PurchaseOrderController::class, 'destroy'])->name('purchase-orders.destroy');
});

// Reception Routes (PUBLIC - Tanpa Auth untuk Lobby PC)
Route::prefix('reception')->name('reception.')->group(function () {
    // Public routes (tidak perlu login)
    Route::get('/', [ReceptionController::class, 'index'])->name('index');
    Route::post('/scan', [ReceptionController::class, 'scan'])->name('scan');
    Route::get('/confirm/{ticket}', [ReceptionController::class, 'confirm'])->name('confirm');
    Route::post('/receive/{ticket}', [ReceptionController::class, 'receive'])->name('receive');
    Route::get('/receipt/{ticket}', [ReceptionController::class, 'receipt'])->name('receipt');
    Route::get('/receipt/{ticket}/print', [ReceptionController::class, 'printReceipt'])->name('print-receipt');
    Route::get('/already-received/{ticket}', [ReceptionController::class, 'alreadyReceived'])->name('already-received');
});

require __DIR__.'/auth.php';