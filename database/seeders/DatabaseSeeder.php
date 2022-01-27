<?php

namespace Database\Seeders;

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
        // areasテーブル
        $this->call(AreasTableSeeder::class);

        // genresテーブル
        $this->call(GenresTableSeeder::class);

        // shopsテーブル
        $this->call(ShopsTableSeeder::class);

    }
}
