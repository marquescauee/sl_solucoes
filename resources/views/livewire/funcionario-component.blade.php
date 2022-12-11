<div>
    <div class="nomePagina">
        <h2 class="bannerText">Funcionários</h2>
    </div>

    @if (session()->has('message'))
        <div style="text-align: center;">
            <h5 class="alert alert-success">{{ session('message') }}</h5>
        </div>
    @endif

    @include('layouts.modal.funcionarios.create')

    <div class=box>
        <div class=opcaoSol>
            <button type="button" class="b1" data-bs-toggle="modal" data-bs-target="#ModalCreateFuncionario"
                    aria-current="page" style="text-decoration: none; border:none;">
                <div>
                    <h2 class=t1>Adicionar</h2>
                </div>
            </button>

        </div>
        <div class=textArea>
            <div class="table" style="overflow-x:auto;">
                <table>
                    @forelse ($funcionarios as $funcionario)
                        <tr>
                            <td>
                                {{ $funcionario->name }}
                            </td>
                            <td>
                                {{ $funcionario->email }}
                            </td>
                            <td>
                                {{ $funcionario->cargo }}
                            </td>

                            <td>
                                <a style="text-decoration:none; color: #CB7A00" wire:click="edit({{$funcionario->id_funcionario}})" data-bs-toggle="modal"
                                   data-bs-target="#ModalEditFuncionario" aria-current="page" href="#">
                                    <span class="opcaoTabela">Editar</span>
                                </a>
                                @include('layouts.modal.funcionarios.edit')
                            </td>

                            <td>
                                <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal"
                                   data-bs-target="#ModalDeleteFuncionario" wire:click="delete({{$funcionario->id_funcionario}})">Apagar</a>

                                @include('layouts.modal.funcionarios.delete')
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center">Não há funcionários registrados.</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
