@extends('layouts.auth.app')

<style>
    main {
        background-color: #FAFAFA;
    }
</style>

@section('content')
    <div class="col-md-4 d-flex w-100 flex-wrap">
        @foreach($funcionarios as $funcionario)
            <div class="card" style="margin-top: 5%; margin-left: 2%; background-color: #D9D9D9; width: 20%">
                <div class="cabeca-card my-4" style="font-size: 25px">
                    <img src="{{asset('img/user-128.png')}}" style="width: 15%">
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p style="font-size: 25px; color:black">{{$funcionario->name}}</p>

                    <p class="nav-item nav-link mx-0 my-4 px-4 py-3 my-3" style="background-color: #AEAEAE; color: black; font-size: 18px;" aria-current="page">Serviços Realizados: {{$servicos_funcionario[$funcionario->id_funcionario]}}</p>

                    <p class="nav-item nav-link mx-0 my-4 px-4 py-3" style="background-color: #AEAEAE; color: black; font-size: 18px;" aria-current="page">Acréscimo Salarial: <span style="color: #098916">+R${{ $acrescimo_funcionario[$funcionario->id_funcionario]}}</span> </p>
                </div>
            </div>
        @endforeach
    </div>

@endsection
