<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Cupon;
use App\Models\Comentario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        /* Tag::factory(40)->create(); */
        $this->call(CategoriesSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(BannerSeeder::class);
        /* $this->call(EstablecimientoSeeder::class);
        Cupon::factory(300)->create();
        Comentario::factory(200)->create(); */
    }
}
