<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footerScript = 'dashboard.js' ;
        $page = 'dashboard';
        return view('dashboard')
        ->with('page',$page)
        ->with('footerScript',$footerScript);
    }
}
