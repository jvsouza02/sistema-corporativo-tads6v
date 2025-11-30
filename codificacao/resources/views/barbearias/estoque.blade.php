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
                <button class="btn btn-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAlerta" aria-controls="offcanvasAlerta">
                    <i class="fas fa-exclamation-triangle me-2"></i>Alertas de Estoque
                </button>
            </div>
        </div>
    </div>

    {{-- Modal para Cadastrar Produto --}}
    <div class="modal fade" id="modalCadastrarProduto" tabindex="-1" aria-labelledby="modalCadastrarProdutoLabel" aria-hidden="true">
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
                            <input
                                type="text"
                                class="form-control @error('nome') is-invalid @enderror"
                                id="nome"
                                name="nome"
                                value="{{ old('nome') }}"
                                placeholder="Ex: Pomada Modeladora"
                                required
                            >
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea
                                class="form-control @error('descricao') is-invalid @enderror"
                                id="descricao"
                                name="descricao"
                                rows="3"
                                placeholder="Descreva o produto..."
                            >{{ old('descricao') }}</textarea>
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
                                        <input
                                            type="number"
                                            class="form-control @error('preco') is-invalid @enderror"
                                            id="preco"
                                            name="preco"
                                            value="{{ old('preco') }}"
                                            step="0.01"
                                            min="0"
                                            placeholder="0,00"
                                            required
                                        >
                                        @error('preco')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="quantidade" class="form-label">Quantidade *</label>
                                    <input
                                        type="number"
                                        class="form-control @error('quantidade') is-invalid @enderror"
                                        id="quantidade"
                                        name="quantidade"
                                        value="{{ old('quantidade') }}"
                                        min="0"
                                        placeholder="0"
                                        required
                                    >
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
                <i class="fas fa-bell text-warning me-2"></i>Configurar Alertas de Estoque
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                <small>Configure a quantidade mínima para cada produto. Você receberá alertas quando o estoque atingir esse limite.</small>
            </div>

            <form method="POST" action="#">
                @csrf
                @method('PUT')

                @if(isset($produtos) && $produtos->count() > 0)
                    @foreach($produtos as $produto)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="card-title mb-3">
                                    <i class="fas fa-box text-primary me-2"></i>
                                    {{ $produto->produto->nome }}
                                </h6>

                                <div class="mb-3">
                                    <label class="form-label small text-muted">Quantidade Atual</label>
                                    <p class="fw-bold mb-0">{{ number_format($produto->quantidade, 2) }}</p>
                                </div>

                                <div class="mb-0">
                                    <label for="quantidade_minima_{{ $produto->id }}" class="form-label">
                                        Quantidade Mínima *
                                    </label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="quantidade_minima_{{ $produto->id }}"
                                        name="produtos[{{ $produto->id }}][quantidade_minima]"
                                        value="{{ $produto->quantidade_minima }}"
                                        step="0.01"
                                        min="0"
                                        required
                                    >
                                    <small class="text-muted">Alerta quando estoque ≤ este valor</small>
                                </div>

                                @if($produto->estoqueAbaixoDoMinimo())
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

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(isset($estoques) && $estoques->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($estoques as $estoque)
                            <tr>
                                <td>{{ $estoque->produto->nome }}</td>
                                <td>{{ $estoque->produto->descricao ?? 'Sem descrição' }}</td>
                                <td>R$ {{ number_format($estoque->produto->preco, 2, ',', '.') }}</td>
                                <td>{{ number_format($estoque->quantidade, 2) }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Editar
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Remover
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                <p class="text-muted">Nenhum produto cadastrado.</p>
            </div>
        @endif
    </div>
@endsection
