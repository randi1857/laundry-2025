<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrukturDataController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function proses(Request $request)
    {
        $layanan = explode(',', $request->input('layanan'));
        $tarif = explode(',', $request->input('tarif'));
        $promo = explode(',', $request->input('promo'));

        return view('hasil', compact('layanan', 'tarif', 'promo'));
    }
}
