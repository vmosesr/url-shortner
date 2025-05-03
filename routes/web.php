<?php

use App\Http\Controllers\UrlShortenerController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::get('/', function () {
    return view('welcome');
})->name('home');


// user
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'user'])
    ->name('dashboard');


//url

Route::get('/shorten-home', [UrlShortenerController::class, 'linker'])->name('shortener.shorten-home');
Route::post('/shorten', [UrlShortenerController::class, 'shorten'])->name('shortener.shorten');
Route::get('/{code}', [UrlShortenerController::class, 'redirect'])->name('shortener.redirect');


// admin
Route::view('admin/dashboard', 'admin.dashboard')
    ->middleware(['auth', 'verified' , 'admin'])
    ->name('admin.dashboard');

// blogger
Route::view('blogger/dashboard', 'blogger.dashboard')
    ->middleware(['auth', 'verified' , 'blogger'])
    ->name('blogger.dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});



require __DIR__.'/auth.php';
