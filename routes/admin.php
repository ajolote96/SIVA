<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;

Route::get('',[HomeController::class, 'index']);

Route::resource('users', UserController::class)->only('index', 'edit', 'update')->middleware('can:roles')->names('admin.users'); 