<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Cupon;
use Illuminate\Support\Str;
use App\Models\Establecimiento;
use Illuminate\Database\Eloquent\Factories\Factory;

class CuponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $nombre = $this->faker->word(10);

        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'estado' => $this->faker->randomElement(['activo','expirado','eliminado','revision']),
            'establecimiento_id' => Establecimiento::all()->random()->id,
            'fecha_de_vencimiento' => Carbon::now()->addMonth(),
            'descripcion' => $this->faker->text(250),
        ];

    }
}
