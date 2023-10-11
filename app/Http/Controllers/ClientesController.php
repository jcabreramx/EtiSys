<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ClientesController extends Controller
{
    public function index()
    {
        return view('clientes.index');
    }

    public function apiClientes() {

        $clientes = DB::table('v_Empresas')->get();

        return DataTables::of($clientes)
        ->make(true);

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
