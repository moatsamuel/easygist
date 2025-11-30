<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Easygist\ProfileController  as Pc;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, "fetch_posts"])->name("homepage");

Route::get('/posts/{id}', [HomeController::class, "get_post"])->name("postdetail");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Pc::class, 'show_profile'])->name('profile.edit');
    Route::put('/profile', [Pc::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/user.php';
