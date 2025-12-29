<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UniversidadAdminController;
use Illuminate\Support\Facades\Route;

// Ruta pública de la página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas públicas de la sección Universidad
Route::prefix('universidad')->name('universidad.')->group(function () {
    Route::get('/historia', [UniversidadController::class, 'historia'])->name('historia');
    Route::get('/autoridades', [UniversidadController::class, 'autoridades'])->name('autoridades');
    Route::get('/mision-vision', [UniversidadController::class, 'misionVision'])->name('mision-vision');
});

// Dashboard de Breeze (redirigir al admin)
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas del Admin Panel (protegidas con autenticación)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Gestión de Universidad
    Route::prefix('universidad')->name('universidad.')->group(function () {
        // Eventos Históricos
        Route::get('/historia', [UniversidadAdminController::class, 'historiaIndex'])->name('historia.index');
        Route::get('/historia/create', [UniversidadAdminController::class, 'historiaCreate'])->name('historia.create');
        Route::post('/historia', [UniversidadAdminController::class, 'historiaStore'])->name('historia.store');
        Route::get('/historia/{id}/edit', [UniversidadAdminController::class, 'historiaEdit'])->name('historia.edit');
        Route::put('/historia/{id}', [UniversidadAdminController::class, 'historiaUpdate'])->name('historia.update');
        Route::delete('/historia/{id}', [UniversidadAdminController::class, 'historiaDestroy'])->name('historia.destroy');

        // Autoridades
        Route::get('/autoridades', [UniversidadAdminController::class, 'autoridadesIndex'])->name('autoridades.index');
        Route::get('/autoridades/create', [UniversidadAdminController::class, 'autoridadesCreate'])->name('autoridades.create');
        Route::post('/autoridades', [UniversidadAdminController::class, 'autoridadesStore'])->name('autoridades.store');
        Route::get('/autoridades/{id}/edit', [UniversidadAdminController::class, 'autoridadesEdit'])->name('autoridades.edit');
        Route::put('/autoridades/{id}', [UniversidadAdminController::class, 'autoridadesUpdate'])->name('autoridades.update');
        Route::delete('/autoridades/{id}', [UniversidadAdminController::class, 'autoridadesDestroy'])->name('autoridades.destroy');

        // Misión y Visión
        Route::get('/mision-vision', [UniversidadAdminController::class, 'misionVision'])->name('mision-vision');
        Route::put('/mision-vision', [UniversidadAdminController::class, 'misionVisionUpdate'])->name('mision-vision.update');
    });
});

// Rutas de perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

