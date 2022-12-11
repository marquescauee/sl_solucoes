<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Cliente;
use App\Models\Servico;
use Livewire\Component;
use App\Models\Equipamento;
use App\Models\Solicitacao;
use App\Mail\EmailSolicitacao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SolicitacaoComponent extends Component
{

    public $id_cliente, $id_equipamento, $codigo, $id_solicitacao, $data_criacao;

    protected function rules() {
        return [
            'id_cliente' => 'numeric|min:1',
            'id_equipamento' => 'numeric|min:1'
        ];
    }

    protected $messages = [
        'id_cliente.numeric' => 'Selecione um cliente',
        'id_equipamento.numeric' => 'Selecione um equipamento',
    ];

    public function updated($campos) {
        $this->validateOnly($campos);
    }

    public function store() {
        $solicitacaoValidada = $this->validate();

        $solicitacao = new Solicitacao();

        $solicitacao->id_cliente = Cliente::where('id_cliente', $solicitacaoValidada['id_cliente'])->first()->id_cliente;
        $solicitacao->id_equipamento = Equipamento::where('id_equipamento', $solicitacaoValidada['id_equipamento'])->first()->id_equipamento;
        $solicitacao->codigo = $this->generateRandomString();
        $solicitacao->data_criacao = Carbon::now();

        $solicitacao->save();

        $cliente = Cliente::where('id_cliente',  $solicitacaoValidada['id_cliente'])->first();

//        Mail::to($cliente->email)->send(
//            new EmailSolicitacao($solicitacao->codigo, $cliente->nome)
//        );

        session()->flash('message', 'Solicitação criada com sucesso!');

        $this->resetInputs();

        $this->dispatchBrowserEvent('close-modal');
    }

    public function startServico($id) {
        $servico = new Servico();

        $servico->id_servico = $id;
        $servico->id_funcionario = auth()->user()->id;
        $servico->status = 'Em análise';
        $servico->data_analise = Carbon::now();

        $servico->save();

        session()->flash('message', 'Solicitação iniciada com sucesso! Vá para serviços para vê-la!');
    }

    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function delete($id) {
        $this->id_solicitacao = $id;
    }

    public function destroy() {
        $solicitacao = Solicitacao::find($this->id_solicitacao);

        $solicitacao->delete();

        session()->flash('message', 'Solicitação removida com sucesso!');

        $this->dispatchBrowserEvent('close-modal');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function closeModal() {
        $this->resetInputs();
        $this->hydrate();
    }

    public function resetInputs() {
        $this->id_solicitacao = '';
        $this->id_cliente = '';
        $this->id_equipamento = '';
        $this->codigo = '';
        $this->data_criacao = '';
    }

    public function render()
    {
        $this->solicitacoes = DB::table('solicitacoes')
        ->leftJoin('servicos', 'solicitacoes.id_solicitacao', 'servicos.id_servico')
        ->where('id_servico', null)
        ->select('solicitacoes.*')
        ->get();

        $clientes = Cliente::all()->sortBy('nome', SORT_NATURAL|SORT_FLAG_CASE);;
        $equipamentos = Equipamento::all()->sortBy('nome', SORT_NATURAL|SORT_FLAG_CASE);;

        return view('livewire.solicitacao-component', ['solicitacoes' => $this->solicitacoes, 'clientes' => $clientes, 'equipamentos' => $equipamentos]);
    }
}
