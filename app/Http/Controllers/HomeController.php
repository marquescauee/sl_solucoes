<?php

namespace App\Http\Controllers;
use App\Models\Servico;
use Illuminate\Http\Request;
use App\Models\Gerente;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuario = auth()->user();

        $gerente = Gerente::find($usuario->id);

        return view('home', compact('gerente'));
    }

    public function contato() {
        return view('contato');
    }

    public function status() {
        return view('status');
    }

    public function homeGeral() {
        $usuario = auth()->user();

        if(auth()->user() == null) {
            return redirect()->route('login');
        }

        $gerente = Gerente::find($usuario->id);

        $funcionario = Funcionario::find($usuario->id);

        if($gerente == null && $funcionario == null) {
            return redirect()->route('404');
        }

        return view('homeGeral', compact('gerente'));
    }

    public function erro404() {
        return view('404');
    }
}
