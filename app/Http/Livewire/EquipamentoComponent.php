<?php

namespace App\Http\Livewire;

use App\Models\Equipamento;
use Livewire\Component;

class EquipamentoComponent extends Component
{
    public $nome, $id_equipamento;

    protected function rules() {
        return [
            'nome' => 'required|min:3|max:100|unique:equipamentos,nome',
        ];
    }

    protected $messages = [
        'required' => 'O campo :attribute está vazio.',
        'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
        'nome.max' => 'O campo nome deve ter no máximo 100 caracteres.',
        'nome.unique' => 'Equipamento já existe.'
    ];

    public function updated($campos) {

        $this->validateOnly($campos);
    }

    public function store() {
        $equipamentoValidado = $this->validate();

        Equipamento::create($equipamentoValidado);

        session()->flash('message', 'Equipamento criado com sucesso!');

        $this->resetInputs();

        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit($id) {
        $equipamento = Equipamento::find($id);

        if($equipamento) {
            $this->id_equipamento = $equipamento->id_equipamento;
            $this->nome = $equipamento->nome;
        } else {
            return redirect()->to(route('problemas.index'));
        }
    }

    public function update() {
        $equipamentoValidado = $this->validate([
            'nome' => 'required|min:3|max:100',
        ], $this->messages);

        Equipamento::where('id_equipamento', $this->id_equipamento)->update([
            'nome' => $equipamentoValidado['nome'],
        ]);

        session()->flash('message', 'Equipamento atualizado com sucesso!');

        $this->resetInputs();

        $this->dispatchBrowserEvent('close-modal');

    }

    public function delete($id) {
        $this->id_equipamento = $id;
    }

    public function destroy() {
        $equipamento = Equipamento::find($this->id_equipamento);

        $equipamento->delete();

        session()->flash('message', 'Equipamento ' . $equipamento->nome . ' removido com sucesso!');

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
        $this->nome = '';
    }

    public function render()
    {
        $this->equipamentos = Equipamento::all()->sortBy('nome', SORT_NATURAL|SORT_FLAG_CASE);

        return view('livewire.equipamento-component', [$this->equipamentos]);
    }
}
