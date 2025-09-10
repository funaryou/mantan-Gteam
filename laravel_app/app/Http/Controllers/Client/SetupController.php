<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\Table;
use Symfony\Component\Console\Completion\Output\BashCompletionOutput;
class SetupController extends Controller
{
    //
    public function index()
    {
        $lang = ['日本語', '中文簡体', 'English'];
        $person_count = ['1人', '2人', '3人', '4人', '5人以上'];
        $view = view('Page.UserSide.setup', compact('lang', 'person_count'));
        return response($view)->cookie('tableNumber', 900, 60*60*24*30);
    }

    public function store(Request $request)
    {
        $tableNumber = intval($request->cookie('tableNumber'));
        if (!$tableNumber) {
            return redirect()->route('client.menu.top');
        }

        $table = Table::where('number', $tableNumber)->first();
        // dd($table->toArray());
        if ($table && $table->session_expires_at > now()) {
            $response = redirect()->route('client.menu.top');
            return $response->cookie('tableSessionId', $table->session_id);
        }
        
        $sessionId = Str::uuid();
        $table = Table::create([
            'number' => $tableNumber,
            'lang' => $request->lang,
            'person_count' => $request->person_count,
            'session_id' => $sessionId,
            'session_expires_at' => now()->addMinutes(90),
        ]);

        $response = redirect()->route('client.menu.top');
        return $response->cookie('tableSessionId', $sessionId);
    }
}
