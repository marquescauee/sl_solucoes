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

<div wire:ignore.self class="modal fade text-left" id="ModalDeleteProblema" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-background">
            <div class="modal-header">
                <h4 class="modal-title label-color">{{ __('Apagar') }}</h4>
            </div>
            <form wire:submit.prevent="destroy">
                <div class="modal-body" style="text-align: center">
                    <span class="label-color" style="font-size: 30px;">Tem certeza disso?</span>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-dark close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close" style="font-size:20px;">{{__('Voltar')}}</a>

                        <button style="font-size:20px;" type="submit" class="btn btn-outline-success">
                            Remover
                         </button>
                </div>
            </form>
        </div>
    </div>
</div>
