<div>
    <div class="nomePagina">
        <h2 class="bannerText">Serviços</h2>
    </div>

    @if (session()->has('message'))
        <div style="text-align: center;">
            <h5 class="alert alert-success">{{ session('message') }}</h5>
        </div>
    @endif

    <div class=box>
        <div class=textArea>
            <div class="table" style="overflow-x:auto;">
                <table>
                    @forelse ($servicos as $servico)

                        <tr>

                            <td>
                                {{$servico->cliente->nome}}
                            </td>

                            <td>
                                {{$servico->equipamento->nome}}
                            </td>

                            @if ($servico->status == 'Em análise')
                                <td style="color: #FE6F08">
                                    {{ $servico->status }}
                                </td>

                                <td>
                                    <a href="#" style="text-decoration:none; color: #CB7A00"
                                        data-bs-toggle="modal" data-bs-target="#ModalEditServico"
                                        aria-current="page"
                                        wire:click="edit({{ $servico->id_servico }})">Atualizar</a>

                                    @include('layouts.modal.servicos.edit')
                                </td>
                            @elseif($servico->status == 'Em andamento')
                                <td style="color: #084DFE">
                                    {{ $servico->status }}
                                </td>

                                <td>
                                    <a href="#" style="text-decoration:none; color: #CB7A00"
                                        data-bs-toggle="modal" data-bs-target="#ModalEditServico"
                                        wire:click="edit({{ $servico->id_servico }})">Atualizar</a>

                                    @include('layouts.modal.servicos.edit')
                                </td>
                            @elseif($servico->status == 'Pronto para entrega')
                                <td style="color: #0D9613">
                                    {{ $servico->status }}
                                </td>

                                <td>
                                    <a style="text-decoration:none; color: #DC3545"
                                        wire:click="delete({{ $servico->id_servico }})" data-bs-toggle="modal"
                                        data-bs-target="#ModalDeleteServico" href="#">
                                        <span class="opcaoTabela">Finalizar</span>
                                    </a>
                                    @include('layouts.modal.servicos.finalizar')
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center">Não há serviços iniciados.</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
