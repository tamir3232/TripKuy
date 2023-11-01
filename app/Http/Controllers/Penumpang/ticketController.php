<?php

namespace App\Http\Controllers\Penumpang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ticketController extends Controller
{
    public function index()
    {
        return view('Penumpang.Keberangkatan.ticket');
    }
}
