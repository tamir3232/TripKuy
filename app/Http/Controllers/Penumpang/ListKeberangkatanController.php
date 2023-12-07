<?php

namespace App\Http\Controllers\Penumpang;

use App\Http\Controllers\Controller;
use App\Models\keberangkatan;
use Illuminate\Http\Request;

class ListKeberangkatanController extends Controller
{
    public function index(Request $request)
    {
        $keberangkatan = keberangkatan::where('from', $request->from)->where('to', $request->to)->where('date', $request->date)->get();
        $keberangkatan->load('user');
        
        return view('Penumpang.Keberangkatan.Keberangkatan')->with([
            'keberangkatans' => $keberangkatan,
            'request'       => $request,
        ]);
    }


    public function show($id)
    {
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //c
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
