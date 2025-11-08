# Documento de Visão do Produto — Sistema de Agendamento e Gestão para Barbearias

---

## 1. Visão Geral do Produto
Plataforma web responsiva que centraliza o gerenciamento de barbearias e operações de atendimento.  
Permite que **proprietários** cadastrem e gerenciem múltiplas barbearias (com foto, endereço, horário, contato etc.),  
**barbeiros** consultem agendas e registrem atendimentos, e **clientes** agendem serviços e avaliem atendimentos.  

O sistema gera histórico com timestamps, calcula automaticamente valores de atendimentos com base em serviços e produtos pré-cadastrados e apresenta métricas operacionais (ex.: atendimentos semanais, número de barbeiros, receita semanal).

---

## 2. Público-alvo
- **Proprietário:** administra barbearias, gerencia profissionais, visualiza relatórios e histórico.  
- **Barbeiro:** consulta agenda, registra/edita/remover atendimentos e adiciona observações.  
- **Cliente:** cria conta, pesquisa serviços, agenda horário e avalia atendimento.

---

## 3. Justificativa / Necessidade de Negócio
- **Operacional:** eliminar o uso de papel, reduzir conflitos e sobreposições de horário, facilitar bloqueios e manutenção de agenda.  
- **Comercial:** aumentar retenção e ticket médio ao personalizar atendimento via histórico e uso de produtos/serviços recomendados.  
- **Decisional:** fornecer relatórios para tomada de decisão sobre frequência, serviços mais procurados e desempenho por profissional.

---

## 4. Fluxos de Autenticação (importante)
- **Proprietário:** cadastro (nome, e-mail, senha) ou login por e-mail → redirecionado à tela inicial do proprietário com listagem de suas barbearias.  
- **Barbeiro:** login por e-mail → acessa listagem de atendimentos/agenda do seu vínculo.  
- **Cliente:** cadastro/login padrão para agendamento e avaliação.

---

## 5. Escopo — Incluído / Excluído

### Incluído
- Cadastro e gestão de **barbearias** (nome, e-mail, endereço, telefone, horário início/fim, descrição, foto).  
- Listagem de barbearias com métricas: **atendimentos semanais**, **quantidade de barbeiros**, **receita total gerada na semana**.  
- Página de **detalhes da barbearia** com histórico completo de atendimentos.  
- Gestão de **profissionais** (cadastro: nome, e-mail, horário início/fim; edição; remoção; **transferência de barbeiros entre barbearias do mesmo proprietário**).  
- **Catálogo de serviços e produtos** pré-cadastrados (nome, preço, duração, categoria).  
- **Agenda / Agendamento**: visualização por dia, criação/edição/remoção, bloqueio de horários.  
- **Registro de atendimentos** pelo barbeiro: seleção de serviços e produtos do catálogo; cálculo automático do valor total; edição/remoção com recálculo. Histórico com data/hora e observações.  
- Controle de **status de agendamento**: `reservado`, `finalizado`, `expirado`.  
- **Avaliações pós-atendimento** (nota + comentário).  
- Autenticação básica e controle de papéis (cliente, barbeiro, proprietário).  
- Relatórios simples e métricas semanais exibidas no dashboard do proprietário.

### Excluído
- Módulo de pagamentos / processamento de transações financeiras.  
- Aplicativo móvel nativo (apenas web responsiva).  
- Login social (Google/Facebook/etc.).  
- Integrações de terceiros (ex.: gateways de pagamento, marketplaces) no MVP.

---

## 6. Principais Funcionalidades / Épicos
- **Dashboard do Proprietário:** listagem de barbearias, métricas semanais, botões de CRUD.  
- **CRUD Barbearia:** criar/editar/remover, upload de foto, configurações de horário.  
- **Gestão de Profissionais:** cadastrar, editar, remover, transferir entre barbearias.  
- **Catálogo:** gerenciar serviços e produtos (preço, duração, categoria).  
- **Agenda:** visualização por dia/semana, criação de agendamentos por cliente, bloqueios.  
- **Atendimentos:** barbeiro registra atendimento — seleciona serviços/produtos, sistema soma valores, grava histórico com timestamp e observações; permite editar/remover com recálculo.  
- **Status & Avaliação:** transição de status (reservado → finalizado / expirado) e avaliação do cliente após atendimento.  
- **Relatórios Básicos:** atendimentos por período, receita por semana, serviços mais consumidos, desempenho por barbeiro.

---

## 7. Riscos
- Resistência de proprietários à migração do papel para a plataforma.  
- Erros de cálculo de valores se o catálogo não estiver corretamente cadastrado.  
- Conflitos de agenda se horários de profissionais não forem validados adequadamente.  
- Falta de adoção por ausência de funcionalidades de pagamento no MVP (dependendo do modelo de negócio).

---