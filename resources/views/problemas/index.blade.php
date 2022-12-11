@extends('layouts.auth.app')


@section('content')
    <div>
        <livewire:problema-component>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#ModalCreateProblema').modal('hide');
            $('#ModalEditProblema').modal('hide');
            $('#ModalDeleteProblema').modal('hide');
        });
    </script>
@endsection

@section('funcionarios')
    @if ($gerente != null)
        @if (Auth::user()->id == $gerente->id_gerente)
        @endif
    @endif
@endsection
