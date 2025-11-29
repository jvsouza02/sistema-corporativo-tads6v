<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BarberPro - Cadastro de Cliente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --accent-color: #3498db;
        }

        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px 0;
        }

        .register-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 500px;
            margin: 0 auto;
        }

        .register-header {
            background: #16213e;
            color: white;
            padding: 2.5rem 2rem;
            text-align: center;
        }

        .register-header i {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            color: #4CAF50;
        }

        .register-body {
            padding: 2.5rem;
        }

        .form-label {
            font-weight: 600;
            color: #16213e;
            margin-bottom: 8px;
        }

        .required-field::after {
            content: " *";
            color: #dc3545;
        }

        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #16213e;
            box-shadow: 0 0 0 0.2rem rgba(22, 33, 62, 0.25);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-right: none;
            border-radius: 10px 0 0 10px;
        }

        .form-control.with-icon {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        .password-strength {
            height: 5px;
            border-radius: 3px;
            margin-top: 5px;
            transition: all 0.3s ease;
        }

        .btn-register {
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            background: #16213e;
            border: none;
            color: white;
        }

        .btn-register:hover {
            background: #0f1624;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(22, 33, 62, 0.3);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e0e0e0;
        }

        .divider span {
            padding: 0 1rem;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .welcome-text {
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        small {
            color: #6c757d;
        }

        .alert {
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .invalid-feedback {
            display: none;
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .invalid-feedback.d-block {
            display: block !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="register-card">
                    <div class="register-header">
                        <i class="fas fa-user-plus"></i>
                        <h1 class="h2 mb-2">BarberPro</h1>
                        <p class="mb-0">Cadastro de Cliente</p>
                    </div>

                    <div class="register-body">
                        <h2 class="h4 mb-2 text-center">Crie sua conta de cliente</h2>
                        <p class="welcome-text text-center">
                            Preencha os dados abaixo para visualizar barbearias e fazer agendamentos.
                        </p>

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                <strong>Atenção!</strong>
                                <ul class="mb-0 mt-2">
                                    <li>{{ session('error') }}</li>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form id="cadastroClienteForm" action="{{ route('register.cliente.post') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nome" class="form-label required-field">Nome Completo</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input
                                        type="text"
                                        class="form-control with-icon @error('nome') is-invalid @enderror"
                                        id="nome"
                                        name="nome"
                                        value="{{ old('nome') }}"
                                        placeholder="Digite seu nome completo"
                                        required
                                    >
                                </div>
                                @error('nome')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label required-field">E-mail</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input
                                        type="email"
                                        class="form-control with-icon @error('email') is-invalid @enderror"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="seu@email.com"
                                        required
                                    >
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="senha" class="form-label required-field">Senha</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input
                                        type="password"
                                        class="form-control with-icon @error('senha') is-invalid @enderror"
                                        id="senha"
                                        name="senha"
                                        placeholder="Digite uma senha segura"
                                        required
                                        minlength="6"
                                    >
                                </div>
                                <div class="password-strength" id="passwordStrength"></div>
                                <small>Mínimo de 6 caracteres</small>
                                @error('senha')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="confirmarSenha" class="form-label required-field">Confirmar Senha</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock-fill"></i>
                                    </span>
                                    <input
                                        type="password"
                                        class="form-control with-icon"
                                        id="confirmarSenha"
                                        name="senha_confirmation"
                                        placeholder="Digite a senha novamente"
                                        required
                                    >
                                </div>
                                <div class="invalid-feedback" id="confirmarSenhaError"></div>
                            </div>

                            {{-- Role é sempre cliente, o controller já garante, mas deixo explícito --}}
                            <input type="hidden" name="role" value="cliente">

                            <div class="d-grid">
                                <button class="btn btn-register" type="submit" id="btnSubmitCliente">
                                    <i class="bi bi-person-plus me-2"></i>Cadastrar
                                </button>
                            </div>
                        </form>

                        <div class="divider">
                            <span>ou</span>
                        </div>

                        <div class="login-link">
                            Já tem uma conta? <a href="{{ route('login') }}">Faça login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('cadastroClienteForm');
            const senha = document.getElementById('senha');
            const confirmarSenha = document.getElementById('confirmarSenha');
            const confirmarSenhaError = document.getElementById('confirmarSenhaError');
            const passwordStrength = document.getElementById('passwordStrength');
            const btnSubmit = document.getElementById('btnSubmitCliente');

            let confirmarSenhaTouched = false;

            senha.addEventListener('input', function () {
                const strength = checkPasswordStrength(senha.value);
                updatePasswordStrength(strength);

                if (confirmarSenhaTouched) {
                    validatePassword();
                }
            });

            confirmarSenha.addEventListener('input', function() {
                confirmarSenhaTouched = true;
                validatePassword();
            });

            function validatePassword() {
                if (!confirmarSenhaTouched) return;

                if (senha.value !== confirmarSenha.value && confirmarSenha.value !== '') {
                    confirmarSenhaError.style.display = 'block';
                    confirmarSenhaError.textContent = 'As senhas não coincidem.';
                    confirmarSenha.classList.add('is-invalid');
                } else {
                    confirmarSenhaError.style.display = 'none';
                    confirmarSenha.classList.remove('is-invalid');
                }
            }

            function checkPasswordStrength(password) {
                let strength = 0;
                if (password.length >= 6) strength++;
                if (password.length >= 10) strength++;
                if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
                if (/\d/.test(password)) strength++;
                if (/[^a-zA-Z\d]/.test(password)) strength++;
                return strength;
            }

            function updatePasswordStrength(strength) {
                const colors = ['#dc3545', '#fd7e14', '#ffc107', '#4CAF50', '#28a745'];
                const widths = ['20%', '40%', '60%', '80%', '100%'];

                if (senha.value.length === 0) {
                    passwordStrength.style.width = '0%';
                    passwordStrength.style.backgroundColor = 'transparent';
                } else {
                    passwordStrength.style.width = widths[strength];
                    passwordStrength.style.backgroundColor = colors[strength];
                }
            }

            form.addEventListener('submit', function(event) {
                if (senha.value !== confirmarSenha.value) {
                    event.preventDefault();
                    alert('As senhas não coincidem!');
                    confirmarSenha.focus();
                    return false;
                }

                if (senha.value.length < 6) {
                    event.preventDefault();
                    alert('A senha deve ter no mínimo 6 caracteres!');
                    senha.focus();
                    return false;
                }

                btnSubmit.disabled = true;
                btnSubmit.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Cadastrando...';
            });
        });
    </script>
</body>

</html>
