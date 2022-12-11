<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Problema;

class ProblemaComponent extends Component
{
    public $descricao, $id_problema;

    protected function rules() {
        return [
            'descricao' => 'required|min:3|max:100|unique:problemas,descricao',
        ];
    }

    protected $messages = [
        'required' => 'O campo :attribute está vazio.',
        'descricao.min' => 'O campo descricao deve ter no mínimo 3 caracteres.',
        'descricao.max' => 'O campo descricao deve ter no máximo 100 caracteres.',
        'descricao.unique' => 'Problema já existe.'
    ];

    public function updated($campos) {

        $this->validateOnly($campos);
    }

    public function store() {
        $problemaValidado = $this->validate();

        Problema::create($problemaValidado);

        session()->flash('message', 'Problema criado com sucesso!');

        $this->resetInputs();

        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit($id) {
        $problema = Problema::find($id);

        if($problema) {
            $this->id_problema = $problema->id_problema;
            $this->descricao = $problema->descricao;
        } else {
            return redirect()->to(route('problemas.index'));
        }
    }

    public function update() {
        $clienteValidado = $this->validate([
            'descricao' => 'required|min:3|max:100',
        ], $this->messages);

        Problema::where('id_problema', $this->id_problema)->update([
            'descricao' => $clienteValidado['descricao'],
        ]);

        session()->flash('message', 'Problema atualizado com sucesso!');

        $this->resetInputs();

        $this->dispatchBrowserEvent('close-modal');

    }

    public function delete($id) {
        $this->id_problema = $id;
    }

    public function destroy() {
        $problema = Problema::find($this->id_problema);

        $problema->delete();

        session()->flash('message', 'Problema ' . $problema->descricao . ' removido com sucesso!');

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
        $this->descricao = '';
    }

    public function render()
    {
        $this->problemas = Problema::all()->sortBy('descricao', SORT_NATURAL|SORT_FLAG_CASE);

        return view('livewire.problema-component', [$this->problemas]);
    }
}
