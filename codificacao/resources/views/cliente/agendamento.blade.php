@extends('layouts.app')

@section('title', 'Agendar Horário - BarberPro')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="fas fa-clock me-2"></i>Escolha Barbearia e Horário</h4>
                        <div style="width: 250px;">
                            <label class="form-label text-white mb-1">Data:</label>
                            <input type="date" class="form-control form-control-sm" id="dataSelecionada" 
                                   value="{{ now()->timezone('America/Sao_Paulo')->format('Y-m-d') }}"
                                   min="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form id="formAgendamento" action="{{ route('cliente.agendamentos.store') }}" method="POST">
                        @csrf
                        <input type="hidden" id="id_barbearia" name="id_barbearia">
                        <input type="hidden" id="data_hora" name="data_hora">
                        
                        <div class="row g-4" id="barbeariasGrid">
                            @foreach($barbearias as $barbearia)
                                <div class="col-md-3 col-sm-6">
                                    <div class="card barbearia-card h-100 text-center"
                                         data-barbearia-id="{{ $barbearia->id_barbearia }}"
                                         data-barbearia-nome="{{ $barbearia->nome }}"
                                         data-horario-abertura="{{ $barbearia->horario_abertura }}"
                                         data-horario-fechamento="{{ $barbearia->horario_fechamento }}">
                                        <div class="card-header bg-light py-2">
                                            <h6 class="mb-0">{{ $barbearia->nome }}</h6>
                                        </div>
                                        
                                        <div class="card-body p-2 d-flex flex-column">
                                            <div class="mb-2">
                                                <i class="fas fa-store fa-2x text-primary"></i>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <small class="text-muted d-block">
                                                    <i class="fas fa-map-marker-alt me-1"></i>
                                                    {{ Str::limit($barbearia->endereco, 25) }}
                                                </small>
                                                <small class="text-muted d-block">
                                                    <i class="fas fa-clock me-1"></i>
                                                    {{ \Carbon\Carbon::parse($barbearia->horario_abertura)->format('H:i') }} - 
                                                    {{ \Carbon\Carbon::parse($barbearia->horario_fechamento)->format('H:i') }}
                                                </small>
                                            </div>
                                            
                                            <div class="mt-auto">
                                                <div class="horarios-status" id="status-{{ $barbearia->id_barbearia }}">
                                                    <span class="badge bg-success">Disponível</span>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-outline-primary mt-2 btn-escolher-horario">
                                                    Escolher Horário
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 p-3 border rounded bg-light" id="selecaoInfo" style="display: none;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">Agendamento Selecionado:</h6>
                                    <p class="mb-1"><strong>Barbearia:</strong> <span id="infoBarbearia"></span></p>
                                    <p class="mb-1"><strong>Data:</strong> <span id="infoData"></span> às <span id="infoHorario"></span></p>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-lg" id="btnConfirmar">
                                        <i class="fas fa-calendar-check me-2"></i>Confirmar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="horariosModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <span id="modalBarbeariaNome"></span> - 
                    <span id="modalDataAtual"></span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="modalHorariosContainer" class="row g-2">
                </div>
                <div id="modalSemHorarios" class="text-center mt-3" style="display: none;">
                    <p class="text-muted">Nenhum horário disponível para esta data</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .barbearia-card {
        height: 250px;
        display: flex;
        flex-direction: column;
        transition: all 0.3s;
        cursor: pointer;
        border: 2px solid #dee2e6;
    }
    
    .barbearia-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border-color: #0d6efd;
    }
    
    .barbearia-card.selected {
        border-color: #0d6efd;
        background-color: rgba(13, 110, 253, 0.05);
    }
    
    .barbearia-card .card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .horario-btn {
        margin: 2px;
        min-width: 80px;
        transition: all 0.2s;
    }
    
    .horario-btn.selected {
        background-color: #0d6efd !important;
        color: white !important;
        border-color: #0d6efd !important;
        transform: scale(1.05);
    }
    
    .horario-btn.disponivel:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    
    .horario-btn.ocupado {
        background-color: #dc3545 !important;
        color: white !important;
        border-color: #dc3545 !important;
        opacity: 0.7;
        cursor: not-allowed;
    }
    
    .horario-btn.fora-expediente {
        background-color: #6c757d !important;
        color: white !important;
        border-color: #6c757d !important;
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    @media (max-width: 768px) {
        .barbearia-card {
            height: 220px;
        }
        
        .horario-btn {
            min-width: 70px;
            font-size: 0.9rem;
            padding: 0.25rem 0.5rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dataInput = document.getElementById('dataSelecionada');
    const selecaoInfo = document.getElementById('selecaoInfo');
    const btnConfirmar = document.getElementById('btnConfirmar');
    const horariosModal = new bootstrap.Modal(document.getElementById('horariosModal'));
    
    let barbeariaAtual = null;
    let horariosOcupadosCache = {};
    
    function formatarDataParaExibicao(dataString) {
        const [ano, mes, dia] = dataString.split('-');

        const data = new Date(ano, mes - 1, dia);

        return data.toLocaleDateString('pt-BR', {
            weekday: 'long',
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
        });
    }

    
    function horaParaMinutos(horaString) {
        const [horas, minutos] = horaString.split(':');
        return parseInt(horas) * 60 + parseInt(minutos);
    }
    
    function gerarHorariosIntervalo(inicioMinutos, fimMinutos) {
        const horarios = [];
        
        for (let minutos = inicioMinutos; minutos < fimMinutos; minutos += 30) {
            const horas = Math.floor(minutos / 60);
            const mins = minutos % 60;
            const horario = `${horas.toString().padStart(2, '0')}:${mins.toString().padStart(2, '0')}`;
            horarios.push(horario);
        }
        
        return horarios;
    }
    
    async function buscarHorariosOcupados(barbeariaId, data) {
        const cacheKey = `${barbeariaId}-${data}`;
        
        if (horariosOcupadosCache[cacheKey]) {
            return horariosOcupadosCache[cacheKey];
        }
        
        try {
            const response = await fetch(`/api/barbearias/${barbeariaId}/horarios-ocupados?data=${data}`);
            
            if (!response.ok) {
                console.error('Erro na API');
                return [];
            }
            
            const horariosOcupados = await response.json();
            
            const horariosFormatados = horariosOcupados.map(horario => {
                if (typeof horario === 'string') {
                    const partes = horario.split(' ');
                    if (partes.length > 1) {
                        return partes[1].substring(0, 5); 
                    }
                }
                return '';
            }).filter(h => h !== ''); /
            
            horariosOcupadosCache[cacheKey] = horariosFormatados;
            
            return horariosFormatados;
            
        } catch (error) {
            console.error('Erro ao buscar horários ocupados:', error);
            return [];
        }
    }
    async function abrirModalHorarios(card) {
        const barbeariaId = card.getAttribute('data-barbearia-id');
        const barbeariaNome = card.getAttribute('data-barbearia-nome');
        const horarioAbertura = card.getAttribute('data-horario-abertura');
        const horarioFechamento = card.getAttribute('data-horario-fechamento');
        const dataSelecionada = dataInput.value;
        
        barbeariaAtual = {
            id: barbeariaId,
            nome: barbeariaNome,
            abertura: horarioAbertura,
            fechamento: horarioFechamento
        };
        
        document.getElementById('modalBarbeariaNome').textContent = barbeariaNome;
        document.getElementById('modalDataAtual').textContent = formatarDataParaExibicao(dataSelecionada);
        
        const container = document.getElementById('modalHorariosContainer');
        const semHorariosDiv = document.getElementById('modalSemHorarios');
        container.innerHTML = '<div class="text-center py-3"><div class="spinner-border text-primary"></div></div>';
        semHorariosDiv.style.display = 'none';
        
        horariosModal.show();
        
        const horariosOcupados = await buscarHorariosOcupados(barbeariaId, dataSelecionada);
        
        const aberturaMinutos = horaParaMinutos(horarioAbertura);
        const fechamentoMinutos = horaParaMinutos(horarioFechamento);
        
        const todosHorarios = gerarHorariosIntervalo(aberturaMinutos, fechamentoMinutos);

        container.innerHTML = '';
        
        if (todosHorarios.length === 0) {
            semHorariosDiv.style.display = 'block';
            return;
        }
        
        todosHorarios.forEach(horario => {
            const col = document.createElement('div');
            col.className = 'col-3 col-sm-2';
            
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'btn btn-outline-primary w-100 horario-btn disponivel';
            button.textContent = horario;
            
            const ocupado = horariosOcupados.includes(horario);
            
            if (ocupado) {
                button.classList.remove('disponivel', 'btn-outline-primary');
                button.classList.add('ocupado', 'btn-danger');
                button.disabled = true;
                button.title = 'Horário já agendado';
            } else {
                button.addEventListener('click', function() {
                    document.querySelectorAll('.horario-btn').forEach(btn => {
                        btn.classList.remove('selected');
                    });

                    this.classList.add('selected');
                    

                    selecionarAgendamento(barbeariaId, barbeariaNome, horario);
                    
                    setTimeout(() => {
                        horariosModal.hide();
                    }, 500);
                });
            }
            
            col.appendChild(button);
            container.appendChild(col);
        });
    }


    function selecionarAgendamento(barbeariaId, barbeariaNome, horario) {

        document.querySelectorAll('.barbearia-card').forEach(card => {
            card.classList.remove('selected');
        });
        const cardSelecionado = document.querySelector(`[data-barbearia-id="${barbeariaId}"]`);
        if (cardSelecionado) {
            cardSelecionado.classList.add('selected');
        }
        
        document.getElementById('id_barbearia').value = barbeariaId;
        document.getElementById('data_hora').value = `${dataInput.value} ${horario}:00`;
        
        document.getElementById('infoBarbearia').textContent = barbeariaNome;
        document.getElementById('infoHorario').textContent = horario;
        document.getElementById('infoData').textContent = formatarDataParaExibicao(dataInput.value);
        
        selecaoInfo.style.display = 'block';
        btnConfirmar.disabled = false;
    }
    
    document.querySelectorAll('.btn-escolher-horario').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            const card = this.closest('.barbearia-card');
            abrirModalHorarios(card);
        });
    });
    
    document.querySelectorAll('.barbearia-card').forEach(card => {
        card.addEventListener('click', function(e) {
            if (!e.target.closest('.btn-escolher-horario')) {
                abrirModalHorarios(this);
            }
        });
    });
    
    dataInput.addEventListener('change', function() {
        horariosOcupadosCache = {};
        selecaoInfo.style.display = 'none';
        btnConfirmar.disabled = true;
        document.querySelectorAll('.barbearia-card').forEach(card => {
            card.classList.remove('selected');
        });
    });
});
</script>
@endpush