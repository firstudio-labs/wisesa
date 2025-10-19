<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use App\Models\Galeri;

class GalleryController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();
        $galeris = Galeri::all();
        return view('page_web.gallery.index', compact('beranda', 'galeris'));
    }

    public function detail()
    {
        return view('page_web.gallery.detail');
    }
}