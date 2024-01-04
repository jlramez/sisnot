<?php

namespace Database\Factories;

use App\Models\Consulta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ConsultaFactory extends Factory
{
    protected $model = Consulta::class;

    public function definition()
    {
        return [
			'no' => $this->faker->name,
			'tipoods_id' => $this->faker->name,
			'noexp' => $this->faker->name,
			'actor' => $this->faker->name,
			'demandado' => $this->faker->name,
			'fecha_audiencia' => $this->faker->name,
			'estados_id' => $this->faker->name,
			'areas_id' => $this->faker->name,
			'empleados_id' => $this->faker->name,
			'fecha_registro' => $this->faker->name,
			'estatus' => $this->faker->name,
			'observaciones' => $this->faker->name,
        ];
    }
}
