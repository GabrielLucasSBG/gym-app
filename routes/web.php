<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LeadController;

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

Route::get('/', [WelcomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dash');
    Route::get('/leads/add', [LeadController::class, 'create']);
    Route::post('/leads/save', [LeadController::class, 'store']);
    Route::get('/leads/list', [LeadController::class, 'index'])->name('lead.list');
    Route::get('/leads/view/{lead}', [LeadController::class, 'view'])->name('lead.view');
});

Auth::routes();
