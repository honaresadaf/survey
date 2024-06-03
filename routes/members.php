<?php

use \App\Http\Controllers\Members;
use Illuminate\Support\Facades\Route;

Route::get('/all', [Members::class , 'all'])->name('members.all');
