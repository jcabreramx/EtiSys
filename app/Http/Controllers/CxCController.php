<?php

namespace App\Http\Controllers;

use App\Traits\PermisosTrait;
use Illuminate\Http\Request;

class CxCController extends Controller
{
    use PermisosTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->permisos();
        if (session('AccesoCxC') == 1) {
            return view('cxc.index');
        } else {
            return redirect()->route('home');
        }

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}
