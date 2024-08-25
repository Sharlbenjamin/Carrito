<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Part;
use App\Models\Repair;
use App\Models\RepairPart;

class RepairPartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RepairPart::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'part_id' => Part::factory(),
            'repair_id' => Repair::factory(),
            'cost' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
