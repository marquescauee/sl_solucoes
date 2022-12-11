@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="cabeca-card mt-5 display-5">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-5 d-block">
                                <label for="email" style="padding: 0;"
                                    class="lb-login col-md-4 col-form-label text-md-end">{{ __('Email:') }}</label>

                                <div class="col-md-10 d-block m-auto">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-5 d-block">
                                <label for="password" style="padding: 0;"
                                    class="lb-login col-md-4 col-form-label text-md-end">{{ __('Senha:') }}</label>

                                <div class="col-md-10 d-block m-auto">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-8 offset-md-4 m-auto div-rec">
                                    @if (Route::has('password.request'))
                                        <a class="rec-senha btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Esqueceu a senha?') }}
                                        </a>
                                    @endif
                                </div>

                                <button type="submit" class="m-auto w-50 my-4 d-block btn-login p-2">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="ultima-div">

    </div> --}}
@endsection
