# Histórias de Usuário: REQ004 - Cadastrar Proprietário

## 1. Narrativa (O Quê, Quem, Por Quê)

**COMO UM** *novo usuário que deseja gerenciar uma barbearia*,  
**EU DESEJO** *realizar meu cadastro pessoal na plataforma informando meus dados básicos*,  
**PARA QUE** *eu possa criar o perfil da minha barbearia e começar a utilizar o sistema de gestão*.

## 2. Critérios de Aceitação (Regras de Negócio e Cenários)

### Cenário 1: Cadastro de proprietário bem-sucedido

- **Dado** que eu sou um visitante na página de cadastro.
- **Quando** eu preencho todos os campos obrigatórios (nome, e-mail, senha, telefone e CPF) com dados válidos.
- **E** eu clico no botão "Cadastrar".
- **Então** meu perfil de usuário deve ser criado no sistema com o papel de "Proprietário".
- **E** eu devo ser automaticamente autenticado (logado).
- **E** eu devo ser redirecionado para a página de "Cadastro da Barbearia".

### Cenário 2: Tentativa de cadastro com e-mail já existente

- **Dado** que o e-mail `contato@minhabarbearia.com` já está cadastrado no sistema.
- **Quando** eu tento realizar um novo cadastro utilizando o e-mail `contato@minhabarbearia.com`.
- **E** eu clico no botão "Cadastrar".
- **Então** o sistema deve impedir a criação da conta.
- **E** eu devo ver uma mensagem de erro informando que "Este e-mail já está em uso".

### Cenário 3: Tentativa de cadastro com campo obrigatório em branco

- **Dado** que eu estou na página de cadastro.
- **Quando** eu preencho todos os campos, exceto o campo "Telefone".
- **E** eu clico no botão "Cadastrar".
- **Então** o sistema deve impedir o cadastro.
- **E** eu devo visualizar uma mensagem de erro junto ao campo "Telefone" indicando que ele é obrigatório.

### Cenário 4: Tentativa de cadastro com formato de CPF inválido

- **Dado** que eu estou na página de cadastro.
- **Quando** eu preencho o campo CPF com um valor inválido (ex: "12345").
- **E** eu clico no botão "Cadastrar".
- **Então** o sistema deve impedir o cadastro.
- **E** eu devo visualizar uma mensagem de erro junto ao campo CPF informando que "O formato do CPF é inválido".

