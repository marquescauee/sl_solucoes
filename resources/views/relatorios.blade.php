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
    <div class="container" >
        <form method="GET" action="{{route('relatorios.exportar')}}">
            <div>
                <div>
                    <label class="d-block" for="start" style="font-size: 20px;">Selecione a data de início para obtenção do relatório de serviços:</label>

                    <div class=" mt-5 d-flex justify-content-center">
                        <input class="w-50 text-center" type="date" id="start" name="start"
                               value="2018-07-22"
                               min="2018-01-01">
                    </div>
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <button class="p-3 nav-link nav-item text-center" type="submit" style="margin-left: 0; margin-top: 30%; border: none">Gerar relatório</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('funcionarios')
    @if ($gerente != null)
        @if (Auth::user()->id == $gerente->id_gerente)
        @endif
    @endif
@endsection
