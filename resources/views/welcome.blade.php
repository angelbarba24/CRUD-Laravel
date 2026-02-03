<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Gestión de Coches') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa; /* Fondo gris muy suave */
            color: #212529;
        }
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); /* Azul Bootstrap profesional */
            color: white;
            padding: 80px 0;
            border-radius: 0 0 50px 50px; /* Curva moderna abajo */
            margin-bottom: 50px;
        }
        .feature-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            height: 100%;
            padding: 20px;
            background: white;
        }
        .feature-card:hover {
            transform: translateY(-10px);
        }
        .icon-square {
            width: 60px;
            height: 60px;
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 20px;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand text-primary" href="#">
                <i class="bi bi-car-front-fill me-2"></i>CarManager
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary fw-bold">
                                    Ir al Dashboard <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </li>
                        @else
                            <li class="nav-item me-2">
                                <a href="{{ route('login') }}" class="nav-link fw-bold text-dark">Iniciar Sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="btn btn-primary px-4 rounded-pill">Registrarse</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section mt-5">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Gestión Inteligente de Vehículos</h1>
                    <p class="lead mb-5 opacity-75">
                        Administra tu flota, controla el inventario y gestiona el estado de tus coches desde una plataforma única, segura y rápida.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        @auth
                            <a href="{{ url('/cars') }}" class="btn btn-light btn-lg px-5 fw-bold text-primary">
                                Ver mis Coches
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5 fw-bold text-primary shadow">
                                Empezar Gratis
                            </a>
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-4 fw-bold">
                                Acceder
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="container py-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card text-center text-md-start">
                    <div class="icon-square mx-auto mx-md-0">
                        <i class="bi bi-database-check"></i>
                    </div>
                    <h3>Control Total (CRUD)</h3>
                    <p class="text-muted">
                        Crea, edita y elimina fichas de vehículos fácilmente. Mantén tu base de datos siempre actualizada con marcas, modelos y años.
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="feature-card text-center text-md-start">
                    <div class="icon-square mx-auto mx-md-0">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <h3>Seguridad Garantizada</h3>
                    <p class="text-muted">
                        Sistema de autenticación robusto. Solo los usuarios registrados pueden acceder y modificar la información sensible de la flota.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center text-md-start">
                    <div class="icon-square mx-auto mx-md-0">
                        <i class="bi bi-speedometer"></i>
                    </div>
                    <h3>Rápido y Moderno</h3>
                    <p class="text-muted">
                        Interfaz limpia basada en Bootstrap 5. Diseñada para ser rápida, responsiva y fácil de usar en cualquier dispositivo.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 mt-5 border-top bg-white">
        <div class="container text-center text-muted">
            <p class="mb-0">&copy; {{ date('Y') }} CarManager. Proyecto Laravel 12.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>