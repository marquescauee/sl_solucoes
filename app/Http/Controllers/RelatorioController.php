<?php

namespace App\Http\Controllers;

use App\Exports\ServicosExport;
use App\Models\Gerente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RelatorioController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('gerenteMiddleware');
    }

    public function index() {
        $gerente = Gerente::where('id_gerente', Auth::user()->id)->first();

        return view('relatorios', compact('gerente'));
    }

    public function exportar() {
        return Excel::download(new ServicosExport, 'servicos.xlsx');
    }

}
