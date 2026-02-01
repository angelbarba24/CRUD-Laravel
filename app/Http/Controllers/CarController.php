<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('car.index', compact('cars'));
    }

    public function create()
    {
        return view('car.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'description' => 'required|string',
            'year' => 'required|integer',
        ]);

        $data['is_available'] = $request->has('is_available');

        Car::create($data);

        return redirect()->route('cars.index');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('car.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        
        $data = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'description' => 'required|string',
            'year' => 'required|integer',
        ]);

        $data['is_available'] = $request->has('is_available');
        
        $car->update($data);

        return redirect()->route('cars.index');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        
        return redirect()->route('cars.index');
    }
}