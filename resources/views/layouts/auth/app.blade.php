<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 
    <style>
        .vermelho {
            background-color: #B93416;
        }

        .carousel {
            border-radius: 30px 30px 30px 30px;
            overflow: hidden;
        }

        .carousel .carousel-item {
            height: 650px;
        }

        .carousel-item img {
            position: absolute;
            object-fit: cover;
            top: 0;
            left: 0;
            min-height: 650px;
        }

        .ultima-div {
            margin-top: 50px;
            padding: 200px 0;
            background-color: white;
        }

        body {
            font-family: 'Fjalla One', sans-serif;
            background-color: #B93416;
        }

        #app {
            background-color: #4A4A4A;
        }

        nav {
            margin: 0 20px;
        }

        .navbar {
            padding: 0px;
        }

        .nav-item {
            font-size: 20px;
            margin-left: 100px;
            background-color: #C54E34;
            border-radius: 20px;
            box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
            padding: 0 30px;
        }

        .nav-link {
            color: white;
        }

        .container-fluid {
            background-color: #B93416;
            display: flex;
            justify-content: space-between;
        }

        .navbar-brand {
            font-family: 'Fjalla One', sans-serif;
            color: #FFF;
            font-size: 50px;
            margin: 0px;
        }

        .p-reset {
            text-align: center;
        }

        .cabeca-card {
            display: flex;
            justify-content: center;
            color: white;
        }

        .card-body {
            color: white;
            text-align: center;
        }

        .card-footer {
            color: white;
            font-size: 20px;
        }

        .btn-login {
            background-color: #B93416;
            padding: 0 100px;
            display: flex;
            font-size: 25px;
            justify-content: center;
            border-radius: 20px;
            border: none;
            box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
            opacity: 0.7;
            transition: 0.3s;
        }

        .btn-login:hover {
            opacity: 1;
        }

        .invalid-feedback {
            color: #FF7272;
            font-size: 15px;
        }

        .lb-login {
            font-size: 15px;
            display: flex;
            justify-content: center;
        }

        .rec-senha {
            margin-right: auto;
            text-align: center;
            margin-bottom: 10px;
            color: white;
            text-decoration: none;
        }

        .rec-senha:hover {
            color: rgb(164, 148, 148);
        }

        .div-rec {
            text-align: center;
        }

        .card {
            background-color: #707070;
            border-radius: 20px;
            margin: 30px auto;
            width: 55%;
            box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
        }

        .navbar-brand:hover {
            color: white;
        }

        .div-status {
            padding-bottom: 50px;
        }

        .nav-principal {
            justify-content: center;
            align-items: center;
        }

        .nav-auth {
            display: flex;
            justify-content: flex-end
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 800px;
            min-width: 100%;
            background-color: #fafafa;
        }

        body {
            background: #4A4A4A;
        }

        .nomePagina {
            display: flex;
            justify-content: center;
            padding: 3%;
        }

        .bannerText {
            color: #ffffff;
            font-size: 45px;
        }

        .textArea {
            display: flex;
            width: 55%;
            height: 500px;
            background-color: #c9c9c9;
            margin: 2%;
            overflow-y: scroll;
            border-radius: 10px;
        }

        .box {
            display: flex;
            justify-content: center;
            flex-direction: row;
            margin-top: -30px;
        }

        .opcaoSol {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 600px;
            height: 600px;
            color: #B93416;
            margin: 2%;
        }

        .b1 {
            display: flex;
            width: 355px;
            height: 130px;
            margin: 15px;
            text-align: center;
            background: #C54E34;
            box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 25px;
            display: flex;

            justify-content: center;
            align-items: center;
            padding: 0px;
        }

        .t1 {
            display: flex;
            color: #ffffff;
        }

        .table {
            position: relative;
            justify-content: left;
            flex-direction: column;
            padding: 10px;
        }

        table {
            width: 100%;
            font: fjalla-one;
            font-size: 17px;
            align-content: space-around;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 1em;
        }
    </style>

    @livewireStyles
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-light" style="margin: 0">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">SL Soluções</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse nav-auth" id="navbarSupportedContent">

                    @yield('funcionarios')

                    <div>
                        <ul class="nav-principal navbar-nav me-auto mb-2 mb-lg-0">
                            <div>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ route('homeGeral') }}">Clientes</a>
                                </li>
                            </div>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    @livewireScripts
    @yield('script')
</body>
</html>
