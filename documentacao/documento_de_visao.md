# Documento de Visão do Produto — Sistema de agendamento e Gestão para Barbearias

## 1. Visão Geral do Produto
Uma **plataforma web** que centraliza o gerenciamento de barbearias: cadastro da barbearia e profissionais, configuração de serviços, agendamento e calendário, registro de atendimentos no histórico, controle de status de agendamentos (reservado / finalizado / expirado) e mecanismos de avaliação pós-atendimento. O produto visa reduzir atritos no agendamento e permitir personalização do atendimento via histórico.

## 2. Público-alvo
- **Proprietário** — administra a barbearia, gerencia horários, profissionais, serviços, visualiza relatórios e mantém históricos de atendimento.  
- **Cabeleireiro / Profissional** — consulta sua agenda, registra atendimentos e adiciona observações no histórico.  
- **Cliente** — cria conta, pesquisa serviços, reserva horário, visualiza histórico de atendimentos e avalia serviços. 

## 3. Necessidade de Negócio / Justificativa
- **Operacional:** eliminar uso de papel, reduzir conflitos de horário e facilitar bloqueios/manutenção da agenda.  
- **Comercial:** melhorar retenção e ticket médio ao possibilitar atendimento personalizado (uso do histórico de atendimentos).  
- **Decisional:** fornecer dados para o proprietário sobre frequência, serviços mais procurados e desempenho dos profissionais.

## 4. Escopo (o que está incluído / excluído)
**Incluído:**
- Cadastro de barbearia, profissionais e serviços.  
- Calendário/agenda por profissional.  
- Agendamento pelo cliente (data, horário, serviço).  
- Registro de atendimento / histórico (comentários com data/hora)
- Alteração de status de agendamento (reservado, finalizado, expirado).  
- Autenticação básica e controle de papéis (cliente, cabeleireiro, proprietário).  

**Excluído:**
- Módulo de pagamentos ou transações financeiras.   
- App mobile nativo — inicialmente web responsivo.
- Login com redes sociais.

## 5. Principais Funcionalidades / Épicos
1. **Administração da Barbearia:** cadastro, horário de funcionamento, informações de contato. 
2. **Gestão de Profissionais:** cadastro, escala/horários, perfil. 
3. **Catálogo de Serviços:** criação/edição de serviços (nome, preço, duração, categoria).  
4. **Agenda e Agendamentos:** visualização por dia/profissional, criação/edição/remoção e bloqueio de horários.
5. **Histórico de Atendimentos:** criar, listar, editar e excluir comentários com timestamp.
6. **Avaliações e Feedbacks:** clientes avaliam atendimentos e deixam comentários. 

## 6. Riscos
- Baixa adoção por resistência ao abandono do processo em papel.

## 7. Prioridades Iniciais 
1. Registro e consulta de histórico com validação de comentário obrigatório.
