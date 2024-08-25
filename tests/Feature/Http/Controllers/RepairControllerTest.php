<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Agency;
use App\Models\Car;
use App\Models\Repair;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RepairController
 */
final class RepairControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('repairs.create'));

        $response->assertOk();
        $response->assertViewIs('repair.create');
        $response->assertViewHas('car.user');
        $response->assertViewHas('agency');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RepairController::class,
            'store',
            \App\Http\Requests\RepairStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $agency = Agency::factory()->create();
        $car = Car::factory()->create();
        $date = Carbon::parse($this->faker->date());
        $invoice = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('repairs.store'), [
            'agency_id' => $agency->id,
            'car_id' => $car->id,
            'date' => $date,
            'invoice' => $invoice,
        ]);

        $repairs = Repair::query()
            ->where('agency_id', $agency->id)
            ->where('car_id', $car->id)
            ->where('date', $date)
            ->where('invoice', $invoice)
            ->get();
        $this->assertCount(1, $repairs);
        $repair = $repairs->first();

        $response->assertRedirect(route('repair.index'));
    }


    #[Test]
    public function destroy_deletes(): void
    {
        $repair = Repair::factory()->create();

        $response = $this->delete(route('repairs.destroy', $repair));

        $this->assertModelMissing($repair);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $repair = Repair::factory()->create();

        $response = $this->get(route('repairs.edit', $repair));

        $response->assertOk();
        $response->assertViewIs('repair.create');
        $response->assertViewHas('car.user');
        $response->assertViewHas('agency');
        $response->assertViewHas('repair');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RepairController::class,
            'update',
            \App\Http\Requests\RepairUpdateRequest::class
        );
    }

    #[Test]
    public function update_saves_and_redirects(): void
    {
        $repair = Repair::factory()->create();
        $agency = Agency::factory()->create();
        $car = Car::factory()->create();
        $repair.date = Carbon::parse($this->faker->date());
        $repair.invoice = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('repairs.update', $repair), [
            'repair.agency_id' => $agency->id,
            'repair.car_id' => $car->id,
            'repair.date' => $repair.date,
            'repair.invoice' => $repair.invoice,
        ]);

        $repair->refresh();
        $repairs = Repair::query()
            ->where('repair.agency_id', $agency->id)
            ->where('repair.car_id', $car->id)
            ->where('repair.date', $repair.date)
            ->where('repair.invoice', $repair.invoice)
            ->get();
        $this->assertCount(1, $repairs);
        $repair = $repairs->first();

        $response->assertRedirect(route('repair.index'));

        $this->assertEquals($agency->id, $repair->repair.agency_id);
        $this->assertEquals($car->id, $repair->repair.car_id);
        $this->assertEquals($repair.date, $repair->repair.date);
        $this->assertEquals($repair.invoice, $repair->repair.invoice);
    }
}
