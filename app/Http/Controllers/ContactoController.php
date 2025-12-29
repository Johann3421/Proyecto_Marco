<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        $informacion = $this->getInformacionContacto();
        $horarios = $this->getHorarios();
        $redesSociales = $this->getRedesSociales();
        $oficinas = $this->getOficinas();

        return view('contacto.index', compact('informacion', 'horarios', 'redesSociales', 'oficinas'));
    }

    public function enviar(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'telefono' => 'nullable|string|max:20',
            'asunto' => 'required|string|max:200',
            'mensaje' => 'required|string|max:1000',
            'tipo_consulta' => 'required|string'
        ]);

        // Guardar mensaje en sesión
        $mensajes = session('mensajes_contacto', []);

        $nuevoMensaje = [
            'nombre' => $validated['nombre'],
            'email' => $validated['email'],
            'telefono' => $validated['telefono'] ?? 'No proporcionado',
            'asunto' => $validated['asunto'],
            'mensaje' => $validated['mensaje'],
            'tipo_consulta' => $validated['tipo_consulta'],
            'fecha' => now()->format('Y-m-d H:i:s'),
            'estado' => 'Nuevo',
            'leido' => false
        ];

        $mensajes[] = $nuevoMensaje;
        session(['mensajes_contacto' => $mensajes]);

        return redirect()->route('contacto.index')
            ->with('success', '¡Gracias por contactarnos! Tu mensaje ha sido enviado exitosamente. Nos pondremos en contacto contigo pronto.');
    }

    private function getInformacionContacto()
    {
        return [
            'direccion' => 'Av. Universitaria 1801, San Miguel, Lima, Perú',
            'telefono' => '+51 1 6197000',
            'whatsapp' => '+51 987654321',
            'email' => 'informes@unmsm.edu.pe',
            'email_admision' => 'admision@unmsm.edu.pe',
            'email_posgrado' => 'posgrado@unmsm.edu.pe',
            'latitud' => '-12.0583754',
            'longitud' => '-77.0846823'
        ];
    }

    private function getHorarios()
    {
        return [
            [
                'dia' => 'Lunes - Viernes',
                'horario' => '8:00 AM - 5:00 PM',
                'tipo' => 'Atención General'
            ],
            [
                'dia' => 'Sábados',
                'horario' => '9:00 AM - 1:00 PM',
                'tipo' => 'Atención Limitada'
            ],
            [
                'dia' => 'Domingos y Feriados',
                'horario' => 'Cerrado',
                'tipo' => 'No hay atención'
            ]
        ];
    }

    private function getRedesSociales()
    {
        return [
            [
                'nombre' => 'Facebook',
                'icono' => 'fab fa-facebook-f',
                'url' => 'https://facebook.com/unmsm.oficial',
                'color' => '#1877f2'
            ],
            [
                'nombre' => 'Twitter',
                'icono' => 'fab fa-twitter',
                'url' => 'https://twitter.com/unmsm_',
                'color' => '#1da1f2'
            ],
            [
                'nombre' => 'Instagram',
                'icono' => 'fab fa-instagram',
                'url' => 'https://instagram.com/unmsm.oficial',
                'color' => '#e4405f'
            ],
            [
                'nombre' => 'YouTube',
                'icono' => 'fab fa-youtube',
                'url' => 'https://youtube.com/unmsmoficial',
                'color' => '#ff0000'
            ],
            [
                'nombre' => 'LinkedIn',
                'icono' => 'fab fa-linkedin-in',
                'url' => 'https://linkedin.com/school/unmsm',
                'color' => '#0a66c2'
            ]
        ];
    }

    private function getOficinas()
    {
        return [
            [
                'nombre' => 'Rectorado',
                'ubicacion' => 'Ciudad Universitaria - Pabellón Central',
                'telefono' => '+51 1 6197000 Anexo 7001',
                'email' => 'rectorado@unmsm.edu.pe'
            ],
            [
                'nombre' => 'Admisión',
                'ubicacion' => 'Av. Germán Amezaga 375, Lima',
                'telefono' => '+51 1 6197000 Anexo 3333',
                'email' => 'admision@unmsm.edu.pe'
            ],
            [
                'nombre' => 'Biblioteca Central',
                'ubicacion' => 'Ciudad Universitaria - Edificio Jorge Basadre',
                'telefono' => '+51 1 6197000 Anexo 2020',
                'email' => 'biblioteca@unmsm.edu.pe'
            ],
            [
                'nombre' => 'Bienestar Universitario',
                'ubicacion' => 'Ciudad Universitaria - Pabellón de Servicios',
                'telefono' => '+51 1 6197000 Anexo 4040',
                'email' => 'bienestar@unmsm.edu.pe'
            ]
        ];
    }
}
