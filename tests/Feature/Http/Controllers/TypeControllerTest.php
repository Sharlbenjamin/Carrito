<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Brand;
use App\Models\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TypeController
 */
final class TypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('types.create'));

        $response->assertOk();
        $response->assertViewIs('type.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TypeController::class,
            'store',
            \App\Http\Requests\TypeStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name();
        $brand = Brand::factory()->create();

        $response = $this->post(route('types.store'), [
            'name' => $name,
            'brand_id' => $brand->id,
        ]);

        $types = Type::query()
            ->where('name', $name)
            ->where('brand_id', $brand->id)
            ->get();
        $this->assertCount(1, $types);
        $type = $types->first();

        $response->assertRedirect(route('types.index'));
        $response->assertSessionHas('type.id', $type->id);
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $type = Type::factory()->create();

        $response = $this->get(route('types.edit', $type));

        $response->assertOk();
        $response->assertViewIs('type.edit');
        $response->assertViewHas('type');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TypeController::class,
            'update',
            \App\Http\Requests\TypeUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $type = Type::factory()->create();
        $name = $this->faker->name();
        $brand = Brand::factory()->create();

        $response = $this->put(route('types.update', $type), [
            'name' => $name,
            'brand_id' => $brand->id,
        ]);

        $type->refresh();

        $response->assertRedirect(route('types.index'));
        $response->assertSessionHas('type.id', $type->id);

        $this->assertEquals($name, $type->name);
        $this->assertEquals($brand->id, $type->brand_id);
    }
}
