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
                <button class="btn btn-warning position-relative" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasAlerta" aria-controls="offcanvasAlerta">
                    <i class="fas fa-exclamation-triangle me-2"></i>Alertas de Estoque
                    @if ($estoque_baixo)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            !
                        </span>
                    @endif
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
                                    <label for="quantidade" class="form-label">Quantidade *</label>
                                    <input type="number" class="form-control @error('quantidade') is-invalid @enderror"
                                        id="quantidade" name="quantidade" value="{{ old('quantidade') }}" min="0"
                                        placeholder="0" required>
                                    @error('quantidade')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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

    {{-- Offcanvas para Configurar Alertas --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAlerta" aria-labelledby="offcanvasAlertaLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasAlertaLabel">
                <i class="fas fa-bell text-warning me-2"></i>Alertas e Reposição de Estoque
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                <small>Configure a quantidade mínima para cada produto e faça reposições rapidamente.</small>
            </div>

            <form method="POST" action="{{ route('estoques.update.minquantity') }}">
                @csrf
                @method('PUT')

                @if (isset($estoques) && $estoques->count() > 0)
                    @foreach ($estoques as $estoque)
                        <div class="card mb-3 {{ $estoque->estoqueAbaixoDoMinimo() ? 'border-warning' : '' }}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h6 class="card-title mb-0">
                                        <i class="fas fa-box text-primary me-2"></i>
                                        {{ $estoque->produto->nome }}
                                    </h6>
                                    @if ($estoque->estoqueAbaixoDoMinimo())
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-exclamation-triangle me-1"></i>Baixo
                                        </span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label class="form-label small text-muted">Quantidade Atual</label>
                                    <p
                                        class="fw-bold mb-0 {{ $estoque->estoqueAbaixoDoMinimo() ? 'text-warning' : 'text-success' }}">
                                        {{ $estoque->quantidade }}
                                    </p>
                                </div>

                                <div class="mb-3">
                                    <label for="quantidade_minima_{{ $estoque->id_estoque }}" class="form-label">
                                        Quantidade Mínima *
                                    </label>
                                    <input type="number" class="form-control"
                                        id="quantidade_minima_{{ $estoque->id_estoque }}"
                                        name="produtos[{{ $estoque->id_estoque }}][quantidade_minima]"
                                        value="{{ $estoque->quantidade_minima }}" step="0.01" min="0"
                                        required>
                                    <small class="text-muted">Alerta quando estoque ≤ este valor</small>
                                </div>

                                {{-- Botão de Reposição --}}
                                <div class="d-grid">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalReporEstoque-{{ $estoque->id_estoque }}">
                                        <i class="fas fa-plus-circle me-2"></i>Repor Estoque
                                    </button>
                                </div>

                                @if ($estoque->estoqueAbaixoDoMinimo())
                                    <div class="alert alert-warning mt-2 mb-0" role="alert">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        <small><strong>Atenção!</strong> Estoque abaixo do mínimo!</small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save me-2"></i>Salvar Configurações
                        </button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">
                            Cancelar
                        </button>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Nenhum produto cadastrado para configurar alertas.</p>
                    </div>
                @endif
            </form>
        </div>
    </div>

    {{-- Modais de Reposição (FORA DO OFFCANVAS) --}}
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
                                    <small>Quantidade atual: <strong>{{ $estoque->quantidade }}</strong></small><br>
                                    <small>Quantidade mínima: <strong>{{ $estoque->quantidade_minima }}</strong></small>
                                </div>

                                <div class="mb-3">
                                    <label for="quantidade_repor_{{ $estoque->id_estoque }}" class="form-label">
                                        Quantidade a Adicionar *
                                    </label>
                                    <input type="number"
                                        class="form-control @error('quantidade_repor') is-invalid @enderror"
                                        id="quantidade_repor_{{ $estoque->id_estoque }}" name="quantidade_repor"
                                        min="0" placeholder="0" required autofocus>
                                    <div class="form-text">
                                        <i class="fas fa-info-circle"></i>
                                        <small class="text-muted">O valor será adicionado à quantidade atual</small>
                                    </div>
                                    @error('quantidade_repor')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                            <th class="w-50">Descrição</th>
                            <th class="w-15">Preço</th>
                            <th class="w-10">Quantidade</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($estoques as $estoque)
                            <tr>
                                <td class="align-middle">
                                    {{ $estoque->produto->nome }}
                                </td>
                                <td class="align-middle text-break"
                                    title="{{ $estoque->produto->descricao ?? 'Sem descrição' }}">
                                    {{ $estoque->produto->descricao ?? 'Sem descrição' }}
                                </td>
                                <td class="align-middle">
                                    R$ {{ number_format($estoque->produto->preco, 2, ',', '.') }}
                                </td>
                                <td class="align-middle">
                                    {{ $estoque->quantidade }}
                                </td>
                                <td class="align-middle text-center">
                                    <div class="gap-2" role="group" aria-label="Ações">
                                        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalEditProduto-{{ $estoque->produto->id_produto }}"
                                            title="Editar">
                                            <i class="fas fa-edit"></i>
                                            <span class="d-none d-md-inline ms-1">Editar</span>
                                        </button>

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
                                                        <input type="number"
                                                            id="quantidade_{{ $estoque->produto->id_produto }}"
                                                            name="quantidade" class="form-control"
                                                            value="{{ old('quantidade', $estoque->quantidade) }}"
                                                            min="0" required>
                                                    </div>
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
