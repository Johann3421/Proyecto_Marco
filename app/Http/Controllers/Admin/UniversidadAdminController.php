<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UniversidadAdminController extends Controller
{
    // ==================== EVENTOS HISTÓRICOS ====================

    public function historiaIndex()
    {
        // Por ahora usamos datos de sesión, más adelante se conectará a BD
        $eventos = session('eventos_historicos', $this->getDefaultEventos());

        return view('admin.universidad.historia.index', compact('eventos'));
    }

    public function historiaCreate()
    {
        return view('admin.universidad.historia.create');
    }

    public function historiaStore(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|url'
        ]);

        $eventos = session('eventos_historicos', $this->getDefaultEventos());
        $validated['id'] = count($eventos) + 1;
        $eventos[] = $validated;

        session(['eventos_historicos' => $eventos]);

        return redirect()->route('admin.universidad.historia.index')
            ->with('success', 'Evento histórico creado exitosamente');
    }

    public function historiaEdit($id)
    {
        $eventos = session('eventos_historicos', $this->getDefaultEventos());
        $evento = collect($eventos)->firstWhere('id', $id);

        if (!$evento) {
            return redirect()->route('admin.universidad.historia.index')
                ->with('error', 'Evento no encontrado');
        }

        return view('admin.universidad.historia.edit', compact('evento'));
    }

    public function historiaUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|url'
        ]);

        $eventos = session('eventos_historicos', $this->getDefaultEventos());
        $key = collect($eventos)->search(fn($e) => $e['id'] == $id);

        if ($key !== false) {
            $eventos[$key] = array_merge($eventos[$key], $validated);
            session(['eventos_historicos' => $eventos]);

            return redirect()->route('admin.universidad.historia.index')
                ->with('success', 'Evento actualizado exitosamente');
        }

        return redirect()->route('admin.universidad.historia.index')
            ->with('error', 'Evento no encontrado');
    }

    public function historiaDestroy($id)
    {
        $eventos = session('eventos_historicos', $this->getDefaultEventos());
        $eventos = collect($eventos)->reject(fn($e) => $e['id'] == $id)->values()->all();

        session(['eventos_historicos' => $eventos]);

        return redirect()->route('admin.universidad.historia.index')
            ->with('success', 'Evento eliminado exitosamente');
    }

    // ==================== AUTORIDADES ====================

    public function autoridadesIndex()
    {
        $autoridades = session('autoridades', $this->getDefaultAutoridades());

        return view('admin.universidad.autoridades.index', compact('autoridades'));
    }

    public function autoridadesCreate()
    {
        return view('admin.universidad.autoridades.create');
    }

    public function autoridadesStore(Request $request)
    {
        $validated = $request->validate([
            'cargo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'periodo' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'image' => 'required|url'
        ]);

        $autoridades = session('autoridades', $this->getDefaultAutoridades());
        $validated['id'] = count($autoridades) + 1;
        $autoridades[] = $validated;

        session(['autoridades' => $autoridades]);

        return redirect()->route('admin.universidad.autoridades.index')
            ->with('success', 'Autoridad creada exitosamente');
    }

    public function autoridadesEdit($id)
    {
        $autoridades = session('autoridades', $this->getDefaultAutoridades());
        $autoridad = collect($autoridades)->firstWhere('id', $id);

        if (!$autoridad) {
            return redirect()->route('admin.universidad.autoridades.index')
                ->with('error', 'Autoridad no encontrada');
        }

        return view('admin.universidad.autoridades.edit', compact('autoridad'));
    }

    public function autoridadesUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'cargo' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'periodo' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'image' => 'required|url'
        ]);

        $autoridades = session('autoridades', $this->getDefaultAutoridades());
        $key = collect($autoridades)->search(fn($a) => $a['id'] == $id);

        if ($key !== false) {
            $autoridades[$key] = array_merge($autoridades[$key], $validated);
            session(['autoridades' => $autoridades]);

            return redirect()->route('admin.universidad.autoridades.index')
                ->with('success', 'Autoridad actualizada exitosamente');
        }

        return redirect()->route('admin.universidad.autoridades.index')
            ->with('error', 'Autoridad no encontrada');
    }

    public function autoridadesDestroy($id)
    {
        $autoridades = session('autoridades', $this->getDefaultAutoridades());
        $autoridades = collect($autoridades)->reject(fn($a) => $a['id'] == $id)->values()->all();

        session(['autoridades' => $autoridades]);

        return redirect()->route('admin.universidad.autoridades.index')
            ->with('success', 'Autoridad eliminada exitosamente');
    }

    // ==================== MISIÓN Y VISIÓN ====================

    public function misionVision()
    {
        $data = session('mision_vision', [
            'mision' => 'Somos la universidad pública y autónoma del Perú, generadora y difusora del conocimiento científico, tecnológico y humanístico; comprometida con el desarrollo sostenible del país y la responsabilidad social.',
            'vision' => 'Universidad del Perú, referente nacional e internacional en educación de calidad; basada en investigación humanística, científica y tecnológica, con valores; comprometida con las transformaciones de la sociedad.'
        ]);

        return view('admin.universidad.mision-vision', $data);
    }

    public function misionVisionUpdate(Request $request)
    {
        $validated = $request->validate([
            'mision' => 'required|string',
            'vision' => 'required|string'
        ]);

        session(['mision_vision' => $validated]);

        return redirect()->route('admin.universidad.mision-vision')
            ->with('success', 'Misión y Visión actualizadas exitosamente');
    }

    // ==================== DATOS POR DEFECTO ====================

    private function getDefaultEventos()
    {
        return [
            [
                'id' => 1,
                'year' => '1551',
                'title' => 'Fundación de la Universidad',
                'description' => 'El 12 de mayo de 1551, mediante Real Cédula firmada por Carlos V, se funda la Universidad Nacional Mayor de San Marcos.',
                'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=800&h=600&fit=crop&auto=format'
            ],
            [
                'id' => 2,
                'year' => '1571',
                'title' => 'Primera Cátedra de Medicina',
                'description' => 'Se establece la primera cátedra de Medicina en América, marcando el inicio de la enseñanza médica en el continente.',
                'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&h=600&fit=crop&auto=format'
            ],
            [
                'id' => 3,
                'year' => '1876',
                'title' => 'Autonomía Universitaria',
                'description' => 'La universidad obtiene su autonomía, convirtiéndose en un referente de libertad académica en América Latina.',
                'image' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800&h=600&fit=crop&auto=format'
            ],
            [
                'id' => 4,
                'year' => '1946',
                'title' => 'Ciudad Universitaria',
                'description' => 'Se inicia la construcción de la Ciudad Universitaria en terrenos donados por el Estado peruano.',
                'image' => 'https://images.unsplash.com/photo-1562774053-701939374585?w=800&h=600&fit=crop&auto=format'
            ],
            [
                'id' => 5,
                'year' => '2009',
                'title' => 'Acreditación Internacional',
                'description' => 'Diversas carreras logran acreditación internacional, consolidando la excelencia académica de San Marcos.',
                'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&h=600&fit=crop&auto=format'
            ]
        ];
    }

    private function getDefaultAutoridades()
    {
        return [
            [
                'id' => 1,
                'cargo' => 'Rector',
                'nombre' => 'Dr. Jerí Ramón Ruffner',
                'periodo' => '2021-2026',
                'email' => 'rector@unmsm.edu.pe',
                'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop&auto=format'
            ],
            [
                'id' => 2,
                'cargo' => 'Vicerrector Académico',
                'nombre' => 'Dr. Juan Carlos García',
                'periodo' => '2021-2026',
                'email' => 'viceacademico@unmsm.edu.pe',
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop&auto=format'
            ],
            [
                'id' => 3,
                'cargo' => 'Vicerrector de Investigación',
                'nombre' => 'Dr. Pedro Ataucusi García',
                'periodo' => '2021-2026',
                'email' => 'viceinvestigacion@unmsm.edu.pe',
                'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=400&fit=crop&auto=format'
            ]
        ];
    }
}
