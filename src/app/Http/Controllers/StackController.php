<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StackController extends Controller
{
    public function index()
    {
        $stack = Session::get('riwayat', []);
        return view('stack', compact('stack'));
    }

    public function tambah(Request $request)
    {
        $stack = Session::get('riwayat', []);
        $stack[] = $request->nama;
        Session::put('riwayat', $stack);
        return redirect()->route('stack.index');
    }

    public function undo()
    {
        $stack = Session::get('riwayat', []);
        array_pop($stack);
        Session::put('riwayat', $stack);
        return redirect()->route('stack.index');
    }

    public function reset()
    {
        Session::forget('riwayat');
        return redirect()->route('stack.index');
    }
}
