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

<div wire:ignore.self class="modal fade text-left" id="ModalCreateFuncionario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-background">
            <div class="modal-header">
                <h4 class="modal-title label-color">{{ __('Adicionar') }}</h4>
            </div>
            <form wire:submit.prevent="store">
                <div class="modal-body">

                    <div class="div-input">
                        <label for="name" class=" label-color">Nome:</label>
                        <input type="text" class="input-width form-control @error('name') is-invalid @enderror" wire:model="name" name="name" placeholder="Digite o nome do funcionário">

                        @error('name')
                        <span class="invalid-feedback align" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="div-input">
                        <label for="email" class="label-form label-color">Email:</label>
                        <input type="email" class="input-width form-control @error('email') is-invalid @enderror" wire:model="email" name="email" placeholder="Digite o email do funcionário">

                        @error('email')
                        <span class="invalid-feedback align" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="div-input">
                        <label for="password" class="label-form label-color">Senha:</label>
                        <input type="password" class="input-width form-control @error('password') is-invalid @enderror" wire:model="password" name="password" placeholder="Digite a senha do funcionário">


                        @error('password')
                        <span class="invalid-feedback align" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="div-input">
                        <label for="cargo" class="label-form label-color">Cargo:</label>
                        <input type="text" class="input-width form-control @error('cargo') is-invalid @enderror" wire:model="cargo" name="cargo" placeholder="Digite o cargo do funcionário">


                        @error('cargo')
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
