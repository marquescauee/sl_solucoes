<div>
    <div class="nomePagina">
        <h2 class="bannerText">Clientes</h2>
    </div>

    @if (session()->has('message'))
            <div style="text-align: center;">
                <h5 class="alert alert-success">{{ session('message') }}</h5>
            </div>
        @endif

    @include('layouts.modal.clientes.create')

    <div class=box>
        <div class=opcaoSol>
            <button type="button" class="b1" data-bs-toggle="modal" data-bs-target="#ModalCreateCliente"
                aria-current="page" style="text-decoration: none; border:none;">
                <div>
                    <h2 class=t1>Adicionar</h2>
                </div>
            </button>

        </div>
        <div class=textArea>
            <div class="table" style="overflow-x:auto;">
                <table>
                    @forelse ($clientes as $cliente)
                    <tr>
                        <td>
                            {{ $cliente->nome }}
                        </td>
                        <td>
                            {{ $cliente->email }}
                        </td>

                        <td>
                            <a style="text-decoration:none; color: #CB7A00" wire:click="edit({{$cliente->id_cliente}})" data-bs-toggle="modal"
                                data-bs-target="#ModalEditCliente" aria-current="page" href="#">
                                <span class="opcaoTabela">Editar</span>
                            </a>
                            @include('layouts.modal.clientes.edit')
                        </td>

                        <td>
                            <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#ModalDeleteCliente" wire:click="delete({{$cliente->id_cliente}})">Apagar</a>

                            @include('layouts.modal.clientes.delete')
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="text-align: center">Não há clientes registrados.</td>
                    </tr>
                @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
