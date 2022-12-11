<div>
    <div class="nomePagina">
        <h2 class="bannerText">Solicitações</h2>
    </div>

    @if (session()->has('message'))
        <div style="text-align: center;">
            <h5 class="alert alert-success">{{ session('message') }}</h5>
        </div>
    @endif

    @include('layouts.modal.solicitacoes.create')

    <div class=box>
        <div class=opcaoSol>
            <button type="button" class="b1" data-bs-toggle="modal" data-bs-target="#ModalCreateSolicitacao"
                aria-current="page" style="text-decoration: none; border:none;">
                <div>
                    <h2 class=t1>Adicionar</h2>
                </div>
            </button>

        </div>
        <div class=textArea>
            <div class="table" style="overflow-x:auto;">
                <table>
                    @forelse ($solicitacoes as $solicitacao)
                        <tr>
                            @foreach ($clientes as $cliente)
                                @if ($cliente->id_cliente == $solicitacao->id_cliente)
                                    <td>
                                        {{ $cliente->nome }}
                                    </td>
                                @endif
                            @endforeach

                            @foreach ($equipamentos as $equipamento)
                                @if ($equipamento->id_equipamento == $solicitacao->id_equipamento)
                                    <td>
                                        {{ $equipamento->nome }}
                                    </td>
                                @endif
                            @endforeach

                            <td>
                                <a href="#" class="btn btn-outline-success"
                                    wire:click="startServico({{ $solicitacao->id_solicitacao }})">Iniciar</a>
                            </td>

                            <td>
                                <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#ModalDeleteSolicitacao"
                                    wire:click="delete({{ $solicitacao->id_solicitacao }})">Apagar</a>

                                @include('layouts.modal.solicitacoes.delete')
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center">Não há solicitações registradas.</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
