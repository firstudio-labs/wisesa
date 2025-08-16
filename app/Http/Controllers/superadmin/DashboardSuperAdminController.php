<?php

namespace App\Http\Controllers\superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardSuperAdminController extends Controller
{
 public function index(){
    return view('pagesuperadmin.dashboard.index');
 }
}
