<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/inventory',[DashboardController::class,'inventoryList'])->name('inventory.list');
    Route::get('/inventory-form',[DashboardController::class,'inventoryForm'])->name('inventory.form');
    Route::post('/add-inventory',[DashboardController::class,'addInventory'])->name('inventory.add');
    Route::get('/inventory-transaction',[DashboardController::class,'inventoryTransaction'])->name('inventory.transaction');
    Route::post('/add-inventory-transaction',[DashboardController::class,'addInventoryTransaction'])->name('add.inventory.transaction');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
