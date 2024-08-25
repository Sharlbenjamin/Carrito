<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Part;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PartController
 */
final class PartControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('parts.create'));

        $response->assertOk();
        $response->assertViewIs('part.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PartController::class,
            'store',
            \App\Http\Requests\PartStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name();

        $response = $this->post(route('parts.store'), [
            'name' => $name,
        ]);

        $parts = Part::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $parts);
        $part = $parts->first();

        $response->assertRedirect(route('parts.index'));
        $response->assertSessionHas('part.id', $part->id);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $part = Part::factory()->create();

        $response = $this->get(route('parts.edit', $part));

        $response->assertOk();
        $response->assertViewIs('part.edit');
        $response->assertViewHas('part');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PartController::class,
            'update',
            \App\Http\Requests\PartUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $part = Part::factory()->create();
        $name = $this->faker->name();

        $response = $this->put(route('parts.update', $part), [
            'name' => $name,
        ]);

        $part->refresh();

        $response->assertRedirect(route('parts.index'));
        $response->assertSessionHas('part.id', $part->id);

        $this->assertEquals($name, $part->name);
    }
}
