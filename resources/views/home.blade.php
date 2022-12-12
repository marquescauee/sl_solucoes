@extends('layouts.auth.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="width: 100%;">
            <div class="col-md-8">
                <div class="card" style="margin-top: 20%; background-color: #FAFAFA">
                    <div class="cabeca-card my-4" style="font-size: 25px">
                        <img src="{{asset('img/user-128.png')}}" style="width: 15%">
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                       <p style="font-size: 20px; color:black">Bem-vindo (a),  {{Auth::user()->name}} !</p>
                    </div>
                </div>

                <div class="d-flex justify-content-around" style="margin-bottom: 10%; margin-top:20%">
                    <a class="nav-item nav-link m-0 px-4 py-3" style="background-color: #D9D9D9; color: #646262" aria-current="page" href="{{route('usuarios.index')}}">Gerenciar funcionários</a>

                    <a class="nav-item nav-link m-0 px-5 py-3" style="background-color: #D9D9D9; color: #646262" aria-current="page" href="{{route('bonificacoes.index')}}">Bonificação</a>

                    <a class="nav-item nav-link m-0 px-5 py-3" style="background-color: #D9D9D9; color: #646262" aria-current="page" href="{{route('relatorios.exportar')}}">Relatório de serviços</a>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@section('funcionarios')--}}
{{--    @if ($gerente != null)--}}
{{--        @if (Auth::user()->id == $gerente->id_gerente)--}}
{{--            <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" aria-current="page" href="{{route('usuarios.index')}}">Gerenciar funcionários</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" aria-current="page" href="{{route('usuarios.index')}}">Bonificação</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" aria-current="page" href="{{route('usuarios.index')}}">Relatórios</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        @endif--}}
{{--    @endif--}}
{{--@endsection--}}
