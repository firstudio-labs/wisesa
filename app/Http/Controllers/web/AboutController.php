<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Beranda;

class AboutController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();
        return view('page_web.tentang.index', compact('beranda'));
    }
}