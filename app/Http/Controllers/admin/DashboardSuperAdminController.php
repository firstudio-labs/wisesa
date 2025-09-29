<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardSuperAdminController extends Controller
{
 public function index(){
    return view('page_admin.dashboard.index');
 }
}
