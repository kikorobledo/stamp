<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Comentario;
use App\Models\Establecimiento;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comentario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contenido' => $this->faker->text(250),
            'establecimiento_id' => Establecimiento::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
