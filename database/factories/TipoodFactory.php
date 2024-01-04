<?php

namespace Database\Factories;

use App\Models\Tipood;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TipoodFactory extends Factory
{
    protected $model = Tipood::class;

    public function definition()
    {
        return [
			'descripcion' => $this->faker->name,
        ];
    }
}
