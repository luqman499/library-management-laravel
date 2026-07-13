<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowRecordController;

// Route::resource('book', BookController::class);
// Route::resource('member', MemberController::class);
// Route::resource('borrow', BorrowRecordController::class);

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return redirect(route('book.index'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Approach 1
Route::middleware('auth')->group(function () {
    Route::resource('book', BookController::class);
    Route::resource('member', MemberController::class);
    Route::resource('borrow', BorrowRecordController::class);
});

// Approach 2
// Route::resource('book', BookController::class)->middleware('auth');
// Route::resource('member', MemberController::class)->middleware('auth');
// Route::resource('borrow', BorrowRecordController::class)->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

