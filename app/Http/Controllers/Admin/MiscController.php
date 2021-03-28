<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\_AdminControllerBase;

class MiscController extends _AdminControllerBase
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Admin/index-dashboard');
    }
}
