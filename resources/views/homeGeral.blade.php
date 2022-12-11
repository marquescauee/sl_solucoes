@extends('layouts.auth.app')


@section('content')
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 800px;
            min-width: 100%;
            background-color: #fafafa;
        }

        .btnGeral {
            width: 300px;
            height: 150px;
            text-align: center;
            background: #C54E34;
            box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 25px;
            display: flex;

            justify-content: center;
            align-items: center;
            padding: 0px;
            gap: 37px;
        }

        .ok {
            width: 50%;
            justify-content: space-between;

        }

        .textoCor {
            color: #fafafa;
            font-size: 40px;
        }

        .hm {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 0px;
            gap: 100px;
            column-gap: 100px;
        }
    </style>
    <div class=container>

        <div class="ok row">
            <div class=hm>

                <a class="nav-link" aria-current="page" href="{{ route('clientes.index') }}">
                    <div class=btnGeral aria-current="page">
                        <span class="textoCor"> Cliente</span>
                    </div>
                </a>

                <a class="nav-link" aria-current="page" href="{{ route('solicitacoes.index') }}">
                <div class=btnGeral aria-current="page">
                    <span class="textoCor">Solicitações</span>
                </div>
                </a>

            <a class="nav-link" aria-current="page" href="{{ route('servicos.index') }}">
                <div class=btnGeral aria-current="page">
                    <span class="textoCor">Serviços</span>
                </div>
            </a>

            <a class="nav-link" aria-current="page" href="{{ route('problemas.index') }}">
                <div class=btnGeral aria-current="page">
                    <span class="textoCor">Problemas</span>
                </div>
            </a>

            <a class="nav-link" aria-current="page" href="{{ route('equipamentos.index') }}">
                <div class=btnGeral aria-current="page">
                    <span class="textoCor">Equipamentos</span>
                </div>
            </a>

            </div>
        </div>

    </div>
@endsection

@section('funcionarios')
    @if ($gerente != null)
        @if (Auth::user()->id == $gerente->id_gerente)
        @endif
    @endif
@endsection
