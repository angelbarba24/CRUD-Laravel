<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Coche</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="bg-gray-100">

        @include('layouts.navigation')

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Coche: {{ $car->brand }}</h2>
            
                    <form action="{{ route('cars.update', $car) }}" method="POST">
                        @csrf
                        @method('PUT') 

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Marca</label>
                            <input type="text" name="brand" value="{{ $car->brand }}" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Modelo</label>
                            <input type="text" name="model" value="{{ $car->model }}" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Año</label>
                            <input type="number" name="year" value="{{ $car->year }}" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                            <textarea name="description" rows="3" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>{{ $car->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_available" value="1" class="form-checkbox h-5 w-5 text-blue-600" {{ $car->is_available ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">¿Está disponible?</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Actualizar
                            </button>
                            <a href="{{ route('cars.index') }}" class="text-gray-500 hover:text-gray-800 font-bold text-sm">
                                Cancelar
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>