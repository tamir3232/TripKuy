<?php

namespace App\Http\Controllers\Penumpang;

use App\Http\Controllers\Controller;
use App\Models\keberangkatan;
use App\Models\Kursi;
use App\Models\Penumpang;
use App\Models\Ticket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FormPesananController extends Controller
{
    public function index(Request $request)
    {
        $seat = explode(",", $request->seat);
        // $query = $request->query();
        $keberangkatan = $request->keberangkatan_id;
        return view('Penumpang.Keberangkatan.formPesan')->with([
            'seats' => $seat,
            'keberangkatan' => $keberangkatan,
        ]);
    }



    public function store(Request $request)
    {
        function generateRandomString($length)
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';

            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }

            return $randomString;
        }
        $auth = Auth::id();
        // var_dump($request->seat);
        // exit;
        // Call the function to generate a random string of a specific length
        $randomString = generateRandomString(5);
        $keberangkatan = keberangkatan::where('id', $request->keberangkatan)->first();
        $total = count($request->nama);

        $transaksi = Transaksi::create([
            'code'      => $randomString,
            'status'    => 'Menunggu Pembayaran',
            'user_id'   => $auth,
            'keberangkatan_id' => $request->keberangkatan,
            'total_price' => $keberangkatan->price * $total,

        ]);



        for ($i = 0; $i < $total; $i++) {
            $penumpang = Penumpang::create([
                'name' => $request->nama[$i],
                'alamat' => $request->alamat[$i],
                'no_wa'  => $request->no_wa,
                'email' =>  $request->email,
            ]);
            $kursi = Kursi::where('keberangkatan_id', $request->keberangkatan)->where('nama', $request->seat[$i])->first();


            $kursi->update(['penumpang_id' => $penumpang->id]);

            $ticket = Ticket::create([
                'code' => $transaksi->code,
                'penumpang_id' => $penumpang->id,
                'transaksi_id' => $transaksi->id,
                'kursi_id'  => $kursi->id,
            ]);
        }

        return view('Penumpang.Keberangkatan.Pembayaran')->with([
            'transaksi' => $transaksi,
            'keberangkatan' => $keberangkatan,
        ]);
    }
}
