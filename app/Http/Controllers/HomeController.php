<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        // Aquí más adelante podremos cargar datos desde la base de datos
        $data = [
            'university_name' => 'Universidad Nacional Mayor de San Marcos',
            'university_acronym' => 'UNMSM',
            'slogan' => 'Universidad del Perú, Decana de América',
            'founded_year' => 1551,
        ];

        return view('home', $data);
    }
}
