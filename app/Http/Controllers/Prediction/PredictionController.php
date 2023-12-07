<?php

namespace App\Http\Controllers\Prediction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PredictionController extends Controller
{

    public function index(Request $request)
    {
        $client = new Client();


        if ($request->ac) {
            $ac = 1;
        } else {
            $ac = 0;
        }

        if ($request->sleeper) {
            $sleeper = 1;
        } else {
            $sleeper = 0;
        }

        if ($request->charging_station) {
            $charging_station = 1;
        } else {
            $charging_station = 0;
        }

        if ($request->wifi) {
            $wifi = 1;
        } else {
            $wifi = 0;
        }

        if ($request->bantal) {
            $bantal = 1;
        } else {
            $bantal = 0;
        }


        if ($request->selimut) {
            $selimut = 1;
        } else {
            $selimut = 0;
        }

        if ($request->kursi_l) {
            $kursi_l = 1;
        } else {
            $kursi_l = 0;
        }


        if ($request->kursi_xl) {
            $kursi_xl = 1;
        } else {
            $kursi_xl = 0;
        }


        if ($request->kursi_xll) {
            $kursi_xll = 1;
        } else {
            $kursi_xll = 0;
        }

        if ($request->non_stop) {
            $non_stop = 1;
        } else {
            $non_stop = 0;
        }

        if ($request->toilet) {
            $toilet = 1;
        } else {
            $toilet = 0;
        }

        if ($request->makan) {
            $makan = 1;
        } else {
            $makan = 0;
        }

        if ($request->minum) {
            $minum = 1;
        } else {
            $minum = 0;
        }
        if ($request->sandaran_kaki) {
            $sandaran_kaki = 1;
        } else {
            $sandaran_kaki = 0;
        }
        if ($request->smoking_room) {
            $smoking_room = 1;
        } else {
            $smoking_room = 0;
        }

        try {
            $response = $client->request('GET', 'http://127.0.0.1:9005/api/items', [
                'headers' => [
                    'Accept' => 'application/json',
                    // Jika diperlukan autentikasi, tambahkan header Authorization di sini
                ],
                'json' => [
                    // Data yang ingin Anda kirim dalam body request
                    'ac' => $ac,
                    'sleeper' => $sleeper,
                    'charging_station' => $charging_station,
                    'wifi' => $wifi,
                    'bantal' => $bantal,
                    'selimut' => $selimut,
                    'kursi_l' => $kursi_l,
                    'kursi_xl' => $kursi_xl,
                    'kursi_xll' => $kursi_xll,
                    'non_stop' => $non_stop,
                    'toilet' => $toilet,
                    'makan' => $makan,
                    'minum' => $minum,
                    'sandaran_kaki' => $sandaran_kaki,
                    'smoking_room' => $smoking_room,
                    'harga_bbm' => $request->harga_bbm ?? 0,
                    'jarak' => $request->jarak ?? 0,
                ]
            ]);

            $statusCode = $response->getStatusCode(); // Mendapatkan kode status respons
            $data = json_decode($response->getBody(), true); // Mendapatkan data dari respons dalam format JSON
            return $data;
            // Lakukan sesuatu dengan respons yang diterima dari API Django
            // Contoh: Menampilkan data
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Tangani kesalahan jika permintaan tidak berhasil
            echo "Error: " . $e->getMessage();
        }
    }
}
