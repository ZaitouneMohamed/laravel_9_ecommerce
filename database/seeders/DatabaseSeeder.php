<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call(rolesSeeder::class);
        $this->call(UsersSeeder::class);
        \App\Models\Categorie::factory(5)->create();
        \App\Models\SubCategorie::factory(30)->create();
        \App\Models\Product::factory(60)->create();
        \App\Models\Adresse::factory(5)->create();
    }
}
