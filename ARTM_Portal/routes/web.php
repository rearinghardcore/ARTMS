<?php

use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LateEntryController;
use App\Http\Controllers\StudentSearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::view('/', 'welcome');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'student'])
    ->name('dashboard');

Route::get('late-entry/create', function () {
    return view('late_entry_form');
})->middleware(['auth', 'student'])->name('late-entry.create');

Route::get('/generate-qr', function () {
    $lateEntries = \App\Models\LateEntry::with('user')->where('isApproved', 1)->where('id', Auth::id())->get();
    return view('GenerateQR', compact('lateEntries'));})->name('generate-qr-form');


Route::post('late-entry', [LateEntryController::class, 'store'])->name('late-entry.store');
Route::get('/late-entry/{id}/valid', [LateEntryController::class, 'showValidEntry'])->name('late-entry.valid');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'student'])->group(function() {
    Route::post('/generate-qr', [LateEntryController::class, 'generateQR'])->name('generate-qr');
});

Route::middleware(['auth', 'admin', 'superadmin'])->group(function() {
    Route::get('admin/dashboard', [AdminDashboard::class, 'adminDashboard'])->name('admin');
    Route::get('student-search', [StudentSearchController::class, 'index'])->name('student.search');
    Route::get('admin/monitor', [AdminDashboard::class, 'monitor'])->name('admin.monitor');
    Route::get('student-search/results', [StudentSearchController::class, 'search'])->name('student.search.results');
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