<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ds_pagina = 'DASHBOARD';
        return view('home', compact('ds_pagina'));
    }
}
