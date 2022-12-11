<style>
    .modal-background {
        justify-content: center;
        background-color: #4A4A4A;
    }

    .div-input {
        margin-left: 25%;
    }

    .input-width {
        width: 75%;
    }


    .label-color {
        color: white;
    }

    .label-form {
        margin-top: 20px;

    }

    .modal-header {
        justify-content: center;
    }

    .modal-footer {
        margin-top: 20px;
        justify-content: space-evenly;
    }

    .radio-style {
        display: flex;
        justify-content: center;
    }
</style>



<div wire:ignore.self class="modal fade text-left" id="ModalEditServico" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-background">
            <div class="modal-header">
                <h4 class="modal-title label-color mt-4" style="text-align: center;">
                    {{ __('Atualizar') }}
                </h4>
            </div>
            <form wire:submit.prevent="update">
                <div class="modal-body">
                    <input type="hidden" value="{{$servico->id_servico}}" name="{{$servico->id_servico}}" wire:model="id_servico">
                    <h5 class="my-4 label-color" style="text-align: center;">Defina o status do pedido:</h5>
                    <div class="form-group my-5">
                        <div class="col-sm-12" style="text-align: center;">
                            <div id="input-type" class="row">
                                <div class="col-sm-6">
                                    <label class="radio-inline label-color ml-2"></label>
                                    <input wire:model="status_rb" name="status_rb"
                                            value="Em andamento"type="radio"
                                            class="@error('status_rb') is-invalid @enderror">
                                    <span class="label-color" style="margin-left: 20px;">Em andamento</span>
                                        @error('status_rb')
                                                <div class="invalid-feedback align" role="alert" style="width: 200%">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                        @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="radio-inline label-color"></label>
                                    <input wire:model="status_rb" name="status_rb" value="Pronto para entrega"
                                            type="radio"><span class="label-color" style="margin-left: 20px;">Pronto para entrega</span>

                                        @error('status_rb')
                                            <span class="invalid-feedback align" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>

                        <h5 class="pt-5 mt-5 label-color"
                            style="text-align: center;">
                            Escolha os problemas encontrados:</h5>

                        <div class="form-check radio-style mt-3 d-flex"
                            style="flex-wrap: wrap; width: 75%; margin: 0 auto;">
                            @foreach ($problemas as $problema)
                                <div class="col-md-6 div-radio">
                                    <input style="margin: 13px 10px 15px 10px;" wire:model="problema_check" name="problema_check" class="form-check-input" type="checkbox"
                                        value="{{ $problema->id_problema }}">
                                    <label class="form-check-label label-color" style="margin: 10px;"
                                        for="problema_check">
                                        {{ $problema->descricao }}
                                    </label>
                                </div>
                                @error('problema_check')
                                    <span class="invalid-feedback align" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @endforeach
                        </div>
                    </div>

                    @if (count($errors->all()) > 0 )
                        @foreach ($errors->all() as $erro)
                            @if (str_contains($erro, 'O Serviço já possui problemas registrados. Desmarque os problemas') ||str_contains($erro, 'Selecione um problema'))
                                    <div style="text-align:center;">
                                        <strong style="color:#FF7066;">{{ $erro }}</strong>
                                    </div>
                            @endif
                        @endforeach
                    @endif

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark close" wire:click="closeModal"
                            data-bs-dismiss="modal" aria-label="Close" style="font-size:20px;">Voltar</button>
                        <button style="font-size:20px;" type="submit" class="btn btn-success">
                            Enviar
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
