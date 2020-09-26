<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Auto;
use Illuminate\Support\Str;

class AutoMaker extends Factory
{
    protected $model = Auto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'model' => $this->faker->domainName,
            'build_year' => $this->faker->date('Y-m-d'),
            'release_year' => $this->faker->date('Y-m-d'),
            'description' => $this->faker->text(150),
            'idmaker' => rand(1, 10)
        ];
    }
}
