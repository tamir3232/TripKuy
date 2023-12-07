<?php

namespace App\Http\Controllers\Penumpang;

use App\Http\Controllers\Controller;
use App\Models\keberangkatan;
use App\Models\Kursi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KursiController extends Controller
{
    public function index(Request $request)
    {
        $keberangkatan = keberangkatan::where('id', $request->keberangkatan_id)->first();
        if (!$keberangkatan) {
            abort(403);
        }
        $kursis = Kursi::where('keberangkatan_id', $keberangkatan->id)->orderBy('nama')->get();
        // return $kursis;
        return view('Penumpang.Keberangkatan.kursi')->with([
            'keberangkatan' => $keberangkatan,
            'kursis' => $kursis
        ]);
    }
}
