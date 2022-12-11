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

<div wire:ignore.self class="modal fade text-left" id="ModalEditEquipamento" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-background">
            <div class="modal-header">
                <h4 class="modal-title label-color">{{ __('Editar') }}</h4>
            </div>
            <form wire:submit.prevent="update">
                <div class="modal-body">

                    <div class="div-input" style="text-align: start;">
                        <label for="nome" class=" label-color">Nome:</label>
                        <input type="text" class="input-width form-control @error('nome') is-invalid @enderror" wire:model="nome" name="nome" placeholder="Digite o nome do equipamento">

                        @error('nome')
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
