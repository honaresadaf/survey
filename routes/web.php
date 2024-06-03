<?php

use App\Http\Controllers\ProfileController;
use \App\Http\Controllers\Web;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome2'); })->name('welcome');

Route::get('/start', function () {
    return view('member.login');
});

Route::get('/admin/login', [Web::class , 'admin_login'])->name('admin.login');
Route::post('/admin/login', [Web::class , 'admin_login_pots'])->name('admin.login');

Route::get('/admin/register', [Web::class , 'admin_register'])->name('admin.register');
Route::post('/admin/register', [Web::class , 'admin_register_pots'])->name('admin.register');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/members', [Web::class , 'member_all'])->name('member.all');
Route::get('/q', [Web::class , 'show_questions'])->middleware('auth')->name('show.questions');
Route::post('/q', [Web::class , 'check_questions'])->middleware('auth')->name('check');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
