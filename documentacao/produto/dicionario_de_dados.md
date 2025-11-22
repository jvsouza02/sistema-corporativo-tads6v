# Dicionário de Dados — Sistema de Agendamento e Gestão de Barbearias

### Finalidade
O Dicionário de Dados descreve detalhadamente as entidades implementadas no sistema atualmente.

---

# Descrição das Tabelas

## Usuários
Responsável por armazenar todas as contas do sistema, incluindo proprietários e barbeiros.

## Proprietários
Armazena os dados dos proprietários das barbearias. Cada proprietário está vinculado a um usuário do sistema.

## Barbearias
Representa as barbearias cadastradas no sistema. Cada barbearia pertence a um proprietário.

## Barbeiros
Profissionais que atuam dentro de uma barbearia. Cada barbeiro está vinculado a um usuário (para acesso ao sistema) e a uma barbearia específica.

## Atendimentos
Registra os atendimentos realizados pelos barbeiros. Cada atendimento pertence a um barbeiro e a uma barbearia.

---

## Usuários

| Campo | Nome lógico | Tipo | Obrigatório | Descrição | Restrições / Validações | Chave |
|-------|-------------|-------|--------------|------------|---------------------------|--------|
| `id` | ID do usuário | bigint (auto increment) | Sim | Identificador único | PK | PK |
| `name` | Nome do usuário | varchar(255) | Sim | Nome cadastrado do usuário | Não vazio | — |
| `email` | E-mail | varchar(255) | Sim | E-mail utilizado para login | Único | Índice único |
| `email_verified_at` | Data de verificação | timestamp | Não | Indica se o e-mail foi verificado | — | — |
| `password` | Senha (hash) | varchar(255) | Sim | Hash da senha do usuário | — | — |
| `role` | Perfil | varchar(255) | Sim | Perfil do usuário (default: `proprietario`) | Valor padrão | — |
| `remember_token` | Token de sessão | varchar(100) | Não | Token para sessão persistente | — | — |
| `created_at` | Criado em | timestamp | Sim | Data de criação | — | — |
| `updated_at` | Atualizado em | timestamp | Sim | Data da última atualização | — | — |

---

## Tabela: `proprietarios`

| Campo | Nome lógico | Tipo | Obrigatório | Descrição | Restrições | Chave |
|--------|-------------|--------|-----------|-----------|-------------|--------|
| `id_proprietario` | ID do proprietário | uuid | Sim | Identificador único | PK | PK |
| `nome` | Nome | varchar(255) | Sim | Nome do proprietário | — | — |
| `user_id` | Usuário associado | bigint | Sim | Referência ao usuário do sistema | FK → `users.id` | FK |
| `created_at` | Criado em | timestamp | Sim | Data de criação | — | — |
| `updated_at` | Atualizado em | timestamp | Sim | Última atualização | — | — |

---

## Barbearias

| Campo | Nome lógico | Tipo | Obrigatório | Descrição | Restrições | Chave |
|--------|-------------|--------|-----------|-------------|-------------|--------|
| `id_barbearia` | ID da barbearia | uuid | Sim | Identificador único | PK | PK |
| `nome` | Nome | varchar(100) | Sim | Nome da barbearia | — | — |
| `email` | E-mail | varchar(255) | Sim | E-mail da barbearia | Único | Índice único |
| `endereco` | Endereço | varchar(150) | Sim | Endereço completo | — | — |
| `telefone` | Telefone | varchar(15) | Sim | Telefone de contato | — | — |
| `horario_abertura` | Horário abertura | time | Sim | Horário de abertura | — | — |
| `horario_fechamento` | Horário fechamento | time | Sim | Horário de fechamento | — | — |
| `descricao` | Descrição | text | Sim | Texto descritivo da barbearia | — | — |
| `foto_url` | Foto | varchar(255) | Não | URL da foto/logo | — | — |
| `id_proprietario` | Proprietário | uuid | Sim | FK para o proprietário | FK → `proprietarios.id_proprietario` | FK |
| `created_at` | Criado em | timestamp | Sim | Data de criação | — | — |
| `updated_at` | Atualizado em | timestamp | Sim | Última atualização | — | — |

---

## Barbeiros

| Campo | Nome lógico | Tipo | Obrigatório | Descrição | Restrições | Chave |
|--------|-------------|--------|-----------|-------------|-------------|--------|
| `id_barbeiro` | ID do barbeiro | uuid | Sim | Identificador único | PK | PK |
| `nome` | Nome | varchar(255) | Sim | Nome do barbeiro | — | — |
| `horario_inicio` | Horário de início | time | Sim | Começo do expediente | — | — |
| `horario_fim` | Horário de fim | time | Sim | Final do expediente | — | — |
| `user_id` | Usuário associado | bigint | Sim | Conta do barbeiro | FK → `users.id` | FK |
| `id_barbearia` | Barbearia | uuid | Sim | Barbearia onde trabalha | FK → `barbearias.id_barbearia` | FK |
| `created_at` | Criado em | timestamp | Sim | Data de criação | — | — |
| `updated_at` | Atualizado em | timestamp | Sim | Última atualização | — | — |

---

## Atendimentos

| Campo | Nome lógico | Tipo | Obrigatório | Descrição | Restrições | Chave |
|--------|-------------|--------|-----------|-------------|-------------|--------|
| `id_atendimento` | ID do atendimento | uuid | Sim | Identificador único | PK | PK |
| `servico` | Serviço | varchar(255) | Sim | Nome do serviço realizado | — | — |
| `produto` | Produto | varchar(255) | Não | Produto usado (quando houver) | — | — |
| `comentario` | Comentário | text | Não | Observações do atendimento | — | — |
| `valor_total` | Valor total | double | Sim | Valor cobrado | >= 0 | — |
| `id_barbearia` | Barbearia | uuid | Sim | FK da barbearia | FK → `barbearias.id_barbearia` | FK |
| `id_barbeiro` | Barbeiro | uuid | Sim | FK do barbeiro | FK → `barbeiros.id_barbeiro` | FK |
| `created_at` | Criado em | timestamp | Sim | Registro criado | — | — |
| `updated_at` | Atualizado em | timestamp | Sim | Última atualização | — | — |
