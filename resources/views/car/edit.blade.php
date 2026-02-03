<x-app-layout>
    <x-slot name="header">
        Editar Vehículo
    </x-slot>

    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                        <h4 class="fw-bold text-dark mb-0">
                            <i class="bi bi-pencil-square text-primary me-2"></i>Editar: {{ $car->brand }}
                        </h4>
                        <p class="text-muted small mt-1">Actualiza la información del vehículo a continuación.</p>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('cars.update', $car) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">Marca</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-tag"></i></span>
                                    <input type="text" name="brand" value="{{ $car->brand }}" 
                                           class="form-control border-start-0" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">Modelo</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-car-front"></i></span>
                                    <input type="text" name="model" value="{{ $car->model }}" 
                                           class="form-control border-start-0" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">Año</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-calendar-event"></i></span>
                                    <input type="number" name="year" value="{{ $car->year }}" 
                                           class="form-control border-start-0" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary">Descripción</label>
                                <textarea name="description" rows="3" 
                                          class="form-control" required>{{ $car->description }}</textarea>
                            </div>

                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="is_available" 
                                           name="is_available" value="1" {{ $car->is_available ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold text-dark" for="is_available">
                                        ¿El coche está disponible?
                                    </label>
                                </div>
                            </div>

                            <hr class="my-4 border-light">

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('cars.index') }}" class="btn btn-link text-decoration-none text-secondary ps-0">
                                    <i class="bi bi-arrow-left me-1"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-success px-4 fw-bold">
                                    <i class="bi bi-check-lg me-1"></i> Guardar Cambios
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>