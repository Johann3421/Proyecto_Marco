<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestigacionController extends Controller
{
    public function index()
    {
        // Obtener datos desde la sesión o usar valores por defecto
        $lineas = session('lineas_investigacion', $this->getDefaultLineas());
        $proyectos = session('proyectos_investigacion', $this->getDefaultProyectos());
        $investigadores = session('investigadores', $this->getDefaultInvestigadores());
        $publicaciones = session('publicaciones', $this->getDefaultPublicaciones());
        $grupos = session('grupos_investigacion', $this->getDefaultGrupos());
        $estadisticas = session('estadisticas_investigacion', $this->getDefaultEstadisticas());

        $data = [
            'title' => 'Investigación',
            'lineas' => $lineas,
            'proyectos' => $proyectos,
            'investigadores' => $investigadores,
            'publicaciones' => $publicaciones,
            'grupos' => $grupos,
            'estadisticas' => $estadisticas
        ];

        return view('investigacion.index', $data);
    }

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
            ],
            [
                'id' => 3,
                'nombre' => 'Ciencias Sociales',
                'descripcion' => 'Estudios sobre desarrollo social, políticas públicas y comportamiento humano',
                'icono' => 'fa-users',
                'color' => 'info',
                'proyectos_activos' => 32
            ],
            [
                'id' => 4,
                'nombre' => 'Medio Ambiente y Sostenibilidad',
                'descripcion' => 'Investigación en cambio climático, conservación ambiental y desarrollo sostenible',
                'icono' => 'fa-leaf',
                'color' => 'success',
                'proyectos_activos' => 21
            ],
            [
                'id' => 5,
                'nombre' => 'Ciencias Básicas',
                'descripcion' => 'Matemáticas, física, química y estudios fundamentales de la naturaleza',
                'icono' => 'fa-atom',
                'color' => 'warning',
                'proyectos_activos' => 15
            ],
            [
                'id' => 6,
                'nombre' => 'Humanidades y Cultura',
                'descripcion' => 'Literatura, historia, filosofía y patrimonio cultural peruano',
                'icono' => 'fa-book',
                'color' => 'secondary',
                'proyectos_activos' => 19
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
            ],
            [
                'id' => 2,
                'titulo' => 'Sistema de IA para Diagnóstico Médico Temprano',
                'descripcion' => 'Desarrollo de algoritmos de inteligencia artificial para detección precoz de enfermedades',
                'investigador_principal' => 'Dra. Ana Vega Robles',
                'linea' => 'Tecnología e Innovación',
                'estado' => 'En Desarrollo',
                'financiamiento' => 'S/ 620,000',
                'duracion' => '2024-2025',
                'imagen' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&h=600&fit=crop',
                'destacado' => true
            ],
            [
                'id' => 3,
                'titulo' => 'Conservación de Ecosistemas Andinos',
                'descripcion' => 'Estudio y preservación de la biodiversidad en los ecosistemas andinos del Perú',
                'investigador_principal' => 'Dr. Roberto Quispe Lazo',
                'linea' => 'Medio Ambiente y Sostenibilidad',
                'estado' => 'En Desarrollo',
                'financiamiento' => 'S/ 730,000',
                'duracion' => '2023-2025',
                'imagen' => 'https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?w=800&h=600&fit=crop',
                'destacado' => true
            ],
            [
                'id' => 4,
                'titulo' => 'Políticas Públicas para la Inclusión Social',
                'descripcion' => 'Análisis de políticas para reducir la desigualdad y promover la inclusión en el Perú',
                'investigador_principal' => 'Dra. María Flores Santos',
                'linea' => 'Ciencias Sociales',
                'estado' => 'Finalizado',
                'financiamiento' => 'S/ 450,000',
                'duracion' => '2022-2024',
                'imagen' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800&h=600&fit=crop',
                'destacado' => false
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
            ],
            [
                'id' => 2,
                'nombre' => 'Dra. Ana Vega Robles',
                'especialidad' => 'Inteligencia Artificial',
                'facultad' => 'Ingeniería de Sistemas',
                'email' => 'avega@unmsm.edu.pe',
                'proyectos' => 12,
                'publicaciones' => 35,
                'imagen' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=400&fit=crop'
            ],
            [
                'id' => 3,
                'nombre' => 'Dr. Roberto Quispe Lazo',
                'especialidad' => 'Ecología y Biodiversidad',
                'facultad' => 'Ciencias Biológicas',
                'email' => 'rquispe@unmsm.edu.pe',
                'proyectos' => 15,
                'publicaciones' => 58,
                'imagen' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop'
            ],
            [
                'id' => 4,
                'nombre' => 'Dra. María Flores Santos',
                'especialidad' => 'Políticas Públicas',
                'facultad' => 'Ciencias Sociales',
                'email' => 'mflores@unmsm.edu.pe',
                'proyectos' => 10,
                'publicaciones' => 47,
                'imagen' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&h=400&fit=crop'
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
            ],
            [
                'id' => 2,
                'titulo' => 'Machine Learning Applications in Early Disease Detection',
                'autores' => 'Vega, A., Romero, P., Torres, M.',
                'revista' => 'Journal of Artificial Intelligence in Medicine',
                'año' => 2024,
                'doi' => '10.5678/jaim.2024.015',
                'tipo' => 'Artículo Científico'
            ],
            [
                'id' => 3,
                'titulo' => 'Biodiversity Conservation in Andean Ecosystems',
                'autores' => 'Quispe, R., Mamani, J., Cruz, S.',
                'revista' => 'Ecological Studies Journal',
                'año' => 2023,
                'doi' => '10.9012/esj.2023.087',
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
            ],
            [
                'id' => 2,
                'nombre' => 'Laboratorio de Inteligencia Computacional',
                'acronimo' => 'LIC-UNMSM',
                'lider' => 'Dra. Ana Vega Robles',
                'miembros' => 15,
                'descripcion' => 'Desarrollo de soluciones basadas en IA y aprendizaje automático',
                'lineas' => ['Machine Learning', 'Deep Learning', 'Computer Vision'],
                'categoria' => 'Consolidado'
            ],
            [
                'id' => 3,
                'nombre' => 'Centro de Estudios Ambientales',
                'acronimo' => 'CEA-UNMSM',
                'lider' => 'Dr. Roberto Quispe Lazo',
                'miembros' => 22,
                'descripcion' => 'Investigación en conservación y gestión ambiental',
                'lineas' => ['Ecología', 'Cambio Climático', 'Recursos Naturales'],
                'categoria' => 'Consolidado'
            ]
        ];
    }

    private function getDefaultEstadisticas()
    {
        return [
            [
                'label' => 'Proyectos Activos',
                'valor' => 129,
                'icono' => 'fa-project-diagram',
                'color' => 'primary'
            ],
            [
                'label' => 'Investigadores',
                'valor' => 347,
                'icono' => 'fa-user-graduate',
                'color' => 'success'
            ],
            [
                'label' => 'Publicaciones (2024)',
                'valor' => 284,
                'icono' => 'fa-file-alt',
                'color' => 'info'
            ],
            [
                'label' => 'Grupos de Investigación',
                'valor' => 48,
                'icono' => 'fa-users-cog',
                'color' => 'warning'
            ]
        ];
    }
}
