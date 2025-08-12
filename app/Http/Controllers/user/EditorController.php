<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Elemen;
use App\Models\Link;

class EditorController extends Controller
{
    public function index()
    {
        $link = Link::where('user_id', auth()->user()->id)->first();
        return view('pageuser.editor.index', compact('link'));
    }
}