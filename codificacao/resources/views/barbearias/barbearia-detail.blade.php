{{-- resources/views/barbearias/detalhes.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalhes da Barbearia - BarberPro')

@section('content')
    <section class="barbearia-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <img src="{{ $barbearia->foto_url 
                                            ? asset('storage/' . $barbearia->foto_url) 
                                            : asset('images/default-barbearia.jpg') }}"
                                        class="card-img-top"
                                        alt="{{ $barbearia->nome }}">
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
                        @if (Auth::user()->role == 'proprietario')
                            <a href="{{ route('barbeiros.index', $barbearia->id_barbearia) }}" class="btn btn-manage">
                                <i class="fas fa-users me-2"></i>Gerenciar Barbeiros
                            </a>

                            <a href="{{ route('produtos.index', $barbearia->id_barbearia) }}"
                                class="btn btn-manage position-relative">
                                <i class="fas fa-box-open me-2"></i>Produtos
                                @if ($estoque_baixo)
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">!</span>
                                @endif
                            </a>

                            <a href="{{ route('servicos.index', $barbearia->id_barbearia) }}" class="btn btn-manage">
                                <i class="fas fa-briefcase me-2"></i>Serviços
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mb-5">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- AGENDAMENTOS DE HOJE --}}
        <div class="mb-4">
            <h3>Agendamentos de Hoje</h3>

            @if (isset($agendamentos_hoje) && $agendamentos_hoje->count())
                <div style="display:flex; flex-wrap:wrap; gap:12px;">
                    @foreach ($agendamentos_hoje as $ag)
                        <div class="card p-3" style="min-width:220px; max-width:280px;">
                            <div>
                                <strong>{{ $ag->cliente->nome ?? 'Cliente' }}</strong>
                                <div class="text-muted">{{ $ag->data_hora->format('d/m/Y H:i') }}</div>
                            </div>

                            <div class="mt-2 d-flex justify-content-between align-items-center">
                                <button class="btn btn-sm btn-primary btn-iniciar-atendimento"
                                    data-id_agendamento="{{ $ag->id_agendamento }}"
                                    data-id_cliente="{{ $ag->id_cliente }}">
                                    Iniciar atendimento
                                </button>

                                <small class="text-muted">{{ ucfirst($ag->status) }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">Nenhum agendamento para hoje.</div>
            @endif
        </div>

        {{-- ATENDIMENTOS REALIZADOS --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Atendimentos Realizados</h2>
            @if (Auth::user()->role == 'proprietario')
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary"><i
                        class="fas fa-arrow-left me-2"></i>Voltar</a>
            @endif
        </div>

        @if ($atendimentos->isEmpty())
            <div class="empty-state">
                <i class="fas fa-clipboard-list"></i>
                <h4>Nenhum atendimento registrado</h4>
                <p>Esta barbearia ainda não possui atendimentos registrados.</p>
            </div>
        @else
            <div style="display:flex; flex-wrap:wrap; gap:20px;">
                @foreach ($atendimentos as $atendimento)
                    <div class="atendimento-card"
                        style="flex:0 0 360px; max-width:360px; width:100%; padding:18px; font-size:0.95rem;">
                        <div class="atendimento-header mb-2">
                            <div class="atendimento-cliente" style="font-weight:600;">
                                <i class="fas fa-user-circle me-1"></i> {{ $atendimento->cliente->nome ?? 'Cliente' }}
                            </div>
                            <div class="atendimento-date text-muted" style="font-size:0.85rem;">
                                <i class="far fa-calendar me-1"></i>
                                {{ $atendimento->data_hora_inicio->format('d/m/Y H:i') }}
                            </div>
                        </div>

                        <div class="atendimento-body">
                            <div class="info-row mb-2"><i class="fas fa-user-tie me-2"></i>
                                <strong>Profissional:&nbsp;</strong>{{ $atendimento->barbeiro->nome ?? 'Não informado' }}
                            </div>

                            <div class="info-row mb-2">
                                <i class="fas fa-cut me-2 mt-1"></i>
                                <strong>Serviços:&nbsp;</strong>
                                @if ($atendimento->servicos->count() > 0)
                                    {{ $atendimento->servicos->pluck('nome')->implode(', ') }}
                                @else
                                    Não informado
                                @endif
                            </div>

                            @if ($atendimento->produtosUtilizados && $atendimento->produtosUtilizados->count())
                                <div class="info-row mb-2">
                                    <i class="fas fa-box me-2 mt-1"></i>
                                    <strong>Produtos:&nbsp;</strong>
                                    <div class="text-muted">
                                        @foreach ($atendimento->produtosUtilizados as $produto)
                                            <div>• {{ $produto->nome }} — {{ $produto->pivot->quantidade }} (R$
                                                {{ number_format($produto->pivot->valor_total, 2, ',', '.') }})</div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if ($atendimento->observacao)
                                <div class="observacoes-section mt-2">
                                    <h6 style="font-size:0.9rem; font-weight:600;"><i
                                            class="fas fa-sticky-note me-2"></i>Observações</h6>
                                    <p class="mb-0">{{ $atendimento->observacao }}</p>
                                </div>
                            @endif
                        </div>

                        <div class="atendimento-footer mt-3 d-flex justify-content-between align-items-center">
                            <div class="valor-total">
                                <strong>Valor Total:</strong>
                                <span style="font-weight:600; color:#28a745;">R$
                                    {{ number_format($atendimento->valor_total, 2, ',', '.') }}</span>
                            </div>

                            <div>
                                <span
                                    class="badge bg-{{ $atendimento->status === 'finalizado' ? 'success' : 'warning' }}">{{ ucfirst($atendimento->status) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Modal Novo Atendimento --}}
    <div class="modal fade" id="modalNovoAtendimento" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus-circle me-2"></i>Registrar Atendimento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form id="formAtendimento" action="{{ route('atendimentos.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_barbearia" value="{{ $barbearia->id_barbearia }}">
                    <input type="hidden" name="id_agendamento" id="input_id_agendamento" value="">
                    <input type="hidden" name="id_cliente" id="input_id_cliente" value="">

                    <div class="modal-body">
                        <div class="row g-3">
                            {{-- Serviços --}}
                            <div class="col-md-12">
                                <label class="form-label">Serviços Realizados *</label>
                                @if ($servicos->count() > 0)
                                    <div class="border rounded p-3" style="max-height: 300px; overflow-y: auto;">
                                        @foreach ($servicos as $servico)
                                            <div class="form-check mb-3">
                                                <input class="form-check-input servico-checkbox" type="checkbox"
                                                    name="servicos[]" value="{{ $servico->id_servico }}"
                                                    id="servico_{{ $servico->id_servico }}"
                                                    data-preco="{{ $servico->preco }}">
                                                <label class="form-check-label d-flex justify-content-between w-100"
                                                    for="servico_{{ $servico->id_servico }}">
                                                    <div>
                                                        <strong>{{ $servico->nome }}</strong><br>
                                                        <small class="text-muted">{{ $servico->descricao }}</small>
                                                        @if ($servico->produtos->count() > 0)
                                                            <br><small class="text-info"><i class="fas fa-box me-1"></i>
                                                                {{ $servico->produtos->count() }} produto(s):
                                                                {{ $servico->produtos->pluck('nome')->implode(', ') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                    <span class="badge bg-success align-self-start">R$
                                                        {{ number_format($servico->preco, 2, ',', '.') }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="alert alert-warning mb-0">Nenhum serviço cadastrado. <a
                                            href="{{ route('servicos.index', $barbearia->id_barbearia) }}">Cadastre
                                            serviços primeiro</a>.</div>
                                @endif
                            </div>

                            {{-- Produtos Extras --}}
                            <div class="col-md-12">
                                <label class="form-label">Produtos Extras (opcional)</label>
                                <div id="produtosExtrasContainer" class="mb-2"></div>
                                <button type="button" id="btnAddProdutoExtra"
                                    class="btn btn-sm btn-outline-secondary">Adicionar produto</button>
                                <small class="d-block text-muted mt-1">Produtos extras serão cobrados e removidos do
                                    estoque.</small>
                            </div>

                            {{-- Valor Total --}}
                            <div class="col-md-6">
                                <label class="form-label">Valor Total</label>
                                <input id="valorTotal" type="text"
                                    class="form-control form-control-lg fw-bold text-success" readonly value="R$ 0,00">
                            </div>

                            {{-- Observação --}}
                            <div class="col-md-12">
                                <label class="form-label">Observações</label>
                                <textarea name="observacao" class="form-control" rows="3" placeholder="Observações sobre o atendimento..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-check me-2"></i>Registrar
                            Atendimento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const valorTotalDisplay = document.getElementById('valorTotal');
            const produtosContainer = document.getElementById('produtosExtrasContainer');
            const btnAddProduto = document.getElementById('btnAddProdutoExtra');
            const inputIdAgendamento = document.getElementById('input_id_agendamento');
            const inputIdCliente = document.getElementById('input_id_cliente');

            // produtos do servidor
            const produtos = @json($produtos->map(fn($p) => ['id' => $p->id_produto, 'nome' => $p->nome, 'preco' => (float) $p->preco]));

            // calcula total
            function calcularTotal() {
                let total = 0;
                document.querySelectorAll('.servico-checkbox').forEach(cb => {
                    if (cb.checked) total += parseFloat(cb.dataset.preco || 0);
                });

                produtosContainer.querySelectorAll('.produto-row').forEach(row => {
                    const select = row.querySelector('.produto-select');
                    const preco = parseFloat(select.selectedOptions[0]?.datasetPreco || 0);
                    const qtd = parseFloat(row.querySelector('.produto-quantidade').value || 0);
                    total += preco * qtd;
                });

                valorTotalDisplay.value = `R$ ${total.toFixed(2).replace('.', ',')}`;
            }

            // adicionar linha produto extra
            function criarLinhaProdutoExtra() {
                const idx = produtosContainer.querySelectorAll('.produto-row').length;
                const row = document.createElement('div');
                row.className = 'produto-row d-flex gap-2 align-items-center mb-2';

                const select = document.createElement('select');
                select.name = `produtos_extras[${idx}][id_produto]`;
                select.className = 'form-select produto-select';
                select.style.minWidth = '220px';

                const emptyOpt = document.createElement('option');
                emptyOpt.value = '';
                emptyOpt.text = 'Selecione produto...';
                select.appendChild(emptyOpt);

                produtos.forEach(p => {
                    const opt = document.createElement('option');
                    opt.value = p.id;
                    opt.text = `${p.nome} — R$ ${p.preco.toFixed(2).replace('.', ',')}`;
                    opt.datasetPreco = p.preco;
                    select.appendChild(opt);
                });

                const inputQtd = document.createElement('input');
                inputQtd.type = 'number';
                inputQtd.step = '0';
                inputQtd.min = '0';
                inputQtd.value = '1';
                inputQtd.name = `produtos_extras[${idx}][quantidade]`;
                inputQtd.className = 'form-control produto-quantidade';
                inputQtd.style.width = '110px';

                const btnRem = document.createElement('button');
                btnRem.type = 'button';
                btnRem.className = 'btn btn-sm btn-outline-danger';
                btnRem.innerText = 'Remover';

                btnRem.addEventListener('click', () => {
                    row.remove();
                    recalculaNomes();
                    calcularTotal();
                });

                select.addEventListener('change', calcularTotal);
                inputQtd.addEventListener('input', calcularTotal);

                row.appendChild(select);
                row.appendChild(inputQtd);
                row.appendChild(btnRem);
                produtosContainer.appendChild(row);
            }

            function recalculaNomes() {
                produtosContainer.querySelectorAll('.produto-row').forEach((row, idx) => {
                    row.querySelector('.produto-select').name = `produtos_extras[${idx}][id_produto]`;
                    row.querySelector('.produto-quantidade').name = `produtos_extras[${idx}][quantidade]`;
                });
            }

            btnAddProduto.addEventListener('click', function() {
                criarLinhaProdutoExtra();
                calcularTotal();
            });

            // iniciar atendimento a partir do agendamento
            document.querySelectorAll('.btn-iniciar-atendimento').forEach(btn => {
                btn.addEventListener('click', function() {
                    const idAg = this.dataset.id_agendamento;
                    const idCli = this.dataset.id_cliente;

                    inputIdAgendamento.value = idAg || '';
                    inputIdCliente.value = idCli || '';

                    // abrir modal
                    const modalEl = document.getElementById('modalNovoAtendimento');
                    const modalObj = bootstrap.Modal.getOrCreateInstance(modalEl);
                    modalObj.show();

                    // limpa produtos extras e recalcula
                    produtosContainer.innerHTML = '';
                    calcularTotal();
                });
            });

            // reset modal ao fechar
            const modalEl = document.getElementById('modalNovoAtendimento');
            modalEl.addEventListener('hidden.bs.modal', function() {
                document.getElementById('formAtendimento').reset();
                produtosContainer.innerHTML = '';
                inputIdAgendamento.value = '';
                inputIdCliente.value = '';
                calcularTotal();
            });

            // recalcula periodicamente para atualizar com inputs dinâmicos
            setInterval(calcularTotal, 600);
        });
    </script>
@endpush
