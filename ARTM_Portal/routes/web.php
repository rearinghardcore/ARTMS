<?php

use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LateEntryController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'student'])
    ->name('dashboard');

Route::get('late-entry/create', function () {
    return view('late_entry_form');
})->middleware(['auth', 'student'])->name('late-entry.create');

Route::post('late-entry', [LateEntryController::class, 'store'])->name('late-entry.store');
Route::get('/generate-qr', [LateEntryController::class, 'generateQR'])->name('generate-qr');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'admin', 'superadmin'])->group(function() {
    Route::get('admin/dashboard', [AdminDashboard::class, 'adminDashboard'])->name('admin');
    Route::get('admin/student/{id}/late-entries', [AdminDashboard::class, 'showStudentLateEntries'])->name('admin.student.late-entries');
    Route::get('admin/create', [AdminDashboard::class, 'createAdmin'])->name('admin.create');
    Route::post('admin/store', [AdminDashboard::class, 'storeAdmin'])->name('admin.store');
    Route::get('admin/create-student', [AdminDashboard::class, 'createStudent'])->name('admin.create-student');
    Route::post('admin/store-student', [AdminDashboard::class, 'storeStudent'])->name('admin.store-student');
    Route::get('/late-slip-requests', [LateEntryController::class, 'index'])->name('late-slip-requests');
    Route::get('/late-slip-requests', [LateEntryController::class, 'index'])->name('late-slip-requests');
    Route::post('/late-slip-requests/approve/{id}', [LateEntryController::class, 'approve'])->name('late-slip-requests.approve');
    Route::post('/late-slip-requests/reject/{id}', [LateEntryController::class, 'reject'])->name('late-slip-requests.reject');
});

require __DIR__.'/auth.php';