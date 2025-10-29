# REQ004 — Cadastrar Proprietário

**ESCOPO:** Permitir que o proprietário realize seu cadastro na plataforma, informando seus dados pessoais e de contato, para obter acesso ao sistema e iniciar o processo de cadastro de sua barbearia.  
**PROPÓSITO:** Permitir que o proprietário crie uma conta pessoal na plataforma, garantindo a validação dos dados informados e possibilitando o acesso ao painel de gerenciamento e ao cadastro da barbearia.  
**ATOR PRINCIPAL:** Proprietário  

---

## PRÉ-CONDIÇÕES
- O proprietário deve estar na página de **“Cadastro”**.  
- O proprietário não deve estar autenticado no sistema.  

## PÓS-CONDIÇÕES
- O proprietário é cadastrado com sucesso no sistema.  
- O sistema autentica automaticamente o novo proprietário.  
- O sistema redireciona o proprietário para a área de **Cadastro da Barbearia**.  

---

## FLUXO NORMAL
1. O proprietário acessa a página de **“Cadastro”**.  
2. O sistema exibe o formulário com os campos obrigatórios: nome completo, e-mail, telefone e senha.  
3. O proprietário preenche todos os campos obrigatórios.  
4. O proprietário clica em **“Cadastrar”**.  
5. O sistema valida se todos os campos foram preenchidos corretamente e se o formato do e-mail é válido.  
6. O sistema verifica se o e-mail informado já não está cadastrado.  
7. O sistema cria a conta do proprietário com o perfil **“Proprietário”**.  
8. O sistema autentica automaticamente o proprietário.  
9. O sistema redireciona o proprietário para a página de **Cadastro da Barbearia**.  

---

## FLUXO DE EXCEÇÃO
- **E1 — Campos obrigatórios ausentes:**  
  O sistema exibe mensagem de erro informando que todos os campos obrigatórios devem ser preenchidos antes de prosseguir.  

- **E2 — E-mail já existente:**  
  O sistema impede o cadastro e exibe a mensagem:  
  *“Este e-mail já está cadastrado. Tente outro endereço.”*  

- **E3 — Formato de e-mail inválido:**  
  O sistema exibe mensagem de erro informando que o formato do e-mail é inválido.  

- **E4 — Falha no salvamento:**  
  O sistema informa o erro e solicita que o proprietário tente novamente.  

---

## FLUXO ALTERNATIVO
  **A1 — Cadastro concluído e redirecionamento automático:**  
  1. Após o cadastro bem-sucedido, o sistema autentica o proprietário automaticamente.  
  2. O sistema cria a sessão de usuário.  
  3. O proprietário é redirecionado para o área de **Cadastro da Barbearia**.  

---

## REQUISITOS RELACIONADOS
- **RF01:** Cadastrar Proprietário  
- **RF02:** Cadastrar Barbearia  
- **RN01:** Validar Unicidade de E-mail  
- **RN11:** Controlar o Acesso de Cada Tipo de Usuário  
- **RNF03:** Implementar Segurança  
