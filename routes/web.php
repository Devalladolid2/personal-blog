<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\ArticleController;

// Ruta pública: muestra todos los artículos en vista pública
Route::get('/', [ArticleController::class, 'showAll'])->name('home');

// Ruta pública para ver un artículo específico (también duplicada más abajo)
Route::get('/article/{id}', [ArticleController::class, 'show']);

// Ruta protegida por middleware: vista del panel de administración
Route::get('/admin', [ArticleController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Ruta protegida para ver un artículo (misma que arriba pero con name())
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('articles.show');

// Agrupación de rutas protegidas por middleware de autenticación
Route::middleware(['auth'])->group(function () {
    // Redirección de settings raíz a settings/profile
    Route::redirect('settings', 'settings/profile');

    // Rutas de configuración del usuario usando Livewire Volt
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // Rutas de gestión de artículos (solo usuarios autenticados)
    Route::get('/new', [ArticleController::class, 'create'])->name('articles.create');     // Formulario de creación
    Route::post('/new', [ArticleController::class, 'store'])->name('articles.store');      // Guardar artículo
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');   // Editar artículo
    Route::put('/admin/article/{id}', [ArticleController::class, 'update'])->name('article.update'); // Actualizar artículo
    Route::delete('/article/delete/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy'); // Eliminar artículo
});

// Ruta para el inicio de sesión
require __DIR__ . '/auth.php';
