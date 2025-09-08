<?php

namespace App\Http\Controllers\Test;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewComponentController extends Controller
{
    //
    public function index()
    {
        $person_count = ['1人', '2人', '3人', '4人', '5人以上'];
        $lang = ['日本語', '中文簡体', 'English'];
        return view('Page.ViewComponents.test', compact('person_count', 'lang'));
    }
}
