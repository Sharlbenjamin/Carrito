<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Type;
use App\Models\User;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'brand_id' => Brand::factory(),
            'type_id' => Type::factory(),
            'year' => $this->faker->year(),
            'kilometers' => $this->faker->numberBetween(-10000, 10000),
            'license_date' => $this->faker->date(),
            'license' => $this->faker->word(),
            'l_r_t' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
