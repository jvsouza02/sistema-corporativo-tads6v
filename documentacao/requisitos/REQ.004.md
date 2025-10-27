# CDU004 — Cadastrar Proprietário

## ESCOPO

- Permitir que um novo usuário (visitante) realize seu auto-cadastro na plataforma.
- Validar os dados de entrada, incluindo campos obrigatórios, unicidade de e-mail e formato de CPF.

## PROPÓSITO

- Possibilitar que um novo usuário crie uma conta pessoal com o perfil de "Proprietário", permitindo que ele acesse o sistema e inicie o processo de cadastro da sua barbearia.

## ATOR

- **Ator principal:** Visitante (Novo Usuário)

## PRÉ-CONDIÇÕES

- O Visitante deve estar na página pública de "Cadastro".
- O Visitante não pode estar autenticado (logado) no sistema.

## PÓS-CONDIÇÕES

- **Em caso de sucesso (Cenário 1):**
    - Um novo usuário é criado no sistema com o perfil de "Proprietário".
    - O usuário é automaticamente autenticado (logado).
    - O usuário é redirecionado para a página de "Cadastro da Barbearia".
- **Em caso de falha (Cenários 2, 3, 4):**
    - O usuário não é criado.
    - O Visitante permanece na página de "Cadastro" e visualiza as mensagens de erro correspondentes.

## FLUXO NORMAL

1.  O [Visitante] acessa a página de "Cadastro".
2.  O [Visitante] preenche o formulário com seus dados pessoais (nome, e-mail, senha, telefone e CPF).
3.  O [Visitante] clica no botão "Cadastrar".
4.  O [Sistema] valida se todos os campos obrigatórios (nome, e-mail, senha, telefone, CPF) foram preenchidos.
5.  O [Sistema] valida se o formato dos dados é válido (ex: formato de e-mail e CPF).
6.  O [Sistema] valida se o e-mail informado já não existe no banco de dados.
7.  O [Sistema] cria a conta de usuário com o papel de "Proprietário".
8.  O [Sistema] autentica (loga) automaticamente o novo usuário.
9.  O [Sistema] redireciona o [Proprietário] para a página de "Cadastro da Barbearia".

## FLUXO DE EXCEÇÃO

- **Exceção 1: E-mail já existente (Cenário 2)**
    - [Fluxo Normal, Passo 6] Se o [Sistema] identificar que o e-mail informado (`contato@minhabarbearia.com`) já está em uso.
    - O [Sistema] impede a criação da conta.
    - O [Sistema] exibe a mensagem de erro: "Este e-mail já está em uso".

- **Exceção 2: Campo obrigatório em branco (Cenário 3)**
    - [Fluxo Normal, Passo 4] Se o [Visitante] clicar em "Cadastrar" sem preencher um campo obrigatório (ex: "Telefone").
    - O [Sistema] impede o cadastro.
    - O [Sistema] exibe uma mensagem de erro junto ao campo "Telefone" indicando que ele é obrigatório.

- **Exceção 3: Formato de CPF inválido (Cenário 4)**
    - [Fluxo Normal, Passo 5] Se o [Visitante] preencher o campo CPF com um valor em formato inválido (ex: "12345").
    - O [Sistema] impede o cadastro.
    - O [Sistema] exibe uma mensagem de erro junto ao campo CPF informando que "O formato do CPF é inválido".

## REQUISITOS RELACIONADOS
