# REQ004 — Gerenciar Barbeiros

**ESCOPO:** Permitir que o proprietário cadastre, edite e remova barbeiros vinculados à sua barbearia, configurando dados pessoais, horários de trabalho e funções, mantendo a equipe sempre atualizada e integrada à agenda da barbearia.  
**PROPÓSITO:** Permitir que o proprietário mantenha o cadastro dos barbeiros atualizado, definindo horários, funções e disponibilidade, assegurando a correta operação dos agendamentos e a organização da equipe.  
**ATOR:** Proprietário  

---

## PRÉ-CONDIÇÕES
- O proprietário deve estar autenticado no sistema.  
- O proprietário deve ter uma barbearia cadastrada.  

## PÓS-CONDIÇÕES
- O barbeiro é cadastrado, editado ou removido com sucesso.  
- A lista de barbeiros e a agenda da barbearia são atualizadas conforme as alterações realizadas.  

---

## FLUXO NORMAL
1. O proprietário acessa o módulo **“Gerenciar Barbeiros”**.  
2. O sistema exibe a lista de barbeiros cadastrados na barbearia.  
3. O proprietário seleciona uma das opções:  
   - **Cadastrar novo barbeiro**;  
   - **Editar barbeiro existente**;  
   - **Remover barbeiro**.  
4. O sistema exibe o formulário com os campos obrigatórios: nome completo, e-mail, telefone, cargo/função, horário de trabalho e foto (opcional).  
5. O proprietário preenche ou ajusta os dados do barbeiro e clica em **“Salvar”** ou **“Confirmar Remoção”**, conforme o caso.  
6. O sistema valida as informações fornecidas.  
7. O sistema realiza a operação solicitada (criação, atualização ou remoção).  
8. O sistema exibe uma mensagem de sucesso e atualiza a lista de barbeiros na interface.  

---

## FLUXO DE EXCEÇÃO
- **E1 — Campos obrigatórios ausentes:**  
  O sistema exibe mensagem de erro informando que todos os campos obrigatórios devem ser preenchidos antes de salvar.  

- **E2 — Tentativa de remover barbeiro com agendamentos futuros:**  
  O sistema impede a exclusão e exibe a mensagem:  
  *“Não é possível remover barbeiros com agendamentos futuros.”*  

- **E3 — Falha no salvamento ou atualização:**  
  O sistema informa o erro e solicita que o proprietário tente novamente.  

---

## FLUXO ALTERNATIVO
  **A1 — Cadastrar novo barbeiro:**  
  1. O proprietário clica em **“Adicionar Barbeiro”**.  
  2. O sistema exibe o formulário com os campos obrigatórios: nome completo, e-mail, telefone, cargo/função, horário de trabalho e foto (opcional).  
  3. O proprietário preenche os dados e confirma.  
  4. O sistema valida, salva o registro e exibe mensagem de sucesso.  

  **A2 — Editar barbeiro existente:**  
  1. O proprietário seleciona um barbeiro e clica em **“Editar”**.  
  2. O sistema exibe os dados atuais do barbeiro em um formulário com os mesmos campos do cadastro.  
  3. O proprietário altera as informações desejadas e confirma.  
  4. O sistema salva as alterações e atualiza a listagem.  

  **A3 — Remover barbeiro:**  
  1. O proprietário seleciona um barbeiro e clica em **“Remover”**.  
  2. O sistema verifica se há agendamentos futuros.  
  3. Caso não haja, o sistema solicita confirmação.  
  4. O proprietário confirma e o barbeiro é removido.  
  5. O sistema exibe mensagem de sucesso e atualiza a lista.  

---

## REQUISITOS RELACIONADOS
- **RF04:** Gerenciar Barbeiros  
- **RF02:** Cadastrar Barbearia  
- **RF06:** Gerenciar Agenda  
- **RN02:** Vincular Profissionais e Serviços à Barbearia  
- **RN11:** Controlar o Acesso de Cada Tipo de Usuário  
- **RNF03:** Implementar Segurança 
