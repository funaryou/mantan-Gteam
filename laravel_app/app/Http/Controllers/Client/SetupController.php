<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\Table;

class SetupController extends Controller
{
    //
    public function index()
    {
        $lang = ['日本語', '中文簡体', 'English'];
        $person_count = ['1人', '2人', '3人', '4人', '5人以上'];
        return view('Page.UserSide.setup', compact('lang', 'person_count'));
    }

    public function store(Request $request)
    {
        $tableNumber = $request->cookie('table_number');
        if (!$tableNumber) {
            return redirect()->route('client.menu.index');
        }
        $table = Table::where('number', $tableNumber)->first();

        if (!$table) {
            return response()->json(['error' => 'Table not found.'], 404);
        }

        if ($table->session_id && $table->session_expires_at > now()) {
            $response = redirect()->route('client.menu.home');
            return $response->cookie('table_session_id', $table->session_id, 90);
        }

        $sessionId = Str::uuid();
        $table->session_id = $sessionId;
        $table->session_expires_at = now()->addMinutes(90);
        $table->save();

        $response = redirect()->route('client.menu.home');
        return $response->cookie('table_session_id', $sessionId, 90);
    }
}