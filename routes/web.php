<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::livewire('/{slug}', 'pages::pages.single')
    ->name('pages.single');

Route::livewire('/term/{slug}', 'pages::terms.single')
    ->name('terms.single');

require __DIR__.'/settings.php';
