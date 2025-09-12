<?php

namespace Database\Seeders;

use App\Models\BigCategory;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // コーヒーのサブカテゴリ
        $coffee = BigCategory::where('name', 'コーヒー')->first();
        $subCategories = [
            ['big_category_id' => $coffee->id, 'name' => 'エスプレッソ'],
            ['big_category_id' => $coffee->id, 'name' => 'カフェラテ'],
            ['big_category_id' => $coffee->id, 'name' => 'カプチーノ'],
        ];

        // 紅茶のサブカテゴリ
        $tea = BigCategory::where('name', '紅茶')->first();
        $subCategories = array_merge($subCategories, [
            ['big_category_id' => $tea->id, 'name' => 'アールグレイ'],
            ['big_category_id' => $tea->id, 'name' => 'ダージリン'],
        ]);

        // フラペチーノのサブカテゴリ
        $frappuccino = BigCategory::where('name', 'フラペチーノ')->first();
        $subCategories = array_merge($subCategories, [
            ['big_category_id' => $frappuccino->id, 'name' => 'クリームベース'],
            ['big_category_id' => $frappuccino->id, 'name' => 'コーヒーベース'],
        ]);

        // フードのサブカテゴリ
        $food = BigCategory::where('name', 'フード')->first();
        $subCategories = array_merge($subCategories, [
            ['big_category_id' => $food->id, 'name' => 'サンドイッチ'],
            ['big_category_id' => $food->id, 'name' => 'パニーニ'],
        ]);

        // スイーツのサブカテゴリ
        $sweets = BigCategory::where('name', 'スイーツ')->first();
        $subCategories = array_merge($subCategories, [
            ['big_category_id' => $sweets->id, 'name' => 'ケーキ'],
            ['big_category_id' => $sweets->id, 'name' => 'クッキー'],
        ]);

        foreach ($subCategories as $subCategory) {
            SubCategory::create($subCategory);
        }
    }
}
