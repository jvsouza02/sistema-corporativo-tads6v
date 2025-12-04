@extends('layouts.app')

@section('title', 'Agendar Serviço - BarberPro')

@section('content')
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
                    
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <strong>Atenção!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <form id="formAgendamento" action="{{ route('cliente.agendamentos.store') }}" method="POST">
                        @csrf
                        
                        <!-- Seleção de Barbearia -->
                        <div class="mb-4">
                            <label for="barbearia" class="form-label fw-bold">
                                <i class="fas fa-store me-1"></i>
                                Selecione uma Barbearia <span class="text-danger">*</span>
                            </label>
                            <select class="form-select form-select-lg @error('id_barbearia') is-invalid @enderror" 
                                    id="barbearia" 
                                    name="id_barbearia" 
                                    required>
                                <option value="">Escolha uma barbearia</option>
                                @foreach($barbearias as $barbearia)
                                    <option value="{{ $barbearia->id_barbearia }}" 
                                            data-abertura="{{ $barbearia->horario_abertura }}" 
                                            data-fechamento="{{ $barbearia->horario_fechamento }}"
                                            {{ old('id_barbearia') == $barbearia->id_barbearia ? 'selected' : '' }}>
                                        {{ $barbearia->nome }} - {{ $barbearia->endereco }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_barbearia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Barbeiros Disponíveis -->
                        <div class="mb-4" id="barbeiroSection" style="display:none;">
                            <label for="barbeiro" class="form-label fw-bold">
                                <i class="fas fa-user-tie me-1"></i>
                                Selecione um Barbeiro (Opcional)
                            </label>
                            <select class="form-select form-select-lg @error('id_barbeiro') is-invalid @enderror" 
                                    id="barbeiro" 
                                    name="id_barbeiro">
                                <option value="">Deixar a barbearia escolher</option>
                            </select>
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Se não escolher, a barbearia designará o barbeiro disponível
                            </small>
                            @error('id_barbeiro')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Serviço -->
                        <div class="mb-4" id="servicoSection" style="display:none;">
                            <label for="servico" class="form-label fw-bold">
                                <i class="fas fa-cut me-1"></i>
                                Serviço Desejado <span class="text-danger">*</span>
                            </label>
                            <select class="form-select form-select-lg @error('servico') is-invalid @enderror" 
                                    id="servico" 
                                    name="servico" 
                                    required>
                                <option value="">Selecione um serviço</option>
                                <option value="Corte Social" {{ old('servico') == 'Corte Social' ? 'selected' : '' }}>Corte Social</option>
                                <option value="Corte Navalhado" {{ old('servico') == 'Corte Navalhado' ? 'selected' : '' }}>Corte Navalhado</option>
                                <option value="Corte Degradê" {{ old('servico') == 'Corte Degradê' ? 'selected' : '' }}>Corte Degradê</option>
                                <option value="Barba" {{ old('servico') == 'Barba' ? 'selected' : '' }}>Barba</option>
                                <option value="Sobrancelha" {{ old('servico') == 'Sobrancelha' ? 'selected' : '' }}>Sobrancelha</option>
                                <option value="Completo" {{ old('servico') == 'Completo' ? 'selected' : '' }}>Completo (Corte + Barba)</option>
                            </select>
                            @error('servico')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Data e Hora -->
                        <div class="mb-4" id="dataHoraSection" style="display:none;">
                            <label for="data_hora" class="form-label fw-bold">
                                <i class="fas fa-clock me-1"></i>
                                Data e Horário <span class="text-danger">*</span>
                            </label>
                            <input type="datetime-local" 
                                   class="form-control form-control-lg @error('data_hora') is-invalid @enderror" 
                                   id="data_hora" 
                                   name="data_hora" 
                                   value="{{ old('data_hora') }}"
                                   required>
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Horário de funcionamento: <span id="horarioAbertura">08:00</span> às <span id="horarioFechamento">18:00</span>
                            </small>
                            @error('data_hora')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                            <!-- Indicador de disponibilidade -->
                            <div id="disponibilidadeInfo" class="mt-2" style="display:none;">
                                <div class="alert alert-info mb-0" id="alertDisponivel" style="display:none;">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <strong>Horário disponível!</strong>
                                </div>
                                <div class="alert alert-warning mb-0" id="alertOcupado" style="display:none;">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <strong>Este horário já está ocupado.</strong> Por favor, escolha outro.
                                </div>
                            </div>
                        </div>
                        
                        <!-- Observação -->
                        <div class="mb-4" id="observacaoSection" style="display:none;">
                            <label for="observacao" class="form-label fw-bold">
                                <i class="fas fa-comment me-1"></i>
                                Observações (Opcional)
                            </label>
                            <textarea class="form-control @error('observacao') is-invalid @enderror" 
                                      id="observacao" 
                                      name="observacao" 
                                      rows="3" 
                                      placeholder="Alguma preferência ou observação?">{{ old('observacao') }}</textarea>
                            <small class="text-muted">
                                Ex: Preferência de estilo, alergias, etc.
                            </small>
                            @error('observacao')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
            
            <!-- Legenda de disponibilidade -->
            <div class="card mt-3" id="legendaCard" style="display:none;">
                <div class="card-body">
                    <h6 class="card-title mb-3">
                        <i class="fas fa-info-circle me-2"></i>Como funciona o agendamento
                    </h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-2">
                                <div style="width: 20px; height: 20px; background: #d4edda; border: 1px solid #c3e6cb; border-radius: 4px;" class="me-2"></div>
                                <span>Horário disponível</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-2">
                                <div style="width: 20px; height: 20px; background: #fff3cd; border: 1px solid #ffc107; border-radius: 4px;" class="me-2"></div>
                                <span>Horário ocupado</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <small class="text-muted">
                        <i class="fas fa-lightbulb me-1"></i>
                        <strong>Dica:</strong> O sistema verifica automaticamente a disponibilidade ao selecionar data e hora.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Configurar token CSRF
document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    window.fetch = new Proxy(window.fetch, {
        apply: function(target, thisArg, argumentsList) {
            const request = argumentsList[0];
            const options = argumentsList[1] || {};
            
            options.headers = options.headers || {};
            
            if (['POST', 'PUT', 'DELETE'].includes(options.method || (request.method || 'GET'))) {
                options.headers['X-CSRF-TOKEN'] = csrfToken;
            }
            
            if (typeof options.body === 'string' && !(options.headers['Content-Type'] || options.headers['content-type'])) {
                options.headers['Content-Type'] = 'application/json';
            }
            
            return target.apply(thisArg, [request, options]);
        }
    });
    
    const barbeariaSelect = document.getElementById('barbearia');
    const barbeiroSection = document.getElementById('barbeiroSection');
    const servicoSection = document.getElementById('servicoSection');
    const dataHoraSection = document.getElementById('dataHoraSection');
    const observacaoSection = document.getElementById('observacaoSection');
    const legendaCard = document.getElementById('legendaCard');
    const barbeiroSelect = document.getElementById('barbeiro');
    const dataHoraInput = document.getElementById('data_hora');
    const btnAgendar = document.getElementById('btnAgendar');
    const horarioAberturaSpan = document.getElementById('horarioAbertura');
    const horarioFechamentoSpan = document.getElementById('horarioFechamento');
    const disponibilidadeInfo = document.getElementById('disponibilidadeInfo');
    const alertDisponivel = document.getElementById('alertDisponivel');
    const alertOcupado = document.getElementById('alertOcupado');
    
    let horariosOcupados = [];
    
    // Atualizar ao selecionar barbearia
    barbeariaSelect.addEventListener('change', function() {
        const barbeariaId = this.value;
        const selectedOption = this.options[this.selectedIndex];
        
        if(barbeariaId) {
            // Atualizar horário de funcionamento
            horarioAberturaSpan.textContent = selectedOption.getAttribute('data-abertura').substr(0, 5);
            horarioFechamentoSpan.textContent = selectedOption.getAttribute('data-fechamento').substr(0, 5);
            
            // Buscar barbeiros
            fetch(`/api/barbearias/${barbeariaId}/barbeiros`)
                .then(response => response.json())
                .then(barbeiros => {
                    barbeiroSelect.innerHTML = '<option value="">Deixar a barbearia escolher</option>';
                    barbeiros.forEach(barbeiro => {
                        const option = document.createElement('option');
                        option.value = barbeiro.id_barbeiro;
                        option.textContent = barbeiro.nome;
                        barbeiroSelect.appendChild(option);
                    });
                    
                    // Mostrar seções
                    barbeiroSection.style.display = 'block';
                    servicoSection.style.display = 'block';
                    dataHoraSection.style.display = 'block';
                    observacaoSection.style.display = 'block';
                    legendaCard.style.display = 'block';
                    
                    checkFormValidity();
                })
                .catch(error => {
                    console.error('Erro ao buscar barbeiros:', error);
                    alert('Erro ao carregar barbeiros. Por favor, tente novamente.');
                });
        } else {
            // Esconder seções
            barbeiroSection.style.display = 'none';
            servicoSection.style.display = 'none';
            dataHoraSection.style.display = 'none';
            observacaoSection.style.display = 'none';
            legendaCard.style.display = 'none';
            btnAgendar.disabled = true;
        }
    });
    
    // Verificar disponibilidade ao mudar data/hora
    dataHoraInput.addEventListener('change', function() {
        if (!this.value || !barbeariaSelect.value) return;
        
        const barbeariaId = barbeariaSelect.value;
        const barbeiroId = barbeiroSelect.value;
        const dataHora = new Date(this.value);
        const data = dataHora.toISOString().split('T')[0];
        const hora = dataHora.toTimeString().substr(0, 5);
        
        // Verificar se está dentro do horário de funcionamento
        const selectedOption = barbeariaSelect.options[barbeariaSelect.selectedIndex];
        const abertura = selectedOption.getAttribute('data-abertura').substr(0, 5);
        const fechamento = selectedOption.getAttribute('data-fechamento').substr(0, 5);
        
        if (hora < abertura || hora > fechamento) {
            mostrarDisponibilidade(false);
            alert(`O horário selecionado está fora do expediente da barbearia. Horário de funcionamento: ${abertura} às ${fechamento}`);
            this.value = '';
            return;
        }
        
        // Buscar horários ocupados
        let url = `/api/barbearias/${barbeariaId}/horarios-ocupados?data=${data}`;
        if (barbeiroId) {
            url += `&barbeiro_id=${barbeiroId}`;
        }
        
        fetch(url)
            .then(response => response.json())
            .then(ocupados => {
                horariosOcupados = ocupados.map(o => o.horario);
                
                const horarioOcupado = horariosOcupados.includes(hora);
                mostrarDisponibilidade(!horarioOcupado);
                
                if (horarioOcupado) {
                    btnAgendar.disabled = true;
                } else {
                    checkFormValidity();
                }
            })
            .catch(error => {
                console.error('Erro ao verificar disponibilidade:', error);
            });
    });
    
    // Mostrar/ocultar indicador de disponibilidade
    function mostrarDisponibilidade(disponivel) {
        disponibilidadeInfo.style.display = 'block';
        
        if (disponivel) {
            alertDisponivel.style.display = 'block';
            alertOcupado.style.display = 'none';
        } else {
            alertDisponivel.style.display = 'none';
            alertOcupado.style.display = 'block';
        }
    }
    
    // Verificar validade do formulário
    function checkFormValidity() {
        const servicoSelected = document.getElementById('servico').value;
        const dataHoraSelected = dataHoraInput.value;
        const horarioDisponivel = alertDisponivel.style.display === 'block' || disponibilidadeInfo.style.display === 'none';
        
        btnAgendar.disabled = !(servicoSelected && dataHoraSelected && horarioDisponivel);
    }
    
    // Listeners para validação
    document.getElementById('servico').addEventListener('change', checkFormValidity);
    
    // Definir data mínima como hoje
    const today = new Date();
    const todayStr = today.toISOString().slice(0, 16);
    dataHoraInput.min = todayStr;
});
</script>
@endpush