<?php

use App\Http\Controllers\CarrierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\StatusController;
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

Route::post('/language/{lang}', LocaleController::class)
    ->where(['lang' => '[a-zA-Z]{2}'])
    ->name('set-locale');

Route::get('/', [FrontendController::class, 'index'])->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    //Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    //Dashboard route
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    //Shipments routes resource
    Route::resource('/shipments', ShipmentController::class)->except('show');

    //Routes only for user with role admin
    Route::middleware(['role:admin'])->group(function () {
        //Carrier routes resource
        Route::resource('/carriers', CarrierController::class)->except('show');
        //Statuses routes resource
        Route::resource('/statuses', StatusController::class)->except('show');
    });
});

require __DIR__ . '/auth.php';
