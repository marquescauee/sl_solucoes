@extends('layouts.app')

@section('content')
    <div style="background-color: white">

        <form action="{{ route('solicitacoes.status') }}" method="POST">
            @csrf
            <h1 class="my-2 py-4" style="text-align: center;">Status</h1>

            <p style="text-align: center; font-size: 18px;">O codigo de solicitação do seu equipamento pode ser encontrado no
                email
                informado a SL Soluções.</p>

            <div class="container my-3">
                <label for="codigo" class="lb-login col-md-4 col-form-label text-md-end"
                    style="justify-content: flex-start">{{ __('Código:') }}</label>

                <div class="col-md-4 d-flex mr-auto">
                    <input style="background-color: #707070; color:white;" id="codigo" type="text"
                        class="form-control @error('codigo') is-invalid @enderror" name="codigo"
                        required autocomplete="codigo" autofocus>

                    @error('codigo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="btn btn-outline-dark" style="margin-left: 50px;">Pesquisar</button>
                </div>

                <div class="div-status col-md-12 my-5 d-flex mr-auto justify-content-between">
                    <div class="col-md-7">
                        <label for="descricao" class="lb-login col-md-4 col-form-label text-md-end"
                               style="justify-content: flex-start;">{{ __('Problemas encontrados:') }}</label>

                        <input style="background-color: #707070; padding: 150px 0; text-align:center; color:white; font-size: 20px;" id="descricao" type="text"
                            class="form-control @error('descricao') is-invalid @enderror" name="descricao" required autocomplete="descricao" autofocus disabled
                        >

                        @error('descricao')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="status" class="lb-login col-md-4 col-form-label text-md-end"
                            style="justify-content: flex-start;">{{ __('Status:') }}</label>

                        <input style="background-color: #707070; color:white;" id="status" type="text"
                            class="form-control @error('status') is-invalid @enderror" name="status" required autocomplete="status" autofocus disabled
                        >

                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>

    <style>
        html {
            background-color: white;
        }
    </style>
@endsection
