<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CarController
 */
final class CarControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $cars = Car::factory()->count(3)->create();

        $response = $this->get(route('cars.index'));

        $response->assertOk();
        $response->assertViewIs('car.index');
        $response->assertViewHas('cars', $cars);
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('cars.create'));

        $response->assertOk();
        $response->assertViewIs('car.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CarController::class,
            'store',
            \App\Http\Requests\CarStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $brand = fake()->word();
        $model = fake()->word();
        $description = fake()->text();
        $year = fake()->numberBetween(-10000, 10000);
        $is_available = fake()->boolean();

        $response = $this->post(route('cars.store'), [
            'brand' => $brand,
            'model' => $model,
            'description' => $description,
            'year' => $year,
            'is_available' => $is_available,
        ]);

        $cars = Car::query()
            ->where('brand', $brand)
            ->where('model', $model)
            ->where('description', $description)
            ->where('year', $year)
            ->where('is_available', $is_available)
            ->get();
        $this->assertCount(1, $cars);
        $car = $cars->first();

        $response->assertRedirect(route('cars.index'));
        $response->assertSessionHas('car.id', $car->id);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $car = Car::factory()->create();

        $response = $this->get(route('cars.edit', $car));

        $response->assertOk();
        $response->assertViewIs('car.edit');
        $response->assertViewHas('car', $car);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CarController::class,
            'update',
            \App\Http\Requests\CarUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $car = Car::factory()->create();
        $brand = fake()->word();
        $model = fake()->word();
        $description = fake()->text();
        $year = fake()->numberBetween(-10000, 10000);
        $is_available = fake()->boolean();

        $response = $this->put(route('cars.update', $car), [
            'brand' => $brand,
            'model' => $model,
            'description' => $description,
            'year' => $year,
            'is_available' => $is_available,
        ]);

        $car->refresh();

        $response->assertRedirect(route('cars.index'));
        $response->assertSessionHas('car.id', $car->id);

        $this->assertEquals($brand, $car->brand);
        $this->assertEquals($model, $car->model);
        $this->assertEquals($description, $car->description);
        $this->assertEquals($year, $car->year);
        $this->assertEquals($is_available, $car->is_available);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $car = Car::factory()->create();

        $response = $this->delete(route('cars.destroy', $car));

        $response->assertRedirect(route('cars.index'));

        $this->assertModelMissing($car);
    }
}
