# CDU003 — Gerenciar Cabeleireiros

## ESCOPO

- Permitir o cadastro de novos profissionais (cabeleireiros).
- Permitir a edição dos dados cadastrais e horários de trabalho dos profissionais.
- Permitir a remoção (ou desativação) de profissionais que não possuam vínculos futuros.
- Apresentar a lista de todos os profissionais cadastrados.

## PROPÓSITO

- Manter o cadastro da equipe de profissionais atualizado, organizando quem está disponível para agendamentos e garantindo que a capacidade da barbearia esteja correta na plataforma.

## ATOR

- **Ator principal:** Proprietário da Barbearia
- **Ator secundário / sistema externo:** Sistema de Agendamento (é impactado pelas alterações de disponibilidade).

## PRÉ-CONDIÇÕES

- O Proprietário deve estar autenticado (logado) no sistema.
- O Proprietário deve ter permissões de acesso à área de "Gerenciar Profissionais".

## PÓS-CONDIÇÕES

- A lista de profissionais está atualizada no sistema (após cadastro, edição ou remoção).
- O Sistema de Agendamento reflete a nova disponibilidade (ou indisponibilidade) do profissional alterado para futuros agendamentos.

## FLUXO NORMAL

1.  O [Proprietário] acessa a funcionalidade "Gerenciar Profissionais".
2.  O [Sistema] exibe a lista de todos os profissionais atualmente cadastrados.
3.  O [Proprietário] seleciona uma das ações: "Cadastrar Novo Profissional", "Editar" (em um profissional existente) ou "Remover" (em um profissional existente).

**Fluxo 3a: Cadastrar Novo Profissional (Cenário 1)**
4.  O [Proprietário] preenche o formulário com os dados do novo profissional (ex: nome, horários de trabalho).
5.  O [Proprietário] clica em "Salvar".
6.  O [Sistema] valida os dados, salva o novo profissional.
7.  O [Sistema] exibe uma mensagem de sucesso e atualiza a lista de profissionais, exibindo o novo cadastro.

**Fluxo 3b: Editar Profissional Existente (Cenário 2)**
4.  O [Proprietário] localiza o profissional (ex: "Carlos Andrade") e clica em "Editar".
5.  O [Sistema] exibe os dados atuais do profissional.
6.  O [Proprietário] altera os dados desejados (ex: altera o horário de trabalho para incluir sábados).
7.  O [Proprietário] clica em "Salvar Alterações".
8.  O [Sistema] valida os dados, salva as alterações.
9.  O [Sistema] exibe uma mensagem de confirmação e atualiza a disponibilidade desse profissional no Sistema de Agendamento.

**Fluxo 3c: Remover Profissional (Cenário 4)**
4.  O [Proprietário] localiza o profissional (ex: "Jorge Martins") e clica em "Remover".
5.  O [Sistema] verifica se o profissional *não* possui agendamentos futuros.
6.  Sendo negativo (sem agendamentos), o [Sistema] exibe uma caixa de diálogo de confirmação.
7.  O [Proprietário] confirma a ação.
8.  O [Sistema] remove (ou desativa) o profissional.
9.  O [Sistema] exibe uma mensagem de sucesso e o profissional não aparece mais na lista de profissionais ativos nem como opção para novos agendamentos.

## FLUXO DE EXCEÇÃO

- **Exceção 1: Tentar salvar com dados obrigatórios ausentes.**
    - [Fluxo Normal, 3a.5 ou 3b.7] Se o Proprietário tentar salvar sem preencher campos obrigatórios (ex: Nome).
    - O [Sistema] exibe uma mensagem de validação indicando os campos pendentes e não salva o registro.

- **Exceção 2: Tentar remover profissional com agendamentos futuros (Cenário 3).**
    - [Fluxo Normal, 3c.5] Se o Proprietário tentar remover um profissional (ex: "Ana Souza") que possui agendamentos futuros confirmados.
    - O [Sistema] impede a remoção.
    - O [Sistema] exibe a mensagem de erro: "Não é possível remover profissionais com agendamentos futuros".

## REQUISITOS RELACIONADOS

- **RF002:** Cadastrar Barbearia
