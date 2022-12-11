<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Gerente;
use Illuminate\Support\Facades\Auth;


class ClienteController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all()->sortBy('nome', SORT_NATURAL|SORT_FLAG_CASE);

        $gerente = Gerente::where('id_gerente', Auth::user()->id)->first();

        return view('clientes.index', compact('clientes', 'gerente'));
    }
}
