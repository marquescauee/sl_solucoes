<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\Solicitacao;
use Illuminate\Http\Request;
use App\Models\ServicoProblema;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function consultarStatus(Request $request) {

        $servico = new Servico();

        $solicitacao = Solicitacao::where('codigo', $request->codigo)->first();

        if($solicitacao == null) {
            $servico->status = 'Inexistente';

            return view('status', compact('servico'));
        }

        $servico = Servico::where('id_servico', $solicitacao->id_solicitacao)->first();

        if($servico == null) {

            $servico = new Servico();

            $servico->status = 'Não iniciado';
            $servico->descricao = 'A solicitação informada ainda não foi iniciada';

            return view('status', compact('servico'));
        } else if($servico->status = 'Em análise') {

            $servico->descricao = 'A solicitação está em análise desde o dia ' . $servico->data_analise;

            return view('status', compact('servico'));

        } else if($servico->status = 'Em andamento') {

            $servicos_problemas = DB::table('servicos_problemas')
                ->join('servicos', 'servicos.id_servico', 'servicos_problemas.id_servico')
                ->join('problemas', 'problemas.id_problema', 'servicos_problemas.id_problema')
                ->select('problemas.descricao')
                ->get();

                
            $servico->descricao = 'A solicitação está em análise desde o dia ' . $servico->data_analise . '! Problemas encontrados: ' . $servicos_problemas;
        } else if($servico->status = 'Pronto para entrega') {

            $servicos_problemas = DB::table('servicos_problemas')
                ->join('servicos', 'servicos.id_servico', 'servicos_problemas.id_servico')
                ->join('problemas', 'problemas.id_problema', 'servicos_problemas.id_problema')
                ->select('problemas.descricao')
                ->get();

            $servico->descricao = 'A solicitação está pronta para retirada desde o dia ' . $servico->data_pronto_entrega . '! Problemas encontrados: ' . $servicos_problemas;
        }

    }
}
