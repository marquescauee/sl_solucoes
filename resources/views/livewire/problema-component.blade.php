<div>
    <div class="nomePagina">
        <h2 class="bannerText">Problemas</h2>
    </div>

    @if (session()->has('message'))
            <div style="text-align: center;">
                <h5 class="alert alert-success">{{ session('message') }}</h5>
            </div>
        @endif

    @include('layouts.modal.problemas.create')

    <div class=box>
        <div class=opcaoSol>
            <button type="button" class="b1" data-bs-toggle="modal" data-bs-target="#ModalCreateProblema"
                aria-current="page" style="text-decoration: none; border:none;">
                <div>
                    <h2 class=t1>Adicionar</h2>
                </div>
            </button>

        </div>
        <div class=textArea>
            <div class="table" style="overflow-x:auto;">
                <table>
                    @forelse ($problemas as $problema)
                    <tr style="text-align: center;">
                        <td >
                            {{ $problema->descricao }}
                        </td>

                        <td>
                            <a style="text-decoration:none; color: #CB7A00" wire:click="edit({{$problema->id_problema}})" data-bs-toggle="modal"
                                data-bs-target="#ModalEditProblema" aria-current="page" href="#">
                                <span class="opcaoTabela">Editar</span>
                            </a>
                            @include('layouts.modal.problemas.edit')
                        </td>

                        <td>
                            <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#ModalDeleteProblema" wire:click="delete({{$problema->id_problema}})">Apagar</a>

                            @include('layouts.modal.problemas.delete')
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="text-align: center">Não há problemas registrados.</td>
                    </tr>
                @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
