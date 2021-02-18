<?php

namespace Database\Seeders;

use App\Models\Establecimiento;
use Illuminate\Database\Seeder;

class EstablecimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $establecimientos = Establecimiento::factory(100)->create();

        foreach ($establecimientos as $establecimiento) {

            $establecimiento->tags()->attach([rand(1,20),rand(21,39)]);
        }
    }
}
