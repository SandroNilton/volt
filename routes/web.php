<?php

use Illuminate\Support\Facades\Route;



require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Web Routes - user
|--------------------------------------------------------------------------
*/

Route::middleware(['verified', 'auth', 'user-access:user'])->name('user.')->group(function (){
    Route::view('/', 'user.dashboard')->name('dashboard');

    Route::resource('contests', App\Http\Controllers\User\ContestController::class);
    Route::resource('spaces', App\Http\Controllers\User\SpaceController::class);

    Route::view('profile', 'user.profile')->name('profile');
});

/*
|--------------------------------------------------------------------------
| Web Routes - admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->name('admin.')->group(function (){
    Route::view('/', 'admin.dashboard')->name('dashboard');

    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('contests', App\Http\Controllers\Admin\ContestController::class);
    Route::resource('spaces', App\Http\Controllers\Admin\SpaceController::class);
    Route::resource('participants', App\Http\Controllers\Admin\ParticipantController::class);
    Route::get('/participants/{contest}/group', [App\Http\Controllers\Admin\ParticipantController::class, 'group'])->name('participants.group');

    Route::view('profile', 'admin.profile')->name('profile');
});
