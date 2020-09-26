<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Maker;
use Illuminate\Support\Str;

class MakerMaker extends Factory
{
    protected $model = Maker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->url,
            'password' => bcrypt(uniqid()),
            'logo' => $this->faker->imageUrl()
        ];
    }
}
