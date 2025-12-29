<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicoController extends Controller
{
    public function facultades()
    {
        $data = [
            'title' => 'Facultades',
            'facultades' => [
                [
                    'nombre' => 'Medicina Humana',
                    'descripcion' => 'Formación de médicos cirujanos con excelencia académica y compromiso social.',
                    'imagen' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&h=600&fit=crop&auto=format',
                    'carreras' => 5,
                    'estudiantes' => 3200,
                    'color' => 'danger',
                    'icono' => 'fa-heartbeat'
                ],
                [
                    'nombre' => 'Ingeniería de Sistemas e Informática',
                    'descripcion' => 'Profesionales en desarrollo de software, sistemas y tecnologías de información.',
                    'imagen' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&h=600&fit=crop&auto=format',
                    'carreras' => 2,
                    'estudiantes' => 2800,
                    'color' => 'success',
                    'icono' => 'fa-laptop-code'
                ],
                [
                    'nombre' => 'Derecho y Ciencia Política',
                    'descripcion' => 'Formación integral de abogados y científicos políticos con pensamiento crítico.',
                    'imagen' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=800&h=600&fit=crop&auto=format',
                    'carreras' => 2,
                    'estudiantes' => 4500,
                    'color' => 'dark',
                    'icono' => 'fa-balance-scale'
                ],
                [
                    'nombre' => 'Ciencias Económicas',
                    'descripcion' => 'Economistas y profesionales en gestión empresarial de alto nivel.',
                    'imagen' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop&auto=format',
                    'carreras' => 4,
                    'estudiantes' => 3500,
                    'color' => 'warning',
                    'icono' => 'fa-chart-line'
                ],
                [
                    'nombre' => 'Ingeniería Industrial',
                    'descripcion' => 'Profesionales en optimización de procesos industriales y gestión de producción.',
                    'imagen' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&h=600&fit=crop&auto=format',
                    'carreras' => 3,
                    'estudiantes' => 2400,
                    'color' => 'primary',
                    'icono' => 'fa-cogs'
                ],
                [
                    'nombre' => 'Ciencias Sociales',
                    'descripcion' => 'Formación en sociología, antropología, historia y trabajo social.',
                    'imagen' => 'https://images.unsplash.com/photo-1529390079861-591de354faf5?w=800&h=600&fit=crop&auto=format',
                    'carreras' => 6,
                    'estudiantes' => 2100,
                    'color' => 'info',
                    'icono' => 'fa-users'
                ],
                [
                    'nombre' => 'Letras y Ciencias Humanas',
                    'descripcion' => 'Estudios en literatura, filosofía, lingüística y comunicación social.',
                    'imagen' => 'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=800&h=600&fit=crop&auto=format',
                    'carreras' => 8,
                    'estudiantes' => 1800,
                    'color' => 'secondary',
                    'icono' => 'fa-book'
                ],
                [
                    'nombre' => 'Ciencias Biológicas',
                    'descripcion' => 'Investigación y formación en biología, microbiología y genética.',
                    'imagen' => 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=800&h=600&fit=crop&auto=format',
                    'carreras' => 4,
                    'estudiantes' => 1500,
                    'color' => 'success',
                    'icono' => 'fa-microscope'
                ],
                [
                    'nombre' => 'Ciencias Contables',
                    'descripcion' => 'Contadores públicos con visión empresarial y auditoría de alto nivel.',
                    'imagen' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=800&h=600&fit=crop&auto=format',
                    'carreras' => 2,
                    'estudiantes' => 3100,
                    'color' => 'primary',
                    'icono' => 'fa-calculator'
                ]
            ]
        ];

        return view('academico.facultades', $data);
    }

    public function escuelas()
    {
        $data = [
            'title' => 'Escuelas Profesionales',
            'areas' => [
                [
                    'nombre' => 'Ciencias de la Salud',
                    'color' => 'danger',
                    'icono' => 'fa-hospital',
                    'escuelas' => [
                        'Medicina Humana',
                        'Enfermería',
                        'Obstetricia',
                        'Nutrición',
                        'Tecnología Médica'
                    ]
                ],
                [
                    'nombre' => 'Ingenierías',
                    'color' => 'primary',
                    'icono' => 'fa-hard-hat',
                    'escuelas' => [
                        'Ingeniería de Sistemas',
                        'Ingeniería Industrial',
                        'Ingeniería Civil',
                        'Ingeniería Electrónica',
                        'Ingeniería Mecánica de Fluidos',
                        'Ingeniería Geológica'
                    ]
                ],
                [
                    'nombre' => 'Ciencias Sociales y Humanidades',
                    'color' => 'info',
                    'icono' => 'fa-users',
                    'escuelas' => [
                        'Derecho',
                        'Ciencia Política',
                        'Sociología',
                        'Antropología',
                        'Historia',
                        'Filosofía',
                        'Comunicación Social',
                        'Trabajo Social'
                    ]
                ],
                [
                    'nombre' => 'Ciencias Económicas y Empresariales',
                    'color' => 'warning',
                    'icono' => 'fa-briefcase',
                    'escuelas' => [
                        'Economía',
                        'Administración',
                        'Contabilidad',
                        'Gestión Tributaria',
                        'Negocios Internacionales'
                    ]
                ],
                [
                    'nombre' => 'Ciencias Básicas',
                    'color' => 'success',
                    'icono' => 'fa-flask',
                    'escuelas' => [
                        'Matemática',
                        'Física',
                        'Química',
                        'Biología',
                        'Estadística',
                        'Computación Científica'
                    ]
                ],
                [
                    'nombre' => 'Arte y Diseño',
                    'color' => 'secondary',
                    'icono' => 'fa-palette',
                    'escuelas' => [
                        'Arte',
                        'Conservación y Restauración',
                        'Danza',
                        'Música'
                    ]
                ]
            ]
        ];

        return view('academico.escuelas', $data);
    }

    public function posgrado()
    {
        $data = [
            'title' => 'Estudios de Posgrado',
            'maestrias' => [
                [
                    'nombre' => 'Maestría en Medicina con mención en Cardiología',
                    'duracion' => '2 años',
                    'modalidad' => 'Presencial',
                    'creditos' => 72,
                    'imagen' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&h=500&fit=crop&auto=format'
                ],
                [
                    'nombre' => 'Maestría en Ingeniería de Sistemas',
                    'duracion' => '2 años',
                    'modalidad' => 'Semi-presencial',
                    'creditos' => 64,
                    'imagen' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800&h=500&fit=crop&auto=format'
                ],
                [
                    'nombre' => 'Maestría en Derecho con mención en Derecho Civil',
                    'duracion' => '2 años',
                    'modalidad' => 'Presencial',
                    'creditos' => 68,
                    'imagen' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=800&h=500&fit=crop&auto=format'
                ],
                [
                    'nombre' => 'Maestría en Gestión Empresarial',
                    'duracion' => '2 años',
                    'modalidad' => 'Presencial',
                    'creditos' => 60,
                    'imagen' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=800&h=500&fit=crop&auto=format'
                ]
            ],
            'doctorados' => [
                [
                    'nombre' => 'Doctorado en Medicina',
                    'duracion' => '3 años',
                    'modalidad' => 'Presencial',
                    'lineas_investigacion' => ['Enfermedades Infecciosas', 'Medicina Molecular', 'Salud Pública']
                ],
                [
                    'nombre' => 'Doctorado en Ciencias Sociales',
                    'duracion' => '3 años',
                    'modalidad' => 'Presencial',
                    'lineas_investigacion' => ['Sociología Política', 'Estudios Culturales', 'Desarrollo Social']
                ],
                [
                    'nombre' => 'Doctorado en Educación',
                    'duracion' => '3 años',
                    'modalidad' => 'Semi-presencial',
                    'lineas_investigacion' => ['Políticas Educativas', 'Tecnología Educativa', 'Currículo']
                ],
                [
                    'nombre' => 'Doctorado en Ciencias Ambientales',
                    'duracion' => '3 años',
                    'modalidad' => 'Presencial',
                    'lineas_investigacion' => ['Cambio Climático', 'Biodiversidad', 'Gestión Ambiental']
                ]
            ]
        ];

        return view('academico.posgrado', $data);
    }
}
