<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayats = \App\Models\RiwayatPeriksa::where('pasien_id', auth()->user()->id)->get();

        return view('pasien/riwayat.index', compact('riwayats'));
    }

}
