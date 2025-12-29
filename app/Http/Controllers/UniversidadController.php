<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UniversidadController extends Controller
{
    public function historia()
    {
        $data = [
            'title' => 'Historia de la UNMSM',
            'eventos' => [
                [
                    'year' => '1551',
                    'title' => 'Fundación de la Universidad',
                    'description' => 'El 12 de mayo de 1551, mediante Real Cédula firmada por Carlos V, se funda la Universidad Nacional Mayor de San Marcos, primera universidad de América.',
                    'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=800&h=600&fit=crop&auto=format'
                ],
                [
                    'year' => '1571',
                    'title' => 'Primera Cátedra de Medicina',
                    'description' => 'Se establece la primera cátedra de Medicina en América, marcando el inicio de la enseñanza médica en el continente.',
                    'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&h=600&fit=crop&auto=format'
                ],
                [
                    'year' => '1876',
                    'title' => 'Autonomía Universitaria',
                    'description' => 'La universidad obtiene su autonomía, convirtiéndose en un referente de libertad académica en América Latina.',
                    'image' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800&h=600&fit=crop&auto=format'
                ],
                [
                    'year' => '1946',
                    'title' => 'Ciudad Universitaria',
                    'description' => 'Se inicia la construcción de la Ciudad Universitaria en terrenos donados por el Estado peruano.',
                    'image' => 'https://images.unsplash.com/photo-1562774053-701939374585?w=800&h=600&fit=crop&auto=format'
                ],
                [
                    'year' => '2009',
                    'title' => 'Acreditación Internacional',
                    'description' => 'Diversas carreras logran acreditación internacional, consolidando la excelencia académica de San Marcos.',
                    'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&h=600&fit=crop&auto=format'
                ]
            ]
        ];

        return view('universidad.historia', $data);
    }

    public function autoridades()
    {
        $data = [
            'title' => 'Autoridades Universitarias',
            'autoridades' => [
                [
                    'cargo' => 'Rector',
                    'nombre' => 'Dr. Jerí Ramón Ruffner',
                    'periodo' => '2021-2026',
                    'email' => 'rector@unmsm.edu.pe',
                    'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop&auto=format'
                ],
                [
                    'cargo' => 'Vicerrector Académico',
                    'nombre' => 'Dr. Juan Carlos García',
                    'periodo' => '2021-2026',
                    'email' => 'viceacademico@unmsm.edu.pe',
                    'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop&auto=format'
                ],
                [
                    'cargo' => 'Vicerrector de Investigación',
                    'nombre' => 'Dr. Pedro Ataucusi García',
                    'periodo' => '2021-2026',
                    'email' => 'viceinvestigacion@unmsm.edu.pe',
                    'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=400&fit=crop&auto=format'
                ],
                [
                    'cargo' => 'Secretario General',
                    'nombre' => 'Dr. Luis Alberto Rodríguez',
                    'periodo' => '2021-2026',
                    'email' => 'secretaria@unmsm.edu.pe',
                    'image' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&h=400&fit=crop&auto=format'
                ],
                [
                    'cargo' => 'Director General de Administración',
                    'nombre' => 'Mg. María Teresa Solís',
                    'periodo' => '2021-2026',
                    'email' => 'administracion@unmsm.edu.pe',
                    'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&h=400&fit=crop&auto=format'
                ],
                [
                    'cargo' => 'Director de Bienestar Universitario',
                    'nombre' => 'Lic. Carlos Mendoza Valle',
                    'periodo' => '2021-2026',
                    'email' => 'bienestar@unmsm.edu.pe',
                    'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=400&h=400&fit=crop&auto=format'
                ]
            ]
        ];

        return view('universidad.autoridades', $data);
    }

    public function misionVision()
    {
        $data = [
            'title' => 'Misión y Visión',
            'mision' => 'Somos la universidad pública y autónoma del Perú, generadora y difusora del conocimiento científico, tecnológico y humanístico; comprometida con el desarrollo sostenible del país y la responsabilidad social. Brindamos una formación humanista, científica y tecnológica con una clara conciencia de nuestro país como realidad multicultural. Adoptamos el mejoramiento continuo de la calidad académica como forma de vida y una gestión moderna, transparente, eficaz y eficiente al servicio de la sociedad.',
            'vision' => 'Universidad del Perú, referente nacional e internacional en educación de calidad; basada en investigación humanística, científica y tecnológica, con valores; comprometida con las transformaciones de la sociedad.',
            'valores' => [
                [
                    'title' => 'Búsqueda de la verdad',
                    'description' => 'Inspiración para la investigación, enseñanza y difusión de conocimiento basados en principios éticos.',
                    'icon' => 'fa-search'
                ],
                [
                    'title' => 'Calidad académica',
                    'description' => 'Compromiso con la excelencia en la formación profesional y la generación de conocimiento.',
                    'icon' => 'fa-star'
                ],
                [
                    'title' => 'Autonomía',
                    'description' => 'Autodeterminación para cumplir sus fines en el marco de la Constitución y las leyes.',
                    'icon' => 'fa-university'
                ],
                [
                    'title' => 'Libertad de pensamiento',
                    'description' => 'Expresión y cátedra garantizada con sujeción a los principios constitucionales y fines universitarios.',
                    'icon' => 'fa-lightbulb'
                ],
                [
                    'title' => 'Pluralismo',
                    'description' => 'Respeto y valoración de las diferentes corrientes de pensamiento y diversidad cultural.',
                    'icon' => 'fa-users'
                ],
                [
                    'title' => 'Responsabilidad social',
                    'description' => 'Compromiso de la universidad con el desarrollo sostenible del país y el bienestar de la sociedad.',
                    'icon' => 'fa-hands-helping'
                ]
            ]
        ];

        return view('universidad.mision-vision', $data);
    }
}
