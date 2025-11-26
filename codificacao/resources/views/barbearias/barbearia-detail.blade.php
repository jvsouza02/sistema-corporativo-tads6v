{{-- resources/views/barbearias/detalhes.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalhes da Barbearia - BarberPro')

@section('content')
    <section class="barbearia-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <img src="{{ $barbearia->foto_url ?? 'https://via.placeholder.com/400x300' }}"
                        alt="{{ $barbearia->nome }}" class="barbearia-img">
                </div>
                <div class="col-md-8">
                    <h1>{{ $barbearia->nome }}</h1>
                    <p class="lead">{{ $barbearia->descricao }}</p>

                    <div class="info-row mb-2" style="background: rgba(255,255,255,0.1); color: white;">
                        <i class="fas fa-map-marker-alt" style="color: white"></i>
                        <span>{{ $barbearia->endereco }}</span>
                    </div>

                    <div class="info-row mb-2" style="background: rgba(255,255,255,0.1); color: white;">
                        <i class="fas fa-clock" style="color: white"></i>
                        <span>{{ $barbearia->horario_abertura }} - {{ $barbearia->horario_fechamento }}</span>
                    </div>

                    <div class="action-buttons mt-4">
                        @if (Auth()->user()->role == 'proprietario')
                            <a href="{{ route('barbeiros.index', $barbearia->id_barbearia) }}" class="btn btn-manage">
                                <i class="fas fa-users me-2"></i>Gerenciar Barbeiros
                            </a>
                        @endif
                        @if (Auth()->user()->role == 'barbeiro')
                            <button class="btn btn-add-atendimento" data-bs-toggle="modal"
                                data-bs-target="#modalNovoAtendimento">
                                <i class="fas fa-plus-circle me-2"></i>Novo Atendimento
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mb-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Atendimentos</h2>
            @if (Auth()->user()->role == 'proprietario')
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar
                </a>
            @endif
        </div>

        @if ($atendimentos->isEmpty())
            <div class="empty-state">
                <i class="fas fa-clipboard-list"></i>
                <h4>Nenhum atendimento registrado</h4>
                <p>Esta barbearia ainda não possui atendimentos registrados.</p>
            </div>
        @else
            {{-- CONTAINER PARA CARDS EM COLUNAS --}}
            <div style="display:flex; flex-wrap:wrap; gap:20px;">
                @foreach ($atendimentos as $atendimento)
                    <div class="atendimento-card"
                         style="flex:0 0 360px; max-width:360px; width:100%;
                                padding:18px; font-size:0.95rem;">

                        <div class="atendimento-header" style="margin-bottom:8px;">
                            <div>
                                <div class="atendimento-cliente" style="font-weight:600;">
                                    <i class="fas fa-user-circle me-1"></i>
                                    Cliente
                                </div>
                                <div class="atendimento-date" style="font-size:0.85rem; color:#666;">
                                    <i class="far fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($atendimento->created_at)->format('d/m/Y H:i') }}
                                </div>
                            </div>
                        </div>

                        <div class="atendimento-body">
                            <div class="info-row" style="display:flex; align-items:center; margin-bottom:6px;">
                                <i class="fas fa-user-tie me-2"></i>
                                <span class="info-label" style="font-weight:500;">Profissional:&nbsp;</span>
                                <span class="info-value">{{ ucfirst($atendimento->barbeiro->nome) ?? 'Não informado' }}</span>
                            </div>

                            <div class="info-row" style="display:flex; align-items:center; margin-bottom:6px;">
                                <i class="fas fa-cut me-2"></i>
                                <span class="info-label" style="font-weight:500;">Serviço:&nbsp;</span>
                                <span class="info-value">
                                    {{ $atendimento->servico ?? 'Não informado' }}
                                </span>
                            </div>

                            @if ($atendimento->produto)
                                <div class="info-row" style="display:flex; align-items:center; margin-bottom:6px;">
                                    <i class="fas fa-box me-2"></i>
                                    <span class="info-label" style="font-weight:500;">Produto:&nbsp;</span>
                                    <span class="info-value">{{ $atendimento->produto ?? 'Nenhum' }}</span>
                                </div>
                            @endif

                            @if ($atendimento->comentario)
                                <div class="observacoes-section" style="margin-top:8px;">
                                    <h6 style="font-size:0.9rem; font-weight:600;">
                                        <i class="fas fa-sticky-note me-2"></i>Comentário
                                    </h6>
                                    <p class="observacoes-text mb-0" style="font-size:0.9rem;">
                                        {{ $atendimento->comentario }}
                                    </p>
                                </div>
                            @endif
                        </div>

                        <div class="atendimento-footer" style="margin-top:12px; display:flex; justify-content:space-between; align-items:center;">
                            <div class="valor-total"
                                 style="font-size:0.95rem; font-weight:500;">
                                <span class="info-label">Valor Total:</span>
                                <span class="info-value" style="font-weight:600;">
                                    R$ {{ number_format($atendimento->valor_total, 2, ',', '.') }}
                                </span>
                            </div>

                            @if (Auth()->user()->role == 'barbeiro')
                                <div class="d-flex gap-2 mt-0">

                                    {{-- Botão de editar (ícone) --}}
                                    <button class="btn"
                                            style="padding:6px 10px; background:#eef3ff; border-radius:8px;"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editAtendimentoModal"
                                            data-id="{{ $atendimento->id_atendimento }}"
                                            data-servico="{{ $atendimento->servico }}"
                                            data-produto="{{ $atendimento->produto }}"
                                            data-valor="{{ $atendimento->valor_total }}"
                                            data-comentario="{{ $atendimento->comentario }}"
                                            title="Editar atendimento">
                                        <i class="fas fa-edit" style="color:#3f51b5; font-size:1.1rem;"></i>
                                    </button>

                                    {{-- Botão de excluir (ícone) --}}
                                    <form action="{{ route('atendimentos.destroy', $atendimento->id_atendimento) }}"
                                          method="POST"
                                          onsubmit="return confirm('Deseja excluir este atendimento?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn"
                                                style="padding:6px 10px; background:#ffecec; border-radius:8px;"
                                                title="Excluir atendimento">
                                            <i class="fas fa-trash" style="color:#d32f2f; font-size:1.1rem;"></i>
                                        </button>
                                    </form>

                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Modal para Novo Atendimento --}}
    <div class="modal fade" id="modalNovoAtendimento" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Atendimento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="formAtendimento" action="{{ route('atendimentos.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_barbearia" value="{{ $barbearia->id_barbearia }}">

                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Serviço</label>
                                <select id="servico" name="servico" class="form-select" required>
                                    <option value="">Selecione...</option>
                                    <option value="Corte Social">Corte Social</option>
                                    <option value="Corte Navalhado">Corte Navalhado</option>
                                    <option value="Corte Degradê">Corte Degradê</option>
                                    <option value="Barba">Barba</option>
                                    <option value="Sobrancelha">Sobrancelha</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Produto Utilizado</label>
                                <select id="produto" name="produto" class="form-select">
                                    <option value="Nenhum">Nenhum</option>
                                    <option value="Shampoo">Shampoo</option>
                                    <option value="Pomada">Pomada</option>
                                    <option value="Gel">Gel</option>
                                    <option value="Tônico">Tônico</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Valor Total</label>
                                <input id="valorTotal" name="valor_total" type="text" class="form-control" readonly
                                    value="R$ 0,00">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Comentário</label>
                                <input type="text" id="comentario" name="comentario" class="form-control"
                                    placeholder="Observações..." required>
                            </div>

                            @if (Auth()->user()->role == 'barbeiro')
                                <input type="hidden" name="id_barbeiro"
                                    value="{{ Auth()->user()->barbeiro->id_barbeiro }}">
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" type="submit">Registrar Atendimento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal para Editar Atendimento --}}
    <div class="modal fade" id="editAtendimentoModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Atendimento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editAtendimentoForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_barbearia" value="{{ $barbearia->id_barbearia }}">

                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Serviço</label>
                                <select id="editServico" name="servico" class="form-select" required>
                                    <option value="">Selecione...</option>
                                    <option value="Corte Social">Corte Social</option>
                                    <option value="Corte Navalhado">Corte Navalhado</option>
                                    <option value="Corte Degradê">Corte Degradê</option>
                                    <option value="Barba">Barba</option>
                                    <option value="Sobrancelha">Sobrancelha</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Produto Utilizado</label>
                                <select id="editProduto" name="produto" class="form-select">
                                    <option value="Nenhum">Nenhum</option>
                                    <option value="Shampoo">Shampoo</option>
                                    <option value="Pomada">Pomada</option>
                                    <option value="Gel">Gel</option>
                                    <option value="Tônico">Tônico</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Valor Total</label>
                                <input id="editValorTotal" name="valor_total" type="text" class="form-control"
                                    readonly value="R$ 0,00">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Comentário</label>
                                <input type="text" id="editComentario" name="comentario" class="form-control"
                                    placeholder="Observações..." required>
                            </div>

                            @if (Auth()->user()->role == 'barbeiro')
                                <input type="hidden" name="id_barbeiro"
                                    value="{{ Auth()->user()->barbeiro->id_barbeiro }}">
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const precos = {
                servicos: {
                    "Corte Social": 30,
                    "Corte Navalhado": 35,
                    "Corte Degradê": 40,
                    "Barba": 25,
                    "Sobrancelha": 15
                },
                produtos: {
                    "Nenhum": 0,
                    "Shampoo": 10,
                    "Pomada": 12,
                    "Gel": 8,
                    "Tônico": 20
                }
            };
            
            function atualizarValor() {
                const servico = document.getElementById("servico").value;
                const produto = document.getElementById("produto").value;
                const total = (precos.servicos[servico] || 0) + (precos.produtos[produto] || 0);
                document.getElementById("valorTotal").value = `R$ ${total.toFixed(2).replace('.', ',')}`;
            }

            const servicoSelect = document.getElementById("servico");
            const produtoSelect = document.getElementById("produto");

            if (servicoSelect) servicoSelect.addEventListener("change", atualizarValor);
            if (produtoSelect) produtoSelect.addEventListener("change", atualizarValor);

            const editModalElement = document.getElementById('editAtendimentoModal');

            if (editModalElement) {
                function atualizarValorEdit() {
                    const servico = document.getElementById("editServico").value;
                    const produto = document.getElementById("editProduto").value;
                    const total = (precos.servicos[servico] || 0) + (precos.produtos[produto] || 0);
                    document.getElementById("editValorTotal").value = `R$ ${total.toFixed(2).replace('.', ',')}`;
                }

                document.getElementById("editServico").addEventListener("change", atualizarValorEdit);
                document.getElementById("editProduto").addEventListener("change", atualizarValorEdit);

                editModalElement.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;

                    const id = button.getAttribute('data-id');
                    const servico = button.getAttribute('data-servico');
                    const produto = button.getAttribute('data-produto');
                    const comentario = button.getAttribute('data-comentario');

                    document.getElementById('editServico').value = servico || '';
                    document.getElementById('editProduto').value = produto || 'Nenhum';
                    document.getElementById('editComentario').value = comentario || '';

                    atualizarValorEdit();

                    document.getElementById('editAtendimentoForm').action = `/atendimentos/${id}`;

                    this.querySelector('.modal-title').textContent =
                        `Editar Atendimento #${id.substring(0, 8)}`;
                });
            }
        });
    </script>
@endpush
