<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'nombre' => 'Página principal banner 1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('banners')->insert([
            'nombre' => 'Página principal banner 2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('banners')->insert([
            'nombre' => 'Página principal banner 3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('banners')->insert([
            'nombre' => 'Página principal banner 4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
