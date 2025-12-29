<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

// Ruta pública de la página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard de Breeze (redirigir al admin)
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas del Admin Panel (protegidas con autenticación)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Aquí se agregarán más rutas de administración en el futuro
    // Route::resource('noticias', NoticiasController::class);
    // Route::resource('eventos', EventosController::class);
    // Route::resource('facultades', FacultadesController::class);
});

// Rutas de perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

