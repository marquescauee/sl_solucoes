<?php

namespace App\Exports;

use App\Models\Servico;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ServicosExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('servicos')
            ->join('funcionarios', 'funcionarios.id_funcionario', '=', 'servicos.id_funcionario')
            ->leftJoin('servicos_problemas', 'servicos_problemas.id_servico', '=', 'servicos.id_servico')
            ->leftJoin('problemas', 'problemas.id_problema', '=', 'servicos_problemas.id_problema')
            ->join('solicitacoes', 'solicitacoes.id_solicitacao', '=', 'servicos.id_servico')
            ->join('equipamentos', 'solicitacoes.id_equipamento', '=', 'equipamentos.id_equipamento')
            ->join('clientes', 'clientes.id_cliente', '=', 'solicitacoes.id_cliente')
            ->join('users', 'users.id', '=', 'funcionarios.id_funcionario')
            ->orderBy('servicos.id_servico')
            ->select('servicos.id_servico', 'servicos.status', 'servicos.data_analise', 'servicos.data_andamento', 'servicos.data_pronto_entrega', 'servicos.data_finalizado', 'clientes.nome as Cliente', 'clientes.cpf as CPF_cliente', 'clientes.email as Email_cliente', 'equipamentos.nome as Equipamento', 'problemas.descricao as Problema_encontrado', 'users.name as Funcionario', 'users.email as Email_Funcionario', 'funcionarios.cargo as Cargo')
            ->get();
    }

    public function headings():array
    {
        return [
            'ID Serviço',
            'Status',
            'Data em análise',
            'Data em andamento',
            'Data pronto para entrega',
            'Data finalizado',
            'Cliente',
            'CPF Cliente',
            'Email Cliente',
            'Equipamento',
            'Problema encontrado',
            'Funcionário responsável',
            'Email Funcionário',
            'Cargo do funcionário',
        ];
    }

    public function map($row): array
    {
        if($row->data_andamento == null) {
            $row->data_andamento == '-';
            $row->data_pronto_entrega == '-';
            $row->data_finalizado == '-';

            return [
                $row->id_servico,
                $row->status,
                Carbon::parse($row->data_analise)->format('d/m/Y H:i:s'),
                $row->data_andamento,
                $row->data_pronto_entrega,
                $row->data_finalizado,
                $row->Cliente,
                $row->CPF_cliente,
                $row->Email_cliente,
                $row->Equipamento,
                $row->Problema_encontrado,
                $row->Funcionario,
                $row->Email_Funcionario,
                $row->Cargo
            ];
        } else if($row->data_pronto_entrega == null) {
            $row->data_pronto_entrega == '-';
            $row->data_finalizado == '-';

            return [
                $row->id_servico,
                $row->status,
                Carbon::parse($row->data_analise)->format('d/m/Y H:i:s'),
                Carbon::parse($row->data_andamento)->format('d/m/Y H:i:s'),
                $row->data_pronto_entrega,
                $row->data_finalizado,
                $row->Cliente,
                $row->CPF_cliente,
                $row->Email_cliente,
                $row->Equipamento,
                $row->Problema_encontrado,
                $row->Funcionario,
                $row->Email_Funcionario,
                $row->Cargo
            ];
        } else if($row->data_finalizado == null) {
            $row->data_finalizado == '-';

            return [
                $row->id_servico,
                $row->status,
                Carbon::parse($row->data_analise)->format('d/m/Y H:i:s'),
                Carbon::parse($row->data_andamento)->format('d/m/Y H:i:s'),
                Carbon::parse($row->data_pronto_entrega)->format('d/m/Y H:i:s'),
                $row->data_finalizado,
                $row->Cliente,
                $row->CPF_cliente,
                $row->Email_cliente,
                $row->Equipamento,
                $row->Problema_encontrado,
                $row->Funcionario,
                $row->Email_Funcionario,
                $row->Cargo
            ];
        } else {
            return [
                $row->id_servico,
                $row->status,
                Carbon::parse($row->data_analise)->format('d/m/Y H:i:s'),
                Carbon::parse($row->data_andamento)->format('d/m/Y H:i:s'),
                Carbon::parse($row->data_pronto_entrega)->format('d/m/Y H:i:s'),
                Carbon::parse($row->data_finalizado)->format('d/m/Y H:i:s'),
                $row->Cliente,
                $row->CPF_cliente,
                $row->Email_cliente,
                $row->Equipamento,
                $row->Problema_encontrado,
                $row->Funcionario,
                $row->Email_Funcionario,
                $row->Cargo
            ];
        }
    }
}
