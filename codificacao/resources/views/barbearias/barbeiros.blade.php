{{-- resources/views/barbeiros/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Gerenciar Profissionais - BarberPro')

@push('styles')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card-barbeiros {
            border: 1px solid rgb(0, 0, 0, 0.1);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            background: white;
        }

        .barbeiro-card {
            border: 1px solid rgb(0, 0, 0, 0.1);
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .barbeiro-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
        }

        .barbeiro-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .barbeiro-name {
            font-size: 1.2rem;
            font-weight: bold;
            color: #2c3e50;
            margin: 0;
        }

        .barbeiro-info {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #666;
        }

        .info-item i {
            color: #3498db;
        }

        .btn-action {
            margin-right: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #999;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: #ddd;
        }

        /* Estilos para botões de toggle de senha */
        #togglePassword,
        #togglePasswordConfirm {
            border: 2px solid #e0e0e0;
            border-left: none;
            background: #f8f9fa;
            color: #666;
            transition: all 0.3s ease;
        }

        #togglePassword:hover,
        #togglePasswordConfirm:hover {
            background: #e9ecef;
            color: #333;
        }

        .input-group .btn-outline-secondary:focus {
            box-shadow: none;
            border-color: #e0e0e0;
        }
    </style>
@endpush

@section('content')

    <div class="container mb-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i>
                <ul class="mb-0">
                    <li>{{ session('error') }}</li>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        {{-- Formulário de Cadastro --}}
        <div class="card-barbeiros mb-4">
            <div class="card-body">
                <h5 class="card-title mb-3">
                    <i class="fas fa-user-plus me-2"></i>Cadastrar Novo Barbeiro
                </h5>

                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_barbearia" value="{{ $barbearia->id_barbearia }}">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                                name="nome" value="{{ old('nome') }}" required>
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="horario_inicio" class="form-label">Horário Início</label>
                            <input type="time" class="form-control @error('horario_inicio') is-invalid @enderror"
                                id="horario_inicio" name="horario_inicio" value="{{ old('horario_inicio') }}" required>
                            @error('horario_inicio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="horario_fim" class="form-label">Horário Fim</label>
                            <input type="time" class="form-control @error('horario_fim') is-invalid @enderror"
                                id="horario_fim" name="horario_fim" value="{{ old('horario_fim') }}" required>
                            @error('horario_fim')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Campo de Senha --}}
                        <div class="col-md-4">
                            <label for="senha" class="form-label">Senha</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('senha') is-invalid @enderror"
                                    id="senha" name="senha" placeholder="Mínimo 6 caracteres" required minlength="6">
                                @error('senha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="text-muted">Mínimo de 6 caracteres</small>
                        </div>
                    </div>

                    <input type="hidden" name="role" value="barbeiro">
                    <input type="hidden" name="id_barbearia" value="{{ $barbearia->id_barbearia }}">

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Salvar Barbeiro
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Lista de barbeiros --}}
        <div class="card-barbeiros">
            <div class="card-body">
                <h5 class="card-title mb-4">
                    <i class="fas fa-list me-2"></i>Barbeiros Cadastrados
                    <span class="badge bg-primary ms-2">{{ $barbeiros->count() }}</span>
                </h5>

                @if ($barbeiros->isEmpty())
                    <div class="empty-state">
                        <i class="bi bi-inbox"></i>
                        <h4>Nenhum profissional cadastrado</h4>
                        <p>Cadastre o primeiro profissional usando o formulário acima.</p>
                    </div>
                @else
                    @foreach ($barbeiros as $barbeiro)
                        <div class="barbeiro-card">
                            <div class="barbeiro-header">
                                <div>
                                    <h3 class="barbeiro-name">
                                        <i class="fas fa-user-circle me-2"></i>
                                        {{ $barbeiro->nome }}
                                    </h3>
                                </div>
                            </div>

                            <div class="barbeiro-info">
                                <div class="info-item">
                                    <i class="fas fa-envelope"></i>
                                    <span>{{ $barbeiro->user->email }}</span>
                                </div>

                                <div class="info-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $barbeiro->horario_inicio }} - {{ $barbeiro->horario_fim }}</span>
                                </div>
                            </div>

                            <div class="d-flex gap-2 flex-wrap">
                                <button class="btn btn-action btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalEditar" data-id="{{ $barbeiro->id_barbeiro }}"
                                    data-nome="{{ $barbeiro->nome }}"
                                    data-horario-inicio="{{ $barbeiro->horario_inicio }}"
                                    data-horario-fim="{{ $barbeiro->horario_fim }}">
                                    <i class="fas fa-edit me-1"></i>Editar
                                </button>

                                <button class="btn btn-action btn-warning" data-bs-toggle="modal" data-bs-target="#modalTransferir"
                                    data-id="{{ $barbeiro->id_barbeiro }}">
                                    <i class="fas fa-exchange-alt me-1"></i>Transferir
                                </button>

                                <form action="{{ route('barbeiros.destroy', $barbeiro->id_barbeiro) }}" method="POST" style="display: inline;"
                                    onsubmit="return confirm('Tem certeza que deseja remover este barbeiro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-action btn-danger">
                                        <i class="fas fa-trash me-1"></i>Remover
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @if ($barbeiros->count() > 0)
        {{-- Modal de Editar --}}
        <div class="modal fade" id="modalEditar" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar barbeiro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form id="formEditar" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="editarHorarioInicio" class="form-label">Horário Início</label>
                                    <input type="time" class="form-control" id="editarHorarioInicio"
                                        name="horario_inicio" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="editarHorarioFim" class="form-label">Horário Fim</label>
                                    <input type="time" class="form-control" id="editarHorarioFim" name="horario_fim"
                                        required>
                                </div>
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

        {{-- Modal de Transferir --}}
        <div class="modal fade" id="modalTransferir" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Transferir barbeiro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form id="formTransferir" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Selecione a nova barbearia</label>
                                <select name="id_barbearia_destino" id="selectBarbeariaDestino" class="form-select"
                                    required>
                                    @foreach ($todas_barbearias as $barbearia)
                                        <option value="{{ $barbearia->id_barbearia }}">{{ $barbearia->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-exchange-alt me-2"></i>Transferir
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ===== MODAL EDITAR =====
            const modalEditarElement = document.getElementById('modalEditar');

            if (modalEditarElement) {
                modalEditarElement.addEventListener('show.bs.modal', function(event) {
                    // Botão que acionou o modal
                    const button = event.relatedTarget;

                    // Extrair dados dos atributos data-*
                    const id = button.getAttribute('data-id');
                    const nome = button.getAttribute('data-nome');
                    const horarioInicio = button.getAttribute('data-horario-inicio');
                    const horarioFim = button.getAttribute('data-horario-fim');

                    // Preencher os campos do modal
                    document.getElementById('editarHorarioInicio').value = horarioInicio;
                    document.getElementById('editarHorarioFim').value = horarioFim;

                    // Atualizar a action do formulário
                    const form = document.getElementById('formEditar');
                    form.action = `/barbeiros/${id}`;

                    // Atualizar título do modal
                    this.querySelector('.modal-title').textContent = `Editar barbeiro - ${nome}`;
                });
            }

            // ===== MODAL TRANSFERIR =====
            const modalTransferirElement = document.getElementById('modalTransferir');

            if (modalTransferirElement) {
                modalTransferirElement.addEventListener('show.bs.modal', function(event) {
                    // Botão que acionou o modal
                    const button = event.relatedTarget;

                    // Extrair dados dos atributos data-*
                    const id = button.getAttribute('data-id');

                    // Atualizar a action do formulário
                    const form = document.getElementById('formTransferir');
                    form.action = `/barbeiros/${id}/transferir`;
                });
            };

            // ===== VALIDAÇÃO DE SENHA =====
            const password = document.getElementById('senha');
            const passwordConfirm = document.getElementById('password_confirmation');
            const togglePassword = document.getElementById('togglePassword');
            const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
            const toggleIcon = document.getElementById('toggleIcon');
            const toggleIconConfirm = document.getElementById('toggleIconConfirm');
            const passwordMatchError = document.getElementById('passwordMatchError');

            // Toggle senha principal
            if (togglePassword) {
                togglePassword.addEventListener('click', function() {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);

                    if (type === 'password') {
                        toggleIcon.classList.remove('bi-eye-slash');
                        toggleIcon.classList.add('bi-eye');
                    } else {
                        toggleIcon.classList.remove('bi-eye');
                        toggleIcon.classList.add('bi-eye-slash');
                    }
                });
            }

            // Toggle confirmar senha
            if (togglePasswordConfirm) {
                togglePasswordConfirm.addEventListener('click', function() {
                    const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordConfirm.setAttribute('type', type);

                    if (type === 'password') {
                        toggleIconConfirm.classList.remove('bi-eye-slash');
                        toggleIconConfirm.classList.add('bi-eye');
                    } else {
                        toggleIconConfirm.classList.remove('bi-eye');
                        toggleIconConfirm.classList.add('bi-eye-slash');
                    }
                });
            }

            // Validação em tempo real
            if (passwordConfirm) {
                passwordConfirm.addEventListener('input', function() {
                    if (password.value !== passwordConfirm.value && passwordConfirm.value !== '') {
                        passwordMatchError.style.display = 'block';
                        passwordConfirm.classList.add('is-invalid');
                    } else {
                        passwordMatchError.style.display = 'none';
                        passwordConfirm.classList.remove('is-invalid');
                    }
                });
            }

            if (password) {
                password.addEventListener('input', function() {
                    if (passwordConfirm.value !== '' && password.value !== passwordConfirm.value) {
                        passwordMatchError.style.display = 'block';
                        passwordConfirm.classList.add('is-invalid');
                    } else {
                        passwordMatchError.style.display = 'none';
                        passwordConfirm.classList.remove('is-invalid');
                    }
                });
            }
        });
    </script>
@endpush
