<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - UNMSM</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <style>
            body {
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            .auth-card {
                background: white;
                border-radius: 1rem;
                box-shadow: 0 10px 40px rgba(0,0,0,0.2);
                overflow: hidden;
                max-width: 450px;
                width: 100%;
            }
            .auth-header {
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
                padding: 2rem;
                text-align: center;
                color: white;
            }
            .auth-body {
                padding: 2rem;
            }
            .btn-primary {
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
                border: none;
            }
            .btn-primary:hover {
                background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container">
            <div class="auth-card mx-auto">
                <div class="auth-header">
                    <a href="/" class="text-decoration-none text-white">
                        <i class="fas fa-university fa-3x mb-3"></i>
                        <h4 class="mb-1">UNMSM</h4>
                        <small>Decana de América</small>
                    </a>
                </div>
                <div class="auth-body">
                    {{ $slot }}
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('home') }}" class="text-white text-decoration-none">
                    <i class="fas fa-arrow-left me-2"></i>Volver al sitio web
                </a>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
