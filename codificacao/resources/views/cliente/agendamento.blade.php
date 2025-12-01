@extends('layouts.app')

@section('title', 'Agendar Serviço - BarberPro')

@section('content')
<?php
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-calendar-check me-2"></i>Novo Agendamento</h4>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <form id="formAgendamento" action="{{ route('cliente.agendamentos.store') }}" method="POST">
                        @csrf
                        
                        <!-- Seleção de Barbearia -->
                        <div class="mb-4">
                            <label for="barbearia" class="form-label fw-bold">Selecione uma Barbearia <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" id="barbearia" name="id_barbearia" required>
                                <option value="">Escolha uma barbearia</option>
                                @foreach($barbearias as $barbearia)
                                    <option value="{{ $barbearia->id_barbearia }}" 
                                            data-abertura="{{ $barbearia->horario_abertura }}" 
                                            data-fechamento="{{ $barbearia->horario_fechamento }}">
                                        {{ $barbearia->nome }} - {{ $barbearia->endereco }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Barbeiros Disponíveis -->
                        <div class="mb-4" id="barbeiroSection" style="display:none;">
                            <label for="barbeiro" class="form-label fw-bold">Selecione um Barbeiro (Opcional)</label>
                            <select class="form-select form-select-lg" id="barbeiro" name="id_barbeiro">
                                <option value="">Deixar a barbearia escolher</option>
                            </select>
                        </div>
                        
                        <!-- Serviço -->
                        <div class="mb-4" id="servicoSection" style="display:none;">
                            <label for="servico" class="form-label fw-bold">Serviço Desejado <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg" id="servico" name="servico" required>
                                <option value="">Selecione um serviço</option>
                                <option value="Corte Social">Corte Social</option>
                                <option value="Corte Navalhado">Corte Navalhado</option>
                                <option value="Corte Degradê">Corte Degradê</option>
                                <option value="Barba">Barba</option>
                                <option value="Sobrancelha">Sobrancelha</option>
                                <option value="Completo">Completo (Corte + Barba)</option>
                            </select>
                        </div>
                        
                        <!-- Data e Hora -->
                        <div class="mb-4" id="dataHoraSection" style="display:none;">
                            <label for="data_hora" class="form-label fw-bold">Data e Horário <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control form-control-lg" id="data_hora" name="data_hora" required>
                            <small class="text-muted">Horários disponíveis das <span id="horarioAbertura">08:00</span> às <span id="horarioFechamento">18:00</span></small>
                        </div>
                        
                        <!-- Observação -->
                        <div class="mb-4" id="observacaoSection" style="display:none;">
                            <label for="observacao" class="form-label fw-bold">Observações (Opcional)</label>
                            <textarea class="form-control" id="observacao" name="observacao" rows="3" placeholder="Alguma preferência ou observação?"></textarea>
                        </div>
                        
                        <!-- Botões -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('home') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Voltar
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg" id="btnAgendar" disabled>
                                <i class="fas fa-calendar-check me-2"></i>Confirmar Agendamento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>


// Configurar token CSRF para todas as requisições AJAX
document.addEventListener('DOMContentLoaded', function() {
    // Obter token CSRF do meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    // Configurar para todas as requisições fetch
    window.fetch = new Proxy(window.fetch, {
        apply: function(target, thisArg, argumentsList) {
            const request = argumentsList[0];
            const options = argumentsList[1] || {};
            
            // Adicionar headers se não existirem
            options.headers = options.headers || {};
            
            // Adicionar token CSRF em requisições POST/PUT/DELETE
            if (['POST', 'PUT', 'DELETE'].includes(options.method || (request.method || 'GET'))) {
                options.headers['X-CSRF-TOKEN'] = csrfToken;
            }
            
            // Adicionar Content-Type para JSON
            if (typeof options.body === 'string' && !(options.headers['Content-Type'] || options.headers['content-type'])) {
                options.headers['Content-Type'] = 'application/json';
            }
            
            return target.apply(thisArg, [request, options]);
        }
    });
    
    // Configurar para requisições XMLHttpRequest (axios, etc)
    document.addEventListener('ajaxSend', function(event) {
        if (event.detail && event.detail.request) {
            event.detail.request.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const barbeariaSelect = document.getElementById('barbearia');
    const barbeiroSection = document.getElementById('barbeiroSection');
    const servicoSection = document.getElementById('servicoSection');
    const dataHoraSection = document.getElementById('dataHoraSection');
    const observacaoSection = document.getElementById('observacaoSection');
    const barbeiroSelect = document.getElementById('barbeiro');
    const dataHoraInput = document.getElementById('data_hora');
    const btnAgendar = document.getElementById('btnAgendar');
    const horarioAberturaSpan = document.getElementById('horarioAbertura');
    const horarioFechamentoSpan = document.getElementById('horarioFechamento');
    
    // Atualizar seleção de barbeiros quando uma barbearia é escolhida
    barbeariaSelect.addEventListener('change', function() {
        const barbeariaId = this.value;
        const selectedOption = this.options[this.selectedIndex];
        
        if(barbeariaId) {
            // Atualizar horário de funcionamento
            horarioAberturaSpan.textContent = selectedOption.getAttribute('data-abertura').substr(0, 5);
            horarioFechamentoSpan.textContent = selectedOption.getAttribute('data-fechamento').substr(0, 5);
            
            // Buscar barbeiros da barbearia
            fetch(`/api/barbearias/${barbeariaId}/barbeiros`)
                .then(response => response.json())
                .then(barbeiros => {
                    // Preencher select de barbeiros
                    barbeiroSelect.innerHTML = '<option value="">Deixar a barbearia escolher</option>';
                    barbeiros.forEach(barbeiro => {
                        const option = document.createElement('option');
                        option.value = barbeiro.id_barbeiro;
                        option.textContent = barbeiro.nome;
                        barbeiroSelect.appendChild(option);
                    });
                    
                    // Mostrar seções progressivamente
                    barbeiroSection.style.display = 'block';
                    servicoSection.style.display = 'block';
                    dataHoraSection.style.display = 'block';
                    observacaoSection.style.display = 'block';
                    
                    // Habilitar botão apenas quando todos os campos obrigatórios estiverem preenchidos
                    checkFormValidity();
                })
                .catch(error => {
                    console.error('Erro ao buscar barbeiros:', error);
                    alert('Erro ao carregar barbeiros. Por favor, tente novamente.');
                });
        } else {
            // Esconder todas as seções se nenhuma barbearia selecionada
            barbeiroSection.style.display = 'none';
            servicoSection.style.display = 'none';
            dataHoraSection.style.display = 'none';
            observacaoSection.style.display = 'none';
            btnAgendar.disabled = true;
        }
    });
    
    // Habilitar botão de agendar quando todos os campos obrigatórios estão preenchidos
    function checkFormValidity() {
        const servicoSelected = document.getElementById('servico').value;
        const dataHoraSelected = dataHoraInput.value;
        
        btnAgendar.disabled = !(servicoSelected && dataHoraSelected);
    }
    
    // Adicionar listeners para verificar validade do formulário
    document.getElementById('servico').addEventListener('change', checkFormValidity);
    dataHoraInput.addEventListener('change', checkFormValidity);
    
    // Definir data mínima como hoje
    const today = new Date();
    const todayStr = today.toISOString().slice(0, 16);
    dataHoraInput.min = todayStr;
    
    // Limitar seleção de data/hora ao horário de funcionamento
    dataHoraInput.addEventListener('change', function() {
        if (!this.value) return;
        
        const selectedDate = new Date(this.value);
        const selectedTime = selectedDate.getHours() * 60 + selectedDate.getMinutes();
        
        const barbeariaId = barbeariaSelect.value;
        if (!barbeariaId) return;
        
        const selectedOption = barbeariaSelect.options[barbeariaSelect.selectedIndex];
        const abertura = selectedOption.getAttribute('data-abertura');
        const fechamento = selectedOption.getAttribute('data-fechamento');
        
        const [aberturaHoras, aberturaMinutos] = abertura.split(':').map(Number);
        const [fechamentoHoras, fechamentoMinutos] = fechamento.split(':').map(Number);
        
        const aberturaTotal = aberturaHoras * 60 + aberturaMinutos;
        const fechamentoTotal = fechamentoHoras * 60 + fechamentoMinutos;
        
        if (selectedTime < aberturaTotal || selectedTime > fechamentoTotal) {
            alert(`O horário selecionado está fora do expediente da barbearia. Horário de funcionamento: ${abertura} às ${fechamento}`);
            this.value = '';
        }
    });
});
</script>
@endpush