<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // エスプレッソのメニュー
        $espresso = SubCategory::where('name', 'エスプレッソ')->first();
        $menus = [
            [
                'sub_category_id' => $espresso->id,
                'name' => 'エスプレッソ',
                'description' => '濃厚な味わいのエスプレッソ',
                'image_path' => 'images/espresso.jpg',
                'price' => 450
            ],
            [
                'sub_category_id' => $espresso->id,
                'name' => 'ダブルエスプレッソ',
                'description' => '通常の2倍の量のエスプレッソ',
                'image_path' => 'images/double_espresso.jpg',
                'price' => 550
            ]
        ];

        // カフェラテのメニュー
        $latte = SubCategory::where('name', 'カフェラテ')->first();
        $menus = array_merge($menus, [
            [
                'sub_category_id' => $latte->id,
                'name' => 'カフェラテ',
                'description' => 'まろやかな味わいのカフェラテ',
                'image_path' => 'images/latte.jpg',
                'price' => 500
            ]
        ]);

        // アールグレイのメニュー
        $earlGrey = SubCategory::where('name', 'アールグレイ')->first();
        $menus = array_merge($menus, [
            [
                'sub_category_id' => $earlGrey->id,
                'name' => 'アールグレイティー',
                'description' => 'ベルガモットの香りが特徴の紅茶',
                'image_path' => 'images/earl_grey.jpg',
                'price' => 400
            ]
        ]);

        // クリームベースのフラペチーノ
        $creamFrappuccino = SubCategory::where('name', 'クリームベース')->first();
        $menus = array_merge($menus, [
            [
                'sub_category_id' => $creamFrappuccino->id,
                'name' => 'バニラクリームフラペチーノ',
                'description' => 'バニラの風味が楽しめるクリーミーなフラペチーノ',
                'image_path' => 'images/vanilla_frappuccino.jpg',
                'price' => 600
            ]
        ]);

        // サンドイッチのメニュー
        $sandwich = SubCategory::where('name', 'サンドイッチ')->first();
        $menus = array_merge($menus, [
            [
                'sub_category_id' => $sandwich->id,
                'name' => 'チキンアボカドサンド',
                'description' => 'ジューシーなチキンとアボカドのサンドイッチ',
                'image_path' => 'images/chicken_avocado_sandwich.jpg',
                'price' => 750
            ]
        ]);

        // ケーキのメニュー
        $cake = SubCategory::where('name', 'ケーキ')->first();
        $menus = array_merge($menus, [
            [
                'sub_category_id' => $cake->id,
                'name' => 'チーズケーキ',
                'description' => '濃厚な味わいのチーズケーキ',
                'image_path' => 'images/cheesecake.jpg',
                'price' => 650
            ],
            [
                'sub_category_id' => $cake->id,
                'name' => 'チョコレートケーキ',
                'description' => 'リッチなチョコレートケーキ',
                'image_path' => 'images/chocolate_cake.jpg',
                'price' => 680
            ]
        ]);

        // クッキーのメニュー
        $cookie = SubCategory::where('name', 'クッキー')->first();
        $menus = array_merge($menus, [
            [
                'sub_category_id' => $cookie->id,
                'name' => 'チョコチップクッキー',
                'description' => 'サクサク食感のチョコチップクッキー',
                'image_path' => 'images/chip_cookie.jpg',
                'price' => 300
            ]
        ]);

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
