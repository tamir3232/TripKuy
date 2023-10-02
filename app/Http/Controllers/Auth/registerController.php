<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Register.index');
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


        $validasi = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required'

        ]);
        $user = User::create([
            'name' => $request->name ?? NULL,
            'username' => $request->username ?? NULL,
            'email' => $request->email ?? NULL,
            'password' => bcrypt($request->password) ?? NULL,
            'alamat' => $request->alamat ?? NULL,
            'role' => $request->role ?? NULL,
        ]);

        session()->flash('Success', 'Registration successfull');
        // $request->session()->flash('status', 'Task was successful!');

        return redirect('/login');
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
