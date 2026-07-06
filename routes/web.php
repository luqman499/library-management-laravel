<?php

use App\Http\Controllers\BorrowRecordController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('welcome');
});

// Book Route
Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
Route::get('/book/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/book/{book}/update', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/{book}/destory', [BookController::class, 'destroy'])->name('book.destroy');

//Member Route
Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
Route::post('/member/store', [MemberController::class, 'store'])->name('member.store');
Route::get('/member/{member}', [MemberController::class, 'show'])->name('member.show');
Route::get('/member/{member}/edit', [MemberController::class, 'edit'])->name('member.edit');
Route::put('/member/{member}/update', [MemberController::class, 'update'])->name('member.update');
Route::delete('/member/{member}/destroy', [MemberController::class, 'destroy'])->name('member.destroy');


//Route Borrow Controller
Route::resource('borrow', BorrowRecordController::class);
