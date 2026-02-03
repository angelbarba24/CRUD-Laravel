<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarse - {{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px; /* Para que no pegue a los bordes en móvil */
        }
        .register-card {
            width: 100%;
            max-width: 450px; /* Un poco más ancho que el login */
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .register-header {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: white;
            padding: 30px;
            border-radius: 15px 15px 0 0;
            text-align: center;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }
    </style>
</head>
<body>

    <div class="card register-card">
        <div class="register-header">
            <h3 class="fw-bold mb-0"><i class="bi bi-person-plus-fill me-2"></i>Crear Cuenta</h3>
            <p class="small mb-0 opacity-75">Únete a CarManager hoy mismo</p>
        </div>

        <div class="card-body p-4">
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label text-secondary small fw-bold">Nombre Completo</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-person"></i></span>
                        <input id="name" type="text" 
                               class="form-control border-start-0 @error('name') is-invalid @enderror" 
                               name="name" value="{{ old('name') }}" 
                               required autofocus autocomplete="name" placeholder="Ej: Juan Pérez">
                    </div>
                    @error('name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-secondary small fw-bold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope"></i></span>
                        <input id="email" type="email" 
                               class="form-control border-start-0 @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" 
                               required autocomplete="username" placeholder="nombre@correo.com">
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-secondary small fw-bold">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock"></i></span>
                        <input id="password" type="password" 
                               class="form-control border-start-0 @error('password') is-invalid @enderror" 
                               name="password" 
                               required autocomplete="new-password" placeholder="Mínimo 8 caracteres">
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label text-secondary small fw-bold">Confirmar Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-shield-check"></i></span>
                        <input id="password_confirmation" type="password" 
                               class="form-control border-start-0 @error('password_confirmation') is-invalid @enderror" 
                               name="password_confirmation" 
                               required autocomplete="new-password" placeholder="Repite tu contraseña">
                    </div>
                    @error('password_confirmation')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary btn-lg fs-6 fw-bold">
                        Registrarse
                    </button>
                </div>

                <div class="text-center">
                    <p class="small text-muted mb-0">
                        ¿Ya tienes una cuenta? 
                        <a href="{{ route('login') }}" class="text-decoration-none fw-bold">Inicia Sesión</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>