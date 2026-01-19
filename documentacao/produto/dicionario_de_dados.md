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

## Agendamentos
Registra os agendamentos de serviços realizados pelos clientes. Cada agendamento está vinculado a um cliente e a uma barbearia.

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
| `id_atendimento` | ID do atendimento | uuid | Sim | Identificador único do atendimento | PK | PK |
| `id_barbearia` | Barbearia | uuid | Sim | Barbearia onde ocorreu o atendimento | FK → `barbearias.id_barbearia` | FK |
| `id_agendamento` | Agendamento | uuid | Não | Agendamento associado ao atendimento | FK → `agendamentos.id_agendamento` (onDelete: set null) | FK |
| `id_cliente` | Cliente | uuid | Não | Cliente atendido | FK → `clientes.id_cliente` | FK |
| `id_barbeiro` | Barbeiro | uuid | Sim | Barbeiro responsável pelo atendimento | FK → `barbeiros.id_barbeiro` | FK |
| `data_hora_inicio` | Início do atendimento | datetime | Sim | Data e hora de início do atendimento | Default: CURRENT_TIMESTAMP | — |
| `data_hora_fim` | Fim do atendimento | datetime | Não | Data e hora de término do atendimento | — | — |
| `valor_total` | Valor total | decimal(10,2) | Sim | Valor total cobrado no atendimento | Default: 0.00 | — |
| `status` | Status | varchar(255) | Sim | Situação do atendimento | Default: `concluido` | — |
| `observacao` | Observação | text | Não | Observações gerais do atendimento | — | — |
| `created_at` | Criado em | timestamp | Sim | Data de criação do registro | — | — |
| `updated_at` | Atualizado em | timestamp | Sim | Data da última atualização | — | — |

---

## Agendamentos

| Campo | Nome lógico | Tipo | Obrigatório | Descrição | Restrições | Chave |
|--------|-------------|--------|-----------|-------------|-------------|--------|
| `id_agendamento` | ID do agendamento | uuid | Sim | Identificador único do agendamento | PK | PK |
| `data_hora` | Data e hora | datetime | Sim | Data e hora do agendamento | — | — |
| `servico` | Serviço | varchar(255) | Sim | Serviço agendado pelo cliente | — | — |
| `status` | Status | enum | Sim | Situação do agendamento | Valores: `agendado`, `concluido`, `cancelado` (default: `agendado`) | — |
| `observacao` | Observação | text | Não | Observações adicionais do agendamento | — | — |
| `id_cliente` | Cliente | uuid | Sim | Cliente que realizou o agendamento | FK → `clientes.id_cliente` | FK |
| `id_barbearia` | Barbearia | uuid | Sim | Barbearia onde ocorrerá o atendimento | FK → `barbearias.id_barbearia` | FK |
| `id_barbeiro` | Barbeiro | uuid | Não | Barbeiro associado ao agendamento | FK → `barbeiros.id_barbeiro` (onDelete: set null) | FK |
| `created_at` | Criado em | timestamp | Sim | Data de criação do registro | — | — |
| `updated_at` | Atualizado em | timestamp | Sim | Data da última atualização | — | — |


