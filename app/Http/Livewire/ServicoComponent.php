<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Cliente;
use App\Models\Servico;
use Livewire\Component;
use App\Models\Problema;
use App\Models\Equipamento;
use App\Models\Solicitacao;
use App\Models\ServicoProblema;
use Illuminate\Support\Facades\DB;

class ServicoComponent extends Component
{
    public $id_servico, $id_funcionario, $status, $data_analise, $data_andamento, $data_pronto_entrega, $data_finalizado;

    public $problema, $status_rb;

    public $problema_check = ['none'];

    protected function rules() {
        return [
            'status_rb' => 'required',
            'problema_check' => 'required|array|min:2',
            'id_servico' => 'integer'
        ];
    }

    protected $messages = [
        'required' => 'Selecione uma opção.',
        'problema_check.min' => 'Selecione um problema.',
        'problema_check.max' => 'O Serviço já possui problemas registrados. Desmarque os problemas',
    ];

    public function updated($campos) {

        $servico = Servico::where('id_servico', $this->id_servico)->first();
        $servico_problema = ServicoProblema::where('id_servico', $servico->id_servico)->first();

        if($servico_problema == null) {
            $this->validateOnly($campos,[
                'status_rb' => 'required',
                'problema_check' => 'required|array|min:2',
                'id_servico' => 'integer'
            ], $this->messages);
        } else {
            $this->validateOnly($campos,[
                'status_rb' => 'required',
                'problema_check' => 'required|array|max:1',
                'id_servico' => 'integer'
            ], $this->messages);
        }

        $this->validateOnly($campos);
    }

    public function edit($id) {
        $servico = Servico::find($id);

        if($servico) {
            $this->id_servico = $servico->id_servico;
            $this->id_funcionario = $servico->id_funcionario;
            $this->status = $servico->status;
            $this->data_analise = $servico->data_analise;
            $this->data_andamento = $servico->data_andamento;
            $this->data_pronto_entrega = $servico->data_pronto_entrega;
            $this->data_finalizado = $servico->data_finalizado;
        } else {
            return redirect()->to(route('clientes.index'));
        }
    }

    public function update() {

        $servico = Servico::where('id_servico', $this->id_servico)->first();
        $servico_problema = ServicoProblema::where('id_servico', $servico->id_servico)->first();

        if($servico_problema == null) {
            $servicoValidado = $this->validate([
                'status_rb' => 'required',
                'problema_check' => 'required|array|min:2',
                'id_servico' => 'integer'
            ], $this->messages);
        } else {
            $servicoValidado = $this->validate([
                'status_rb' => 'required',
                'problema_check' => 'required|array|max:1',
                'id_servico' => 'integer'
            ], $this->messages);
        }

        foreach($servicoValidado['problema_check'] as $problema) {
            if($problema == 'none') {
                continue;
            }

            ServicoProblema::create([
                'id_servico' => $this->id_servico,
                'id_problema' => $problema
            ]);
        }

        if($servicoValidado['status_rb'] == 'Em andamento') {
            Servico::where('id_servico', $this->id_servico)->update([
                'status' => $servicoValidado['status_rb'],
                'data_andamento' => Carbon::now()
            ]);
        } else if($servicoValidado['status_rb'] == 'Pronto para entrega') {

            $servico = Servico::where('id_servico', $this->id_servico)->first();

            if($servico->data_andamento == null) {
                Servico::where('id_servico', $this->id_servico)->update([
                    'status' => $servicoValidado['status_rb'],
                    'data_andamento' => Carbon::now(),
                    'data_pronto_entrega' => Carbon::now()
                ]);
            } else {
                Servico::where('id_servico', $this->id_servico)->update([

                    'status' => $servicoValidado['status_rb'],
                    'data_pronto_entrega' => Carbon::now()
                ]);
            }
        }

        session()->flash('message', 'Serviço atualizado com sucesso!');

        $this->resetInputs();

        $this->dispatchBrowserEvent('close-modal');
    }

    public function delete($id) {
        $this->id_servico = $id;
    }

    public function destroy() {
        $servico = Servico::find($this->id_servico);

        $servico->data_finalizado = Carbon::now();
        $servico->status = 'Finalizado';
        $servico->update();

        session()->flash('message', 'Serviço finalizado com sucesso!');

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
        $this->id_servico = '';
        $this->id_funcionario = '';
        $this->status = '';
        $this->data_analise ='';
        $this->data_andamento = '';
        $this->data_pronto_entrega = '';
        $this->data_finalizado = '';
        $this->problema_check = ['none'];
        $this->status_rb = '';
    }

    public function render()
    {
        $this->servicos = Servico::all()->where('id_funcionario', auth()->user()->id)->where('status', '<>', 'Finalizado');

        foreach($this->servicos as $servico) {
            $solicitacao = Solicitacao::where('id_solicitacao', $servico->id_servico)->first();

            $servico->solicitacao = $solicitacao;

            $servico->equipamento =  Equipamento::where('id_equipamento', $solicitacao->id_equipamento)->first();

            $servico->cliente = Cliente::where('id_cliente', $solicitacao->id_cliente)->first();
        }

        $this->problemas = Problema::all();

        return view('livewire.servico-component', [$this->servicos]);
    }
}
