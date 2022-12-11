<div>
    <div class="nomePagina">
        <h2 class="bannerText">Equipamentos</h2>
    </div>

    @if (session()->has('message'))
        <div style="text-align: center;">
            <h5 class="alert alert-success">{{ session('message') }}</h5>
        </div>
    @endif

    @include('layouts.modal.equipamentos.create')

    <div class=box>
        <div class=opcaoSol>
            <button type="button" class="b1" data-bs-toggle="modal" data-bs-target="#ModalCreateEquipamento"
                    aria-current="page" style="text-decoration: none; border:none;">
                <div>
                    <h2 class=t1>Adicionar</h2>
                </div>
            </button>

        </div>
        <div class=textArea>
            <div class="table" style="overflow-x:auto;">
                <table>
                    @forelse ($equipamentos as $equipamento)
                        <tr style="text-align: center;">
                            <td >
                                {{ $equipamento->nome }}
                            </td>

                            <td>
                                <a style="text-decoration:none; color: #CB7A00" wire:click="edit({{$equipamento->id_equipamento}})" data-bs-toggle="modal"
                                   data-bs-target="#ModalEditEquipamento" aria-current="page" href="#">
                                    <span class="opcaoTabela">Editar</span>
                                </a>
                                @include('layouts.modal.equipamentos.edit')
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center">Não há equipamentos registrados.</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
