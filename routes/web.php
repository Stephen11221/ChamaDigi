<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
    Route::view('/members', 'pages.members.index')->name('members');
    Route::view('/contributions', 'pages.contributions.index')->name('contributions');
    Route::view('/loans', 'pages.loans.index')->name('loans');
    Route::view('/investments', 'pages.investments.index')->name('investments');
    Route::view('/reports', 'pages.reports.index')->name('reports');
    Route::view('/meetings', 'pages.meetings.index')->name('meetings');
    Route::view('/payments', 'pages.payments.index')->name('payments');
    Route::view('/settings', 'pages.settings.index')->name('settings');
    Route::view('/notifications', 'pages.notifications.index')->name('notifications');
    Route::view('/audit', 'pages.audit.index')->name('audit');

    Route::view('/profile', 'pages.profile.index')->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
