@section('funcionarios')
    @if ($gerente != null)
    
        @if (Auth::user()->id == $gerente->id_gerente)
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('usuarios.index')}}">Gerenciar funcionários</a>
                </li>
            </ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('usuarios.index')}}">Bonificação</a>
                </li>
            </ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('usuarios.index')}}">Relatórios</a>
                </li>
            </ul>
        @endif
    @endif
@endsection
