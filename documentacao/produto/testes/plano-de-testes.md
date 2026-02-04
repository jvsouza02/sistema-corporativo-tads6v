# Plano de Testes

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas.</br>
**Projeto:** Sistema de Gestão de Barbearias.

## 1. Introdução

Este documento apresenta o Plano de Testes do Sistema de Agendamento e Gestão de Barbearias. Seu objetivo é explicar, de forma clara, como os testes foram planejados e executados para garantir que o sistema funcione corretamente antes da entrega final.

O plano descreve o que será testado, os objetivos dos testes, como eles serão realizados, as etapas do processo, as entregas previstas e os critérios para iniciar e encerrar os testes.

Este documento serve como um guia para a equipe de desenvolvimento e testes, ajudando a garantir que todas as funcionalidades funcionem como esperado, que as regras de negócio e o banco de dados estejam integrados corretamente e que o sistema ofereça uma boa experiência ao usuário.

## 2. Escopo de Testes

### Módulos e funcionalidades a serem testados (escopo geral):

1.  **Atendimentos:** registro, edição, exclusão, cálculo automático de valores, validação de valores negativos e manutenção do histórico.
2.  **Autenticação e acesso:** login de barbeiros com validação de e-mail, senha e mensagens de erro.
3.  **Agendamentos:** criação, bloqueio de horários ocupados e cancelamento de agendamentos.
4.  **Serviços:** cadastro, validação de valores, associação de produtos e preservação de valores em atendimentos antigos.
5.  **Produtos e estoque:** cadastro, validação de preços, controle de estoque e cálculo de valores no atendimento.

### Fora do escopo:

1.  Testes de desempenho.
2.  Testes de usabilidade.
3.  Testes de segurança avançada

## 3. Objetivos de Testes

O objetivo dos testes no Sistema de Agendamento e Gestão de Barbearias foi garantir que o sistema funcione corretamente e sem erros. Os testes unitários foram usados para verificar partes específicas do sistema, como os cálculos dos valores dos atendimentos, a validação de dados, o bloqueio de valores inválidos e o funcionamento do login. Esses testes ajudam a garantir que cada regra do sistema funcione corretamente antes de ser usada junto com outras partes.

Os testes de integração foram usados para verificar se todas as partes do sistema funcionam bem juntas, como agendamentos, atendimentos, autenticação e salvamento de dados no banco. Além disso, os testes exploratórios ajudaram a observar o sistema em situações reais de uso, permitindo encontrar possíveis falhas, verificar mudanças de valores e garantir que os atendimentos já finalizados não tenham seus dados alterados.

## 4. Abordagem de Testes

### Metodologia

Os testes foram organizados em  **três frentes principais** :

1.  **Regras de Negócio (Testes Unitários):**
    Focados na validação da lógica interna do sistema, testando funções e métodos de forma isolada, sem dependência do banco de dados.
2.  **Fluxo de Dados (Testes de Integração):**
    Focados em testar o funcionamento completo das funcionalidades, envolvendo Controllers, rotas, autenticação e banco de dados.
3.  **Uso Real do Sistema (Testes Exploratório):**
    Focados em simular o uso do sistema no dia a dia, explorando cenários não totalmente previstos nos testes automatizados.

### Tipos de Testes

#### Testes Unitários (Caixa Branca)

Utilizados para validar a lógica interna das classes, sem acesso ao banco de dados. De acordo com a codificação, esses testes verificaram:

1.  Cálculo do valor total do atendimento, incluindo valores zero, positivos e decimais.
2.  Precisão dos cálculos com casas decimais.
3.  Bloqueio de valores negativos no atendimento.
4.  Atualização do valor total ao editar um atendimento.
5.  Verificação se o atendimento possui serviço informado.
6.  Validações relacionadas ao login, como formato de e-mail e tamanho mínimo da senha.
7.  Retorno correto de mensagens de erro no processo de autenticação.

#### Testes de Integração (Caixa Cinza/Preta)

Utilizados para validar o funcionamento completo das funcionalidades através das rotas do sistema, com acesso ao banco de dados. Conforme a codificação, esses testes validaram:

1.  Criação de agendamentos com dados válidos.
2.  Bloqueio de agendamentos em horários já ocupados.
3.  Cancelamento de agendamentos existentes.
4.  Registro de atendimentos com valores válidos.
5.  Bloqueio do registro de atendimentos com valores negativos.
6.  Exclusão de atendimentos existentes.
7.  Persistência correta dos dados no banco.
8.  Relação entre barbearia, barbeiro, cliente, atendimento e agendamento.

#### Testes Exploratório

Baseados nos cenários definidos no documento de testes, foram utilizados para avaliar o comportamento do sistema em situações próximas ao uso real, com foco em:

1.  Verificação de comportamentos relacionados a valores inválidos.
2.  Impacto de alterações de preços em serviços.
3.  Garantia de que os atendimentos já finalizados mantenham seus valores.
4.  Análise de regras de negócio que não são totalmente cobertas pelos testes automatizados.

### Ferramentas utilizadas:

1.  **PHPUnit (Laravel):**
    Usado para criar e executar os testes unitários e de integração do sistema.
2.  **Laravel Testing Framework:**
    Usado para simular ações do usuário, como requisições às rotas e login durante os testes.
3.  **Banco de Dados de Teste (SQLite):**
    Usado nos testes de integração para armazenar os dados temporariamente, sem afetar o banco real.
4.  **Coverage (Cobertura de Testes):**
    Usado para verificar quais partes do código foram testadas, ajudando a identificar trechos que ainda precisam de testes.

## 5. Cronograma de Testes

| Fase                                                      | Data de Início | Data de Término |
| --------------------------------------------------------- | -------------- | --------------- |
| Planejamento                                              | 29/10/2025     | 02/11/2025      |
| Criação dos cenários de teste unitários (11 no total)     | 06/11/2025     | 06/11/2025      |
| Implementação de testes unitários                         | 08/11/2025     | 09/11/2025      |
| Criação dos cenários de Integração (6 no total)           | 07/12/2025     | 07/12/2025      |
| Implementação de testes de integração                     | 04/12/2025     | 05/12/2025      |
| Criação dos cenários exploratórios (8 no total)           | 22/01/2026     | 22/01/2026      |
| Implementação de testes exploratórios                     | 31/01/2026     | 02/02/2026      |

## 6. Entregas

1.  **Plano de testes atualizado:**
    Documento descrevendo a estratégia, abordagem e tipos de testes aplicados no sistema.
2.  **Documento de cenários de teste detalhados:**
    Contendo os cenários de testes unitários, de integração e exploratórios, com objetivos, dados de entrada e resultados esperados.
3.  **Codificação dos testes automatizados:**
    Implementação dos testes unitários e de integração utilizando PHPUnit e o framework de testes do Laravel, conforme os cenários definidos.
4.  **Relatórios de execução dos testes:**
    Resultados da execução dos testes, incluindo informações de sucesso, falhas e relatório de cobertura de testes.

## 7. Critérios de Entrada e Saída

### Critérios de Entrada (para iniciar os testes)

1.  O sistema deve estar funcionando corretamente, sem erros críticos.
2.  As funcionalidades principais devem estar implementadas.
3.  O ambiente de testes deve estar configurado no Laravel.
4.  O banco de dados de testes (SQLite) deve estar pronto para uso.
5.  Os cenários de testes devem estar definidos e documentados.

### Critérios de Saída (para encerrar os testes)

1.  Todos os testes devem ser executados com sucesso.
2.  Nenhum erro crítico deve permanecer sem correção.
3.  Os principais fluxos do sistema devem funcionar corretamente do início ao fim.
4.  A cobertura de código deve estar em nível aceitável (exemplo: acima de 70%).
5.  Os resultados da execução dos testes devem estar registrados em relatório.
