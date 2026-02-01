<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Coches</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">

    @include('layouts.navigation')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-6 px-4">
                <h1 class="text-3xl font-bold text-gray-800">Listado de Coches</h1>
                <a href="{{ route('cars.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                    + Nuevo Coche
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Marca</th>
                                <th class="py-3 px-6 text-left">Modelo</th>
                                <th class="py-3 px-6 text-center">Año</th>
                                <th class="py-3 px-6 text-center">Disponible</th>
                                <th class="py-3 px-6 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach($cars as $car)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="py-3 px-6 text-left">{{ $car->brand }}</td>
                                <td class="py-3 px-6 text-left">{{ $car->model }}</td>
                                <td class="py-3 px-6 text-center">{{ $car->year }}</td>
                                <td class="py-3 px-6 text-center">
                                    @if($car->is_available)
                                        <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs font-bold">Sí</span>
                                    @else
                                        <span class="bg-red-200 text-red-700 py-1 px-3 rounded-full text-xs font-bold">No</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center flex justify-center gap-2">
                                    <a href="{{ route('cars.edit', $car) }}" class="text-blue-500 hover:text-blue-700 font-bold">Editar</a>
                                    <form action="{{ route('cars.destroy', $car) }}" method="POST" onsubmit="return confirm('¿Borrar?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-bold">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
    </div>
</body>
</html>