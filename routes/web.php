<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\AcademicoController;
use App\Http\Controllers\AdmisionController;
use App\Http\Controllers\InvestigacionController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UniversidadAdminController;
use App\Http\Controllers\Admin\AcademicoAdminController;
use App\Http\Controllers\Admin\AdmisionAdminController;
use App\Http\Controllers\Admin\InvestigacionAdminController;
use App\Http\Controllers\Admin\NoticiasAdminController;
use App\Http\Controllers\Admin\ContactoAdminController;
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

// Ruta pública de Investigación
Route::get('/investigacion', [InvestigacionController::class, 'index'])->name('investigacion');

// Rutas públicas de Noticias
Route::get('/noticias', [NoticiasController::class, 'index'])->name('noticias.index');
Route::get('/noticias/{id}', [NoticiasController::class, 'show'])->name('noticias.show');

// Rutas públicas de Contacto
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto.index');
Route::post('/contacto/enviar', [ContactoController::class, 'enviar'])->name('contacto.enviar');

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

    // Gestión de Investigación
    Route::prefix('investigacion')->name('investigacion.')->group(function () {
        // Líneas de Investigación
        Route::get('/lineas', [InvestigacionAdminController::class, 'lineasIndex'])->name('lineas.index');
        Route::get('/lineas/create', [InvestigacionAdminController::class, 'lineasCreate'])->name('lineas.create');
        Route::post('/lineas', [InvestigacionAdminController::class, 'lineasStore'])->name('lineas.store');
        Route::get('/lineas/{id}/edit', [InvestigacionAdminController::class, 'lineasEdit'])->name('lineas.edit');
        Route::put('/lineas/{id}', [InvestigacionAdminController::class, 'lineasUpdate'])->name('lineas.update');
        Route::delete('/lineas/{id}', [InvestigacionAdminController::class, 'lineasDestroy'])->name('lineas.destroy');

        // Proyectos
        Route::get('/proyectos', [InvestigacionAdminController::class, 'proyectosIndex'])->name('proyectos.index');
        Route::get('/proyectos/create', [InvestigacionAdminController::class, 'proyectosCreate'])->name('proyectos.create');
        Route::post('/proyectos', [InvestigacionAdminController::class, 'proyectosStore'])->name('proyectos.store');
        Route::get('/proyectos/{id}/edit', [InvestigacionAdminController::class, 'proyectosEdit'])->name('proyectos.edit');
        Route::put('/proyectos/{id}', [InvestigacionAdminController::class, 'proyectosUpdate'])->name('proyectos.update');
        Route::delete('/proyectos/{id}', [InvestigacionAdminController::class, 'proyectosDestroy'])->name('proyectos.destroy');

        // Investigadores
        Route::get('/investigadores', [InvestigacionAdminController::class, 'investigadoresIndex'])->name('investigadores.index');
        Route::get('/investigadores/create', [InvestigacionAdminController::class, 'investigadoresCreate'])->name('investigadores.create');
        Route::post('/investigadores', [InvestigacionAdminController::class, 'investigadoresStore'])->name('investigadores.store');
        Route::get('/investigadores/{id}/edit', [InvestigacionAdminController::class, 'investigadoresEdit'])->name('investigadores.edit');
        Route::put('/investigadores/{id}', [InvestigacionAdminController::class, 'investigadoresUpdate'])->name('investigadores.update');
        Route::delete('/investigadores/{id}', [InvestigacionAdminController::class, 'investigadoresDestroy'])->name('investigadores.destroy');

        // Publicaciones
        Route::get('/publicaciones', [InvestigacionAdminController::class, 'publicacionesIndex'])->name('publicaciones.index');
        Route::get('/publicaciones/create', [InvestigacionAdminController::class, 'publicacionesCreate'])->name('publicaciones.create');
        Route::post('/publicaciones', [InvestigacionAdminController::class, 'publicacionesStore'])->name('publicaciones.store');
        Route::get('/publicaciones/{id}/edit', [InvestigacionAdminController::class, 'publicacionesEdit'])->name('publicaciones.edit');
        Route::put('/publicaciones/{id}', [InvestigacionAdminController::class, 'publicacionesUpdate'])->name('publicaciones.update');
        Route::delete('/publicaciones/{id}', [InvestigacionAdminController::class, 'publicacionesDestroy'])->name('publicaciones.destroy');

        // Grupos de Investigación
        Route::get('/grupos', [InvestigacionAdminController::class, 'gruposIndex'])->name('grupos.index');
        Route::get('/grupos/create', [InvestigacionAdminController::class, 'gruposCreate'])->name('grupos.create');
        Route::post('/grupos', [InvestigacionAdminController::class, 'gruposStore'])->name('grupos.store');
        Route::get('/grupos/{id}/edit', [InvestigacionAdminController::class, 'gruposEdit'])->name('grupos.edit');
        Route::put('/grupos/{id}', [InvestigacionAdminController::class, 'gruposUpdate'])->name('grupos.update');
        Route::delete('/grupos/{id}', [InvestigacionAdminController::class, 'gruposDestroy'])->name('grupos.destroy');
    });

    // Gestión de Noticias
    Route::prefix('noticias')->name('noticias.')->group(function () {
        // Noticias
        Route::get('/noticias', [NoticiasAdminController::class, 'noticiasIndex'])->name('noticias.index');
        Route::get('/noticias/create', [NoticiasAdminController::class, 'noticiasCreate'])->name('noticias.create');
        Route::post('/noticias', [NoticiasAdminController::class, 'noticiasStore'])->name('noticias.store');
        Route::get('/noticias/{id}/edit', [NoticiasAdminController::class, 'noticiasEdit'])->name('noticias.edit');
        Route::put('/noticias/{id}', [NoticiasAdminController::class, 'noticiasUpdate'])->name('noticias.update');
        Route::delete('/noticias/{id}', [NoticiasAdminController::class, 'noticiasDestroy'])->name('noticias.destroy');

        // Categorías
        Route::get('/categorias', [NoticiasAdminController::class, 'categoriasIndex'])->name('categorias.index');
        Route::get('/categorias/create', [NoticiasAdminController::class, 'categoriasCreate'])->name('categorias.create');
        Route::post('/categorias', [NoticiasAdminController::class, 'categoriasStore'])->name('categorias.store');
        Route::get('/categorias/{id}/edit', [NoticiasAdminController::class, 'categoriasEdit'])->name('categorias.edit');
        Route::put('/categorias/{id}', [NoticiasAdminController::class, 'categoriasUpdate'])->name('categorias.update');
        Route::delete('/categorias/{id}', [NoticiasAdminController::class, 'categoriasDestroy'])->name('categorias.destroy');
    });

    // Gestión de Contacto
    Route::prefix('contacto')->name('contacto.')->group(function () {
        Route::get('/', [ContactoAdminController::class, 'index'])->name('index');
        Route::get('/{id}', [ContactoAdminController::class, 'show'])->name('show');
        Route::patch('/{id}/estado', [ContactoAdminController::class, 'updateEstado'])->name('updateEstado');
        Route::patch('/{id}/marcar-leido', [ContactoAdminController::class, 'marcarLeido'])->name('marcarLeido');
        Route::delete('/{id}', [ContactoAdminController::class, 'destroy'])->name('destroy');
    });
});

// Rutas de perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

