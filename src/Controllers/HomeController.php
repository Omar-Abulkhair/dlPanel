<?php

namespace Dl\Panel\Controllers;

use Illuminate\Http\Request;

class HomeController extends DlController
{
    /**
     * Create a new DlController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
