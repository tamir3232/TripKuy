<?php

namespace App\Http\Controllers\Keberangkatan;

use App\Http\Controllers\Controller;
use App\Models\keberangkatan;
use App\Models\Kursi;
use App\Models\Penumpang;
use App\Models\Ticket;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class KeberangkatanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::id();

        if ($request->status) {
            $keberangkatans = keberangkatan::where('user_id', $user)->with('bus')->where('status', $request->status)->get();
        } else {
            $keberangkatans = keberangkatan::where('user_id', $user)->with('bus')->get();
        }

        // foreach ($keberangkatans as $keberangkatan) {


        //     var_dump(Carbon::parse($keberangkatan->keberangkatan)->format('h:i'));
        //     exit;
        // }


        // return $keberangkatans->bus;
        return view('Admin.Keberangkatan.index')->with('keberangkatans', $keberangkatans);
    }


    public function show($id)
    {

        $keberangkatan = keberangkatan::where('id', $id)->first();
        if (auth()->user()->id != $keberangkatan->user_id) {
            abort(403);
        }
        $transaksis = Transaksi::where('keberangkatan_id', $keberangkatan->id)->where('status', '!=', 'Pemesanan Dibatalkan')->get();
        $dataPenumpang = null;
        foreach ($transaksis as $transaksi) {
            $tikets = Ticket::where('transaksi_id', $transaksi->id)->get();
            foreach ($tikets as $tiket) {
                $penumpang = Penumpang::where('id', $tiket->penumpang_id)->first();
                $kursi = kursi::where('penumpang_id', $penumpang->id)->first();
                $dataPenumpang[] = [
                    "penumpang" => $penumpang,
                    "transaksi" => $transaksi,
                    "kursi"     => $kursi->nama ?? null,
                ];
            }
        }


        // return $dataPenumpang;
        // $tiket->load('penumpang');

        return view('Admin.Keberangkatan.detail')->with([
            'keberangkatan' => $keberangkatan,
            'penumpang'     => $dataPenumpang
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        var_dump('halo');
        exit;
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $keberangkatan = keberangkatan::where('id', $id)->first();
        $keberangkatan->update([
            "status" => $request->status,
        ]);

        $transaksis = Transaksi::where('keberangkatan_id', $keberangkatan->id)->where('status', '!=', 'Pemesanan Dibatalkan')->get();
        $dataPenumpang = null;
        foreach ($transaksis as $transaksi) {
            $tikets = Ticket::where('transaksi_id', $transaksi->id)->get();
            foreach ($tikets as $tiket) {
                $penumpang = Penumpang::where('id', $tiket->penumpang_id)->first();
                $kursi = kursi::where('penumpang_id', $penumpang->id)->first();
                $dataPenumpang[] = [
                    "penumpang" => $penumpang,
                    "transaksi" => $transaksi,
                    "kursi"     => $kursi->nama ?? null,
                ];
            }
        }


        // return $dataPenumpang;
        // $tiket->load('penumpang');

        return view('Admin.Keberangkatan.detail')->with([
            'keberangkatan' => $keberangkatan,
            'penumpang'     => $dataPenumpang
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
