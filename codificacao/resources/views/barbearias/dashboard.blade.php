{{-- resources/views/barbearias/gerenciar.blade.php --}}
@extends('layouts.app')

@section('title', 'BarberPro - Gerenciar Barbearias')

@section('content')
    <section>
        <div class="container mt-4">
            {{-- Alert de boas-vindas --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @else
                <div class="alert alert-info welcome-alert d-flex align-items-center" role="alert">
                    <i class="fas fa-info-circle me-2 fs-4"></i>
                    <div>
                        <strong>Bem-vindo de volta!</strong> Aqui estão suas barbearias cadastradas.
                    </div>
                </div>
            @endif

            {{-- Cabeçalho com botão de adicionar --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Minhas Barbearias</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBarbershopModal">
                    <i class="fas fa-plus-circle me-2"></i> Nova Barbearia
                </button>
            </div>

            {{-- Lista de barbearias --}}
            <div id="listaBarbearias" class="row mt-3">
                @forelse($barbearias as $barbearia)
                    <div class="col-md-4" style="margin-bottom: 20px;">
                        <a href="{{ route('barbearia.detalhes', $barbearia->id_barbearia) }}" class="text-decoration-none">
                            <div class="card mb-4 border-0 h-100 hover-card">
                                <div class="card-img-wrapper">
                                    <img src="{{ $barbearia->foto_url 
                                            ? asset('storage/' . $barbearia->foto_url) 
                                            : asset('images/default-barbearia.jpg') }}"
                                        class="card-img-top"
                                        alt="{{ $barbearia->nome }}">
                                        <class="card-img-top" alt="{{ $barbearia->nome }}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mb-3">{{ $barbearia->nome }}</h5>

                                    <div class="card-info mb-3">
                                        <div class="info-row">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>{{ $barbearia->endereco }}</span>
                                        </div>
                                        <div class="info-row">
                                            <i class="fas fa-phone"></i>
                                            <span>{{ $barbearia->telefone }}</span>
                                        </div>
                                        <div class="info-row">
                                            <i class="fas fa-clock"></i>
                                            <span>{{ $barbearia->horario_abertura }} -
                                                {{ $barbearia->horario_fechamento }}</span>
                                        </div>
                                    </div>

                                    <p class="card-description">{{ $barbearia->descricao }}</p>

                                    {{-- Valor Total da Semana --}}
                                    <div class="revenue-highlight mb-3">
                                        <div class="revenue-content">
                                            <i class="fas fa-money-bill-wave"></i>
                                            <div>
                                                <div class="revenue-label">Faturamento Semanal</div>
                                                <div class="revenue-value">R$
                                                    {{ number_format($barbearia->valor_total_semana ?? 0, 2, ',', '.') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-stats">
                                        <div class="stat-circle stat-atendimentos">
                                            <div class="stat-number">{{ $barbearia->atendimentos_semana ?? 0 }}</div>
                                            <div class="stat-label">Atendimentos Semanais</div>
                                        </div>
                                        <div class="stat-circle stat-profissionais">
                                            <div class="stat-number">{{ $barbearia->total_barbeiros ?? 0 }}</div>
                                            <div class="stat-label">Barbeiros</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class='text-muted'>Nenhuma barbearia cadastrada.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Modal de adicionar barbearia --}}
    <div class="modal fade" id="addBarbershopModal" tabindex="-1" aria-labelledby="addBarbershopLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="addBarbershopForm" action="{{ route('barbearia.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBarbershopLabel">Cadastrar Nova Barbearia</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="id_proprietario"
                            value="{{ Auth()->user()->proprietario->id_proprietario }}">

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Nome da Barbearia</label>
                                <input type="text" name="nome" class="form-control" placeholder ="Barbearia do Zé" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="contato@gmail.com" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Telefone</label>
                                <input type="tel" name="telefone" id="telefone" class="form-control" placeholder="(99) 99999-9999" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Endereço</label>
                            <input type="text" name="endereco" class="form-control" placeholder="Rua das Flores, 123 - Centro" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Horário de Abertura</label>
                                <input type="text" name="horario_abertura" id="horario_abertura" class="form-control" placeholder="08:00" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Horário de Fechamento</label>
                                <input type="text" name="horario_fechamento" id="horario_fechamento" class="form-control" placeholder="18:00" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" name="foto_url" class="form-control" accept="image/*" placeolhder="Nenhum arquivo selecionado">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <textarea name="descricao" class="form-control" rows="3" placeholder="Barbearia tradicional e moderna, com cortes, barbas e atendimento personalizado para valorizar seu estilo." required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="salvarBarbeariaBtn">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    const telefoneInput = document.getElementById('telefone');
    if (telefoneInput) {
        telefoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); 
            
            if (value.length > 11) {
                value = value.slice(0, 11); 
            }
            
            if (value.length <= 11) {
                value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
                value = value.replace(/(\d{5})(\d)/, '$1-$2');
            }
            
            e.target.value = value;
        });
    }
    
        function aplicarMascaraHorario(input) {
        input.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); 
            
            if (value.length > 4) {
                value = value.slice(0, 4); 
            }
            
            
            if (value.length >= 3) {
                value = value.replace(/^(\d{2})(\d)/, '$1:$2');
            }
            
            e.target.value = value;
        });
        
        input.addEventListener('blur', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length === 4) {
                let horas = parseInt(value.slice(0, 2));
                let minutos = parseInt(value.slice(2, 4));

                if (horas > 23) horas = 23;
                if (minutos > 59) minutos = 59;
                
                e.target.value = String(horas).padStart(2, '0') + ':' + String(minutos).padStart(2, '0');
            }
        });
    }
    
    const horarioAbertura = document.getElementById('horario_abertura');
    const horarioFechamento = document.getElementById('horario_fechamento');
    
    if (horarioAbertura) aplicarMascaraHorario(horarioAbertura);
    if (horarioFechamento) aplicarMascaraHorario(horarioFechamento);
});
</script>
@endpush