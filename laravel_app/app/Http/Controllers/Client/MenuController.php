<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\BigCategory;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Log;

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

        return view('Page.UserSide.menu-top', compact('menusPickImages', 'bigCategories'));
    }
    public function index(Request $request)
    {
        $selectBigCategoryId = intval($request->cookie('selectBigCategoryID', 0));
        $selectSubCategoryId = intval($request->cookie('selectSubCategoryID', 0));
        
        // Debug: Log the cookie values
        Log::info('Cookie values:', [
            'selectBigCategoryID' => $request->cookie('selectBigCategoryID'),
            'selectSubCategoryID' => $request->cookie('selectSubCategoryID')
        ]);
        
        // Get all big categories
        $bigCategories = BigCategory::all();
        
        // Get sub categories based on selected big category
        $subCategories = collect();
        if ($selectBigCategoryId > 0) {
            $subCategories = SubCategory::where('big_category_id', $selectBigCategoryId)->get();
        }
        
        // Debug: Log the retrieved categories
        Log::info('Retrieved big categories:', $bigCategories->toArray());
        Log::info('Retrieved sub categories:', $subCategories->toArray());
        return view('Page.UserSide.menu-index', [
            'selectBigCategoryId' => $selectBigCategoryId,
            'selectSubCategoryId' => $selectSubCategoryId,
            'bigCategories' => $bigCategories,
            'subCategories' => $subCategories
        ]);
    }
    public function setCookies(Request $request)
    {
        $selectBigCategoryId = $request->input('bigCategoryID');
        $selectSubCategoryId = $request->input('subCategoryID');
        
        // Laravelがクッキーを自動的に暗号化します
        return response()->json(['status' => 'success'])
            ->cookie('selectBigCategoryID', $selectBigCategoryId, 60)
            ->cookie('selectSubCategoryID', $selectSubCategoryId, 60);
    }
}
