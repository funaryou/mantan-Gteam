<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Options;
use App\Models\OptionMenu;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // コーヒーメニューを取得
        $espresso = Menu::where('name', 'エスプレッソ')->first();
        $doubleEspresso = Menu::where('name', 'ダブルエスプレッソ')->first();
        $latte = Menu::where('name', 'カフェラテ')->first();
        $vanillaFrappuccino = Menu::where('name', 'バニラクリームフラペチーノ')->first();

        // オプションメニューを取得
        $espressoShot = OptionMenu::where('name', 'エスプレッソショット追加')->first();
        $soyMilk = OptionMenu::where('name', 'ソイミルク変更')->first();
        $almondMilk = OptionMenu::where('name', 'アーモンドミルク変更')->first();
        $extraShot = OptionMenu::where('name', 'エクストラショット')->first();
        $vanillaSyrup = OptionMenu::where('name', 'シロップ追加（バニラ）')->first();
        $caramelSyrup = OptionMenu::where('name', 'シロップ追加（キャラメル）')->first();
        $whippedCream = OptionMenu::where('name', 'ホイップクリーム追加')->first();
        $chocolateSauce = OptionMenu::where('name', 'チョコレートソース追加')->first();
        $cinnamon = OptionMenu::where('name', 'シナモンパウダー追加')->first();
        $extraIce = OptionMenu::where('name', 'アイス追加')->first();

        $options = [
            // エスプレッソのオプション
            [
                'menu_id' => $espresso->id,
                'option_menu_id' => $espressoShot->id,
                'add_price' => 100
            ],
            [
                'menu_id' => $espresso->id,
                'option_menu_id' => $whippedCream->id,
                'add_price' => 50
            ],
            [
                'menu_id' => $espresso->id,
                'option_menu_id' => $cinnamon->id,
                'add_price' => 0
            ],

            // ダブルエスプレッソのオプション
            [
                'menu_id' => $doubleEspresso->id,
                'option_menu_id' => $whippedCream->id,
                'add_price' => 50
            ],
            [
                'menu_id' => $doubleEspresso->id,
                'option_menu_id' => $cinnamon->id,
                'add_price' => 0
            ],

            // カフェラテのオプション
            [
                'menu_id' => $latte->id,
                'option_menu_id' => $soyMilk->id,
                'add_price' => 50
            ],
            [
                'menu_id' => $latte->id,
                'option_menu_id' => $almondMilk->id,
                'add_price' => 50
            ],
            [
                'menu_id' => $latte->id,
                'option_menu_id' => $vanillaSyrup->id,
                'add_price' => 70
            ],
            [
                'menu_id' => $latte->id,
                'option_menu_id' => $caramelSyrup->id,
                'add_price' => 70
            ],
            [
                'menu_id' => $latte->id,
                'option_menu_id' => $extraShot->id,
                'add_price' => 100
            ],

            // バニラクリームフラペチーノのオプション
            [
                'menu_id' => $vanillaFrappuccino->id,
                'option_menu_id' => $extraShot->id,
                'add_price' => 100
            ],
            [
                'menu_id' => $vanillaFrappuccino->id,
                'option_menu_id' => $whippedCream->id,
                'add_price' => 50
            ],
            [
                'menu_id' => $vanillaFrappuccino->id,
                'option_menu_id' => $chocolateSauce->id,
                'add_price' => 70
            ],
            [
                'menu_id' => $vanillaFrappuccino->id,
                'option_menu_id' => $caramelSyrup->id,
                'add_price' => 70
            ],
            [
                'menu_id' => $vanillaFrappuccino->id,
                'option_menu_id' => $extraIce->id,
                'add_price' => 0
            ]
        ];

        foreach ($options as $option) {
            Options::create($option);
        }
    }
}
