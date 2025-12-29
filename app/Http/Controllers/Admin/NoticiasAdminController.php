<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticiasAdminController extends Controller
{
    // ==================== NOTICIAS ====================

    public function noticiasIndex()
    {
        $noticias = session('noticias', $this->getDefaultNoticias());
        return view('admin.noticias.noticias.index', compact('noticias'));
    }

    public function noticiasCreate()
    {
        $categorias = session('categorias_noticias', $this->getDefaultCategorias());
        return view('admin.noticias.noticias.create', compact('categorias'));
    }

    public function noticiasStore(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'extracto' => 'required|string|max:500',
            'contenido' => 'required|string',
            'imagen' => 'required|url',
            'categoria' => 'required|string',
            'autor' => 'required|string|max:100',
            'destacada' => 'boolean',
            'tags' => 'nullable|string'
        ]);

        $noticias = session('noticias', $this->getDefaultNoticias());

        $nuevaNoticia = [
            'titulo' => $validated['titulo'],
            'extracto' => $validated['extracto'],
            'contenido' => $validated['contenido'],
            'imagen' => $validated['imagen'],
            'categoria' => $validated['categoria'],
            'fecha' => now()->format('Y-m-d'),
            'autor' => $validated['autor'],
            'destacada' => $request->has('destacada'),
            'vistas' => 0,
            'tags' => !empty($validated['tags']) ? array_map('trim', explode(',', $validated['tags'])) : []
        ];

        $noticias[] = $nuevaNoticia;
        session(['noticias' => $noticias]);

        return redirect()->route('admin.noticias.noticias.index')
            ->with('success', 'Noticia creada exitosamente');
    }

    public function noticiasEdit($id)
    {
        $noticias = session('noticias', $this->getDefaultNoticias());

        if (!isset($noticias[$id])) {
            return redirect()->route('admin.noticias.noticias.index')
                ->with('error', 'Noticia no encontrada');
        }

        $noticia = $noticias[$id];
        $categorias = session('categorias_noticias', $this->getDefaultCategorias());

        return view('admin.noticias.noticias.edit', compact('noticia', 'id', 'categorias'));
    }

    public function noticiasUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'extracto' => 'required|string|max:500',
            'contenido' => 'required|string',
            'imagen' => 'required|url',
            'categoria' => 'required|string',
            'autor' => 'required|string|max:100',
            'destacada' => 'boolean',
            'tags' => 'nullable|string'
        ]);

        $noticias = session('noticias', $this->getDefaultNoticias());

        if (!isset($noticias[$id])) {
            return redirect()->route('admin.noticias.noticias.index')
                ->with('error', 'Noticia no encontrada');
        }

        $noticias[$id]['titulo'] = $validated['titulo'];
        $noticias[$id]['extracto'] = $validated['extracto'];
        $noticias[$id]['contenido'] = $validated['contenido'];
        $noticias[$id]['imagen'] = $validated['imagen'];
        $noticias[$id]['categoria'] = $validated['categoria'];
        $noticias[$id]['autor'] = $validated['autor'];
        $noticias[$id]['destacada'] = $request->has('destacada');
        $noticias[$id]['tags'] = !empty($validated['tags']) ? array_map('trim', explode(',', $validated['tags'])) : [];

        session(['noticias' => $noticias]);

        return redirect()->route('admin.noticias.noticias.index')
            ->with('success', 'Noticia actualizada exitosamente');
    }

    public function noticiasDestroy($id)
    {
        $noticias = session('noticias', $this->getDefaultNoticias());

        if (isset($noticias[$id])) {
            unset($noticias[$id]);
            $noticias = array_values($noticias);
            session(['noticias' => $noticias]);

            return redirect()->route('admin.noticias.noticias.index')
                ->with('success', 'Noticia eliminada exitosamente');
        }

        return redirect()->route('admin.noticias.noticias.index')
            ->with('error', 'Noticia no encontrada');
    }

    // ==================== CATEGORÍAS ====================

    public function categoriasIndex()
    {
        $categorias = session('categorias_noticias', $this->getDefaultCategorias());
        return view('admin.noticias.categorias.index', compact('categorias'));
    }

    public function categoriasCreate()
    {
        return view('admin.noticias.categorias.create');
    }

    public function categoriasStore(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'slug' => 'required|string|max:100',
            'color' => 'required|string',
            'icono' => 'required|string',
            'descripcion' => 'required|string|max:255'
        ]);

        $categorias = session('categorias_noticias', $this->getDefaultCategorias());

        $nuevaCategoria = [
            'nombre' => $validated['nombre'],
            'slug' => $validated['slug'],
            'color' => $validated['color'],
            'icono' => $validated['icono'],
            'descripcion' => $validated['descripcion']
        ];

        $categorias[] = $nuevaCategoria;
        session(['categorias_noticias' => $categorias]);

        return redirect()->route('admin.noticias.categorias.index')
            ->with('success', 'Categoría creada exitosamente');
    }

    public function categoriasEdit($id)
    {
        $categorias = session('categorias_noticias', $this->getDefaultCategorias());

        if (!isset($categorias[$id])) {
            return redirect()->route('admin.noticias.categorias.index')
                ->with('error', 'Categoría no encontrada');
        }

        $categoria = $categorias[$id];

        return view('admin.noticias.categorias.edit', compact('categoria', 'id'));
    }

    public function categoriasUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'slug' => 'required|string|max:100',
            'color' => 'required|string',
            'icono' => 'required|string',
            'descripcion' => 'required|string|max:255'
        ]);

        $categorias = session('categorias_noticias', $this->getDefaultCategorias());

        if (!isset($categorias[$id])) {
            return redirect()->route('admin.noticias.categorias.index')
                ->with('error', 'Categoría no encontrada');
        }

        $categorias[$id] = [
            'nombre' => $validated['nombre'],
            'slug' => $validated['slug'],
            'color' => $validated['color'],
            'icono' => $validated['icono'],
            'descripcion' => $validated['descripcion']
        ];

        session(['categorias_noticias' => $categorias]);

        return redirect()->route('admin.noticias.categorias.index')
            ->with('success', 'Categoría actualizada exitosamente');
    }

    public function categoriasDestroy($id)
    {
        $categorias = session('categorias_noticias', $this->getDefaultCategorias());

        if (isset($categorias[$id])) {
            unset($categorias[$id]);
            $categorias = array_values($categorias);
            session(['categorias_noticias' => $categorias]);

            return redirect()->route('admin.noticias.categorias.index')
                ->with('success', 'Categoría eliminada exitosamente');
        }

        return redirect()->route('admin.noticias.categorias.index')
            ->with('error', 'Categoría no encontrada');
    }

    // ==================== DATOS POR DEFECTO ====================

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
            ]
        ];
    }
}
