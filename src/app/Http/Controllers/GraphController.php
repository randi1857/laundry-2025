<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GraphController extends Controller
{
    public function index()
    {
        $graph = Session::get('graph', []);
        return view('graph', compact('graph'));
    }

    public function tambahEdge(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        $graph = Session::get('graph', []);

        $graph[$from][] = $to;
        $graph[$to][] = $from; // jika graf tak berarah

        Session::put('graph', $graph);
        return redirect()->route('graph.index');
    }

    public function reset()
    {
        Session::forget('graph');
        return redirect()->route('graph.index');
    }
}
