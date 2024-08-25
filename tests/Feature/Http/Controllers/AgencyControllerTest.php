<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Agency;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AgencyController
 */
final class AgencyControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $agencies = Agency::factory()->count(3)->create();

        $response = $this->get(route('agencies.index'));

        $response->assertOk();
        $response->assertViewIs('agency.index');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('agencies.create'));

        $response->assertOk();
        $response->assertViewIs('agency.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AgencyController::class,
            'store',
            \App\Http\Requests\AgencyStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name();
        $address = $this->faker->word();
        $phone = $this->faker->phoneNumber();

        $response = $this->post(route('agencies.store'), [
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
        ]);

        $agencies = Agency::query()
            ->where('name', $name)
            ->where('address', $address)
            ->where('phone', $phone)
            ->get();
        $this->assertCount(1, $agencies);
        $agency = $agencies->first();

        $response->assertRedirect(route('agency.index'));
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $agency = Agency::factory()->create();

        $response = $this->get(route('agencies.edit', $agency));

        $response->assertOk();
        $response->assertViewIs('agency.create');
        $response->assertViewHas('agency');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AgencyController::class,
            'update',
            \App\Http\Requests\AgencyUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $agency = Agency::factory()->create();

        $response = $this->put(route('agencies.update', $agency));

        $agency->refresh();

        $response->assertRedirect(route('agency.index'));
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $agency = Agency::factory()->create();

        $response = $this->delete(route('agencies.destroy', $agency));

        $response->assertRedirect(route('agenct.index'));

        $this->assertModelMissing($agency);
    }
}
