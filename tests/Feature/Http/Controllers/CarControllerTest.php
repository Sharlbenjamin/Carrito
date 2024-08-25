<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Type;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
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
        $response->assertViewHas('cars');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('cars.create'));

        $response->assertOk();
        $response->assertViewIs('car.create');
        $response->assertViewHas('types');
        $response->assertViewHas('brands');
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
        $user = User::factory()->create();
        $name = $this->faker->name();
        $brand = Brand::factory()->create();
        $type = Type::factory()->create();
        $year = $this->faker->year();
        $license_date = Carbon::parse($this->faker->date());
        $license = $this->faker->word();
        $l_r_t = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('cars.store'), [
            'user_id' => $user->id,
            'name' => $name,
            'brand_id' => $brand->id,
            'type_id' => $type->id,
            'year' => $year,
            'license_date' => $license_date,
            'license' => $license,
            'l_r_t' => $l_r_t,
        ]);

        $cars = Car::query()
            ->where('user_id', $user->id)
            ->where('name', $name)
            ->where('brand_id', $brand->id)
            ->where('type_id', $type->id)
            ->where('year', $year)
            ->where('license_date', $license_date)
            ->where('license', $license)
            ->where('l_r_t', $l_r_t)
            ->get();
        $this->assertCount(1, $cars);
        $car = $cars->first();

        $response->assertRedirect(route('car.index'));
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $car = Car::factory()->create();

        $response = $this->get(route('cars.edit', $car));

        $response->assertOk();
        $response->assertViewIs('car.create');
        $response->assertViewHas('types');
        $response->assertViewHas('brands');
        $response->assertViewHas('car');
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
    public function update_saves_and_redirects(): void
    {
        $car = Car::factory()->create();
        $user = User::factory()->create();
        $car.name = $this->faker->name();
        $brand = Brand::factory()->create();
        $type = Type::factory()->create();
        $car.year = $this->faker->year();
        $name = $this->faker->name();
        $car.license_date = Carbon::parse($this->faker->date());
        $car.license = $this->faker->word();
        $car.l_r_t = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('cars.update', $car), [
            'car.user_id' => $user->id,
            'car.name' => $car.name,
            'car.brand_id' => $brand->id,
            'car.type_id' => $type->id,
            'car.year' => $car.year,
            'user_id' => $user->id,
            'name' => $name,
            'car.license_date' => $car.license_date,
            'car.license' => $car.license,
            'car.l_r_t' => $car.l_r_t,
        ]);

        $car->refresh();
        $cars = Car::query()
            ->where('car.user_id', $user->id)
            ->where('car.name', $car.name)
            ->where('car.brand_id', $brand->id)
            ->where('car.type_id', $type->id)
            ->where('car.year', $car.year)
            ->where('user_id', $user->id)
            ->where('name', $name)
            ->where('car.license_date', $car.license_date)
            ->where('car.license', $car.license)
            ->where('car.l_r_t', $car.l_r_t)
            ->get();
        $this->assertCount(1, $cars);
        $car = $cars->first();

        $response->assertRedirect(route('car.index'));

        $this->assertEquals($user->id, $car->car.user_id);
        $this->assertEquals($car.name, $car->car.name);
        $this->assertEquals($brand->id, $car->car.brand_id);
        $this->assertEquals($type->id, $car->car.type_id);
        $this->assertEquals($car.year, $car->car.year);
        $this->assertEquals($user->id, $car->user_id);
        $this->assertEquals($name, $car->name);
        $this->assertEquals($car.license_date, $car->car.license_date);
        $this->assertEquals($car.license, $car->car.license);
        $this->assertEquals($car.l_r_t, $car->car.l_r_t);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $car = Car::factory()->create();

        $response = $this->delete(route('cars.destroy', $car));

        $response->assertRedirect(route('route:cars.index'));

        $this->assertModelMissing($car);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $car = Car::factory()->create();

        $response = $this->get(route('cars.show', $car));

        $response->assertOk();
        $response->assertViewIs('car.show');
        $response->assertViewHas('brand');
        $response->assertViewHas('types');
        $response->assertViewHas('repairs');
        $response->assertViewHas('car');
    }
}
