<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\keberangkatan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $keberangkatans = keberangkatan::where('user_id', $user_id)->get();
        $keberangaktanTersedia = $keberangkatans->where('status', 'ONGOING')->count();
        $keberangaktanSelesai = $keberangkatans->where('status', 'COMPLETE')->count();
        $pesananBaru = 0;
        $pesananSelesai = 0;
        $keberangkatanid = keberangkatan::where('user_id', $user_id)->pluck('id')->toArray();


        foreach ($keberangkatans as $keberangkatan) {
            $pesananBaruExist = Transaksi::where('keberangkatan_id', $keberangkatan->id)->where('status', 'Pengecekan Pembayaran')->count();
            $pesananSelesaiExist = Transaksi::where('keberangkatan_id', $keberangkatan->id)->where('status', 'Pembayaran Diterima')->count();
            $pesananBaru += $pesananBaruExist;
            $pesananSelesai += $pesananSelesaiExist;
        }

        $pesananExist = Transaksi::whereIn('keberangkatan_id', $keberangkatanid)
            ->where('status', 'Pembayaran Diterima')
            ->selectRaw('DATE(created_at) as tanggal, COUNT(*) as total_transaksi')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();
        $total_transaksi = $pesananExist->pluck('total_transaksi')->toArray();
        $tanggal_transaksi = $pesananExist->pluck('tanggal')->toArray();
        return view('Admin.index')->with([
            'pesananBaru' => $pesananBaru,
            'pesananSelesai' => $pesananSelesai,
            'keberangaktanTersedia'  => $keberangaktanTersedia,
            'keberangaktanSelesai'  => $keberangaktanSelesai,
            'tanggal_transaksi' =>   $tanggal_transaksi,
            'total_transaksi' => $total_transaksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
