@extends('layouts.auth.app')


@section('content')
    <div>
        <livewire:servico-component>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#ModalEditServico').modal('hide');
            $('#ModalDeleteServico').modal('hide');
            $('.modal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        });
    </script>
@endsection

@section('funcionarios')
    @if ($gerente != null)
        @if (Auth::user()->id == $gerente->id_gerente)
        @endif
    @endif
@endsection
