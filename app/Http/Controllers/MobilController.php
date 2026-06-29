<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::latest()->get();

        return view('mobil.index', compact('mobils'));
    }
    public function create()
{
    return view('mobil.create');
}
}