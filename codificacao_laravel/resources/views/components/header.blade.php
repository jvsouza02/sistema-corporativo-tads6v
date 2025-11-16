<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-cut"></i> BarberPro
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if (auth()->user()->role == 'proprietario')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="fas fa-home"></i> Início
                        </a>
                    </li>
                @endif
                @if (auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Sair
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@if (auth()->check() && !Route::is('barbearia.detalhes'))
    <section class="dashboard-header">
        <div class="container text-center text-md-start">
            <div class="row align-items-center">
                <div class="col-md-2 text-center mb-3 mb-md-0">
                    <img src="{{ auth()->user()->foto ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&size=150' }}"
                        alt="{{ auth()->user()->name ?? 'Usuário' }}" class="profile-image rounded-circle">
                </div>
                <div class="col-md-10">
                    <h1>{{ auth()->user()->name ?? 'Nome do Usuário' }}</h1>
                    <p class="lead">{{ auth()->user()->email ?? 'email@exemplo.com' }}</p>
                    @if (isset(auth()->user()->role))
                        <span class="badge bg-primary">{{ strtoupper(auth()->user()->role) }}</span>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif
