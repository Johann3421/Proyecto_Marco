<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\AcademicoController;
use App\Http\Controllers\AdmisionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UniversidadAdminController;
use App\Http\Controllers\Admin\AcademicoAdminController;
use App\Http\Controllers\Admin\AdmisionAdminController;
use Illuminate\Support\Facades\Route;

// Ruta pública de la página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas públicas de la sección Universidad
Route::prefix('universidad')->name('universidad.')->group(function () {
    Route::get('/historia', [UniversidadController::class, 'historia'])->name('historia');
    Route::get('/autoridades', [UniversidadController::class, 'autoridades'])->name('autoridades');
    Route::get('/mision-vision', [UniversidadController::class, 'misionVision'])->name('mision-vision');
});

// Rutas públicas de la sección Académico
Route::prefix('academico')->name('academico.')->group(function () {
    Route::get('/facultades', [AcademicoController::class, 'facultades'])->name('facultades');
    Route::get('/escuelas', [AcademicoController::class, 'escuelas'])->name('escuelas');
    Route::get('/posgrado', [AcademicoController::class, 'posgrado'])->name('posgrado');
});

// Ruta pública de Admisión
Route::get('/admision', [AdmisionController::class, 'index'])->name('admision');

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

    // Gestión de Académico
    Route::prefix('academico')->name('academico.')->group(function () {
        // Facultades
        Route::get('/facultades', [AcademicoAdminController::class, 'facultadesIndex'])->name('facultades.index');
        Route::get('/facultades/create', [AcademicoAdminController::class, 'facultadesCreate'])->name('facultades.create');
        Route::post('/facultades', [AcademicoAdminController::class, 'facultadesStore'])->name('facultades.store');
        Route::get('/facultades/{id}/edit', [AcademicoAdminController::class, 'facultadesEdit'])->name('facultades.edit');
        Route::put('/facultades/{id}', [AcademicoAdminController::class, 'facultadesUpdate'])->name('facultades.update');
        Route::delete('/facultades/{id}', [AcademicoAdminController::class, 'facultadesDestroy'])->name('facultades.destroy');

        // Escuelas Profesionales
        Route::get('/escuelas', [AcademicoAdminController::class, 'escuelasIndex'])->name('escuelas.index');
        Route::get('/escuelas/create', [AcademicoAdminController::class, 'escuelasCreate'])->name('escuelas.create');
        Route::post('/escuelas', [AcademicoAdminController::class, 'escuelasStore'])->name('escuelas.store');
        Route::get('/escuelas/{id}/edit', [AcademicoAdminController::class, 'escuelasEdit'])->name('escuelas.edit');
        Route::put('/escuelas/{id}', [AcademicoAdminController::class, 'escuelasUpdate'])->name('escuelas.update');
        Route::delete('/escuelas/{id}', [AcademicoAdminController::class, 'escuelasDestroy'])->name('escuelas.destroy');

        // Posgrado
        Route::get('/posgrado', [AcademicoAdminController::class, 'posgradoIndex'])->name('posgrado.index');
        Route::get('/posgrado/create', [AcademicoAdminController::class, 'posgradoCreate'])->name('posgrado.create');
        Route::post('/posgrado', [AcademicoAdminController::class, 'posgradoStore'])->name('posgrado.store');
        Route::get('/posgrado/{id}/edit', [AcademicoAdminController::class, 'posgradoEdit'])->name('posgrado.edit');
        Route::put('/posgrado/{id}', [AcademicoAdminController::class, 'posgradoUpdate'])->name('posgrado.update');
        Route::delete('/posgrado/{id}', [AcademicoAdminController::class, 'posgradoDestroy'])->name('posgrado.destroy');
    });

    // Gestión de Admisión
    Route::prefix('admision')->name('admision.')->group(function () {
        // Modalidades de Ingreso
        Route::get('/modalidades', [AdmisionAdminController::class, 'modalidadesIndex'])->name('modalidades.index');
        Route::get('/modalidades/create', [AdmisionAdminController::class, 'modalidadesCreate'])->name('modalidades.create');
        Route::post('/modalidades', [AdmisionAdminController::class, 'modalidadesStore'])->name('modalidades.store');
        Route::get('/modalidades/{id}/edit', [AdmisionAdminController::class, 'modalidadesEdit'])->name('modalidades.edit');
        Route::put('/modalidades/{id}', [AdmisionAdminController::class, 'modalidadesUpdate'])->name('modalidades.update');
        Route::delete('/modalidades/{id}', [AdmisionAdminController::class, 'modalidadesDestroy'])->name('modalidades.destroy');

        // Calendario de Admisión
        Route::get('/calendario', [AdmisionAdminController::class, 'calendarioIndex'])->name('calendario.index');
        Route::get('/calendario/create', [AdmisionAdminController::class, 'calendarioCreate'])->name('calendario.create');
        Route::post('/calendario', [AdmisionAdminController::class, 'calendarioStore'])->name('calendario.store');
        Route::get('/calendario/{id}/edit', [AdmisionAdminController::class, 'calendarioEdit'])->name('calendario.edit');
        Route::put('/calendario/{id}', [AdmisionAdminController::class, 'calendarioUpdate'])->name('calendario.update');
        Route::delete('/calendario/{id}', [AdmisionAdminController::class, 'calendarioDestroy'])->name('calendario.destroy');

        // Preguntas Frecuentes
        Route::get('/faqs', [AdmisionAdminController::class, 'faqsIndex'])->name('faqs.index');
        Route::get('/faqs/create', [AdmisionAdminController::class, 'faqsCreate'])->name('faqs.create');
        Route::post('/faqs', [AdmisionAdminController::class, 'faqsStore'])->name('faqs.store');
        Route::get('/faqs/{id}/edit', [AdmisionAdminController::class, 'faqsEdit'])->name('faqs.edit');
        Route::put('/faqs/{id}', [AdmisionAdminController::class, 'faqsUpdate'])->name('faqs.update');
        Route::delete('/faqs/{id}', [AdmisionAdminController::class, 'faqsDestroy'])->name('faqs.destroy');

        // Proceso de Admisión (Solo edición)
        Route::get('/proceso', [AdmisionAdminController::class, 'procesoIndex'])->name('proceso.index');
        Route::get('/proceso/{id}/edit', [AdmisionAdminController::class, 'procesoEdit'])->name('proceso.edit');
        Route::put('/proceso/{id}', [AdmisionAdminController::class, 'procesoUpdate'])->name('proceso.update');
    });
});

// Rutas de perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

