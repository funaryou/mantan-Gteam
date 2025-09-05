<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewComponentController extends Controller
{
    //
    public function index()
    {
        return view('Page.TemplateSide.test');
    }
}
