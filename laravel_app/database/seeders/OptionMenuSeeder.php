<?php

namespace Database\Seeders;

use App\Models\OptionMenu;
use Illuminate\Database\Seeder;

class OptionMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $optionMenus = [
            [
                'name' => 'エスプレッソショット追加',
                'image_path' => 'images/option_espresso_shot.jpg'
            ],
            [
                'name' => 'ソイミルク変更',
                'image_path' => 'images/option_soy_milk.jpg'
            ],
            [
                'name' => 'アーモンドミルク変更',
                'image_path' => 'images/option_almond_milk.jpg'
            ],
            [
                'name' => 'エクストラショット',
                'image_path' => 'images/option_extra_shot.jpg'
            ],
            [
                'name' => 'シロップ追加（バニラ）',
                'image_path' => 'images/option_vanilla_syrup.jpg'
            ],
            [
                'name' => 'シロップ追加（キャラメル）',
                'image_path' => 'images/option_caramel_syrup.jpg'
            ],
            [
                'name' => 'ホイップクリーム追加',
                'image_path' => 'images/option_whipped_cream.jpg'
            ],
            [
                'name' => 'チョコレートソース追加',
                'image_path' => 'images/option_chocolate_sauce.jpg'
            ],
            [
                'name' => 'シナモンパウダー追加',
                'image_path' => 'images/option_cinnamon.jpg'
            ],
            [
                'name' => 'アイス追加',
                'image_path' => 'images/option_extra_ice.jpg'
            ]
        ];

        foreach ($optionMenus as $optionMenu) {
            OptionMenu::create($optionMenu);
        }
    }
}
