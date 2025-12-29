<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicoAdminController extends Controller
{
    // ==================== FACULTADES ====================

    /**
     * Mostrar lista de facultades
     */
    public function facultadesIndex()
    {
        $facultades = session('facultades', $this->getDefaultFacultades());
        return view('admin.academico.facultades.index', compact('facultades'));
    }

    /**
     * Mostrar formulario de creación de facultad
     */
    public function facultadesCreate()
    {
        return view('admin.academico.facultades.create');
    }

    /**
     * Guardar nueva facultad
     */
    public function facultadesStore(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|url',
            'carreras' => 'required|integer|min:1',
            'estudiantes' => 'required|integer|min:1',
            'color' => 'required|string',
            'icono' => 'required|string'
        ]);

        $facultades = session('facultades', $this->getDefaultFacultades());

        $newFacultad = [
            'id' => count($facultades) + 1,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'carreras' => (int) $request->carreras,
            'estudiantes' => (int) $request->estudiantes,
            'color' => $request->color,
            'icono' => $request->icono
        ];

        $facultades[] = $newFacultad;
        session(['facultades' => $facultades]);

        return redirect()->route('admin.academico.facultades.index')
            ->with('success', 'Facultad creada exitosamente');
    }

    /**
     * Mostrar formulario de edición de facultad
     */
    public function facultadesEdit($id)
    {
        $facultades = session('facultades', $this->getDefaultFacultades());
        $facultad = collect($facultades)->firstWhere('id', (int) $id);

        if (!$facultad) {
            return redirect()->route('admin.academico.facultades.index')
                ->with('error', 'Facultad no encontrada');
        }

        return view('admin.academico.facultades.edit', compact('facultad'));
    }

    /**
     * Actualizar facultad existente
     */
    public function facultadesUpdate(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|url',
            'carreras' => 'required|integer|min:1',
            'estudiantes' => 'required|integer|min:1',
            'color' => 'required|string',
            'icono' => 'required|string'
        ]);

        $facultades = session('facultades', $this->getDefaultFacultades());

        foreach ($facultades as $key => $facultad) {
            if ($facultad['id'] == $id) {
                $facultades[$key] = [
                    'id' => (int) $id,
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'imagen' => $request->imagen,
                    'carreras' => (int) $request->carreras,
                    'estudiantes' => (int) $request->estudiantes,
                    'color' => $request->color,
                    'icono' => $request->icono
                ];
                break;
            }
        }

        session(['facultades' => $facultades]);

        return redirect()->route('admin.academico.facultades.index')
            ->with('success', 'Facultad actualizada exitosamente');
    }

    /**
     * Eliminar facultad
     */
    public function facultadesDestroy($id)
    {
        $facultades = session('facultades', $this->getDefaultFacultades());
        $facultades = array_filter($facultades, function($facultad) use ($id) {
            return $facultad['id'] != $id;
        });

        session(['facultades' => array_values($facultades)]);

        return redirect()->route('admin.academico.facultades.index')
            ->with('success', 'Facultad eliminada exitosamente');
    }

    // ==================== ESCUELAS PROFESIONALES ====================

    /**
     * Mostrar lista de escuelas profesionales
     */
    public function escuelasIndex()
    {
        $escuelas = session('escuelas', $this->getDefaultEscuelas());
        return view('admin.academico.escuelas.index', compact('escuelas'));
    }

    /**
     * Mostrar formulario de creación de escuela
     */
    public function escuelasCreate()
    {
        $areas = $this->getAreas();
        return view('admin.academico.escuelas.create', compact('areas'));
    }

    /**
     * Guardar nueva escuela
     */
    public function escuelasStore(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'area' => 'required|string',
            'facultad' => 'required|string|max:255',
            'duracion' => 'required|string',
            'grado' => 'required|string',
            'estudiantes' => 'required|integer|min:1'
        ]);

        $escuelas = session('escuelas', $this->getDefaultEscuelas());

        $newEscuela = [
            'id' => count($escuelas) + 1,
            'nombre' => $request->nombre,
            'area' => $request->area,
            'facultad' => $request->facultad,
            'duracion' => $request->duracion,
            'grado' => $request->grado,
            'estudiantes' => (int) $request->estudiantes
        ];

        $escuelas[] = $newEscuela;
        session(['escuelas' => $escuelas]);

        return redirect()->route('admin.academico.escuelas.index')
            ->with('success', 'Escuela Profesional creada exitosamente');
    }

    /**
     * Mostrar formulario de edición de escuela
     */
    public function escuelasEdit($id)
    {
        $escuelas = session('escuelas', $this->getDefaultEscuelas());
        $escuela = collect($escuelas)->firstWhere('id', (int) $id);
        $areas = $this->getAreas();

        if (!$escuela) {
            return redirect()->route('admin.academico.escuelas.index')
                ->with('error', 'Escuela no encontrada');
        }

        return view('admin.academico.escuelas.edit', compact('escuela', 'areas'));
    }

    /**
     * Actualizar escuela existente
     */
    public function escuelasUpdate(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'area' => 'required|string',
            'facultad' => 'required|string|max:255',
            'duracion' => 'required|string',
            'grado' => 'required|string',
            'estudiantes' => 'required|integer|min:1'
        ]);

        $escuelas = session('escuelas', $this->getDefaultEscuelas());

        foreach ($escuelas as $key => $escuela) {
            if ($escuela['id'] == $id) {
                $escuelas[$key] = [
                    'id' => (int) $id,
                    'nombre' => $request->nombre,
                    'area' => $request->area,
                    'facultad' => $request->facultad,
                    'duracion' => $request->duracion,
                    'grado' => $request->grado,
                    'estudiantes' => (int) $request->estudiantes
                ];
                break;
            }
        }

        session(['escuelas' => $escuelas]);

        return redirect()->route('admin.academico.escuelas.index')
            ->with('success', 'Escuela Profesional actualizada exitosamente');
    }

    /**
     * Eliminar escuela
     */
    public function escuelasDestroy($id)
    {
        $escuelas = session('escuelas', $this->getDefaultEscuelas());
        $escuelas = array_filter($escuelas, function($escuela) use ($id) {
            return $escuela['id'] != $id;
        });

        session(['escuelas' => array_values($escuelas)]);

        return redirect()->route('admin.academico.escuelas.index')
            ->with('success', 'Escuela Profesional eliminada exitosamente');
    }

    // ==================== POSGRADO ====================

    /**
     * Mostrar lista de programas de posgrado
     */
    public function posgradoIndex()
    {
        $programas = session('posgrado', $this->getDefaultPosgrado());
        return view('admin.academico.posgrado.index', compact('programas'));
    }

    /**
     * Mostrar formulario de creación de programa de posgrado
     */
    public function posgradoCreate()
    {
        return view('admin.academico.posgrado.create');
    }

    /**
     * Guardar nuevo programa de posgrado
     */
    public function posgradoStore(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:maestria,doctorado',
            'nombre' => 'required|string|max:255',
            'duracion' => 'required|string',
            'modalidad' => 'required|string',
            'imagen' => 'nullable|url'
        ]);

        $programas = session('posgrado', $this->getDefaultPosgrado());

        $newPrograma = [
            'id' => $this->getNextPosgradoId($programas),
            'tipo' => $request->tipo,
            'nombre' => $request->nombre,
            'duracion' => $request->duracion,
            'modalidad' => $request->modalidad
        ];

        if ($request->tipo === 'maestria') {
            $request->validate(['creditos' => 'required|integer|min:1']);
            $newPrograma['creditos'] = (int) $request->creditos;
            $newPrograma['imagen'] = $request->imagen ?? 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&h=500&fit=crop&auto=format';
            $programas['maestrias'][] = $newPrograma;
        } else {
            $request->validate(['lineas_investigacion' => 'required|string']);
            $newPrograma['lineas_investigacion'] = array_map('trim', explode(',', $request->lineas_investigacion));
            $programas['doctorados'][] = $newPrograma;
        }

        session(['posgrado' => $programas]);

        return redirect()->route('admin.academico.posgrado.index')
            ->with('success', 'Programa de posgrado creado exitosamente');
    }

    /**
     * Mostrar formulario de edición de programa
     */
    public function posgradoEdit($id)
    {
        $programas = session('posgrado', $this->getDefaultPosgrado());
        $programa = $this->findPosgradoById($programas, $id);

        if (!$programa) {
            return redirect()->route('admin.academico.posgrado.index')
                ->with('error', 'Programa no encontrado');
        }

        return view('admin.academico.posgrado.edit', compact('programa'));
    }

    /**
     * Actualizar programa de posgrado
     */
    public function posgradoUpdate(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required|in:maestria,doctorado',
            'nombre' => 'required|string|max:255',
            'duracion' => 'required|string',
            'modalidad' => 'required|string'
        ]);

        $programas = session('posgrado', $this->getDefaultPosgrado());
        $tipo = $request->tipo === 'maestria' ? 'maestrias' : 'doctorados';

        foreach ($programas[$tipo] as $key => $programa) {
            if ($programa['id'] == $id) {
                $programas[$tipo][$key] = [
                    'id' => (int) $id,
                    'tipo' => $request->tipo,
                    'nombre' => $request->nombre,
                    'duracion' => $request->duracion,
                    'modalidad' => $request->modalidad
                ];

                if ($request->tipo === 'maestria') {
                    $request->validate(['creditos' => 'required|integer|min:1']);
                    $programas[$tipo][$key]['creditos'] = (int) $request->creditos;
                    $programas[$tipo][$key]['imagen'] = $request->imagen ?? $programa['imagen'];
                } else {
                    $request->validate(['lineas_investigacion' => 'required|string']);
                    $programas[$tipo][$key]['lineas_investigacion'] = array_map('trim', explode(',', $request->lineas_investigacion));
                }
                break;
            }
        }

        session(['posgrado' => $programas]);

        return redirect()->route('admin.academico.posgrado.index')
            ->with('success', 'Programa de posgrado actualizado exitosamente');
    }

    /**
     * Eliminar programa de posgrado
     */
    public function posgradoDestroy($id)
    {
        $programas = session('posgrado', $this->getDefaultPosgrado());

        // Buscar en maestrías
        $programas['maestrias'] = array_filter($programas['maestrias'], function($programa) use ($id) {
            return $programa['id'] != $id;
        });
        $programas['maestrias'] = array_values($programas['maestrias']);

        // Buscar en doctorados
        $programas['doctorados'] = array_filter($programas['doctorados'], function($programa) use ($id) {
            return $programa['id'] != $id;
        });
        $programas['doctorados'] = array_values($programas['doctorados']);

        session(['posgrado' => $programas]);

        return redirect()->route('admin.academico.posgrado.index')
            ->with('success', 'Programa de posgrado eliminado exitosamente');
    }

    // ==================== MÉTODOS AUXILIARES ====================

    /**
     * Obtener facultades por defecto
     */
    private function getDefaultFacultades()
    {
        return [
            ['id' => 1, 'nombre' => 'Medicina Humana', 'descripcion' => 'Formación de médicos cirujanos con excelencia académica', 'imagen' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&h=600&fit=crop&auto=format', 'carreras' => 5, 'estudiantes' => 3200, 'color' => 'danger', 'icono' => 'fa-heartbeat'],
            ['id' => 2, 'nombre' => 'Ingeniería de Sistemas', 'descripcion' => 'Profesionales en desarrollo de software y sistemas', 'imagen' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&h=600&fit=crop&auto=format', 'carreras' => 2, 'estudiantes' => 2800, 'color' => 'success', 'icono' => 'fa-laptop-code'],
            ['id' => 3, 'nombre' => 'Derecho', 'descripcion' => 'Formación integral de abogados y científicos políticos', 'imagen' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=800&h=600&fit=crop&auto=format', 'carreras' => 2, 'estudiantes' => 4500, 'color' => 'dark', 'icono' => 'fa-balance-scale']
        ];
    }

    /**
     * Obtener escuelas profesionales por defecto
     */
    private function getDefaultEscuelas()
    {
        return [
            ['id' => 1, 'nombre' => 'Medicina Humana', 'area' => 'Ciencias de la Salud', 'facultad' => 'Medicina', 'duracion' => '7 años', 'grado' => 'Médico Cirujano', 'estudiantes' => 2500],
            ['id' => 2, 'nombre' => 'Ingeniería de Sistemas', 'area' => 'Ingenierías', 'facultad' => 'Ingeniería de Sistemas', 'duracion' => '5 años', 'grado' => 'Ingeniero de Sistemas', 'estudiantes' => 1800],
            ['id' => 3, 'nombre' => 'Derecho', 'area' => 'Ciencias Sociales y Humanidades', 'facultad' => 'Derecho y Ciencia Política', 'duracion' => '6 años', 'grado' => 'Abogado', 'estudiantes' => 3200]
        ];
    }

    /**
     * Obtener programas de posgrado por defecto
     */
    private function getDefaultPosgrado()
    {
        return [
            'maestrias' => [
                ['id' => 1, 'tipo' => 'maestria', 'nombre' => 'Maestría en Medicina con mención en Cardiología', 'duracion' => '2 años', 'modalidad' => 'Presencial', 'creditos' => 72, 'imagen' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&h=500&fit=crop&auto=format'],
                ['id' => 2, 'tipo' => 'maestria', 'nombre' => 'Maestría en Ingeniería de Sistemas', 'duracion' => '2 años', 'modalidad' => 'Semi-presencial', 'creditos' => 64, 'imagen' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&h=500&fit=crop&auto=format']
            ],
            'doctorados' => [
                ['id' => 3, 'tipo' => 'doctorado', 'nombre' => 'Doctorado en Medicina', 'duracion' => '3 años', 'modalidad' => 'Presencial', 'lineas_investigacion' => ['Enfermedades Infecciosas', 'Medicina Molecular', 'Salud Pública']],
                ['id' => 4, 'tipo' => 'doctorado', 'nombre' => 'Doctorado en Ciencias Sociales', 'duracion' => '3 años', 'modalidad' => 'Presencial', 'lineas_investigacion' => ['Sociología Política', 'Estudios Culturales', 'Desarrollo Social']]
            ]
        ];
    }

    /**
     * Obtener áreas académicas disponibles
     */
    private function getAreas()
    {
        return [
            'Ciencias de la Salud',
            'Ingenierías',
            'Ciencias Sociales y Humanidades',
            'Ciencias Económicas y de Gestión',
            'Ciencias Básicas',
            'Arte y Diseño'
        ];
    }

    /**
     * Buscar programa de posgrado por ID
     */
    private function findPosgradoById($programas, $id)
    {
        foreach ($programas['maestrias'] as $programa) {
            if ($programa['id'] == $id) return $programa;
        }
        foreach ($programas['doctorados'] as $programa) {
            if ($programa['id'] == $id) return $programa;
        }
        return null;
    }

    /**
     * Obtener siguiente ID disponible para posgrado
     */
    private function getNextPosgradoId($programas)
    {
        $maxId = 0;
        foreach (array_merge($programas['maestrias'], $programas['doctorados']) as $programa) {
            if ($programa['id'] > $maxId) $maxId = $programa['id'];
        }
        return $maxId + 1;
    }
}
