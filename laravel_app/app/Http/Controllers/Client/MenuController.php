<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\BigCategory;

class MenuController extends Controller
{
    //
    public function top()
    {

        $categoryIds = [1, 2, 3, 4, 5, 6];
        $bigCategories = BigCategory::whereIn('id', $categoryIds)->with('menus')->get();

        $menusPickImages = [];
        foreach ($bigCategories as $bigCategory) {
            if ($bigCategory->menus->isNotEmpty()) {
                $randomMenu = $bigCategory->menus->random();
                $menusPickImages[] = [$bigCategory->id,$randomMenu->sub_category_id,$bigCategory->name,$randomMenu->image_path];
            }
        }

        return view('Page.UserSide.menu-top', compact('menusPickImages'));
    }
    public function index(Request $request)
    {
        $bigCategoryId = intval($request->cookie('bigCategoryID'));
        $subCategoryId = intval($request->cookie('subCategoryID'));

        return view('Page.UserSide.menu-index', compact('bigCategoryId', 'subCategoryId'));
    }
    public function setCookies(Request $request)
    {
        $bigCategoryId = $request->input('bigCategoryID');
        $subCategoryId = $request->input('subCategoryID');

        // Laravelがクッキーを自動的に暗号化します
        return response()->json(['status' => 'success'])
            ->cookie('bigCategoryID', $bigCategoryId, 60)
            ->cookie('subCategoryID', $subCategoryId, 60);
    }
}
