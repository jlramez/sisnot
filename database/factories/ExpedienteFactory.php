<?php

namespace Database\Factories;

use App\Models\Expediente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExpedienteFactory extends Factory
{
    protected $model = Expediente::class;

    public function definition()
    {
        return [
			'noexp' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'tipos_id' => $this->faker->name,
			'actuaciones_id' => $this->faker->name,
			'fecha_límite' => $this->faker->name,
			'fecha_inicial' => $this->faker->name,
			'fecha_asignacion' => $this->faker->name,
        ];
    }
}
