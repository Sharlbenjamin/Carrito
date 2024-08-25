<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Part;
use App\Models\Repair;
use App\Models\RepairPart;
use App\Models\Repairpart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RepairPartController
 */
final class RepairPartControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('repair-parts.create'));

        $response->assertOk();
        $response->assertViewIs('repairpart.create');
        $response->assertViewHas('repair');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RepairPartController::class,
            'store',
            \App\Http\Requests\RepairPartStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $part = Part::factory()->create();
        $repair = Repair::factory()->create();
        $repairPart.cost = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('repair-parts.store'), [
            'repairPart.part_id' => $part->id,
            'repairPart.repair_id' => $repair->id,
            'repairPart.cost' => $repairPart.cost,
        ]);

        $repairParts = Repairpart::query()
            ->where('repairPart.part_id', $part->id)
            ->where('repairPart.repair_id', $repair->id)
            ->where('repairPart.cost', $repairPart.cost)
            ->get();
        $this->assertCount(1, $repairParts);
        $repairPart = $repairParts->first();

        $response->assertRedirect(route('repairpart.index'));
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $repairPart = RepairPart::factory()->create();

        $response = $this->get(route('repair-parts.edit', $repairPart));

        $response->assertOk();
        $response->assertViewIs('repairpart.create');
        $response->assertViewHas('repair');
        $response->assertViewHas('repairpart');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RepairPartController::class,
            'update',
            \App\Http\Requests\RepairPartUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $repairPart = RepairPart::factory()->create();
        $part = Part::factory()->create();
        $repair = Repair::factory()->create();
        $cost = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('repair-parts.update', $repairPart), [
            'part_id' => $part->id,
            'repair_id' => $repair->id,
            'cost' => $cost,
        ]);

        $repairPart->refresh();

        $response->assertRedirect(route('repairpart.index'));

        $this->assertEquals($part->id, $repairPart->part_id);
        $this->assertEquals($repair->id, $repairPart->repair_id);
        $this->assertEquals($cost, $repairPart->cost);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $repairPart = RepairPart::factory()->create();
        $repairPart = Repairpart::factory()->create();

        $response = $this->delete(route('repair-parts.destroy', $repairPart));

        $response->assertRedirect(route('repairpart.index'));

        $this->assertModelMissing($repairPart);
    }
}
