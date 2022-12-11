<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\Problema;
use Illuminate\Http\Request;
use App\Models\Gerente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServicoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('funcionarioMiddleware');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gerente = Gerente::where('id_gerente', Auth::user()->id)->first();

        $servicos = DB::table('servicos')
        ->join('solicitacoes', 'servicos.id_servico', 'solicitacoes.id_solicitacao')
        ->join('clientes', 'clientes.id_cliente', 'solicitacoes.id_cliente')
        ->join('equipamentos', 'equipamentos.id_equipamento', 'solicitacoes.id_equipamento')
        //->where('id_funcionario', Auth::user()->id)
        ->where('status', '<>', 'Finalizado')
        ->select('id_servico', 'clientes.nome AS nomeCliente', 'equipamentos.nome AS nomeEquip', 'servicos.status')
        ->get();

        $problemas = Problema::all();

        return view('servicos.index', ['servicos' => $servicos, 'gerente' => $gerente, 'problemas' => $problemas]);
    }
}
