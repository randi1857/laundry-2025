<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QueueLaundryController extends Controller
{
    public function index()
    {
        $queue = Session::get('antrian', []);
        return view('antrian', compact('queue'));
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'layanan' => 'required|string',
        ]);

        $pelanggan = [
            'nama' => $request->nama,
            'layanan' => $request->layanan,
        ];

        $queue = Session::get('antrian', []);
        $queue[] = $pelanggan;
        Session::put('antrian', $queue);

        return redirect()->route('antrian.index');
    }

    public function layani()
    {
        $queue = Session::get('antrian', []);
        if (!empty($queue)) {
            array_shift($queue); // hapus pelanggan pertama
            Session::put('antrian', $queue);
        }

        return redirect()->route('antrian.index');
    }
}
