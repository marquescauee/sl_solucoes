<?php

namespace App\Http\Livewire;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FuncionarioComponent extends Component
{
    public $email, $password, $name, $cargo, $id_funcionario;

    protected function rules() {
        return [
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'cargo' => 'required'
        ];
    }

    protected $messages = [
        'required' => 'O campo :attribute está vazio.',
        'name.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
        'name.max' => 'O campo nome deve ter no máximo 40 caracteres.',
        'password.min' => 'O campo senha deve ter no mínimo 8 caracteres',
        'email.email' => 'Campo email inválido',
        'email.unique' => 'Email já cadastrado',
    ];

    public function updated($campos) {
        $this->validateOnly($campos);
    }

    public function store() {
        $funcionarioValidado = $this->validate();

        $user = User::create([
            'email' => $funcionarioValidado['email'],
            'name' => $funcionarioValidado['name'],
            'password' => Hash::make($funcionarioValidado['password']),
        ]);


        Funcionario::create([
            'id_funcionario' => $user->id,
            'cargo' => $funcionarioValidado['cargo'],
        ]);

        session()->flash('message', 'Funcionário cadastrado com sucesso!');

        $this->resetInputs();

        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit($id) {
        $funcionario = Funcionario::find($id);

        $user = User::find($id);

        if($funcionario) {
            $this->id_funcionario = $funcionario->id_funcionario;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->cargo = $funcionario->cargo;
        } else {
            return redirect()->to(route('usuarios.index'));
        }
    }

    public function update() {
        $funcionarioValidado = $this->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email',
            'cargo' => 'required'
        ], $this->messages);

        User::where('id', $this->id_funcionario)->update([
            'name' => $funcionarioValidado['name'],
            'email' => $funcionarioValidado['email']
        ]);

        Funcionario::where('id_funcionario', $this->id_funcionario)->update([
            'cargo' => $funcionarioValidado['cargo']
        ]);

        session()->flash('message', 'Funcionário atualizado com sucesso!');

        $this->resetInputs();

        $this->dispatchBrowserEvent('close-modal');

    }

    public function delete($id) {
        $this->id_funcionario = $id;
    }

    public function destroy() {
        $funcionario = User::find($this->id_funcionario);

        $funcionario->delete();

        session()->flash('message', 'Funcionário ' . $funcionario->name . ' removido com sucesso!');

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
        $this->id_funcionario = '';
        $this->name = '';
        $this->email = '';
        $this->cargo = '';
    }

    public function render()
    {
        $this->funcionarios = DB::table('funcionarios')
                                ->join('users', 'users.id', '=', 'funcionarios.id_funcionario')
                                ->get();

        return view('livewire.funcionario-component', [$this->funcionarios]);
    }
}
