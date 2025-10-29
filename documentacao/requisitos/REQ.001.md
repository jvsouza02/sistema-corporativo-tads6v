# REQ001 — Registrar Atendimento

**ESCOPO:** Este caso de uso trata do registro de atendimentos realizados pelo barbeiro, permitindo documentar detalhes dos serviços prestados e manter o histórico de cada cliente.  

**PROPÓSITO:** Permitir que o barbeiro registre os detalhes de um atendimento realizado para documentar o serviço e alimentar o histórico do cliente.  
**ATOR PRINCIPAL:** Barbeiro  

---

## PRÉ-CONDIÇÕES
- O barbeiro deve estar autenticado no sistema.  
- Deve existir um agendamento com status **“Concluído”**.  

## PÓS-CONDIÇÕES
- O atendimento é registrado e vinculado ao cliente e ao barbeiro.  
- As informações passam a constar no histórico de atendimentos.  

---

## FLUXO NORMAL
1. O barbeiro acessa o módulo **“Registrar Atendimento”**.  
2. O sistema exibe os agendamentos com status **“Concluído”**.  
3. O barbeiro seleciona um agendamento e preenche o formulário com:  
   - Tipo de serviço executado;  
   - Observações sobre o cliente.  
4. O barbeiro confirma clicando em **“Salvar”**.  
5. O sistema valida os dados inseridos.  
6. O sistema registra o atendimento e o associa ao histórico do cliente.  
7. O sistema exibe uma mensagem de sucesso.  

---

## FLUXO DE EXCEÇÃO
- **E1 — Dados inválidos ou ausentes:**  
  O sistema exibe mensagem de erro solicitando correção dos campos obrigatórios.  

- **E2 — Falha no salvamento:**  
  O sistema informa erro de persistência e orienta o barbeiro a tentar novamente.  

---

## FLUXO ALTERNATIVO
  **A1 — Consulta de atendimentos anteriores:**  
  1. O barbeiro acessa o histórico de um cliente.  
  2. O sistema exibe todos os atendimentos anteriores com tipo de serviço e observações registradas.  

  **A2 — Edição de atendimento existente:**  
  1. O barbeiro acessa um registro e seleciona **“Editar”**.  
  2. Após ajustar as informações, confirma a alteração.  
  3. O sistema atualiza o registro no histórico.  

  **A3 — Exclusão de atendimento:**  
  1. O barbeiro seleciona um atendimento e clica em **“Excluir”**.  
  2. O sistema solicita confirmação.  
  3. O registro é removido, preservando os demais dados.  

---

## REQUISITOS RELACIONADOS
- **RF09:** Registrar Atendimento  
- **RF11:** Consultar Histórico de Atendimentos  
- **RN07:** Registrar Informações do Atendimento  
- **RN09:** Gerar Histórico de Atendimentos  
- **RNF03:** Implementar Segurança  
