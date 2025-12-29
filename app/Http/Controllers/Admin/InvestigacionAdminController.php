<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvestigacionAdminController extends Controller
{
    // ==================== LÍNEAS DE INVESTIGACIÓN ====================

    public function lineasIndex()
    {
        $lineas = session('lineas_investigacion', $this->getDefaultLineas());
        return view('admin.investigacion.lineas.index', compact('lineas'));
    }

    public function lineasCreate()
    {
        return view('admin.investigacion.lineas.create');
    }

    public function lineasStore(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'icono' => 'required|string',
            'color' => 'required|string',
            'proyectos_activos' => 'required|integer|min:0'
        ]);

        $lineas = session('lineas_investigacion', $this->getDefaultLineas());

        $newLinea = [
            'id' => count($lineas) + 1,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'icono' => $request->icono,
            'color' => $request->color,
            'proyectos_activos' => (int) $request->proyectos_activos
        ];

        $lineas[] = $newLinea;
        session(['lineas_investigacion' => $lineas]);

        return redirect()->route('admin.investigacion.lineas.index')
            ->with('success', 'Línea de investigación creada exitosamente');
    }

    public function lineasEdit($id)
    {
        $lineas = session('lineas_investigacion', $this->getDefaultLineas());
        $linea = collect($lineas)->firstWhere('id', (int) $id);

        if (!$linea) {
            return redirect()->route('admin.investigacion.lineas.index')
                ->with('error', 'Línea no encontrada');
        }

        return view('admin.investigacion.lineas.edit', compact('linea'));
    }

    public function lineasUpdate(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'icono' => 'required|string',
            'color' => 'required|string',
            'proyectos_activos' => 'required|integer|min:0'
        ]);

        $lineas = session('lineas_investigacion', $this->getDefaultLineas());

        foreach ($lineas as $key => $linea) {
            if ($linea['id'] == $id) {
                $lineas[$key] = [
                    'id' => (int) $id,
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'icono' => $request->icono,
                    'color' => $request->color,
                    'proyectos_activos' => (int) $request->proyectos_activos
                ];
                break;
            }
        }

        session(['lineas_investigacion' => $lineas]);

        return redirect()->route('admin.investigacion.lineas.index')
            ->with('success', 'Línea actualizada exitosamente');
    }

    public function lineasDestroy($id)
    {
        $lineas = session('lineas_investigacion', $this->getDefaultLineas());
        $lineas = array_filter($lineas, function($linea) use ($id) {
            return $linea['id'] != $id;
        });

        session(['lineas_investigacion' => array_values($lineas)]);

        return redirect()->route('admin.investigacion.lineas.index')
            ->with('success', 'Línea eliminada exitosamente');
    }

    // ==================== PROYECTOS ====================

    public function proyectosIndex()
    {
        $proyectos = session('proyectos_investigacion', $this->getDefaultProyectos());
        $lineas = session('lineas_investigacion', $this->getDefaultLineas());
        return view('admin.investigacion.proyectos.index', compact('proyectos', 'lineas'));
    }

    public function proyectosCreate()
    {
        $lineas = session('lineas_investigacion', $this->getDefaultLineas());
        return view('admin.investigacion.proyectos.create', compact('lineas'));
    }

    public function proyectosStore(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'investigador_principal' => 'required|string',
            'linea' => 'required|string',
            'estado' => 'required|string',
            'financiamiento' => 'required|string',
            'duracion' => 'required|string',
            'imagen' => 'required|url',
            'destacado' => 'boolean'
        ]);

        $proyectos = session('proyectos_investigacion', $this->getDefaultProyectos());

        $newProyecto = [
            'id' => count($proyectos) + 1,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'investigador_principal' => $request->investigador_principal,
            'linea' => $request->linea,
            'estado' => $request->estado,
            'financiamiento' => $request->financiamiento,
            'duracion' => $request->duracion,
            'imagen' => $request->imagen,
            'destacado' => $request->has('destacado')
        ];

        $proyectos[] = $newProyecto;
        session(['proyectos_investigacion' => $proyectos]);

        return redirect()->route('admin.investigacion.proyectos.index')
            ->with('success', 'Proyecto creado exitosamente');
    }

    public function proyectosEdit($id)
    {
        $proyectos = session('proyectos_investigacion', $this->getDefaultProyectos());
        $proyecto = collect($proyectos)->firstWhere('id', (int) $id);
        $lineas = session('lineas_investigacion', $this->getDefaultLineas());

        if (!$proyecto) {
            return redirect()->route('admin.investigacion.proyectos.index')
                ->with('error', 'Proyecto no encontrado');
        }

        return view('admin.investigacion.proyectos.edit', compact('proyecto', 'lineas'));
    }

    public function proyectosUpdate(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'investigador_principal' => 'required|string',
            'linea' => 'required|string',
            'estado' => 'required|string',
            'financiamiento' => 'required|string',
            'duracion' => 'required|string',
            'imagen' => 'required|url',
            'destacado' => 'boolean'
        ]);

        $proyectos = session('proyectos_investigacion', $this->getDefaultProyectos());

        foreach ($proyectos as $key => $proyecto) {
            if ($proyecto['id'] == $id) {
                $proyectos[$key] = [
                    'id' => (int) $id,
                    'titulo' => $request->titulo,
                    'descripcion' => $request->descripcion,
                    'investigador_principal' => $request->investigador_principal,
                    'linea' => $request->linea,
                    'estado' => $request->estado,
                    'financiamiento' => $request->financiamiento,
                    'duracion' => $request->duracion,
                    'imagen' => $request->imagen,
                    'destacado' => $request->has('destacado')
                ];
                break;
            }
        }

        session(['proyectos_investigacion' => $proyectos]);

        return redirect()->route('admin.investigacion.proyectos.index')
            ->with('success', 'Proyecto actualizado exitosamente');
    }

    public function proyectosDestroy($id)
    {
        $proyectos = session('proyectos_investigacion', $this->getDefaultProyectos());
        $proyectos = array_filter($proyectos, function($proyecto) use ($id) {
            return $proyecto['id'] != $id;
        });

        session(['proyectos_investigacion' => array_values($proyectos)]);

        return redirect()->route('admin.investigacion.proyectos.index')
            ->with('success', 'Proyecto eliminado exitosamente');
    }

    // ==================== INVESTIGADORES ====================

    public function investigadoresIndex()
    {
        $investigadores = session('investigadores', $this->getDefaultInvestigadores());
        return view('admin.investigacion.investigadores.index', compact('investigadores'));
    }

    public function investigadoresCreate()
    {
        return view('admin.investigacion.investigadores.create');
    }

    public function investigadoresStore(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string',
            'facultad' => 'required|string',
            'email' => 'required|email',
            'proyectos' => 'required|integer|min:0',
            'publicaciones' => 'required|integer|min:0',
            'imagen' => 'required|url'
        ]);

        $investigadores = session('investigadores', $this->getDefaultInvestigadores());

        $newInvestigador = [
            'id' => count($investigadores) + 1,
            'nombre' => $request->nombre,
            'especialidad' => $request->especialidad,
            'facultad' => $request->facultad,
            'email' => $request->email,
            'proyectos' => (int) $request->proyectos,
            'publicaciones' => (int) $request->publicaciones,
            'imagen' => $request->imagen
        ];

        $investigadores[] = $newInvestigador;
        session(['investigadores' => $investigadores]);

        return redirect()->route('admin.investigacion.investigadores.index')
            ->with('success', 'Investigador agregado exitosamente');
    }

    public function investigadoresEdit($id)
    {
        $investigadores = session('investigadores', $this->getDefaultInvestigadores());
        $investigador = collect($investigadores)->firstWhere('id', (int) $id);

        if (!$investigador) {
            return redirect()->route('admin.investigacion.investigadores.index')
                ->with('error', 'Investigador no encontrado');
        }

        return view('admin.investigacion.investigadores.edit', compact('investigador'));
    }

    public function investigadoresUpdate(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string',
            'facultad' => 'required|string',
            'email' => 'required|email',
            'proyectos' => 'required|integer|min:0',
            'publicaciones' => 'required|integer|min:0',
            'imagen' => 'required|url'
        ]);

        $investigadores = session('investigadores', $this->getDefaultInvestigadores());

        foreach ($investigadores as $key => $investigador) {
            if ($investigador['id'] == $id) {
                $investigadores[$key] = [
                    'id' => (int) $id,
                    'nombre' => $request->nombre,
                    'especialidad' => $request->especialidad,
                    'facultad' => $request->facultad,
                    'email' => $request->email,
                    'proyectos' => (int) $request->proyectos,
                    'publicaciones' => (int) $request->publicaciones,
                    'imagen' => $request->imagen
                ];
                break;
            }
        }

        session(['investigadores' => $investigadores]);

        return redirect()->route('admin.investigacion.investigadores.index')
            ->with('success', 'Investigador actualizado exitosamente');
    }

    public function investigadoresDestroy($id)
    {
        $investigadores = session('investigadores', $this->getDefaultInvestigadores());
        $investigadores = array_filter($investigadores, function($investigador) use ($id) {
            return $investigador['id'] != $id;
        });

        session(['investigadores' => array_values($investigadores)]);

        return redirect()->route('admin.investigacion.investigadores.index')
            ->with('success', 'Investigador eliminado exitosamente');
    }

    // ==================== PUBLICACIONES ====================

    public function publicacionesIndex()
    {
        $publicaciones = session('publicaciones', $this->getDefaultPublicaciones());
        return view('admin.investigacion.publicaciones.index', compact('publicaciones'));
    }

    public function publicacionesCreate()
    {
        return view('admin.investigacion.publicaciones.create');
    }

    public function publicacionesStore(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'autores' => 'required|string',
            'revista' => 'required|string',
            'año' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'doi' => 'required|string',
            'tipo' => 'required|string'
        ]);

        $publicaciones = session('publicaciones', $this->getDefaultPublicaciones());

        $newPublicacion = [
            'id' => count($publicaciones) + 1,
            'titulo' => $request->titulo,
            'autores' => $request->autores,
            'revista' => $request->revista,
            'año' => (int) $request->año,
            'doi' => $request->doi,
            'tipo' => $request->tipo
        ];

        $publicaciones[] = $newPublicacion;
        session(['publicaciones' => $publicaciones]);

        return redirect()->route('admin.investigacion.publicaciones.index')
            ->with('success', 'Publicación agregada exitosamente');
    }

    public function publicacionesEdit($id)
    {
        $publicaciones = session('publicaciones', $this->getDefaultPublicaciones());
        $publicacion = collect($publicaciones)->firstWhere('id', (int) $id);

        if (!$publicacion) {
            return redirect()->route('admin.investigacion.publicaciones.index')
                ->with('error', 'Publicación no encontrada');
        }

        return view('admin.investigacion.publicaciones.edit', compact('publicacion'));
    }

    public function publicacionesUpdate(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string',
            'autores' => 'required|string',
            'revista' => 'required|string',
            'año' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'doi' => 'required|string',
            'tipo' => 'required|string'
        ]);

        $publicaciones = session('publicaciones', $this->getDefaultPublicaciones());

        foreach ($publicaciones as $key => $publicacion) {
            if ($publicacion['id'] == $id) {
                $publicaciones[$key] = [
                    'id' => (int) $id,
                    'titulo' => $request->titulo,
                    'autores' => $request->autores,
                    'revista' => $request->revista,
                    'año' => (int) $request->año,
                    'doi' => $request->doi,
                    'tipo' => $request->tipo
                ];
                break;
            }
        }

        session(['publicaciones' => $publicaciones]);

        return redirect()->route('admin.investigacion.publicaciones.index')
            ->with('success', 'Publicación actualizada exitosamente');
    }

    public function publicacionesDestroy($id)
    {
        $publicaciones = session('publicaciones', $this->getDefaultPublicaciones());
        $publicaciones = array_filter($publicaciones, function($publicacion) use ($id) {
            return $publicacion['id'] != $id;
        });

        session(['publicaciones' => array_values($publicaciones)]);

        return redirect()->route('admin.investigacion.publicaciones.index')
            ->with('success', 'Publicación eliminada exitosamente');
    }

    // ==================== GRUPOS DE INVESTIGACIÓN ====================

    public function gruposIndex()
    {
        $grupos = session('grupos_investigacion', $this->getDefaultGrupos());
        return view('admin.investigacion.grupos.index', compact('grupos'));
    }

    public function gruposCreate()
    {
        return view('admin.investigacion.grupos.create');
    }

    public function gruposStore(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'acronimo' => 'required|string|max:50',
            'lider' => 'required|string',
            'miembros' => 'required|integer|min:1',
            'descripcion' => 'required|string',
            'lineas' => 'required|string',
            'categoria' => 'required|string'
        ]);

        $grupos = session('grupos_investigacion', $this->getDefaultGrupos());

        $newGrupo = [
            'id' => count($grupos) + 1,
            'nombre' => $request->nombre,
            'acronimo' => $request->acronimo,
            'lider' => $request->lider,
            'miembros' => (int) $request->miembros,
            'descripcion' => $request->descripcion,
            'lineas' => array_map('trim', explode("\n", $request->lineas)),
            'categoria' => $request->categoria
        ];

        $grupos[] = $newGrupo;
        session(['grupos_investigacion' => $grupos]);

        return redirect()->route('admin.investigacion.grupos.index')
            ->with('success', 'Grupo de investigación creado exitosamente');
    }

    public function gruposEdit($id)
    {
        $grupos = session('grupos_investigacion', $this->getDefaultGrupos());
        $grupo = collect($grupos)->firstWhere('id', (int) $id);

        if (!$grupo) {
            return redirect()->route('admin.investigacion.grupos.index')
                ->with('error', 'Grupo no encontrado');
        }

        return view('admin.investigacion.grupos.edit', compact('grupo'));
    }

    public function gruposUpdate(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'acronimo' => 'required|string|max:50',
            'lider' => 'required|string',
            'miembros' => 'required|integer|min:1',
            'descripcion' => 'required|string',
            'lineas' => 'required|string',
            'categoria' => 'required|string'
        ]);

        $grupos = session('grupos_investigacion', $this->getDefaultGrupos());

        foreach ($grupos as $key => $grupo) {
            if ($grupo['id'] == $id) {
                $grupos[$key] = [
                    'id' => (int) $id,
                    'nombre' => $request->nombre,
                    'acronimo' => $request->acronimo,
                    'lider' => $request->lider,
                    'miembros' => (int) $request->miembros,
                    'descripcion' => $request->descripcion,
                    'lineas' => array_map('trim', explode("\n", $request->lineas)),
                    'categoria' => $request->categoria
                ];
                break;
            }
        }

        session(['grupos_investigacion' => $grupos]);

        return redirect()->route('admin.investigacion.grupos.index')
            ->with('success', 'Grupo actualizado exitosamente');
    }

    public function gruposDestroy($id)
    {
        $grupos = session('grupos_investigacion', $this->getDefaultGrupos());
        $grupos = array_filter($grupos, function($grupo) use ($id) {
            return $grupo['id'] != $id;
        });

        session(['grupos_investigacion' => array_values($grupos)]);

        return redirect()->route('admin.investigacion.grupos.index')
            ->with('success', 'Grupo eliminado exitosamente');
    }

    // ==================== MÉTODOS AUXILIARES ====================

    private function getDefaultLineas()
    {
        return [
            [
                'id' => 1,
                'nombre' => 'Ciencias de la Salud',
                'descripcion' => 'Investigación en medicina, biotecnología y salud pública para mejorar la calidad de vida de la población',
                'icono' => 'fa-heartbeat',
                'color' => 'danger',
                'proyectos_activos' => 24
            ],
            [
                'id' => 2,
                'nombre' => 'Tecnología e Innovación',
                'descripcion' => 'Desarrollo de soluciones tecnológicas, inteligencia artificial y transformación digital',
                'icono' => 'fa-laptop-code',
                'color' => 'primary',
                'proyectos_activos' => 18
            ]
        ];
    }

    private function getDefaultProyectos()
    {
        return [
            [
                'id' => 1,
                'titulo' => 'Desarrollo de Vacunas contra Enfermedades Tropicales',
                'descripcion' => 'Investigación de nuevas vacunas para combatir enfermedades tropicales prevalentes en el Perú',
                'investigador_principal' => 'Dr. Carlos Mendoza García',
                'linea' => 'Ciencias de la Salud',
                'estado' => 'En Desarrollo',
                'financiamiento' => 'S/ 850,000',
                'duracion' => '2023-2026',
                'imagen' => 'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?w=800&h=600&fit=crop',
                'destacado' => true
            ]
        ];
    }

    private function getDefaultInvestigadores()
    {
        return [
            [
                'id' => 1,
                'nombre' => 'Dr. Carlos Mendoza García',
                'especialidad' => 'Inmunología y Vacunas',
                'facultad' => 'Medicina',
                'email' => 'cmendoza@unmsm.edu.pe',
                'proyectos' => 8,
                'publicaciones' => 42,
                'imagen' => 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=400&h=400&fit=crop'
            ]
        ];
    }

    private function getDefaultPublicaciones()
    {
        return [
            [
                'id' => 1,
                'titulo' => 'Novel Approaches in Tropical Disease Vaccination',
                'autores' => 'Mendoza, C., García, R., Silva, L.',
                'revista' => 'International Journal of Tropical Medicine',
                'año' => 2024,
                'doi' => '10.1234/ijtm.2024.001',
                'tipo' => 'Artículo Científico'
            ]
        ];
    }

    private function getDefaultGrupos()
    {
        return [
            [
                'id' => 1,
                'nombre' => 'Grupo de Investigación en Biomedicina',
                'acronimo' => 'GIB-UNMSM',
                'lider' => 'Dr. Carlos Mendoza García',
                'miembros' => 18,
                'descripcion' => 'Investigación aplicada en biomedicina y desarrollo de terapias innovadoras',
                'lineas' => ['Inmunología', 'Genética', 'Farmacología'],
                'categoria' => 'Consolidado'
            ]
        ];
    }
}
