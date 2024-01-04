<?php

namespace Database\Factories;

use App\Models\Actuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActuarioFactory extends Factory
{
    protected $model = Actuario::class;

    public function definition()
    {
        return [
			'noemp' => $this->faker->name,
			'pa' => $this->faker->name,
			'sa' => $this->faker->name,
			'nombre' => $this->faker->name,
			'ponencias_id' => $this->faker->name,
        ];
    }
}
