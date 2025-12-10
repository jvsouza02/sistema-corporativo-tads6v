@extends('layouts.app')

@section('title', 'Gerenciar Serviços - BarberPro')

@section('content')
    <div class="container mb-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="section-title mb-0">Gerenciar Serviços</h2>
                <p class="text-muted mb-0">{{ $barbearia->nome }}</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar
                </a>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCadastrarServico">
                    <i class="fas fa-plus-circle me-2"></i>Cadastrar Serviço
                </button>
            </div>
        </div>
    </div>

    {{-- Modal para Cadastrar Serviço --}}
    <div class="modal fade" id="modalCadastrarServico" tabindex="-1" aria-labelledby="modalCadastrarServicoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('servicos.store') }}">
                    @csrf
                    <input type="hidden" name="id_barbearia" value="{{ $barbearia->id_barbearia }}">

                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCadastrarServicoLabel">
                            <i class="fas fa-plus-circle text-dark me-2"></i>Cadastrar Serviço
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Serviço *</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                                name="nome" value="{{ old('nome') }}" placeholder="Ex: Corte Simples" required>
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="3"
                                placeholder="Descreva o serviço...">{{ old('descricao') }}</textarea>
                            @error('descricao')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="preco" class="form-label">Preço *</label>
                            <div class="input-group">
                                <span class="input-group-text">R$</span>
                                <input type="number" class="form-control @error('preco') is-invalid @enderror"
                                    id="preco" name="preco" value="{{ old('preco') }}" step="0.01" min="0"
                                    placeholder="0,00" required>
                                @error('preco')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Produtos Associados (opcional)</label>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                <small>Selecione os produtos que serão utilizados neste serviço. Quando um atendimento for
                                    realizado, esses produtos terão suas quantidades reduzidas automaticamente do
                                    estoque.</small>
                            </div>

                            @if (isset($produtos) && $produtos->count() > 0)
                                <div class="border rounded p-3" style="max-height: 300px; overflow-y: auto;">
                                    @foreach ($produtos as $produto)
                                        <div class="card mb-2">
                                            <div class="card-body p-3">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="produtos[{{ $produto->id_produto }}][selecionado]"
                                                        value="1" id="produto_{{ $produto->id_produto }}"
                                                        onchange="toggleQuantidadeInput(this, '{{ $produto->id_produto }}')">
                                                    <label class="form-check-label"
                                                        for="produto_{{ $produto->id_produto }}">
                                                        <strong>{{ $produto->nome }}</strong>
                                                    </label>
                                                </div>

                                                <div id="quantidade_container_{{ $produto->id_produto }}"
                                                    style="display: none;">
                                                    <label class="form-label small">Quantidade utilizada por atendimento
                                                        (ml)</label>
                                                    <div class="input-group input-group-sm">
                                                        <input type="number" class="form-control"
                                                            name="produtos[{{ $produto->id_produto }}][quantidade_utilizada]"
                                                            step="0.01" min="0.01" placeholder="0.00">
                                                        <span class="input-group-text">ml</span>
                                                    </div>
                                                    <small class="text-muted">Ex: 50 ml por corte</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-warning mb-0">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    Nenhum produto cadastrado. <a
                                        href="{{ route('produtos.index', $barbearia->id_barbearia) }}">Cadastre produtos
                                        primeiro</a>.
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-dark">
                            <i class="fas fa-save me-2"></i>Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (isset($servicos) && $servicos->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="w-20">Nome</th>
                            <th class="w-35">Descrição</th>
                            <th class="w-15">Preço</th>
                            <th class="w-20">Produtos Associados</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicos as $servico)
                            <tr>
                                <td class="align-middle">
                                    <strong>{{ $servico->nome }}</strong>
                                </td>
                                <td class="align-middle text-break">
                                    {{ $servico->descricao ?? 'Sem descrição' }}
                                </td>
                                <td class="align-middle">
                                    <span class="fw-bold text-success">
                                        R$ {{ number_format($servico->preco, 2, ',', '.') }}
                                    </span>
                                </td>
                                <td class="align-middle">
                                    @if ($servico->produtos && $servico->produtos->count() > 0)
                                        <button type="button" class="btn btn-sm btn-outline-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalProdutos-{{ $servico->id_servico }}">
                                            <i class="fas fa-box me-1"></i>
                                            {{ $servico->produtos->count() }} produto(s)
                                        </button>
                                    @else
                                        <span class="text-muted">Nenhum</span>
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <div class="gap-2" role="group">
                                        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalEditServico-{{ $servico->id_servico }}" title="Editar">
                                            <i class="fas fa-edit"></i>
                                            <span class="d-none d-md-inline ms-1">Editar</span>
                                        </button>

                                        <form action="{{ route('servicos.destroy', $servico->id_servico) }}"
                                            method="POST" style="display: inline;"
                                            onsubmit="return confirm('Tem certeza que deseja remover este serviço?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                                <span class="d-none d-md-inline ms-1">Remover</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            {{-- Modal para visualizar produtos do serviço --}}
                            @if ($servico->produtos && $servico->produtos->count() > 0)
                                <div class="modal fade" id="modalProdutos-{{ $servico->id_servico }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <i class="fas fa-box text-primary me-2"></i>
                                                    Produtos - {{ $servico->nome }}
                                                </h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <ul class="list-group">
                                                    @foreach ($servico->produtos as $produto)
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <strong>{{ $produto->nome }}</strong>
                                                                @if ($produto->descricao)
                                                                    <br><small
                                                                        class="text-muted">{{ $produto->descricao }}</small>
                                                                @endif
                                                                <br><small class="text-info">
                                                                    Quantidade: {{ number_format($produto->pivot->quantidade_utilizada ?? 0, 2, ',', '.') }} ml
                                                                </small>
                                                            </div>
                                                            <span class="badge bg-primary rounded-pill">
                                                                R$ {{ number_format($produto->preco, 2, ',', '.') }}
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Fechar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Modal para Editar Serviço --}}
                            <div class="modal fade" id="modalEditServico-{{ $servico->id_servico }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form method="POST"
                                            action="{{ route('servicos.update', $servico->id_servico) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id_barbearia"
                                                value="{{ $barbearia->id_barbearia }}">

                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <i class="fas fa-edit me-2"></i>Editar Serviço
                                                </h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nome_{{ $servico->id_servico }}" class="form-label">Nome
                                                        *</label>
                                                    <input type="text" id="nome_{{ $servico->id_servico }}"
                                                        name="nome" class="form-control"
                                                        value="{{ old('nome', $servico->nome) }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="descricao_{{ $servico->id_servico }}"
                                                        class="form-label">Descrição</label>
                                                    <textarea id="descricao_{{ $servico->id_servico }}" name="descricao" class="form-control" rows="3">{{ old('descricao', $servico->descricao) }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="preco_{{ $servico->id_servico }}"
                                                        class="form-label">Preço *</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">R$</span>
                                                        <input type="number" id="preco_{{ $servico->id_servico }}"
                                                            name="preco" class="form-control"
                                                            value="{{ old('preco', $servico->preco) }}" step="0.01"
                                                            min="0" required>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Produtos Associados</label>
                                                    @if (isset($produtos) && $produtos->count() > 0)
                                                        <div class="border rounded p-3"
                                                            style="max-height: 300px; overflow-y: auto;">
                                                            @foreach ($produtos as $produto)
                                                                <div class="card mb-2">
                                                                    <div class="card-body p-3">
                                                                        <div class="form-check mb-2">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                name="produtos[{{ $produto->id_produto }}][selecionado]"
                                                                                value="1"
                                                                                id="edit_produto_{{ $servico->id_servico }}_{{ $produto->id_produto }}"
                                                                                onchange="toggleQuantidadeInputEdit(this, '{{ $servico->id_servico }}', '{{ $produto->id_produto }}')"
                                                                                {{ $servico->produtos->contains('id_produto', $produto->id_produto) ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="edit_produto_{{ $servico->id_servico }}_{{ $produto->id_produto }}">
                                                                                <strong>{{ $produto->nome }}</strong>
                                                                            </label>
                                                                        </div>

                                                                        <div id="edit_quantidade_container_{{ $servico->id_servico }}_{{ $produto->id_produto }}"
                                                                            style="display: {{ $servico->produtos->contains('id_produto', $produto->id_produto) ? 'block' : 'none' }};">
                                                                            <label class="form-label small">Quantidade utilizada (ml)</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="number" class="form-control"
                                                                                    name="produtos[{{ $produto->id_produto }}][quantidade_utilizada]"
                                                                                    step="0.01" min="0.01" placeholder="0.00"
                                                                                    value="{{ $servico->produtos->firstWhere('id_produto', $produto->id_produto)->pivot->quantidade_utilizada ?? '' }}">
                                                                                <span class="input-group-text">ml</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <div class="alert alert-warning mb-0">
                                                            Nenhum produto disponível.
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-dark">
                                                    <i class="fas fa-save me-2"></i>Salvar Alterações
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-cut fa-3x text-muted mb-3"></i>
                <p class="text-muted">Nenhum serviço cadastrado.</p>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script>
    function toggleQuantidadeInput(checkbox, produtoId) {
        const container = document.getElementById(`quantidade_container_${produtoId}`);
        container.style.display = checkbox.checked ? 'block' : 'none';

        // Limpa o campo se desmarcar
        if (!checkbox.checked) {
            const input = container.querySelector('input[type="number"]');
            if (input) input.value = '';
        }
    }

    function toggleQuantidadeInputEdit(checkbox, servicoId, produtoId) {
        const container = document.getElementById(`edit_quantidade_container_${servicoId}_${produtoId}`);
        container.style.display = checkbox.checked ? 'block' : 'none';

        // Limpa o campo se desmarcar
        if (!checkbox.checked) {
            const input = container.querySelector('input[type="number"]');
            if (input) input.value = '';
        }
    }
</script>
@endpush
