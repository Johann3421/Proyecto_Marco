<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmisionController extends Controller
{
    public function index()
    {
        // Obtener datos desde la sesión o usar valores por defecto
        $proceso = session('proceso_admision', $this->getDefaultProceso());
        $modalidades = session('modalidades', $this->getDefaultModalidades());
        $calendario = session('calendario_eventos', $this->getDefaultCalendario());
        $faqs = session('admision_faqs', $this->getDefaultFaqs());

        $data = [
            'title' => 'Admisión',
            'proceso' => $proceso,
            'modalidades' => $modalidades,
            'calendario' => $calendario,
            'faqs' => $faqs
        ];

        return view('admision.index', $data);
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
            ],
            [
                'id' => 3,
                'nombre' => 'Primeros Puestos',
                'descripcion' => 'Ingreso directo para los dos primeros puestos de secundaria',
                'requisitos' => [
                    'Haber ocupado 1° o 2° puesto en educación secundaria',
                    'Certificado de estudios con orden de mérito',
                    'Constancia de primeros puestos',
                    'Partida de nacimiento',
                    'DNI vigente'
                ],
                'vacantes' => '300',
                'fecha_examen' => 'Evaluación de expediente',
                'color' => 'warning'
            ],
            [
                'id' => 4,
                'nombre' => 'Traslado Externo',
                'descripcion' => 'Para estudiantes de otras universidades que desean continuar en San Marcos',
                'requisitos' => [
                    'Certificado de estudios universitarios',
                    'Sílabos de asignaturas aprobadas',
                    'Constancia de no sanción disciplinaria',
                    'Certificado de estudios secundarios',
                    'Haber aprobado mínimo 4 semestres académicos'
                ],
                'vacantes' => '200',
                'fecha_examen' => 'Junio 2024',
                'color' => 'info'
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
            ],
            [
                'id' => 4,
                'mes' => 'Marzo',
                'evento' => 'Publicación de Resultados',
                'fecha' => '20 de Marzo',
                'icono' => 'fa-trophy',
                'destacado' => true
            ],
            [
                'id' => 5,
                'mes' => 'Abril',
                'evento' => 'Matrícula de Ingresantes',
                'fecha' => '1-15 de Abril',
                'icono' => 'fa-user-check',
                'destacado' => false
            ],
            [
                'id' => 6,
                'mes' => 'Junio',
                'evento' => 'Examen de Traslado Externo',
                'fecha' => '10 de Junio',
                'icono' => 'fa-exchange-alt',
                'destacado' => false
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
            ],
            [
                'id' => 3,
                'pregunta' => '¿Puedo cambiar de carrera después de ingresar?',
                'respuesta' => 'Sí, existe el traslado interno que permite cambiar de escuela profesional después de haber aprobado al menos dos semestres académicos y cumplir con los requisitos establecidos en el reglamento.'
            ],
            [
                'id' => 4,
                'pregunta' => '¿Qué puntaje necesito para ingresar?',
                'respuesta' => 'El puntaje mínimo varía según la carrera y el número de postulantes. Se elabora una tabla de méritos y se cubren las vacantes disponibles en orden descendente. Las carreras más competitivas requieren puntajes más altos.'
            ],
            [
                'id' => 5,
                'pregunta' => '¿Dónde puedo prepararme para el examen?',
                'respuesta' => 'San Marcos cuenta con el Centro Preuniversitario (CEPREUNMSM) que ofrece preparación académica de alta calidad. También puedes estudiar de forma independiente con el prospecto de admisión.'
            ],
            [
                'id' => 6,
                'pregunta' => '¿Cuántas preguntas tiene el examen?',
                'respuesta' => 'El examen de admisión consta de 100 preguntas de opción múltiple distribuidas en áreas de Matemática, Comunicación, Ciencias Sociales, Ciencias Naturales y cultura general. La duración es de 3 horas.'
            ],
            [
                'id' => 7,
                'pregunta' => '¿San Marcos ofrece becas?',
                'respuesta' => 'Sí, San Marcos ofrece diversos programas de becas para estudiantes de alto rendimiento académico y/o condición económica vulnerable. Consulta los requisitos en la Oficina de Bienestar Universitario.'
            ],
            [
                'id' => 8,
                'pregunta' => '¿Cuándo inician las clases?',
                'respuesta' => 'Las clases del semestre académico inician generalmente en abril para los ingresantes del proceso ordinario de marzo. Las fechas exactas se publican en el calendario académico oficial.'
            ]
        ];
    }
}
