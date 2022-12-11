<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Equipamento;
use App\Models\Solicitacao;
use App\Models\Servico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Gerente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SolicitacaoController extends Controller
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

        $solicitacoes = DB::table('solicitacoes')
        ->leftJoin('servicos', 'solicitacoes.id_solicitacao', 'servicos.id_servico')
        ->where('id_servico', null)
        ->select('solicitacoes.*')
        ->get();

        $clientes = Cliente::all();
        $equipamentos = Equipamento::all();

        $arraySolic = Array();

        foreach(json_decode(json_encode($solicitacoes), true) as $solicitacao) {
            $solicitacao["nomeCliente"] = Cliente::where('id_cliente', $solicitacao["id_cliente"])->first()->nome;

            $solicitacao["nomeEquip"] = Equipamento::where('id_equipamento', $solicitacao["id_equipamento"])->first()->nome;

            array_push($arraySolic, $solicitacao);
        }

        $gerente = Gerente::where('id_gerente', Auth::user()->id)->first();

        return view('solicitacoes.index', compact('gerente', 'arraySolic', 'clientes', 'equipamentos'));
    }
}
