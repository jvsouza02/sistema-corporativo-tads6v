@extends('layouts.app')

@section('title', 'Meus Agendamentos - BarberPro')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="fas fa-list-check me-2"></i>Meus Agendamentos</h2>
                <a href="{{ route('cliente.agendamentos.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>Novo Agendamento
                </a>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if($agendamentos->isEmpty())
                <div class="card text-center py-5">
                    <div class="card-body">
                        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                        <h4>Você ainda não tem nenhum agendamento</h4>
                        <p class="text-muted">Comece agendando seu primeiro serviço!</p>
                        <a href="{{ route('cliente.agendamentos.create') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-calendar-plus me-1"></i>Agendar Serviço
                        </a>
                    </div>
                </div>
            @else
                <div class="row">
                    @foreach($agendamentos as $agendamento)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 {{ $agendamento->status == 'cancelado' ? 'border-danger' : ($agendamento->status == 'concluido' ? 'border-success' : 'border-primary') }}">
                                <div class="card-header bg-{{ $agendamento->status == 'cancelado' ? 'danger' : ($agendamento->status == 'concluido' ? 'success' : 'primary') }} text-white d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">{{ $agendamento->barbearia->nome }}</h5>
                                    <span class="badge bg-light text-{{ $agendamento->status == 'cancelado' ? 'danger' : ($agendamento->status == 'concluido' ? 'success' : 'dark') }}">
                                        {{ ucfirst($agendamento->status) }}
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            <i class="fas fa-clock me-2"></i>
                                            {{ \Carbon\Carbon::parse($agendamento->data_hora)->format('d/m/Y [às] H:i') }}
                                        </h6>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <h5 class="card-title mb-1">{{ $agendamento->servico }}</h5>
                                        @if($agendamento->barbeiro)
                                            <p class="mb-0">
                                                <i class="fas fa-user me-2"></i>
                                                <strong>Barbeiro:</strong> {{ $agendamento->barbeiro->nome }}
                                            </p>
                                        @else
                                            <p class="mb-0 text-muted">
                                                <i class="fas fa-user-clock me-2"></i>
                                                Barbeiro será atribuído pela barbearia
                                            </p>
                                        @endif
                                    </div>
                                    
                                    @if($agendamento->observacao)
                                        <div class="mb-3 p-3 bg-light rounded">
                                            <strong>Observações:</strong>
                                            <p class="mb-0">{{ $agendamento->observacao }}</p>
                                        </div>
                                    @endif
                                    
                                    @if($agendamento->status == 'agendado')
                                        <div class="d-flex justify-content-end mt-3">
                                            <form action="{{ route('cliente.agendamentos.cancelar', $agendamento->id_agendamento) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                    onclick="return confirm('Tem certeza que deseja cancelar este agendamento?')">
                                                    <i class="fas fa-times me-1"></i>Cancelar
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection