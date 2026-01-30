<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarController extends Controller
{
    public function index(Request $request): Response
    {
        $cars = Car::all();

        return view('car.index', [
            'cars' => $cars,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('car.create');
    }

    public function store(CarStoreRequest $request): Response
    {
        $car = Car::create($request->validated());

        $request->session()->flash('car.id', $car->id);

        return redirect()->route('cars.index');
    }

    public function edit(Request $request, Car $car): Response
    {
        return view('car.edit', [
            'car' => $car,
        ]);
    }

    public function update(CarUpdateRequest $request, Car $car): Response
    {
        $car->update($request->validated());

        $request->session()->flash('car.id', $car->id);

        return redirect()->route('cars.index');
    }

    public function destroy(Request $request, Car $car): Response
    {
        $car->delete();

        return redirect()->route('cars.index');
    }
}
