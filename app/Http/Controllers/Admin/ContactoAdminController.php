<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactoAdminController extends Controller
{
    public function index(Request $request)
    {
        $mensajes = session('mensajes_contacto', []);

        // Filtrar por estado si se proporciona
        $estado = $request->get('estado');
        if ($estado) {
            $mensajes = array_filter($mensajes, function($mensaje) use ($estado) {
                return $mensaje['estado'] === $estado;
            });
        }

        // Filtrar por tipo de consulta
        $tipo = $request->get('tipo');
        if ($tipo) {
            $mensajes = array_filter($mensajes, function($mensaje) use ($tipo) {
                return $mensaje['tipo_consulta'] === $tipo;
            });
        }

        // Ordenar por fecha descendente (más recientes primero)
        usort($mensajes, function($a, $b) {
            return strtotime($b['fecha']) - strtotime($a['fecha']);
        });

        $estadisticas = $this->getEstadisticas($mensajes);

        return view('admin.contacto.index', compact('mensajes', 'estadisticas', 'estado', 'tipo'));
    }

    public function show($id)
    {
        $mensajes = session('mensajes_contacto', []);

        if (!isset($mensajes[$id])) {
            return redirect()->route('admin.contacto.index')
                ->with('error', 'Mensaje no encontrado');
        }

        $mensaje = $mensajes[$id];

        // Marcar como leído
        if (!$mensaje['leido']) {
            $mensajes[$id]['leido'] = true;
            session(['mensajes_contacto' => $mensajes]);
        }

        return view('admin.contacto.show', compact('mensaje', 'id'));
    }

    public function updateEstado(Request $request, $id)
    {
        $validated = $request->validate([
            'estado' => 'required|in:Nuevo,En Proceso,Resuelto,Archivado'
        ]);

        $mensajes = session('mensajes_contacto', []);

        if (!isset($mensajes[$id])) {
            return redirect()->route('admin.contacto.index')
                ->with('error', 'Mensaje no encontrado');
        }

        $mensajes[$id]['estado'] = $validated['estado'];
        session(['mensajes_contacto' => $mensajes]);

        return redirect()->route('admin.contacto.show', $id)
            ->with('success', 'Estado actualizado correctamente');
    }

    public function destroy($id)
    {
        $mensajes = session('mensajes_contacto', []);

        if (isset($mensajes[$id])) {
            unset($mensajes[$id]);
            $mensajes = array_values($mensajes);
            session(['mensajes_contacto' => $mensajes]);

            return redirect()->route('admin.contacto.index')
                ->with('success', 'Mensaje eliminado exitosamente');
        }

        return redirect()->route('admin.contacto.index')
            ->with('error', 'Mensaje no encontrado');
    }

    public function marcarLeido($id)
    {
        $mensajes = session('mensajes_contacto', []);

        if (isset($mensajes[$id])) {
            $mensajes[$id]['leido'] = true;
            session(['mensajes_contacto' => $mensajes]);

            return redirect()->back()
                ->with('success', 'Mensaje marcado como leído');
        }

        return redirect()->back()
            ->with('error', 'Mensaje no encontrado');
    }

    private function getEstadisticas($mensajes)
    {
        $total = count($mensajes);
        $nuevos = count(array_filter($mensajes, fn($m) => $m['estado'] === 'Nuevo'));
        $enProceso = count(array_filter($mensajes, fn($m) => $m['estado'] === 'En Proceso'));
        $resueltos = count(array_filter($mensajes, fn($m) => $m['estado'] === 'Resuelto'));
        $noLeidos = count(array_filter($mensajes, fn($m) => !$m['leido']));

        return [
            'total' => $total,
            'nuevos' => $nuevos,
            'en_proceso' => $enProceso,
            'resueltos' => $resueltos,
            'no_leidos' => $noLeidos
        ];
    }
}
