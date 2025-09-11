<?php

namespace Database\Seeders;

use App\Models\BigCategory;
use Illuminate\Database\Seeder;

class BigCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bigCategories = [
            ['name' => 'コーヒー'],
            ['name' => '紅茶'],
            ['name' => 'フラペチーノ'],
            ['name' => 'フード'],
            ['name' => 'スイーツ']
        ];

        foreach ($bigCategories as $bigCategory) {
            BigCategory::create($bigCategory);
        }
    }
}
