<?php

namespace App\Http\Controllers;

use App\Traits\PermisosTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    use PermisosTrait;
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
        $this->permisos();
        return view('home');
    }
}
