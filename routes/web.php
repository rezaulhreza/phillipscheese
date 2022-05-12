<?php

use App\Http\Controllers\CheeseController;
use App\Http\Controllers\CheeseType;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\SupplierOrderController;
use App\Http\Livewire\AboutPage;
use App\Http\Livewire\AdminDashboardPage;
use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',HomeComponent::class);
Route::get('/about',AboutPage::class)->name('about');
Route::get('/cheeses/all', [CheeseController::class,'cheeseList'])->name('cheeses.cheeseList');

Route::get('/cheese/detail/{id}/{name}', [CheeseController::class,'cheeseDetails'])->name('cheeses.cheeseDetails');


Route::post('/cheeses/barclaypay', [CheeseController::class,'payWithBarclay'])->name('cheeses.payWithBarclay');
Route::post('/cheeses/payment', [CheeseController::class,'payment'])->name('cheeses.payment');





Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard',AdminDashboardPage::class)->name('dashboard');
    Route::resource('/admin/cheesetype', CheeseType::class);
    Route::resource('/admin/cheese', CheeseController::class);
    Route::resource('/admin/supplierOrder', SupplierOrderController::class);
    Route::resource('/admin/customerOrder', CustomerOrderController::class);
});


