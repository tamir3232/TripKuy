<?php

namespace App\Http\Controllers\Penumpang;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\keberangkatan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class MyticketController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $transaksis = Transaksi::where("user_id", $user_id)->get();
        $data = [];
        foreach ($transaksis as $transaksi) {
            $keberangkatan = keberangkatan::where('id', $transaksi->keberangkatan_id)->first();
            $keberangkatan->load('user');
            if ($keberangkatan) {
                $bus = Bus::orwhere('id', $keberangkatan->bus_id)->first();
                $data[] = [
                    "transaksi" => $transaksi,
                    "keberangkatan" => $keberangkatan,
                    "bus"   => $bus,
                ];
            }
        }
        // return $data;
        return view('Penumpang.Keberangkatan.MyTicket')->with([
            'datas' => $data
        ]);
    }
}
