<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        // Estadísticas de ejemplo - luego se conectarán con modelos reales
        $stats = [
            'total_users' => User::count(),
            'total_news' => 15, // Temporal - se reemplazará con el modelo News
            'total_events' => 8, // Temporal - se reemplazará con el modelo Event
            'total_faculties' => 20, // Temporal - se reemplazará con el modelo Faculty
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
