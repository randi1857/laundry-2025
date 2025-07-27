<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TreeController extends Controller
{
    public function index()
    {
        $tree = Session::get('tree', []);
        return view('tree', compact('tree'));
    }

    public function tambah(Request $request)
    {
        $tree = Session::get('tree', []);
        $id = uniqid();
        $tree[$id] = [
            'nama' => $request->nama,
            'induk' => $request->induk ?: null,
        ];
        Session::put('tree', $tree);
        return redirect()->route('tree.index');
    }

    public function reset()
    {
        Session::forget('tree');
        return redirect()->route('tree.index');
    }
}
