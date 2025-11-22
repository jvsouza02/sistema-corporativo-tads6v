# Documento de Visão do Produto — Sistema de Agendamento e Gestão para Barbearias

---

## 1. Visão Geral do Produto
Plataforma web responsiva que centraliza o gerenciamento de barbearias e operações de atendimento.  
Permite que **proprietários** cadastrem e administrem barbearias, gerenciem barbeiros, serviços, produtos e estoques (com alertas de baixa).  
**Barbeiros** consultam sua agenda, registram atendimentos com serviços e múltiplos produtos utilizados; o sistema calcula automaticamente o valor total e atualiza o estoque.  
**Clientes** cadastram-se, visualizam barbearias e realizam agendamentos escolhendo apenas horários disponíveis conforme cada unidade.

A plataforma integra autenticação, controle de agenda, registro de atendimentos, gestão de estoque e métricas semanais, oferecendo organização, eficiência e suporte completo às operações da barbearia.

---

## 2. Público-Alvo

- **Proprietário:** administra barbearias, gerencia profissionais, estoque, serviços e visualiza métricas semanais.  
- **Barbeiro:** consulta agenda, registra atendimentos, seleciona serviços e múltiplos produtos, insere comentários e edita registros.  
- **Cliente:** cria conta, escolhe barbearias, visualiza horários disponíveis e realiza agendamentos.

---

## 3. Justificativa / Necessidade do Negócio

- **Operacional:** substituir controles manuais, evitar choques de horário, automatizar a gestão de estoque e atendimentos.  
- **Comercial:** aumentar eficiência, melhorar a organização e acompanhar receita e produtividade semanal.  
- **Decisional:** disponibilizar métricas de atendimentos, serviços mais utilizados, consumo de produtos e desempenho de profissionais.

---

## 4. Fluxos de Autenticação

- **Proprietário:** cadastro (nome, e-mail, senha) → login → dashboard com listagem de barbearias.  
- **Barbeiro:** login → visualização de sua agenda e atendimentos.  
- **Cliente:** cadastro/login → seleção de barbearia → visualização de horários disponíveis → agendamento.

---

## 5. Escopo — Incluído / Excluído

### Incluído
- **Gestão de Barbearias:** cadastro, edição, remoção, listagem com métricas semanais (atendimentos, barbeiros, receita).  
- **Página de Detalhes da Barbearia:** histórico de atendimentos, dados completos, estoque e equipe.  
- **Gestão de Profissionais:** cadastro, edição, remoção e **transferência entre barbearias**.  
- **Gestão de Serviços:** cadastro com preço, descrição e **produtos associados automaticamente**.  
- **Gestão de Produtos e Estoque:** controle de quantidade, reposições, baixa automática durante atendimentos e **alertas de estoque baixo**.  
- **Agenda e Agendamentos:** horários disponíveis conforme a barbearia; criação/edição/cancelamento; visualização por cliente e barbeiro.  
- **Atendimentos:** registro de serviços prestados, carregamento automático de produtos padrão, **adição de múltiplos produtos extras**, comentários, cálculo automático do valor total e recálculo após edição.  
- **Histórico do Cliente:** listagem de atendimentos realizados.  
- **Métricas Semanais:** atendimentos, receita gerada, barbeiros vinculados.  
- **Autenticação e controle de papéis:** proprietário, barbeiro, cliente.

### Excluído
- Pagamentos online.  
- Aplicativo mobile nativo (somente web responsiva).  
- Login social.  
- Integrações externas (gateways, APIs externas) no MVP.

---

## 6. Principais Funcionalidades / Épicos

- **Dashboard do Proprietário:** listagem das barbearias com métricas e ações de CRUD.  
- **CRUD de Barbearias:** criação, edição, remoção e upload de foto.  
- **Gestão de Profissionais:** cadastro, edição, remoção e transferência entre unidades.  
- **Catálogo de Serviços e Produtos:** gerenciamento de preços, descrições, associações e estoque.  
- **Gestão de Estoque:** acompanhamento, alertas de baixa e movimentações automáticas e manuais.  
- **Agenda e Agendamentos:** seleção automática de horários disponíveis; visualização por dia/semana.  
- **Registro de Atendimentos:** seleção de serviços, múltiplos produtos extras, comentários e cálculo automático do valor.  
- **Histórico e Métricas:** atendimentos do cliente, histórico geral da barbearia e indicadores semanais.

---

## 7. Riscos

- Falta de adoção devido à resistência à migração do modelo manual.  
- Inconsistências no cálculo de valores causadas por cadastros incompletos de serviços/produtos.  
- Possíveis conflitos de agenda se horários não forem validados corretamente.  
- Estoque incorreto caso os profissionais não registrem produtos utilizados.

---