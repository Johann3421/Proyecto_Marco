<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmisionAdminController extends Controller
{
    // ==================== MODALIDADES ====================

    public function modalidadesIndex()
    {
        $modalidades = session('modalidades', $this->getDefaultModalidades());
        return view('admin.admision.modalidades.index', compact('modalidades'));
    }

    public function modalidadesCreate()
    {
        return view('admin.admision.modalidades.create');
    }

    public function modalidadesStore(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'vacantes' => 'required|string',
            'fecha_examen' => 'required|string',
            'color' => 'required|string',
            'requisitos' => 'required|string'
        ]);

        $modalidades = session('modalidades', $this->getDefaultModalidades());

        $newModalidad = [
            'id' => count($modalidades) + 1,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'vacantes' => $request->vacantes,
            'fecha_examen' => $request->fecha_examen,
            'color' => $request->color,
            'requisitos' => array_map('trim', explode("\n", $request->requisitos))
        ];

        $modalidades[] = $newModalidad;
        session(['modalidades' => $modalidades]);

        return redirect()->route('admin.admision.modalidades.index')
            ->with('success', 'Modalidad de ingreso creada exitosamente');
    }

    public function modalidadesEdit($id)
    {
        $modalidades = session('modalidades', $this->getDefaultModalidades());
        $modalidad = collect($modalidades)->firstWhere('id', (int) $id);

        if (!$modalidad) {
            return redirect()->route('admin.admision.modalidades.index')
                ->with('error', 'Modalidad no encontrada');
        }

        return view('admin.admision.modalidades.edit', compact('modalidad'));
    }

    public function modalidadesUpdate(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'vacantes' => 'required|string',
            'fecha_examen' => 'required|string',
            'color' => 'required|string',
            'requisitos' => 'required|string'
        ]);

        $modalidades = session('modalidades', $this->getDefaultModalidades());

        foreach ($modalidades as $key => $modalidad) {
            if ($modalidad['id'] == $id) {
                $modalidades[$key] = [
                    'id' => (int) $id,
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'vacantes' => $request->vacantes,
                    'fecha_examen' => $request->fecha_examen,
                    'color' => $request->color,
                    'requisitos' => array_map('trim', explode("\n", $request->requisitos))
                ];
                break;
            }
        }

        session(['modalidades' => $modalidades]);

        return redirect()->route('admin.admision.modalidades.index')
            ->with('success', 'Modalidad actualizada exitosamente');
    }

    public function modalidadesDestroy($id)
    {
        $modalidades = session('modalidades', $this->getDefaultModalidades());
        $modalidades = array_filter($modalidades, function($modalidad) use ($id) {
            return $modalidad['id'] != $id;
        });

        session(['modalidades' => array_values($modalidades)]);

        return redirect()->route('admin.admision.modalidades.index')
            ->with('success', 'Modalidad eliminada exitosamente');
    }

    // ==================== CALENDARIO ====================

    public function calendarioIndex()
    {
        $eventos = session('calendario_eventos', $this->getDefaultCalendario());
        return view('admin.admision.calendario.index', compact('eventos'));
    }

    public function calendarioCreate()
    {
        return view('admin.admision.calendario.create');
    }

    public function calendarioStore(Request $request)
    {
        $request->validate([
            'mes' => 'required|string',
            'evento' => 'required|string',
            'fecha' => 'required|string',
            'icono' => 'required|string',
            'destacado' => 'boolean'
        ]);

        $eventos = session('calendario_eventos', $this->getDefaultCalendario());

        $newEvento = [
            'id' => count($eventos) + 1,
            'mes' => $request->mes,
            'evento' => $request->evento,
            'fecha' => $request->fecha,
            'icono' => $request->icono,
            'destacado' => $request->has('destacado')
        ];

        $eventos[] = $newEvento;
        session(['calendario_eventos' => $eventos]);

        return redirect()->route('admin.admision.calendario.index')
            ->with('success', 'Evento agregado al calendario exitosamente');
    }

    public function calendarioEdit($id)
    {
        $eventos = session('calendario_eventos', $this->getDefaultCalendario());
        $evento = collect($eventos)->firstWhere('id', (int) $id);

        if (!$evento) {
            return redirect()->route('admin.admision.calendario.index')
                ->with('error', 'Evento no encontrado');
        }

        return view('admin.admision.calendario.edit', compact('evento'));
    }

    public function calendarioUpdate(Request $request, $id)
    {
        $request->validate([
            'mes' => 'required|string',
            'evento' => 'required|string',
            'fecha' => 'required|string',
            'icono' => 'required|string',
            'destacado' => 'boolean'
        ]);

        $eventos = session('calendario_eventos', $this->getDefaultCalendario());

        foreach ($eventos as $key => $evento) {
            if ($evento['id'] == $id) {
                $eventos[$key] = [
                    'id' => (int) $id,
                    'mes' => $request->mes,
                    'evento' => $request->evento,
                    'fecha' => $request->fecha,
                    'icono' => $request->icono,
                    'destacado' => $request->has('destacado')
                ];
                break;
            }
        }

        session(['calendario_eventos' => $eventos]);

        return redirect()->route('admin.admision.calendario.index')
            ->with('success', 'Evento actualizado exitosamente');
    }

    public function calendarioDestroy($id)
    {
        $eventos = session('calendario_eventos', $this->getDefaultCalendario());
        $eventos = array_filter($eventos, function($evento) use ($id) {
            return $evento['id'] != $id;
        });

        session(['calendario_eventos' => array_values($eventos)]);

        return redirect()->route('admin.admision.calendario.index')
            ->with('success', 'Evento eliminado exitosamente');
    }

    // ==================== FAQS ====================

    public function faqsIndex()
    {
        $faqs = session('admision_faqs', $this->getDefaultFaqs());
        return view('admin.admision.faqs.index', compact('faqs'));
    }

    public function faqsCreate()
    {
        return view('admin.admision.faqs.create');
    }

    public function faqsStore(Request $request)
    {
        $request->validate([
            'pregunta' => 'required|string',
            'respuesta' => 'required|string'
        ]);

        $faqs = session('admision_faqs', $this->getDefaultFaqs());

        $newFaq = [
            'id' => count($faqs) + 1,
            'pregunta' => $request->pregunta,
            'respuesta' => $request->respuesta
        ];

        $faqs[] = $newFaq;
        session(['admision_faqs' => $faqs]);

        return redirect()->route('admin.admision.faqs.index')
            ->with('success', 'Pregunta frecuente agregada exitosamente');
    }

    public function faqsEdit($id)
    {
        $faqs = session('admision_faqs', $this->getDefaultFaqs());
        $faq = collect($faqs)->firstWhere('id', (int) $id);

        if (!$faq) {
            return redirect()->route('admin.admision.faqs.index')
                ->with('error', 'Pregunta no encontrada');
        }

        return view('admin.admision.faqs.edit', compact('faq'));
    }

    public function faqsUpdate(Request $request, $id)
    {
        $request->validate([
            'pregunta' => 'required|string',
            'respuesta' => 'required|string'
        ]);

        $faqs = session('admision_faqs', $this->getDefaultFaqs());

        foreach ($faqs as $key => $faq) {
            if ($faq['id'] == $id) {
                $faqs[$key] = [
                    'id' => (int) $id,
                    'pregunta' => $request->pregunta,
                    'respuesta' => $request->respuesta
                ];
                break;
            }
        }

        session(['admision_faqs' => $faqs]);

        return redirect()->route('admin.admision.faqs.index')
            ->with('success', 'Pregunta actualizada exitosamente');
    }

    public function faqsDestroy($id)
    {
        $faqs = session('admision_faqs', $this->getDefaultFaqs());
        $faqs = array_filter($faqs, function($faq) use ($id) {
            return $faq['id'] != $id;
        });

        session(['admision_faqs' => array_values($faqs)]);

        return redirect()->route('admin.admision.faqs.index')
            ->with('success', 'Pregunta eliminada exitosamente');
    }

    // ==================== PROCESO ====================

    public function procesoIndex()
    {
        $pasos = session('proceso_admision', $this->getDefaultProceso());
        return view('admin.admision.proceso.index', compact('pasos'));
    }

    public function procesoEdit($id)
    {
        $pasos = session('proceso_admision', $this->getDefaultProceso());
        $paso = collect($pasos)->firstWhere('numero', (string) $id);

        if (!$paso) {
            return redirect()->route('admin.admision.proceso.index')
                ->with('error', 'Paso no encontrado');
        }

        return view('admin.admision.proceso.edit', compact('paso'));
    }

    public function procesoUpdate(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'icono' => 'required|string',
            'color' => 'required|string'
        ]);

        $pasos = session('proceso_admision', $this->getDefaultProceso());

        foreach ($pasos as $key => $paso) {
            if ($paso['numero'] == $id) {
                $pasos[$key] = [
                    'numero' => (string) $id,
                    'titulo' => $request->titulo,
                    'descripcion' => $request->descripcion,
                    'icono' => $request->icono,
                    'color' => $request->color
                ];
                break;
            }
        }

        session(['proceso_admision' => $pasos]);

        return redirect()->route('admin.admision.proceso.index')
            ->with('success', 'Paso actualizado exitosamente');
    }

    // ==================== MÉTODOS AUXILIARES ====================

    private function getDefaultModalidades()
    {
        return [
            [
                'id' => 1,
                'nombre' => 'Ordinario',
                'descripcion' => 'Modalidad principal de ingreso mediante examen de conocimientos',
                'requisitos' => [
                    'Haber culminado estudios secundarios',
                    'Certificado de estudios original',
                    'Partida de nacimiento original',
                    'DNI vigente',
                    'Fotografía actualizada'
                ],
                'vacantes' => '5,000',
                'fecha_examen' => 'Marzo 2024',
                'color' => 'primary'
            ],
            [
                'id' => 2,
                'nombre' => 'Centro Pre Universitario',
                'descripcion' => 'Ingreso directo para alumnos del CEPREUNMSM con notas aprobatorias',
                'requisitos' => [
                    'Certificado de estudios del CEPREUNMSM',
                    'Promedio mínimo aprobatorio según reglamento',
                    'Certificado de estudios secundarios',
                    'DNI vigente',
                    'Constancia de no adeudo'
                ],
                'vacantes' => '2,500',
                'fecha_examen' => 'Según ciclo',
                'color' => 'success'
            ]
        ];
    }

    private function getDefaultCalendario()
    {
        return [
            [
                'id' => 1,
                'mes' => 'Enero',
                'evento' => 'Inicio de inscripciones - Proceso Ordinario',
                'fecha' => '15 de Enero',
                'icono' => 'fa-calendar-plus',
                'destacado' => true
            ],
            [
                'id' => 2,
                'mes' => 'Febrero',
                'evento' => 'Cierre de inscripciones - Proceso Ordinario',
                'fecha' => '28 de Febrero',
                'icono' => 'fa-calendar-times',
                'destacado' => false
            ],
            [
                'id' => 3,
                'mes' => 'Marzo',
                'evento' => 'Examen de Admisión - Proceso Ordinario',
                'fecha' => '15 de Marzo',
                'icono' => 'fa-pencil-alt',
                'destacado' => true
            ]
        ];
    }

    private function getDefaultFaqs()
    {
        return [
            [
                'id' => 1,
                'pregunta' => '¿Cuánto cuesta el examen de admisión?',
                'respuesta' => 'El costo del prospecto de admisión es de S/ 450.00 (cuatrocientos cincuenta soles). Este monto incluye el derecho a rendir el examen de admisión, el prospecto de admisión digital y acceso a material de preparación.'
            ],
            [
                'id' => 2,
                'pregunta' => '¿Cuántas veces puedo postular a San Marcos?',
                'respuesta' => 'No existe límite de postulaciones. Puedes presentarte a todos los procesos de admisión que desees hasta lograr tu ingreso. Cada proceso de admisión es independiente.'
            ]
        ];
    }

    private function getDefaultProceso()
    {
        return [
            [
                'numero' => '1',
                'titulo' => 'Inscripción',
                'descripcion' => 'Regístrate en línea y completa tus datos personales. Obtén tu código de postulante.',
                'icono' => 'fa-user-plus',
                'color' => 'primary'
            ],
            [
                'numero' => '2',
                'titulo' => 'Pago de Derecho',
                'descripcion' => 'Realiza el pago en los bancos autorizados o mediante banca electrónica.',
                'icono' => 'fa-credit-card',
                'color' => 'success'
            ],
            [
                'numero' => '3',
                'titulo' => 'Documentos',
                'descripcion' => 'Sube tus documentos escaneados y foto actualizada en formato digital.',
                'icono' => 'fa-file-upload',
                'color' => 'info'
            ],
            [
                'numero' => '4',
                'titulo' => 'Preparación',
                'descripcion' => 'Descarga el prospecto de admisión y prepárate para el examen.',
                'icono' => 'fa-book-reader',
                'color' => 'warning'
            ],
            [
                'numero' => '5',
                'titulo' => 'Examen',
                'descripcion' => 'Presenta el examen de admisión en la fecha programada.',
                'icono' => 'fa-edit',
                'color' => 'danger'
            ],
            [
                'numero' => '6',
                'titulo' => 'Resultados',
                'descripcion' => 'Consulta los resultados en línea y conoce tu plaza alcanzada.',
                'icono' => 'fa-trophy',
                'color' => 'dark'
            ]
        ];
    }
}
