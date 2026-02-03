<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    @vite(['resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; }
        
        /* Sidebar Styling */
        .sidebar {
            min-height: 100vh;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
            z-index: 100; /* Stay on top */
        }
        .nav-link { color: rgba(255,255,255,0.8); margin-bottom: 5px; border-radius: 5px; }
        .nav-link:hover, .nav-link.active { color: #fff; background-color: rgba(255,255,255,0.1); }
        .nav-link i { margin-right: 10px; }
        
        /* Content Styling */
        .main-content { min-height: 100vh; display: flex; flex-direction: column; }
        .top-navbar { background: white; border-bottom: 1px solid #e5e7eb; padding: 15px 30px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse collapse-horizontal p-0" id="sidebarMenu">
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white h-100">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <i class="bi bi-speedometer2 fs-4 me-2"></i>
                        <span class="fs-4 fw-bold">CRUD Coches</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" aria-current="page">
                                <i class="bi bi-house-door"></i>
                                Dashboard
                            </a>
                        </li>
                        
                        <li>
                            <a href="{{ route('cars.index') }}" class="nav-link {{ request()->routeIs('cars.*') ? 'active' : '' }}">
                                <i class="bi bi-car-front"></i>
                                Gestión de Vehículos
                            </a>
                        </li>

                    </ul>
                    <hr>
                    
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-0 main-content">
                
                <nav class="navbar navbar-light bg-white border-bottom sticky-top">
                    <div class="container-fluid">
                        <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="d-flex align-items-center w-100 justify-content-between px-3">
                            @if (isset($header))
                                <h5 class="m-0 fw-bold text-secondary">{{ $header }}</h5>
                            @else
                                <span></span>
                            @endif

                            <div class="d-none d-md-block">
                                <span class="text-muted text-sm">Bienvenido de nuevo, {{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="p-4 overflow-auto">
                    {{ $slot }}
                </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>