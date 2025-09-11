<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BigCategorySeeder::class,
            SubCategorySeeder::class,
            MenuSeeder::class,
            OptionMenuSeeder::class,
            OptionSeeder::class,
        ]);
    }
}
