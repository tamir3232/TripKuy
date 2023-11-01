<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\keberangkatan;
use App\Models\Kursi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class AdminKeberangkatancontroller extends Controller
{
    public function index()
    {
        $bus = Bus::get();

        return view('Admin.Keberangkatan.form')->with('bus', $bus);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return view('Login.index');

        $user = Auth::id();
        $newDate = date("d-m-Y", strtotime($request->date));
        $Keberangkatan = keberangkatan::create([
            'user_id'           => $user,
            'from'          => $request->from,
            'to'            => $request->to,
            'bus_id'            => $request->bus,
            'date'              => $request->date,
            'price'             => $request->price,
            'ac'                => $request->ac ?? false,
            'kamar_mandi'       => $request->kamar_mandi ?? false,
            'tv'                => $request->tv ?? false,
            'sleeper'           => $request->sleeper ?? false,
            'wifi'              => $request->wifi ?? false,
            'charging_station'  => $request->charging_station ?? false,
            'bantal'            => $request->bantal ?? false,
            'selimut'           => $request->selimut ?? false,
            'bagasi'            => $request->bagasi ?? false,
            'selimut'           => $request->selimut ?? false,
            'kursi_L'           => $request->kursi_l ?? false,
            'kursi_xl'          => $request->kursi_xl ?? false,
            'kuris_xll'         => $request->kursi_xll ?? false,
            'status'            => 'ONGOING',
            'keberangkatan'     => $request->keberangkatan ?? false,
            'sampai'            => $request->sampai ?? false,
        ]);

        $bus = Bus::where('id', $request->bus)->first();

        for ($i = 0; $i < $bus->kapasistas; $i++) {
            Kursi::create([
                'nama' => $i + 1,
                'keberangkatan_id' => $Keberangkatan->id,
            ]);
        }
        return redirect('/keberangkatan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
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
