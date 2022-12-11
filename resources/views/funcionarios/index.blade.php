@extends('layouts.auth.app')


@section('content')
    <div>
        <livewire:funcionario-component>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#ModalCreateFuncionario').modal('hide');
            $('#ModalEditFuncionario').modal('hide');
            $('#ModalDeleteFuncionario').modal('hide');
        });
    </script>
@endsection

@section('funcionarios')
    @if ($gerente != null)
        @if (Auth::user()->id == $gerente->id_gerente)
        @endif
    @endif
@endsection
