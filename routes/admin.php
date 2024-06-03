<?php

use \App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
})->name('admin.dashboard');

Route::prefix('/config')->group(function () {
    Route::get('/questions' , [Admin::class , 'config_question'])->name('config_question');
    Route::post('/questions' , [Admin::class , 'config_question_update']);
    Route::get('/user' , [Admin::class , 'config_user'])->name('config.user');
    Route::post('/user' , [Admin::class , 'config_user_post']);
});

