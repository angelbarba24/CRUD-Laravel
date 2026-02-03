<x-app-layout>
    <x-slot name="header">
        Gestión de Vehículos
    </x-slot>

    <div class="container-fluid p-0">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark mb-0">Listado de Vehículos</h3>
            <a href="{{ route('cars.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Nuevo Coche
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="py-3 px-4">Marca</th>
                                <th scope="col" class="py-3 px-4">Modelo</th>
                                <th scope="col" class="py-3 px-4 text-center">Año</th>
                                <th scope="col" class="py-3 px-4 text-center">Disponible</th>
                                <th scope="col" class="py-3 px-4 text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cars as $car)
                            <tr>
                                <td class="px-4 fw-medium">{{ $car->brand }}</td>
                                <td class="px-4 text-secondary">{{ $car->model }}</td>
                                <td class="px-4 text-center">
                                    <span class="badge bg-light text-dark border">{{ $car->year }}</span>
                                </td>
                                <td class="px-4 text-center">
                                    @if($car->is_available)
                                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                            <i class="bi bi-check-circle-fill me-1"></i> Disponible
                                        </span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">
                                            <i class="bi bi-x-circle-fill me-1"></i> Vendido
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('cars.edit', $car) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('cars.destroy', $car) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres borrar este coche?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Borrar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            @if($cars->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-car-front display-6 d-block mb-3"></i>
                                    No hay vehículos registrados todavía.
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>