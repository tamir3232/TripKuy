<?php

namespace App\Http\Controllers\Penumpang;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Transaksi;
use Illuminate\Http\Request;


class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $transaksi = session()->get('transaksi');
        $keberangkatan = session()->get('keberangkatan');

        // return $transaksi;
        return view('Penumpang.Keberangkatan.Pembayaran')->with([
            'transaksi' => $transaksi ?? $request->transaksii,
            'keberangkatan' => $keberangkatan ?? $request->keberangkatan,
        ]);;
    }

    public function show($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $tiket = Ticket::where('transaksi_id', $transaksi->id)->get();
        $tiket->load('penumpang');

        // $keberangkatan = session()->get('keberangkatan');

        // return $transaksi;
        return view('Penumpang.Keberangkatan.Pembayaran')->with([
            'transaksi' => $transaksi,
            'tikets' => $tiket,
        ]);
    }






    public function store(Request $request)
    {

        $transaksiExist = Transaksi::where('id', $request->transaksi)->first();
        if (!$request->images) {
            $transaksiExist->update([
                'status'     => "Pemesanan Dibatalkan",
            ]);

            return redirect('/');
        }


        $image = $request->file('images');
        $image->storeAs('post-image', $image->hashName());
        // $save = $request->file('images')->store('post-image');

        $transaksiExist->update([
            'attachment' =>  $image->hashName(),
            'status'     => "Pengecekan Pembayaran",
        ]);

        return redirect('/');
    }
}
