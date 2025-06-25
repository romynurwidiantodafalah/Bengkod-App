<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $role = auth()->user()->role;

        if ($role == 'admin') {
            return redirect('/admin');
        } elseif ($role == 'dokter') {
            return redirect('/dokter');
        } elseif ($role == 'pasien') {
            return redirect('/pasien');
        }

        return redirect('/');
    }

    public function dokter()
    {
        return view('dokter.index');
    }
}
