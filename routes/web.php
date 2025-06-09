<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'showAll'])->name('home');

Route::get('/admin', [ArticleController::class, 'index']);
Route::get('/article/{id}', [ArticleController::class, 'show']);

Route::get('/admin', [ArticleController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/article/{id}', [ArticleController::class, 'show'])->name('articles.show');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    Route::get('/new', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/new', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/admin/article/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/delete/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

require __DIR__.'/auth.php';
