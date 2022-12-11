<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BonificacaoController extends Controller
{
    public function index() {
        $acrescimo_funcionario = [];
        $servicos_funcionario = [];

        $funcionarios = DB::table('users')
                        ->join('funcionarios', 'users.id', '=', 'funcionarios.id_funcionario')
                        ->get();

        foreach ($funcionarios as $funcionario) {
            $acrescimo = 0;
            $servicos = 0;

            $acrescimo += (DB::table('servicos')->where('id_funcionario', $funcionario->id_funcionario)->count()) * 100;

            $servicos += DB::table('servicos')->where('id_funcionario', $funcionario->id_funcionario)->count();

            $acrescimo_funcionario[$funcionario->id_funcionario] =  $acrescimo;
            $servicos_funcionario[$funcionario->id_funcionario] =  $servicos;
        }

        return view('bonificacoes', ['funcionarios' => $funcionarios, 'acrescimo_funcionario' => $acrescimo_funcionario, 'servicos_funcionario' => $servicos_funcionario]);
    }
}
