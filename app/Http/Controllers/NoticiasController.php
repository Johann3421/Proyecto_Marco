<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    public function index(Request $request)
    {
        $noticias = $this->getDefaultNoticias();
        $categorias = $this->getDefaultCategorias();

        // Filtrar por categoría si se proporciona
        $categoriaActual = $request->get('categoria');
        if ($categoriaActual) {
            $noticias = array_filter($noticias, function($noticia) use ($categoriaActual) {
                return $noticia['categoria'] === $categoriaActual;
            });
        }

        // Separar noticias destacadas
        $noticiasDestacadas = array_filter($noticias, fn($n) => $n['destacada']);
        $noticiasRegulares = array_filter($noticias, fn($n) => !$n['destacada']);

        return view('noticias.index', compact('noticias', 'noticiasDestacadas', 'noticiasRegulares', 'categorias', 'categoriaActual'));
    }

    public function show($id)
    {
        $noticias = $this->getDefaultNoticias();
        $noticia = $noticias[$id] ?? null;

        if (!$noticia) {
            abort(404);
        }

        // Incrementar vistas
        if (!isset($noticia['vistas'])) {
            $noticia['vistas'] = 0;
        }
        $noticia['vistas']++;

        // Obtener noticias relacionadas (misma categoría)
        $noticiasRelacionadas = array_filter($noticias, function($n) use ($noticia, $id) {
            return $n['categoria'] === $noticia['categoria'] && array_search($n, $noticias) != $id;
        });
        $noticiasRelacionadas = array_slice($noticiasRelacionadas, 0, 3);

        return view('noticias.show', compact('noticia', 'noticiasRelacionadas'));
    }

    private function getDefaultNoticias()
    {
        return [
            [
                'titulo' => 'Universidad celebra 50 años de excelencia académica',
                'extracto' => 'Medio siglo formando profesionales de calidad comprometidos con el desarrollo del país. Una celebración que reúne a toda la comunidad universitaria.',
                'contenido' => 'La Universidad celebra cinco décadas de contribución al desarrollo educativo nacional. Con más de 30,000 graduados, la institución se consolida como referente de excelencia académica. El evento conmemorativo incluirá conferencias magistrales, exposiciones y actividades culturales durante todo el mes.',
                'imagen' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&h=600&fit=crop',
                'categoria' => 'Institucional',
                'fecha' => '2024-12-20',
                'autor' => 'Dr. Roberto Méndez',
                'destacada' => true,
                'vistas' => 1245,
                'tags' => ['aniversario', 'celebración', 'historia']
            ],
            [
                'titulo' => 'Investigadores descubren nueva especie en la Amazonía peruana',
                'extracto' => 'Equipo científico de nuestra universidad realiza importante hallazgo en biodiversidad durante expedición al norte del país.',
                'contenido' => 'Un equipo de biólogos de la Facultad de Ciencias ha documentado una nueva especie de anfibio en la región amazónica. El descubrimiento, publicado en la revista Nature, contribuye al conocimiento de la biodiversidad peruana y refuerza la importancia de la conservación.',
                'imagen' => 'https://images.unsplash.com/photo-1516339901601-2e1b62dc0c45?w=800&h=600&fit=crop',
                'categoria' => 'Investigación',
                'fecha' => '2024-12-18',
                'autor' => 'Dra. Carmen Silva',
                'destacada' => true,
                'vistas' => 892,
                'tags' => ['ciencia', 'biodiversidad', 'amazonía']
            ],
            [
                'titulo' => 'Inauguran moderno laboratorio de inteligencia artificial',
                'extracto' => 'Nueva infraestructura tecnológica permitirá desarrollar proyectos de machine learning y análisis de datos avanzado.',
                'contenido' => 'La Facultad de Ingeniería inaugura un laboratorio equipado con tecnología de punta para investigación en IA. El espacio cuenta con 50 estaciones de trabajo, servidores GPU y software especializado. Se espera que beneficie a más de 500 estudiantes anualmente.',
                'imagen' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=800&h=600&fit=crop',
                'categoria' => 'Tecnología',
                'fecha' => '2024-12-15',
                'autor' => 'Ing. Miguel Torres',
                'destacada' => true,
                'vistas' => 1567,
                'tags' => ['tecnología', 'IA', 'laboratorio']
            ],
            [
                'titulo' => 'Estudiantes ganan concurso nacional de emprendimiento',
                'extracto' => 'Proyecto de startup tecnológica obtiene primer lugar en competencia organizada por el Ministerio de Producción.',
                'contenido' => 'Tres estudiantes de la carrera de Administración ganaron el primer lugar en el Concurso Nacional de Emprendimiento con su proyecto "AgriTech Solutions". La propuesta ofrece soluciones tecnológicas para agricultores de zonas rurales y recibirá financiamiento de S/50,000.',
                'imagen' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?w=800&h=600&fit=crop',
                'categoria' => 'Académico',
                'fecha' => '2024-12-12',
                'autor' => 'Lic. Andrea Rojas',
                'destacada' => false,
                'vistas' => 634,
                'tags' => ['emprendimiento', 'estudiantes', 'premio']
            ],
            [
                'titulo' => 'Convenio internacional facilita movilidad estudiantil',
                'extracto' => 'Acuerdo con universidades europeas permitirá a estudiantes realizar intercambios académicos en el extranjero.',
                'contenido' => 'La universidad firmó convenios con 15 instituciones de España, Francia y Alemania. Los estudiantes podrán realizar estancias de uno o dos semestres con reconocimiento de créditos. Las becas cubren matrícula y ofrecen apoyo económico.',
                'imagen' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800&h=600&fit=crop',
                'categoria' => 'Internacional',
                'fecha' => '2024-12-10',
                'autor' => 'Dra. Patricia Vega',
                'destacada' => false,
                'vistas' => 1023,
                'tags' => ['internacional', 'becas', 'intercambio']
            ],
            [
                'titulo' => 'Festival cultural reúne talento artístico estudiantil',
                'extracto' => 'Tres días de música, danza, teatro y exposiciones en el campus central durante la semana cultural universitaria.',
                'contenido' => 'El Festival Cultural Universitario 2024 presenta lo mejor del talento estudiantil. El evento incluye conciertos, obras de teatro, exhibiciones de danza folclórica y contemporánea, así como exposiciones de arte. Entrada libre para toda la comunidad.',
                'imagen' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=800&h=600&fit=crop',
                'categoria' => 'Eventos',
                'fecha' => '2024-12-08',
                'autor' => 'Prof. Luis Campos',
                'destacada' => false,
                'vistas' => 578,
                'tags' => ['cultura', 'arte', 'festival']
            ],
            [
                'titulo' => 'Programa de sostenibilidad reduce huella de carbono',
                'extracto' => 'Iniciativa verde implementa energía solar, reciclaje y áreas verdes en todo el campus universitario.',
                'contenido' => 'El programa "Campus Verde" ha logrado reducir un 30% las emisiones de CO2 en un año. Se instalaron paneles solares, sistemas de reciclaje y se ampliaron las áreas verdes. La meta es alcanzar carbono neutral para 2030.',
                'imagen' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=800&h=600&fit=crop',
                'categoria' => 'Sostenibilidad',
                'fecha' => '2024-12-05',
                'autor' => 'Ing. Ambiental Carlos Ruiz',
                'destacada' => false,
                'vistas' => 445,
                'tags' => ['sostenibilidad', 'medio ambiente', 'campus verde']
            ],
            [
                'titulo' => 'Equipo deportivo se corona campeón nacional',
                'extracto' => 'Selección universitaria de voleibol obtiene medalla de oro en torneo nacional interuniversitario.',
                'contenido' => 'El equipo femenino de voleibol ganó el Campeonato Nacional Universitario tras vencer en la final por 3-1. Las deportistas entrenan en las instalaciones del complejo deportivo y reciben apoyo académico especial.',
                'imagen' => 'https://images.unsplash.com/photo-1612872087720-bb876e2e67d1?w=800&h=600&fit=crop',
                'categoria' => 'Deportes',
                'fecha' => '2024-12-03',
                'autor' => 'Coach María Gonzales',
                'destacada' => false,
                'vistas' => 712,
                'tags' => ['deportes', 'voleibol', 'campeón']
            ],
            [
                'titulo' => 'Nueva maestría en Data Science abre convocatoria',
                'extracto' => 'Programa de posgrado busca formar especialistas en análisis de datos y ciencia de datos aplicada.',
                'contenido' => 'La Escuela de Posgrado lanza su nueva Maestría en Data Science con enfoque práctico. El programa tiene duración de dos años e incluye proyectos con empresas del sector. Las inscripciones están abiertas hasta febrero.',
                'imagen' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=600&fit=crop',
                'categoria' => 'Académico',
                'fecha' => '2024-12-01',
                'autor' => 'Dr. Fernando Vargas',
                'destacada' => false,
                'vistas' => 923,
                'tags' => ['posgrado', 'maestría', 'data science']
            ]
        ];
    }

    private function getDefaultCategorias()
    {
        return [
            [
                'nombre' => 'Institucional',
                'slug' => 'Institucional',
                'color' => 'primary',
                'icono' => 'fa-university',
                'descripcion' => 'Noticias institucionales y comunicados oficiales'
            ],
            [
                'nombre' => 'Académico',
                'slug' => 'Académico',
                'color' => 'info',
                'icono' => 'fa-graduation-cap',
                'descripcion' => 'Programas académicos, cursos y formación'
            ],
            [
                'nombre' => 'Investigación',
                'slug' => 'Investigación',
                'color' => 'success',
                'icono' => 'fa-flask',
                'descripcion' => 'Proyectos e innovaciones científicas'
            ],
            [
                'nombre' => 'Eventos',
                'slug' => 'Eventos',
                'color' => 'warning',
                'icono' => 'fa-calendar-alt',
                'descripcion' => 'Conferencias, seminarios y actividades'
            ],
            [
                'nombre' => 'Tecnología',
                'slug' => 'Tecnología',
                'color' => 'danger',
                'icono' => 'fa-laptop-code',
                'descripcion' => 'Innovación y desarrollo tecnológico'
            ],
            [
                'nombre' => 'Internacional',
                'slug' => 'Internacional',
                'color' => 'secondary',
                'icono' => 'fa-globe',
                'descripcion' => 'Convenios y relaciones internacionales'
            ],
            [
                'nombre' => 'Deportes',
                'slug' => 'Deportes',
                'color' => 'dark',
                'icono' => 'fa-futbol',
                'descripcion' => 'Actividades y logros deportivos'
            ],
            [
                'nombre' => 'Sostenibilidad',
                'slug' => 'Sostenibilidad',
                'color' => 'success',
                'icono' => 'fa-leaf',
                'descripcion' => 'Iniciativas ambientales y sostenibles'
            ]
        ];
    }
}
