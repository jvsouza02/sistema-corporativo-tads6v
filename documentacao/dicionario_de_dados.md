# Dicionário de Dados — Sistema de Agendamento e Gestão de Barbearias

### Finalidade
O Dicionário de Dados descreve detalhadamente as entidades implementadas no sistema atualmente.

---

## Proprietario

| Tabela.Campo               | Nome lógico        | Tipo (SGBD)    | Obrigatório | Descrição / Significado                                        | Exemplo                                | Restrições / Validações                     | Chave (PK/FK/Índice) |
| -------------------------- | ------------------ | -------------- | ----------: | -------------------------------------------------------------- | -------------------------------------- | ------------------------------------------- | -------------------- |
| `proprietarios.id`         | ID do proprietário | `uuid`         |         Sim | Identificador único do proprietário                            | `c1a2b3d4-5e6f-7a8b-9c0d-111213141516` | PK, não nulo                                | PK                   |
| `proprietarios.nome`       | Nome completo      | `varchar(255)` |         Sim | Nome do proprietário para identificação e contato              | `Carla Santos`                         | não vazio                                   | Índice               |
| `proprietarios.email`      | E-mail             | `varchar(255)` |         Sim | E-mail para login e comunicação                                | `carla.santos@example.com`             | único, formato email                        | Índice único         |
| `proprietarios.senha_hash` | Senha (hash)       | `varchar(255)` |         Sim | Hash da senha para autenticação (não armazenar em texto claro) | `(hash)`                               | armazenar apenas hash, comprimento adequado | —                    |
| `proprietarios.telefone`   | Telefone           | `varchar(20)`  |         Não | Telefone de contato                                            | `+55 11 9 8765-4321`                   | formato E.164 opcional                      | —                    |
| `proprietarios.cpf`        | CPF                | `varchar(14)`  | Condicional | CPF quando pessoa física                                       | `987.654.321-00`                       | formato CPF, único quando presente          | Índice               |
| `proprietarios.criado_em`  | Criado em          | `timestamp`    |         Sim | Data/hora de criação do registro                               | `2025-08-15T10:30:00Z`                 | —                                           | —                    |

---

## Barbearia

| Tabela.Campo                 | Nome lógico           | Tipo (SGBD)    | Obrigatório | Descrição / Significado                      | Exemplo                                                 | Restrições / Validações  | Chave (PK/FK/Índice) |
| ---------------------------- | --------------------- | -------------- | ----------: | -------------------------------------------- | ------------------------------------------------------- | ------------------------ | -------------------- |
| `barbearias.id`              | ID da barbearia       | `uuid`         |         Sim | Identificador único da unidade da barbearia  | `d4c3b2a1-0f9e-8d7c-6b5a-141312111009`                  | PK, não nulo             | PK                   |
| `barbearias.proprietario_id` | Proprietário (FK)     | `uuid`         |         Sim | Referência ao proprietário dono da barbearia | `c1a2b3d4-5e6f-7a8b-9c0d-111213141516`                  | FK -> `proprietarios.id` | FK                   |
| `barbearias.nome`            | Nome comercial        | `varchar(255)` |         Sim | Nome da unidade                              | `Barbearia Nova Estação`                                | não vazio                | Índice               |
| `barbearias.cnpj`            | CNPJ                  | `varchar(18)`  | Condicional | CNPJ quando aplicável                        | `12.345.678/0001-90`                                    | formato CNPJ             | Índice               |
| `barbearias.email`           | E-mail da barbearia   | `varchar(255)` |         Não | E-mail de contato da unidade                 | `contato@novaestacao.com`                               | formato email            | —                    |
| `barbearias.telefone`        | Telefone da barbearia | `varchar(20)`  |         Não | Telefone de contato da unidade               | `+55 21 9 4444-5555`                                    | formato E.164 opcional   | —                    |
| `barbearias.endereco`        | Endereço completo     | `text`         |         Sim | Rua, número, bairro, cidade, estado, CEP     | `Av. Principal, 200, Centro, São Paulo - SP, 01000-000` | —                        | —                    |
| `barbearias.descricao`       | Descrição             | `text`         |         Não | Texto descritivo da barbearia                | `Ambiente moderno com atendimento personalizado.`       | —                        | —                    |
| `barbearias.foto_url`        | Foto / Logo           | `varchar(500)` |         Não | URL da imagem representativa                 | `https://cdn.exemplo.com/logo_nova_estacao.jpg`         | URL válida               | —                    |
| `barbearias.criado_em`       | Criado em             | `timestamp`    |         Sim | Data/hora de cadastro da barbearia           | `2025-07-01T08:00:00Z`                                  | —                        | —                    |

---

## Barbeiro

| Tabela.Campo              | Nome lógico         | Tipo (SGBD)     | Obrigatório | Descrição / Significado                               | Exemplo                                   | Restrições / Validações            | Chave (PK/FK/Índice) |
| ------------------------- | ------------------- | --------------- | ----------: | ----------------------------------------------------- | ----------------------------------------- | ---------------------------------- | -------------------- |
| `barbeiros.id`            | ID do barbeiro      | `uuid`          |         Sim | Identificador único do barbeiro                       | `a9b8c7d6-5e4f-3a2b-1c0d-192837465564`    | PK, não nulo                       | PK                   |
| `barbeiros.usuario_id`    | Usuário (FK)        | `uuid`          |         Não | Referência ao usuário associado (quando houver conta) | `b2c3d4e5-6f7a-8b9c-0d1e-212223242526`    | FK -> `usuarios.id` (se aplicável) | FK                   |
| `barbeiros.barbearia_id`  | Barbearia (FK)      | `uuid`          |         Sim | Barbearia onde o barbeiro atua                        | `d4c3b2a1-0f9e-8d7c-6b5a-141312111009`    | FK -> `barbearias.id`              | FK                   |
| `barbeiros.nome`          | Nome completo       | `varchar(255)`  |         Sim | Nome do profissional                                  | `Lucas Pereira`                           | não vazio                          | Índice               |
| `barbeiros.email`         | E-mail              | `varchar(255)`  |         Não | E-mail para contato/login (se houver)                 | `lucas.pereira@novaestacao.com`           | formato email                      | Índice               |
| `barbeiros.telefone`      | Telefone            | `varchar(20)`   |         Não | Telefone de contato                                   | `+55 31 9 3333-2222`                      | formato E.164 opcional             | —                    |
| `barbeiros.cargo`         | Cargo / Função      | `varchar(100)`  |         Não | Descrição do cargo/expertise                          | `Barbeiro Senior`                         | —                                  | —                    |
| `barbeiros.salario`       | Salário             | `numeric(10,2)` |         Não | Remuneração contratual (uso interno)                  | `2800.00`                                 | >= 0                               | —                    |
| `barbeiros.data_contrato` | Data de contratação | `date`          |         Não | Data de início do vínculo                             | `2023-11-15`                              | formato date                       | —                    |
| `barbeiros.foto_url`      | Foto do barbeiro    | `varchar(500)`  |         Não | URL da foto de perfil                                 | `https://cdn.exemplo.com/fotos/lucas.jpg` | URL válida                         | —                    |
| `barbeiros.ativo`         | Ativo               | `boolean`       |         Sim | Indica se o barbeiro está ativo na escala             | `true`                                    | —                                  | Índice               |

---

## Atendimento

| Tabela.Campo                  | Nome lógico       | Tipo (SGBD)     | Obrigatório | Descrição / Significado                         | Exemplo                                       | Restrições / Validações                | Chave (PK/FK/Índice) |
| ----------------------------- | ----------------- | --------------- | ----------: | ----------------------------------------------- | --------------------------------------------- | -------------------------------------- | -------------------- |
| `atendimentos.id`             | ID do atendimento | `uuid`          |         Sim | Identificador único do registro de atendimento  | `f1e2d3c4-b5a6-7980-1121-314151617181`        | PK, não nulo                           | PK                   |
| `atendimentos.agendamento_id` | Agendamento (FK)  | `uuid`          |         Não | Referência ao agendamento associado (se houver) | `e0f1d2c3-4b5a-6c7d-8e9f-101112131415`        | FK -> `agendamentos.id` (se aplicável) | FK                   |
| `atendimentos.barbeiro_id`    | Barbeiro (FK)     | `uuid`          |         Sim | Profissional que realizou o atendimento         | `a9b8c7d6-5e4f-3a2b-1c0d-192837465564`        | FK -> `barbeiros.id`                   | FK                   |
| `atendimentos.cliente_id`     | Cliente (FK)      | `uuid`          |         Sim | Cliente atendido (usuário)                      | `e5f6g7h8-9i0j-1k2l-3m4n-515253545556`        | FK -> `usuarios.id`                    | FK                   |
| `atendimentos.servico_id`     | Serviço (FK)      | `uuid`          |         Sim | Serviço executado no atendimento                | `c3d4e5f6-7a8b-9c0d-1e2f-161718192021`        | FK -> `servicos.id`                    | FK                   |
| `atendimentos.inicio`         | Início real       | `timestamp`     |         Não | Timestamp de início do atendimento              | `2025-09-10T14:00:00Z`                        | —                                      | —                    |
| `atendimentos.fim`            | Fim real          | `timestamp`     |         Não | Timestamp de término do atendimento             | `2025-09-10T14:45:00Z`                        | —                                      | —                    |
| `atendimentos.observacoes`    | Observações       | `text`          |         Não | Notas do barbeiro sobre o atendimento/cliente   | `Preferência por corte degradê nas laterais.` | —                                      | —                    |
| `atendimentos.valor_cobrado`  | Valor cobrado     | `numeric(10,2)` |         Não | Valor efetivamente cobrado no atendimento       | `55.00`                                       | >= 0                                   | —                    |
| `atendimentos.criado_em`      | Criado em         | `timestamp`     |         Sim | Data/hora de registro do atendimento no sistema | `2025-09-10T15:00:00Z`                        | —                                      | —                    |
