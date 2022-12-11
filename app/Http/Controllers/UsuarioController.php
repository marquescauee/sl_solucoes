<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Gerente;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('gerenteMiddleware');
    }

    public function index()
    {
        $users = User::all();

        $gerente = Gerente::where('id_gerente', Auth::user()->id)->first();

        return view('funcionarios.index', ['users' => $users, 'gerente' => $gerente]);
    }
}
