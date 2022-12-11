<?php

namespace App\Http\Controllers;

use App\Models\Gerente;
use Illuminate\Http\Request;
use App\Models\Equipamento;
use Illuminate\Support\Facades\Auth;

class EquipamentoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $equipamentos = Equipamento::all()->sortBy('nome', SORT_NATURAL|SORT_FLAG_CASE);

        $gerente = Gerente::where('id_gerente', Auth::user()->id)->first();

        return view('equipamentos.index', ['equipamentos' => $equipamentos, 'gerente' => $gerente]);
    }
}
