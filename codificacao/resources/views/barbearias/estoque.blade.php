@extends('layouts.app')

@section('title', 'Estoque de Produtos - BarberPro')

@section('content')
    <div class="container mb-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="section-title mb-0">Estoque de Produtos</h2>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Voltar
                </a>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalCadastrarProduto">
                    <i class="fas fa-plus-circle me-2"></i>Cadastrar Produto
                </button>
            </div>
        </div>
    </div>

    {{-- Modal para Cadastrar Produto --}}
    <div class="modal fade" id="modalCadastrarProduto" tabindex="-1" aria-labelledby="modalCadastrarProdutoLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('produtos.store') }}">
                    @csrf
                    <input type="hidden" name="id_barbearia" id="id_barbearia" value="{{ $barbearia->id_barbearia }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCadastrarProdutoLabel">
                            <i class="fas fa-plus-circle text-dark me-2"></i>Cadastrar Produto
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Produto *</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                                name="nome" value="{{ old('nome') }}" placeholder="Ex: Pomada Modeladora" required>
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="3"
                                placeholder="Descreva o produto...">{{ old('descricao') }}</textarea>
                            @error('descricao')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="preco" class="form-label">Preço *</label>
                                    <div class="input-group">
                                        <span class="input-group-text">R$</span>
                                        <input type="number" class="form-control @error('preco') is-invalid @enderror"
                                            id="preco" name="preco" value="{{ old('preco') }}" step="0.01"
                                            min="0" placeholder="0,00" required>
                                        @error('preco')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="quantidade" class="form-label">Quantidade (ml) *</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control @error('quantidade') is-invalid @enderror"
                                            id="quantidade" name="quantidade" value="{{ old('quantidade') }}" step="0.01"
                                            min="0" placeholder="0.00" required>
                                        <span class="input-group-text">ml</span>
                                        @error('quantidade')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <small class="text-muted">Ex: 500 ml, 1000 ml, 150.5 ml</small>
                                </div>
                            </div>
                        </div>

                        {{-- Opcional: quantidade mínima ao cadastrar --}}
                        <div class="mb-3">
                            <label for="quantidade_minima" class="form-label">Quantidade Mínima (ml)</label>
                            <div class="input-group">
                                <input type="number" class="form-control @error('quantidade_minima') is-invalid @enderror"
                                    id="quantidade_minima" name="quantidade_minima"
                                    value="{{ old('quantidade_minima', 0) }}" step="0.01" min="0"
                                    placeholder="0.00">
                                <span class="input-group-text">ml</span>
                                @error('quantidade_minima')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="text-muted">Define quando será disparado o alerta.</small>
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

    {{-- Modais de Reposição (permanece por estoque) --}}
    @if (isset($estoques) && $estoques->count() > 0)
        @foreach ($estoques as $estoque)
            <div class="modal fade" id="modalReporEstoque-{{ $estoque->id_estoque }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('estoques.repor', $estoque->id_estoque) }}">
                            @csrf
                            @method('PATCH')

                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title">
                                    <i class="fas fa-box me-2"></i>Repor Estoque
                                </h5>
                                <button type="button" class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <div class="alert alert-info">
                                    <strong>{{ $estoque->produto->nome }}</strong><br>
                                    <small>Quantidade atual: <strong>{{ number_format($estoque->quantidade, 2, ',', '.') }}
                                            ml</strong></small><br>
                                    <small>Quantidade mínima:
                                        <strong>{{ number_format($estoque->quantidade_minima, 2, ',', '.') }}
                                            ml</strong></small>
                                </div>

                                <div class="mb-3">
                                    <label for="quantidade_repor_{{ $estoque->id_estoque }}" class="form-label">
                                        Quantidade a Adicionar (ml) *
                                    </label>
                                    <div class="input-group">
                                        <input type="number" class="form-control"
                                            id="quantidade_repor_{{ $estoque->id_estoque }}" name="quantidade_repor"
                                            min="0.01" step="0.01" placeholder="0.00" required>
                                        <span class="input-group-text">ml</span>
                                    </div>
                                    <small class="text-muted">Ex: 500.00 para adicionar 500ml</small>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancelar
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check me-2"></i>Confirmar Reposição
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

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

        @if (isset($estoques) && $estoques->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="w-20">Nome</th>
                            <th class="w-45">Descrição</th>
                            <th class="w-10">Preço</th>
                            <th class="w-10">Quantidade</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($estoques as $estoque)
                            <tr class="{{ $estoque->estoqueAbaixoDoMinimo() ? 'table-warning' : '' }}">
                                <td class="align-middle">
                                    {{ $estoque->produto->nome }}
                                    @if ($estoque->estoqueAbaixoDoMinimo())
                                        <br><small class="badge bg-warning text-dark mt-1">Baixo</small>
                                    @endif
                                </td>
                                <td class="align-middle text-break"
                                    title="{{ $estoque->produto->descricao ?? 'Sem descrição' }}">
                                    {{ $estoque->produto->descricao ?? 'Sem descrição' }}
                                </td>
                                <td class="align-middle">
                                    R$ {{ number_format($estoque->produto->preco, 2, ',', '.') }}
                                </td>
                                <td class="align-middle">
                                    <span class="{{ $estoque->estoqueAbaixoDoMinimo() ? 'text-warning fw-bold' : '' }}">
                                        {{ number_format($estoque->quantidade, 2, ',', '.') }} ml
                                    </span>
                                    <br>
                                    <small class="text-muted">Mín:
                                        {{ number_format($estoque->quantidade_minima, 2, ',', '.') }} ml</small>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="gap-2 d-inline-flex" role="group" aria-label="Ações">
                                        {{-- Botão Repor --}}
                                        <button class="btn btn-sm btn-success" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalReporEstoque-{{ $estoque->id_estoque }}"
                                            title="Repor">
                                            <i class="fas fa-plus-circle"></i>
                                            <span class="d-none d-md-inline ms-1">Repor</span>
                                        </button>

                                        {{-- Botão Editar (abre modal que agora contém quantidade_minima também) --}}
                                        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalEditProduto-{{ $estoque->produto->id_produto }}"
                                            title="Editar">
                                            <i class="fas fa-edit"></i>
                                            <span class="d-none d-md-inline ms-1">Editar</span>
                                        </button>

                                        {{-- Remover produto --}}
                                        <form action="{{ route('produtos.destroy', $estoque->produto->id_produto) }}"
                                            method="POST" style="display: inline;"
                                            onsubmit="return confirm('Tem certeza que deseja remover este produto?')">
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

                            {{-- Modal de Edição (agora com quantidade_minima) --}}
                            <div class="modal fade" id="modalEditProduto-{{ $estoque->produto->id_produto }}"
                                tabindex="-1"
                                aria-labelledby="modalEditProdutoLabel-{{ $estoque->produto->id_produto }}"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST"
                                            action="{{ route('produtos.update', $estoque->produto->id_produto) }}">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="id_barbearia"
                                                value="{{ $barbearia->id_barbearia }}">
                                            <input type="hidden" name="id_estoque" value="{{ $estoque->id_estoque }}">

                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="modalEditProdutoLabel-{{ $estoque->produto->id_produto }}">
                                                    <i class="fas fa-edit me-2"></i>Editar Produto
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Fechar"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nome_{{ $estoque->produto->id_produto }}"
                                                        class="form-label">Nome *</label>
                                                    <input type="text" id="nome_{{ $estoque->produto->id_produto }}"
                                                        name="nome" class="form-control"
                                                        value="{{ old('nome', $estoque->produto->nome) }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="descricao_{{ $estoque->produto->id_produto }}"
                                                        class="form-label">Descrição</label>
                                                    <textarea id="descricao_{{ $estoque->produto->id_produto }}" name="descricao" class="form-control" rows="3">{{ old('descricao', $estoque->produto->descricao) }}</textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="preco_{{ $estoque->produto->id_produto }}"
                                                            class="form-label">Preço *</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">R$</span>
                                                            <input type="number"
                                                                id="preco_{{ $estoque->produto->id_produto }}"
                                                                name="preco" class="form-control"
                                                                value="{{ old('preco', $estoque->produto->preco) }}"
                                                                step="0.01" min="0" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="quantidade_{{ $estoque->produto->id_produto }}"
                                                            class="form-label">Quantidade *</label>
                                                        <div class="input-group">
                                                            <input type="number"
                                                                id="quantidade_{{ $estoque->produto->id_produto }}"
                                                                name="quantidade" class="form-control"
                                                                value="{{ old('quantidade', $estoque->quantidade) }}"
                                                                min="0" required>
                                                            <span class="input-group-text">ml</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Novo campo: quantidade_minima --}}
                                                <div class="mb-3">
                                                    <label for="quantidade_minima_{{ $estoque->id_estoque }}"
                                                        class="form-label">
                                                        Quantidade Mínima (ml)
                                                    </label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control"
                                                            id="quantidade_minima_{{ $estoque->id_estoque }}"
                                                            name="quantidade_minima"
                                                            value="{{ old('quantidade_minima', $estoque->quantidade_minima) }}"
                                                            step="0.01" min="0">
                                                        <span class="input-group-text">ml</span>
                                                    </div>
                                                    <small class="text-muted">Alerta quando estoque ≤ este valor em
                                                        ml</small>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-dark">
                                                    <i class="fas fa-save me-2"></i>Salvar alterações
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>

                {{ $estoques->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                <p class="text-muted">Nenhum produto cadastrado.</p>
            </div>
        @endif
    </div>
@endsection
