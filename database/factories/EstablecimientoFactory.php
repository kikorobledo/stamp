<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Establecimiento;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstablecimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Establecimiento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre = $this->faker->unique()->word(10);

        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'category_id' => Category::all()->random()->id,
            'direccion' => $this->faker->sentence,
            'colonia' => $this->faker->sentence,
            'telefono' => $this->faker->phoneNumber,
            'descripcion' => $this->faker->text(250),
            'estado' => $this->faker->randomElement(['activo','eliminado','revision']),
            'apertura' => $this->faker->time,
            'cierre' => $this->faker->time,
            'user_id' => User::all()->random()->id,
            'url' => $this->faker->url,
            'premium' => false,
            'uuid' => $this->faker->uuid
        ];
    }
}
