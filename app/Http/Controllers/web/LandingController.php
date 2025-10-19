<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Beranda;

class LandingController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();
        return view('page_web.landing.index', compact('beranda'));
    }
}