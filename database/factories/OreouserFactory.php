<?php

namespace Database\Factories;

use App\Models\Oreouser;
use Illuminate\Database\Eloquent\Factories\Factory;

class OreouserFactory extends Factory
{
    protected $model = Oreouser::class;

    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'age' => $this->faker->numberBetween(18, 80),
            'nickname' => $this->faker->userName,
        ];
    }
}
