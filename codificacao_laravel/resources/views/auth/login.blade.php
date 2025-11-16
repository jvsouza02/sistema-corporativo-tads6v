{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BarberPro - Login</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/form_login.css') }}">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-card">
                    <div class="login-header">
                        <i class="fas fa-cut"></i>
                        <h1 class="h2 mb-2">BarberPro</h1>
                        <p class="mb-0">Sistema de Gestão para Barbearias</p>
                    </div>

                    <div class="login-body">
                        <h2 class="h4 mb-2 text-center">Bem-vindo de volta!</h2>
                        <p class="welcome-text text-center">
                            Entre com seus dados para acessar o sistema
                        </p>

                        {{-- Exibir mensagens de erro --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                <strong>Erro!</strong> {{ $errors->first() }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Exibir mensagens de sucesso --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Exibir mensagens de info --}}
                        @if (session('info'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <i class="bi bi-info-circle me-2"></i>
                                {{ session('info') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form id="formLogin" action="{{ route('login.post') }}" method="POST">
                            @csrf

                            {{-- Campo de Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
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
                                    <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Campo de Senha --}}
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">Senha</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input
                                        type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        id="password"
                                        name="password"
                                        placeholder="Digite sua senha"
                                        required
                                    >
                                </div>
                                @error('password')
                                    <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-login">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Entrar
                                </button>
                            </div>
                        </form>

                        <div class="divider">
                            <span>ou</span>
                        </div>

                        <div class="d-grid">
                            <a href="{{ route('register') }}" class="btn btn-register">
                                <i class="bi bi-person-plus me-2"></i>
                                Criar Nova Conta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');
            const toggleIcon = document.getElementById('toggleIcon');

            // Efeito de foco no input de email
            if (emailInput) {
                emailInput.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });

                emailInput.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            }

            // Efeito de foco no input de senha
            if (passwordInput) {
                passwordInput.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });

                passwordInput.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            }

            // Toggle para mostrar/ocultar senha
            if (togglePassword) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Trocar ícone
                    if (type === 'password') {
                        toggleIcon.classList.remove('bi-eye-slash');
                        toggleIcon.classList.add('bi-eye');
                    } else {
                        toggleIcon.classList.remove('bi-eye');
                        toggleIcon.classList.add('bi-eye-slash');
                    }
                });
            }
        });
    </script>
</body>

</html>
