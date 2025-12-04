{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BarberPro - Sistema de Gerenciamento')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    {{-- Estilos customizados --}}
    <link rel="stylesheet" href="{{ asset('css/form_barbearia.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/barbeiros.css') }}">

    @stack('styles')
</head>

<body>
    {{-- Header Component --}}
    <x-header/>

    {{-- Conteúdo principal --}}
    <main>
        @yield('content')
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

@if(auth()->check() && auth()->user()->role == 'cliente')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cliente.agendamentos.create') }}">
            <i class="fas fa-calendar-check me-1"></i>Agendar Serviço
        </a>
    </li>
@endif

</html>
