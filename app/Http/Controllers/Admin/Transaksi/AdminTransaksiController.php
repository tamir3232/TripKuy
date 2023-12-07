<?php

namespace App\Http\Controllers\Admin\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Kursi;
use App\Models\Penumpang;
use App\Models\Ticket;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function index(Request $request)
    {

        if ($request->status) {
            $transaksi = Transaksi::where('status', $request->status)->get();
        } else {
            $transaksi = Transaksi::get();
        }



        return view('Admin.pesanan.pesananBaru')->with(['transaksi' => $transaksi]);
    }

    public function show($id)
    {

        $transaksi = Transaksi::where('id', $id)->first();
        return view('Admin.pesanan.DetailPesanan')->with(['transaksi' => $transaksi]);
    }
    public function store(Request $request)
    {

        // $transaksi = Transaksi::where('id', $id)->first();
        // $transaksi->update([
        //     "status" => $request->status,
        // ]);

        // return view('Admin.pesanan.DetailPesanan')->with(['transaksi' => $transaksi]);
    }
    public function update(Request $request, $id)
    {

        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->update([
            "status" => $request->status,
        ]);

        if ($request->status == 'Pembayaran Ditolak') {
            $tiket = Ticket::where('transaksi_id', $transaksi->id)->get();
            $penumpangId = $tiket->pluck('penumpang_id')->toArray();

            foreach ($penumpangId as $p) {
                $kursi = Kursi::where('penumpang_id', $p)->first();
                $kursi->update([
                    'penumpang_id' => null,
                ]);
            }
        }
        return view('Admin.pesanan.DetailPesanan')->with(['transaksi' => $transaksi]);
    }
}
