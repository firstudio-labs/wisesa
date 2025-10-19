<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Beranda;

class ServiceController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();
        return view('page_web.service.index', compact('beranda'));
    }

    public function detail()
    {
        return view('page_web.service.detail');
    }
}