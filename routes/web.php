<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\LeadSubscriberController;

Route::get('/', [WelcomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dash');

    Route::get('/leads/add', [LeadController::class, 'create'])->name('lead.add');
    Route::post('/leads/save', [LeadController::class, 'store'])->name('lead.save');
    Route::get('/leads/list', [LeadController::class, 'index'])->name('lead.list');
    Route::get('/leads/view/{lead}', [LeadController::class, 'view'])->name('lead.view');
    Route::post('/leads/update', [LeadController::class, 'update'])->name('lead.update');

    Route::get('/leads/view/{lead}/reminder/add', [ReminderController::class, 'add'])->name('reminder.add');
    Route::post('/leads/view/reminder/save', [ReminderController::class, 'store'])->name('reminder.save');
    Route::get('/leads/view/{lead}/reminder/{reminder}/view', [ReminderController::class, 'view'])->name('reminder.view');
    Route::post('/leads/view/reminder/update', [ReminderController::class, 'updateAndCreate'])->name('reminder.update');
    Route::get('/leads/view/{lead}/reminder/{reminder}/note', [ReminderController::class, 'addNote'])->name('reminder.note');
    Route::post('/leads/view/reminder/close', [ReminderController::class, 'close'])->name('reminder.close');

    Route::get('/leads/subscribe/{lead}', [LeadSubscriberController::class, 'view'])->name('lead.subscribe');
    Route::post('/leads/subscribe/save', [LeadSubscriberController::class, 'store'])->name('lead.subscribe.add');

    Route::get('/packages/list', [PackageController::class, 'index'])->name('package.list');
    Route::post('/packages/save', [PackageController::class, 'store'])->name('package.save');
    Route::get('/packages/view/{package}', [PackageController::class, 'view'])->name('package.view');
    Route::post('/packages/update', [PackageController::class, 'update'])->name('package.update');
});

Auth::routes();
