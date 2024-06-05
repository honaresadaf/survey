<?php

use \App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
})->name('admin.dashboard');

Route::get('/members', [Admin::class , 'all_member'])->name('members.all');

Route::get('/members/edit', [Admin::class , 'member_edit'])->name('member.edit');
Route::post('/members/edit', [Admin::class , 'member_edit_post']);

Route::prefix('/config')->group(function () {
    Route::get('/questions' , [Admin::class , 'config_question'])->name('config_question');
    Route::post('/questions' , [Admin::class , 'config_question_update']);
    Route::get('/all' , [Admin::class , 'config_all'])->name('config.all');
    Route::post('/all' , [Admin::class , 'config_all_update']);
    Route::get('/user' , [Admin::class , 'config_user'])->name('config.user');
    Route::post('/user' , [Admin::class , 'config_user_post']);
    Route::get('/admins' , [Admin::class , 'config_show_admins'])->name('config.admins');
});

