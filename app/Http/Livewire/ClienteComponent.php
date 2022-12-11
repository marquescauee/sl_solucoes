<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class ClienteComponent extends Component
{
    public $nome, $email, $cpf, $id_cliente;

    protected function rules() {
        return [
            'nome' => 'required|min:3|max:40',
            'email' => 'required|email|unique:clientes,email',
            'cpf' => 'required|numeric|digits:11|unique:clientes,cpf'
        ];
    }

    protected $messages = [
        'required' => 'O campo :attribute está vazio.',
        'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
        'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
        'cpf.digits' => 'O campo cpf deve ter 11 caracteres numéricos',
        'email.email' => 'Campo email inválido',
        'email.unique' => 'Email já cadastrado',
        'cpf.unique' => 'CPF já existe',
        'cpf.numeric' => 'O campo cpf deve conter apenas números',
    ];

    public function updated($campos) {

        $this->validateOnly($campos);
    }

    public function store() {
        $clienteValidado = $this->validate();

        Cliente::create($clienteValidado);

        session()->flash('message', 'Cliente criado com sucesso!');

        $this->resetInputs();

        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit($id) {
        $cliente = Cliente::find($id);

        if($cliente) {
            $this->id_cliente = $cliente->id_cliente;
            $this->nome = $cliente->nome;
            $this->email = $cliente->email;
            $this->cpf = $cliente->cpf;
        } else {
            return redirect()->to(route('clientes.index'));
        }
    }

    public function update() {
        $clienteValidado = $this->validate([
            'nome' => 'required|min:3|max:40',
            'email' => 'required|email',
            'cpf' => 'required|numeric'
        ], $this->messages);

        Cliente::where('id_cliente', $this->id_cliente)->update([
            'nome' => $clienteValidado['nome'],
            'email' => $clienteValidado['email'],
            'cpf' => $clienteValidado['cpf'],
        ]);

        session()->flash('message', 'Cliente atualizado com sucesso!');

        $this->resetInputs();

        $this->dispatchBrowserEvent('close-modal');

    }

    public function delete($id) {
        $this->id_cliente = $id;
    }

    public function destroy() {
        $cliente = Cliente::find($this->id_cliente);

        $cliente->delete();

        session()->flash('message', 'Cliente ' . $cliente->nome . ' removido com sucesso!');

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
        $this->id_cliente = '';
        $this->nome = '';
        $this->email = '';
        $this->cpf = '';
    }

    public function render()
    {
        $this->clientes = Cliente::all()->sortBy('nome', SORT_NATURAL|SORT_FLAG_CASE);

        return view('livewire.cliente-component', [$this->clientes]);
    }
}
