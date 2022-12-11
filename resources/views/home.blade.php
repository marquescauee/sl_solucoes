@extends('layouts.auth.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="width: 100%;">
            <div class="col-md-8">
                <div class="card">
                    <div class="cabeca-card my-4" style="font-size: 25px">{{ __('Aviso') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Login realizado com sucesso!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('funcionarios')
    @if ($gerente != null)
        @if (Auth::user()->id == $gerente->id_gerente)
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('usuarios.index')}}">Gerenciar funcionários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('usuarios.index')}}">Bonificação</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('usuarios.index')}}">Relatórios</a>
                </li>
            </ul>
        @endif
    @endif
@endsection
