<?php

namespace App\Http\Controllers;

use App\Models\Mobil;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::latest()->get();

        return view('mobil.index', compact('mobils'));
    }
}