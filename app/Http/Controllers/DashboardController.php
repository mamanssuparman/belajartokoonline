<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('layouts.admin.kerangka',[
            'title'         => 'Admin | Dashboard',
            'breadcrumb1'   => 'Dashboard',
            'breadcrumb2'   => 'Dashboard'
        ]);
    }
}
