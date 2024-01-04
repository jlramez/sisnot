<?php

namespace Database\Factories;

use App\Models\Part;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PartFactory extends Factory
{
    protected $model = Part::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
        ];
    }
}
