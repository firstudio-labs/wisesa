<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('page_web.contact.index');
    }
}