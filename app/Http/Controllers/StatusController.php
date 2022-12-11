<?php

namespace App\Http\Controllers;

use App\Models\Gerente;
use App\Models\Servico;
use App\Models\Solicitacao;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use App\Models\ServicoProblema;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{

    public function consultarStatus(Request $request) {

        $servico = new Servico();
        $problemas = '';
        $data = null;

        $solicitacao = Solicitacao::where('codigo', $request->codigo)->first();

        if($solicitacao == null) {
            $servico->status = 'Inexistente';
            $data = null;
            return view('consultarStatus', compact('servico', 'data'));
        }

        $servico = Servico::where('id_servico', $solicitacao->id_solicitacao)->first();

        if($servico == null) {
            $servico = new Servico();
            $servico->status = 'Não iniciado';
            $servico->descricao = 'A solicitação informada ainda não foi iniciada';

        } else if($servico->status == 'Em análise') {
            $servico->descricao = 'A solicitação está em análise desde o dia ' . Carbon::parse($servico->data_analise)->format('d/m/Y H:i:s');

            $data = Carbon::parse($servico->data_analise)->format('d/m/Y H:i:s');

        } else if($servico->status == 'Em andamento') {
            $servicos_problemas = DB::table('servicos_problemas')
                ->join('servicos', 'servicos.id_servico', 'servicos_problemas.id_servico')
                ->join('problemas', 'problemas.id_problema', 'servicos_problemas.id_problema')
                ->where('servicos.id_servico', $servico->id_servico)
                ->select('problemas.descricao')
                ->get();

            $problemas = '| ';

            foreach($servicos_problemas as $problema) {
                $problemas .= $problema->descricao . ' | ';
            }

            $servico->descricao = 'A solicitação está em andamento desde o dia ' . Carbon::parse($servico->data_andamento)->format('d/m/Y H:i:s');

            $data = Carbon::parse($servico->data_andamento)->format('d/m/Y H:i:s');

        } else if($servico->status == 'Pronto para entrega')  {
            $servicos_problemas = DB::table('servicos_problemas')
                ->join('servicos', 'servicos.id_servico', 'servicos_problemas.id_servico')
                ->join('problemas', 'problemas.id_problema', 'servicos_problemas.id_problema')
                ->where('servicos.id_servico', $servico->id_servico)
                ->select('problemas.descricao')
                ->get();

            $problemas = '| ';

            foreach($servicos_problemas as $problema) {
                $problemas .= $problema->descricao . ' | ';
            }

            $servico->descricao = 'A solicitação está pronta para retirada desde o dia ' .Carbon::parse($servico->data_pronto_entrega)->format('d/m/Y H:i:s');

            $data = Carbon::parse($servico->data_pronto_entrega)->format('d/m/Y H:i:s');

        } else {
            $servicos_problemas = DB::table('servicos_problemas')
                ->join('servicos', 'servicos.id_servico', 'servicos_problemas.id_servico')
                ->join('problemas', 'problemas.id_problema', 'servicos_problemas.id_problema')
                ->where('servicos.id_servico', $servico->id_servico)
                ->select('problemas.descricao')
                ->get();


            $problemas = '| ';

            foreach($servicos_problemas as $problema) {
                $problemas .= $problema->descricao . ' | ';
            }

            $servico->descricao = 'A solicitação foi finalizada em ' . Carbon::parse($servico->data_finalizado)->format('d/m/Y H:i:s');

            $data = Carbon::parse($servico->data_finalizado)->format('d/m/Y H:i:s');
        }
        return view('consultarStatus', compact('servico', 'problemas', 'data'));
    }
}
