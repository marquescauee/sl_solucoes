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
</style>

<div wire:ignore.self class="modal fade text-left" id="ModalCreateSolicitacao" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-background">
            <div class="modal-header">
                <h4 class="modal-title label-color">{{ __('Adicionar') }}</h4>
            </div>
            <form wire:submit.prevent="store">
                <div class="modal-body">

                    <div class="div-input">
                        <label for="id_cliente" class=" label-color">Cliente:</label>
                        <select wire:model="id_cliente"  id="id_cliente" class="form-select input-width form-control @error('id_cliente') is-invalid @enderror" aria-label="Default select example">
                            <option selected value="0">Selecione o cliente:</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id_cliente }}">{{ $cliente->nome }}
                                </option>
                            @endforeach
                        </select>

                        @error('id_cliente')
                        <span class="invalid-feedback align" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="div-input">
                        <label for="id_equipamento" class=" label-color label-form">Equipamento:</label>
                        <select wire:model="id_equipamento" name="id_equipamento" class="form-select input-width form-control @error('id_equipamento') is-invalid @enderror" aria-label="Default select example">
                            <option selected value="0">Selecione o equipamento:</option>
                            @foreach ($equipamentos as $equipamento)
                                <option value="{{ $equipamento->id_equipamento}}">{{ $equipamento->nome }}
                                </option>
                            @endforeach
                        </select>

                        @error('id_equipamento')
                        <span class="invalid-feedback align" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"
                        style="font-size:20px;">Voltar</button>

                    <button style="font-size:20px;" type="submit" class="btn btn-success">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
