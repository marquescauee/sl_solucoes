@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="cabeca-card mt-3" style="font-size:30px">{{ __('Redefinir Senha') }}</div>
                <div class="card-body">
                    <p class="p-reset w-50 m-auto my-4">Por favor, informe o email para o qual você deseja redefinir a senha.</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3 d-block">
                            <label for="email" class="lb-login col-md-4 col-form-label text-md-end">{{ __('Email:') }}</label>

                            <div class="col-md-10 d-block m-auto">
                                <input id="email" type="email" class="d-block form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 m-auto">
                                <button type="submit" class="m-auto w-100 d-block btn-login my-4 p-2">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
