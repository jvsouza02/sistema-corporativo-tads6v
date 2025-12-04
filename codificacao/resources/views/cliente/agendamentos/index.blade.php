{{-- resources/views/cliente/agendamentos/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Meus Agendamentos - BarberPro')

@section('content')
<div class="container mt-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">
            <i class="fas fa-calendar-alt me-2 text-primary"></i>
            Meus Agendamentos
        </h3>

        <a href="{{ route('cliente.agendamentos.create') }}" class="btn btn-primary btn-lg shadow-sm">
            <i class="fas fa-plus-circle me-1"></i> Novo Agendamento
        </a>
    </div>

    <!-- Mensagens -->
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger shadow-sm">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
        </div>
    @endif

    @if($agendamentos->isEmpty())
        <div class="card shadow-sm border-0">
            <div class="card-body text-center py-5">
                <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                <p class="text-muted mb-3">Você ainda não possui nenhum agendamento.</p>
                <a href="{{ route('cliente.agendamentos.create') }}" class="btn btn-outline-primary">
                    <i class="fas fa-plus-circle me-1"></i> Agendar agora
                </a>
            </div>
        </div>
    @else

        <!-- Lista em cards -->
        <div class="row g-4">

            @foreach($agendamentos as $agendamento)
                @php
                    $data = \Carbon\Carbon::parse($agendamento->data_hora);
                    $status = $agendamento->status;

                    $badge = match($status) {
                        'pendente' => 'warning',
                        'confirmado' => 'success',
                        'cancelado' => 'danger',
                        default => 'secondary'
                    };
                @endphp

                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 h-100 ag-card">

                        <!-- Cabeçalho -->
                        <div class="card-header bg-white border-0 pb-0">
                            <h5 class="fw-bold mb-1">
                                <i class="fas fa-store text-primary me-2"></i>
                                {{ $agendamento->barbearia->nome }}
                            </h5>

                            <p class="text-muted small mb-2">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                {{ $agendamento->barbearia->endereco ?? 'Endereço não informado' }}
                            </p>
                        </div>

                        <div class="card-body pt-0">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-semibold">
                                    <i class="fas fa-clock me-2 text-primary"></i>
                                    {{ $data->format('d/m/Y') }} às {{ $data->format('H:i') }}
                                </span>

                                <span class="badge bg-{{ $badge }} text-capitalize px-3 py-2">
                                    {{ $status }}
                                </span>
                            </div>

                            <hr>

                            <!-- Ações -->
                            <div class="d-flex justify-content-end">

                                @if($status !== 'cancelado')
                                    <form action="{{ route('cliente.agendamentos.cancelar', $agendamento->id_agendamento) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Deseja realmente cancelar este agendamento?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm px-3">
                                            <i class="fas fa-times me-1"></i> Cancelar
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted small">
                                        <i class="fas fa-ban me-1"></i> Cancelado
                                    </span>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    @endif
</div>

@endsection

@push('styles')
<style>
    .ag-card {
        transition: 0.25s ease;
        border-radius: 12px;
    }

    .ag-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }
</style>
@endpush
