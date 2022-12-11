@extends('layouts.auth.app')


@section('content')
    <div>
        <livewire:cliente-component>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#ModalCreateCliente').modal('hide');
            $('#ModalEditCliente').modal('hide');
            $('#ModalDeleteCliente').modal('hide');
        });
    </script>
@endsection

@section('funcionarios')
    @if ($gerente != null)
        @if (Auth::user()->id == $gerente->id_gerente)
        @endif
    @endif
@endsection
