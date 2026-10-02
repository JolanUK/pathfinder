<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::livewire('/content/{pageSlug}', 'pages::pages.single')
    ->name('pages.single');

Route::livewire('/{termSlug}', 'pages::terms.single')
    ->name('terms.single');

Route::livewire('/{termSlug}/{courseSlug}', 'pages::courses.single')
    ->name('courses.single');

Route::livewire('/{termSlug}/{courseSlug}/{moduleSlug}', 'pages::modules.single')
    ->name('modules.single');

require __DIR__.'/settings.php';
