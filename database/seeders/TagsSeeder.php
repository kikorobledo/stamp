<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'nombre' => 'Ropa',
            'slug' => Str::slug('Restaurant'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tags')->insert([
            'nombre' => 'Jueguetes',
            'slug' => Str::slug('Café'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tags')->insert([
            'nombre' => 'Comida',
            'slug' => Str::slug('Tienda'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tags')->insert([
            'nombre' => 'Viajes',
            'slug' => Str::slug('Hoteles'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tags')->insert([
            'nombre' => 'Medicamentos',
            'slug' => Str::slug('Hospitales'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tags')->insert([
            'nombre' => 'Bebidas',
            'slug' => Str::slug('Bares'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('tags')->insert([
            'nombre' => 'Electronica',
            'slug' => Str::slug('Gimnacios'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
