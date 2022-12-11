@extends('layouts.auth.app')


@section('content')
    <div>
        <livewire:equipamento-component>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#ModalCreateEquipamento').modal('hide');
            $('#ModalEditEquipamento').modal('hide');
        });
    </script>
@endsection

@section('funcionarios')
    @if ($gerente != null)
        @if (Auth::user()->id == $gerente->id_gerente)
        @endif
    @endif
@endsection
