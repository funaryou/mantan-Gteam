<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Cart;
use App\Models\BigCategory;
use App\Models\SubCategory;
use App\Models\Table;

class MenuController extends Controller
{
    //
    public function top(Request $request)
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

        // カート取得
        $tableSessionId = $request->cookie('tableSessionId');
        $carts = collect();
        if ($tableSessionId) {
            $table = Table::where('session_id', $tableSessionId)->first();
            if ($table) {
                $carts = $table->carts()->with('menu')->get();
            }
        }

        return view('Page.UserSide.menu-top', compact('menusPickImages', 'bigCategories', 'carts'));
    }
    public function index(Request $request)
    {
        $selectBigCategoryId = intval($request->cookie('selectBigCategoryID', 0));
        $selectSubCategoryId = intval($request->cookie('selectSubCategoryID', 0));
        
        // tableSessionIdからテーブルを取得し、そのテーブルのcartsを取得
        $tableSessionId = $request->cookie('tableSessionId');
        $carts = collect();
        if ($tableSessionId) {
            $table = Table::where('session_id', $tableSessionId)->first();
            if ($table) {
                $carts = $table->carts()->with('menu')->get();
            }
        }
        
        $bigCategories = BigCategory::all();
        
        $subCategories = collect();
        if ($selectBigCategoryId > 0) {
            $subCategories = SubCategory::where('big_category_id', $selectBigCategoryId)->get();
        }

        return view('Page.UserSide.menu-index', [
            'selectBigCategoryId' => $selectBigCategoryId,
            'selectSubCategoryId' => $selectSubCategoryId,
            'bigCategories' => $bigCategories,
            'subCategories' => $subCategories,
            'carts' => $carts,
        ]);
    }
    public function setCookies(Request $request)
    {
        $selectBigCategoryId = $request->input('bigCategoryID');
        $selectSubCategoryId = $request->input('subCategoryID');
        
        return response()->json(['status' => 'success'])
            ->cookie('selectBigCategoryID', $selectBigCategoryId, 60)
            ->cookie('selectSubCategoryID', $selectSubCategoryId, 60);
    }
}
