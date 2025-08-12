<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Elemen;
use App\Models\Link;

class PreviewController extends Controller
{
    public function index()
    {
        $link = Link::where('user_id', auth()->user()->id)->first();
        
        // Process order and hidden data
        $order = [];
        $hidden = [];
        
        if ($link && isset($link->data_link['order'])) {
            $order = $link->data_link['order'];
        }
        
        if ($link && isset($link->data_link['hidden'])) {
            $hidden = $link->data_link['hidden'];
        }
        
        return view('pageuser.preview.index', compact('link', 'order', 'hidden'));
    }
}