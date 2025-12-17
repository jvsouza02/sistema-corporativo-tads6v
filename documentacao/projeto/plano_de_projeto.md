# Plano de Projeto

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas  
**Projeto:** Sistema de Gestão de Barbearias  

## 1. Escopo do Projeto

Este projeto tem como objetivo principal desenvolver um sistema de gestão completo e acessível para barbearias de pequeno e médio porte. A plataforma web será desenvolvida para substituir métodos tradicionais de organização, como agendas físicas e planilhas, oferecendo uma solução digital integrada que permita o gerenciamento eficiente de clientes, agendamentos, serviços, equipe de trabalho e estoque de produtos. O sistema busca resolver problemas comuns enfrentados por esses estabelecimentos, como desorganização de horários, dificuldade no controle financeiro e falta de profissionalização no atendimento ao cliente.

O desenvolvimento do projeto seguirá boas práticas para garantir que o sistema seja estável, seguro e confiável, atendendo às necessidades reais dos usuários. Dessa forma, o produto final permitirá que proprietários acompanhem o desempenho das barbearias, que barbeiros registrem atendimentos de forma organizada e que clientes façam agendamentos de forma rápida e simples. O sistema também automatiza tarefas do dia a dia, como cálculo de valores de serviços e atualização de estoque, tornando o trabalho mais eficiente.

Além disso, o sistema tem o objetivo de modernizar as barbearias, oferecendo uma ferramenta digital que centraliza todas as informações em um só lugar e ajuda os proprietários na tomada de decisões. Com funções para cadastrar e gerenciar barbeiros, serviços e produtos, acompanhar histórico de atendimentos e gerar relatórios, o projeto busca tornar a administração mais rápida, organizada e eficiente, melhorando a experiência dos clientes e a operação do negócio.

### 1.1 Objetivo

O objetivo do projeto é desenvolver uma plataforma web intuitiva e funcional que auxilie barbearias de pequeno e médio porte na organização e controle de suas atividades, permitindo o gerenciamento centralizado de clientes, serviços, agendamentos, equipe e estoque de produtos, fornecendo ferramentas para acompanhamento do desempenho do negócio, registro de atendimentos, controle financeiro e geração de relatórios, tornando a administração mais rápida, organizada e eficiente, ao mesmo tempo em que melhora a experiência dos clientes e a produtividade dos profissionais.

### 1.2 Entregáveis

Os principais produtos e resultados que serão gerados ao longo do projeto incluem:

1.  **Plano de Projeto:** documento que descreve o planejamento geral do projeto, incluindo cronograma, estimativas de custo, escopo, equipe e metodologia adotada.
2.  **Documento de Visão:** apresenta uma descrição geral do sistema, seus objetivos, público-alvo e justificativa de negócio.
3.  **Documento de Requisitos:** lista detalhada das funcionalidades, restrições e regras de negócio do sistema.
4.  **Documento de Especificação de Requisitos:** detalha tecnicamente os casos de uso, atores, fluxos de interação, diagramas e especificações detalhadas de requisitos.
5.  **Especificações Técnicas:** informações técnicas sobre a arquitetura, diagramas de classe, banco de dados e estrutura de funcionamento do sistema.
6.  **Dicionário de Dados:** descrição de todas as entidades, atributos e relacionamentos utilizados no sistema, incluindo tipo, formato e restrições.
7.  **Plano de Testes:** define estratégias, técnicas e métricas para validar as funcionalidades e garantir que os requisitos sejam atendidos.
8.  **Cenários de Teste:** casos práticos detalhados de validação, com condições, ações e resultados esperados.
9.  **Código-Fonte:** todo o código desenvolvido, documentado e acompanhado de instruções de implantação.
10. **Sistema Pronto:** versão funcional do software, testada e pronta para uso em ambiente de produção ou teste.
11. **Relatórios de Teste:** resultados detalhados dos testes executados, evidenciando conformidade ou falhas.
12. **Relatório Final:** resumo de todas as etapas do projeto, resultados obtidos, dificuldades enfrentadas e lições aprendidas.

### 1.3 Fora do Escopo

1.  **Não vamos fazer sistema de pagamento** – o sistema não vai processar pagamentos com cartão ou outras formas.
2.  **Não vamos criar aplicativo para celular** – o sistema vai funcionar pelo navegador do celular e computador.
3.  **Não vai ter login por redes sociais** – os usuários vão fazer cadastro direto no sistema.

## 2. Gerenciamento de Riscos

**Tabela 1:** Avaliar e tratar incertezas e ameaças

| ID   | Risco Identificado                                       | Probabilidade | Impacto | Prevenção                         | Plano de Ação                           |
| :--- | :------------------------------------------------------- | :------------ | :------ | :-------------------------------- | :-------------------------------------- |
| GR01 | Usuários terem dificuldade em usar o sistema no início   | Alta          | Médio   | Orientação básica e telas simples | Apoio inicial e adaptação gradual ao uso |
| GR02 | Clientes cadastrados com informações incompletas         | Média         | Médio   | Solicitar dados obrigatórios no cadastro | Atualizar os dados manualmente       |
| GR03 | Agendamentos feitos para horários já ocupados            | Baixa         | Médio   | Verificação de horários disponíveis | Reagendar o atendimento e avisar o cliente |
| GR04 | Agendamento marcado para horário passado               | Baixa         | Baixo   | Bloquear datas anteriores         | Solicitar novo agendamento              |
| GR05 | Atendimento registrado sem serviço informado             | Baixa         | Médio   | Exigir escolha do serviço         | Corrigir o atendimento registrado       |
| GR06 | Valor do atendimento informado incorretamente           | Média         | Médio   | Conferência do valor antes de salvar | Ajustar o valor após o registro       |
| GR07 | Produto utilizado não registrado no atendimento          | Média         | Alto    | Orientar registro correto dos produtos | Ajustar manualmente o estoque        |
| GR08 | Estoque ficar incorreto por erro de registro             | Média         | Alto    | Conferência periódica do estoque  | Correção manual das quantidades         |
| GR09 | Produto acabar sem aviso prévio                          | Baixa         | Médio   | Definir quantidade mínima         | Reposição do produto no estoque         |
| GR10 | Exclusão acidental de atendimentos ou cadastros          | Baixa         | Médio   | Confirmação antes de excluir      | Recriar o registro excluído             |
| GR11 | Usuário acessar área que não deveria                     | Baixa         | Alto    | Controle de acesso por tipo de usuário | Bloquear acesso e revisar permissões |

## 3. EAP - Estrutura Analítica do Projeto

**Figura 1:** A seguir o EAP, organizando todas as entregas e tarefas de forma visual.

![Estrutura Analítica do Projeto](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/estrutura_analitica_do_projeto.png)

## 4.1. Definição Das Atividades Dos Pacotes De Trabalho

### 1. Iniciação e Planejamento do Projeto

*   **Objetivo**
    Compreender o contexto do negócio, definir escopo, riscos, público-alvo e alinhar as responsabilidades iniciais do projeto.
*   **Descrição**
    Esta etapa estabelece as bases do projeto, contemplando a análise do negócio, a definição de papéis, escopo e riscos, além da identificação do público-alvo e da necessidade de negócio. O foco é garantir alinhamento entre os envolvidos e direcionamento estratégico para as etapas seguintes.
*   **Atividades do EAP**
    *   1.1 - Análise de Negócio e Contexto do Sistema
    *   1.2 - Criação de Papéis e Responsabilidades
    *   1.3 - Definição de Escopo
    *   1.4 - Definição de Riscos
    *   1.5 - Determinando Público-Alvo e Necessidade de Negócio
*   **Responsáveis**
    Analista de Negócio (AN), Gerente de Projeto (GP).
*   **Artefatos**
    Documento de Visão; Documento de Requisitos; Plano de Projeto

### 2. Inicializar Gestão das Barbearias

*   **Objetivo**
    Levantar, especificar e implementar as funcionalidades iniciais relacionadas a atendimentos, barbearias e barbeiros.
*   **Descrição**
    Esta etapa contempla as funcionalidades centrais do sistema, envolvendo atendimento, barbearias e barbeiros. Os requisitos são levantados junto ao negócio, especificados de forma detalhada e posteriormente implementados, estabelecendo a estrutura básica de funcionamento do sistema.
*   **Atividades do EAP**
    *   2.1 - Levantamento de Requisitos I nas Funcionalidades de Atendimento, Barbearias e Barbeiros
    *   2.2 - Especificação de Requisitos I nas Funcionalidades de Atendimento, Barbearias e Barbeiros
    *   2.3 - Implementação das Funcionalidades de Barbearias
    *   2.4 - Implementação das Funcionalidades de Barbeiros
    *   2.5 - Implementação das Funcionalidades de Atendimento
*   **Responsáveis**
    Analista de Negócio (AN); Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV)
*   **Artefatos**
    Documento de Requisitos; Documento de Especificação de Requisitos; Dicionário de Dados; Produto

### 3. Cadastrar Proprietários do Sistema

*   **Objetivo**
    Permitir o cadastro, autenticação e acesso de proprietários ao sistema.
*   **Descrição**
    Esta etapa aborda as funcionalidades relacionadas ao cadastro de proprietários e aos mecanismos de autenticação e login. Os requisitos são analisados e especificados considerando regras de acesso e segurança, sendo posteriormente implementados e integrados ao sistema.
*   **Atividades do EAP**
    *   3.1 - Levantamento de Requisitos II nas Funcionalidades de Proprietários e Login
    *   3.2 - Especificação de Requisitos II nas Funcionalidades de Proprietários e Login
    *   3.3 - Implementação do Cadastro de Proprietários
    *   3.4 - Implementação de Autenticação e Login
*   **Responsáveis**
    Analista de Negócio (AN); Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV)
*   **Artefatos**
    Documento de Requisitos; Documento de Especificação de Requisitos; Plano de Testes; Produto

### 4. Listar Dados Operacionais

*   **Objetivo**
    Disponibilizar funcionalidades de consulta e listagem de dados operacionais do sistema.
*   **Descrição**
    Esta etapa contempla a inclusão de funcionalidades de listagem de barbearias e agendamentos, permitindo a visualização estruturada dos dados operacionais. Os requisitos são levantados, especificados e implementados, incluindo ajustes e refatorações necessárias nas funcionalidades existentes.
*   **Atividades do EAP**
    *   4.1 - Levantamento de Requisitos IV Adicionando Funcionalidades de Listagem de Barbearias e Agendamentos
    *   4.2 - Especificação de Requisitos IV Adicionando Funcionalidades de Listagem de Barbearias e Agendamentos
    *   4.3 - Implementação da Listagem de Barbearias
    *   4.4 - Implementação da Listagem de Agendamentos
    *   4.5 - Refatoração das Funcionalidades de Atendimento e Barbearia
*   **Responsáveis**
    Analista de Negócio (AN); Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV)
*   **Artefatos**
    Documento de Requisitos; Documento de Especificação de Requisitos; Produto

### 5. Controlar Barbeiros e Adicionar Métricas

*   **Objetivo**
    Aprimorar o gerenciamento de barbeiros e incluir métricas de atendimento e desempenho.
*   **Descrição**
    Esta etapa foca no reajuste dos requisitos e especificações relacionados ao gerenciamento de barbeiros, incluindo a transferência entre barbearias e a adição de métricas de atendimento e desempenho. As funcionalidades são implementadas e integradas ao sistema, com ajustes estruturais quando necessários.
*   **Atividades do EAP**
    *   5.1 - Reajuste de Requisitos de Listagem de Barbearias e Gerenciamento de Barbeiros, para Adicionar Transferência de Barbeiros e Métricas
    *   5.2 - Reajuste na Especificação de Requisitos em Listagem de Barbearias e Gerenciamento de Barbeiros, para Adicionar Transferência de Barbeiros e Métricas
    *   5.3 - Implementação da Transferência de Barbeiros entre Barbearias
    *   5.4 - Implementação das Métricas de Atendimento e Desempenho
    *   5.5 - Criando Plano de Testes
    *   5.6 - Refatoração da Funcionalidade de Barbearias
*   **Responsáveis**
    Analista de Negócio (AN); Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV)
*   **Artefatos**
    Documento de Requisitos; Documento de Especificação de Requisitos; Plano de Testes; Produto

### 6. Garantir Qualidade

*   **Objetivo**
    Assegurar que o sistema atenda aos requisitos definidos por meio de testes e validações.
*   **Descrição**
    Esta etapa é dedicada à garantia da qualidade do sistema, abrangendo a criação de cenários de teste, planejamento de testes, execução de testes unitários e validação das funcionalidades implementadas, assegurando conformidade com os requisitos especificados.
*   **Atividades do EAP**
    *   6.1 - Criação de Cenários de Teste para as Funcionalidades de Atendimento, Barbeiros, Login e Autenticação
    *   6.2 - Criação de Gráfico de Gantt e Plano de Projeto
    *   6.3 - Implementação de Testes Unitários nas Funcionalidades de Atendimento, Barbeiros e Login e Autenticação
    *   6.4 - Implementação de Testes Unitários nas Funcionalidades de Barbearias
    *   6.5 - Implementação de Testes Unitários nas Funcionalidades de Barbeiros
    *   6.6 - Implementação de Testes Unitários na Funcionalidade de Atendimento
*   **Responsáveis**
    Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV)
*   **Artefatos**
    Plano de Testes; Cenários de Teste; Plano de Projeto; Produto

### 7. Modelar Serviços e Ajustar Experiência de Usuário

*   **Objetivo**
    Implementar serviços e melhorar a experiência do usuário.
*   **Descrição**
    Esta etapa contempla a modelagem e implementação das funcionalidades de gerenciamento de serviços e histórico de atendimentos, bem como ajustes na interface e na experiência do usuário. Os requisitos são analisados, especificados, implementados e integrados ao sistema, garantindo usabilidade e consistência.
*   **Atividades do EAP**
    *   7.1 - Levantamento de Requisitos VI para Funcionalidade de Gerenciamento de Serviços, e um Novo Requisito Relacionado ao Atendimento
    *   7.2 - Especificação de Requisitos VI para Funcionalidade de Gerenciamento de Serviços, e um Novo Requisito Relacionado ao Atendimento
    *   7.3 - Implementação do Gerenciamento de Serviços
    *   7.4 - Implementação do Histórico de Atendimentos
    *   7.5 - Ajustes na Interface e Experiência do Usuário
    *   7.6 - Reajustando Gráfico de Gantt e Plano de Projeto
*   **Responsáveis**
    Analista de Negócio (AN); Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV)
*   **Artefatos**
    Documento de Requisitos; Documento de Especificação de Requisitos; Plano de Projeto; Produto

### 8. Adicionar Funcionalidades de Operação

*   **Objetivo**
    Expandir o sistema com funcionalidades operacionais de clientes, agendamento e produtos e estoque.
*   **Descrição**
    Esta etapa contempla funcionalidades de clientes, agendamento e produtos e estoque. Os requisitos são analisados, especificados, implementados e revisados, garantindo a integração adequada com as funcionalidades existentes.
*   **Atividades do EAP**
    *   8.1 - Levantamento de Requisitos V nas Funcionalidades de Clientes, Agendamento e Produtos/Estoque
    *   8.2 - Especificação de Requisitos V nas Funcionalidades de Clientes, Agendamento e Produtos/Estoque
    *   8.3 - Implementação das Funcionalidades de Clientes
    *   8.4 - Implementação do Agendamento
    *   8.5 - Implementação de Gerenciamento de Produtos e Estoque
    *   8.6 - Implementação de Alerta de Estoque Baixo
    *   8.7 - Implementação de Histórico de Agendamentos
*   **Responsáveis**
    Analista de Negócio (AN); Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV)
*   **Artefatos**
    Documento de Requisitos; Documento de Especificação de Requisitos; Produto

## 5. Cronograma

**Tabela 2:** Cronograma de Apresentações

| Etapa | Descrição         | Data       |
| :---- | :---------------- | :--------- |
| 01    | Apresentação I    | 12/12/2025 |
| 02    | Apresentação II   | 17/12/2025 |
| 03    | Apresentação III  | 04/02/2025 |

**Tabela 3:** Cronograma de Entregas de Tarefas do Projeto de acordo com EAP.

| Etapa | Descrição                          | Início     | Término    | Responsável                                           |
| :---- | :--------------------------------- | :--------- | :--------- | :---------------------------------------------------- |
| 01    | Iniciação e Planejamento do Projeto | 08/10/2025 | 15/10/2025 | Analista de Negócio (AN), Gerente de Projeto (GP)     |
| 02    | Inicializar Gestão das Barbearias | 16/10/2025 | 22/10/2025 | Analista de Negócio (AN), Analista de Requisitos e Qualidade (REQ/QA), Desenvolvedor (DEV) |
| 03    | Cadastrar Proprietários do Sistema | 23/10/2025 | 29/10/2025 | Analista de Negócio (AN), Analista de Requisitos e Qualidade (REQ/QA), Desenvolvedor (DEV) |
| 04    | Listar Dados Operacionais          | 30/10/2025 | 05/11/2025 | Analista de Negócio (AN), Analista de Requisitos e Qualidade (REQ/QA), Desenvolvedor (DEV) |
| 05    | Controlar Barbeiros e Adicionar Métricas | 06/11/2025 | 12/11/2025 | Analista de Negócio (AN), Analista de Requisitos e Qualidade (REQ/QA), Desenvolvedor (DEV) |
| 06    | Garantir Qualidade                 | 21/11/2025 | 26/11/2025 | Analista de Requisitos e Qualidade (REQ/QA), Desenvolvedor (DEV) |
| 07    | Modelar Serviços e Ajustar Experiência de Usuário | 27/11/2025 | 03/12/2025 | Analista de Negócio (AN), Analista de Requisitos e Qualidade (REQ/QA), Desenvolvedor (DEV) |
| 08    | Adicionar Funcionalidades de Operação | 04/12/2025 | 10/12/2025 | Analista de Negócio (AN), Analista de Requisitos e Qualidade (REQ/QA), Desenvolvedor (DEV) |

## 6. Estimativas de Esforço e Custo

**Tabela 4:** Tabela de Custo da Equipe do Projeto

| Cargo                                | Quantidade Profissionais | Horas Totais | Salário por Hora (R$) | Custo Total por Hora da Área (R$) | Custo Total da Área (R$) |
| :----------------------------------- | :----------------------- | :----------- | :-------------------- | :---------------------------------- | :----------------------- |
| Gerente de Projeto (GP)              | 1                        | 60h          | 20,00                 | 20,00                               | 1.200,00                 |
| Analista de Negócio (AN)             | 2                        | 160h         | 10,00                 | 20,00                               | 3.200,00                 |
| Analista de Requisitos e Qualidade (REQ/QA) | 2                        | 180h         | 14,00                 | 28,00                               | 5040,00                  |
| Desenvolvedor (DEV)                  | 2                        | 250h         | 16,00                 | 32,00                               | 8.000,00                 |

**Tabela 5:** Estimativa de Esforço e Custo do Projeto com base na Estrutura Analítica do Projeto e na tabela de custo de equipe

| Atividade                              | Esforço (horas) | Custo/hora (R$) | Custo total (R$) | Horas por Responsável               | Responsável                                           |
| :------------------------------------- | :-------------- | :-------------- | :--------------- | :---------------------------------- | :---------------------------------------------------- |
| Iniciação e Planejamento do Projeto    | 60              | 30,00           | 1.800,00         | GP: 40h AN: 20h                     | Analista de Negócio (AN); Gerente de Projeto (GP)     |
| Inicializar Gestão das Barbearias      | 120             | 40,00           | 4.800,00         | AN: 40h REQ/QA: 40h DEV: 40h        | Analista de Negócio (AN); Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV) |
| Cadastrar Proprietários do Sistema     | 80              | 40,00           | 3.200,00         | AN: 30h REQ/QA: 20h DEV: 30h        | Analista de Negócio (AN); Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV) |
| Listar Dados Operacionais              | 70              | 40,00           | 2.800,00         | AN: 20h REQ/QA: 20h DEV: 30h        | Analista de Negócio (AN); Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV) |
| Controlar Barbeiros e Adicionar Métricas | 90              | 40,00           | 3.600,00         | AN: 25h REQ/QA: 30h DEV: 35h        | Analista de Negócio (AN); Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV) |
| Garantir Qualidade                     | 60              | 30,00           | 1.800,00         | REQ/QA: 40h DEV: 20h                | Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV) |
| Modelar Serviços e Ajustar Experiência do Usuário | 70              | 40,00           | 2.800,00         | AN: 25h REQ/QA: 20h DEV: 25h        | Analista de Negócio (AN); Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV) |
| Adicionar Funcionalidades de Operação  | 100             | 40,00           | 4.000,00         | AN: 20h REQ/QA: 10h DEV: 70h        | Analista de Negócio (AN); Analista de Requisitos e Qualidade (REQ/QA); Desenvolvedor (DEV) |

**Tabela 6:** Totais do Projeto

| Indicador                   | Valor     |
| :-------------------------- | :-------- |
| Esforço total estimado      | 650 horas |
| Custo total estimado        | R$ 17.440,00 |
| Duração                     | 4 meses   |

## 7. Acompanhamento do Desempenho do Projeto

**Figura 2:** Compara o progresso ideal e o progresso real do projeto ao longo do tempo.

![Progresso Ideal x Real](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/grafico_ideal_x_real.png)

**Figura 3:** Apresenta o valor planejado, o valor agregado e o valor real do projeto.

![Valor Planejado, Agregado e Real](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/grafico_valor_planejado_valor_agregado_valor_real.png)

**Figura 4:** Demonstra o índice de desempenho de prazo (IDT) do projeto.

![Índice de Desempenho de Tempo](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/grafico_indice_desempenho_tempo.png)

**Figura 5:** Apresenta o índice de desempenho de custo (IDC) do projeto.

![Índice de Desempenho de Custo](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/grafico_indice_desempenho_custo.png)

## 8. Diagrama de Gantt

**Figura 6:** O diagrama de Gantt é uma ferramenta visual de gestão de projetos que exibe tarefas e cronogramas em uma linha do tempo.

![Diagrama de Gantt](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/diagrama_de_gantt.jpg)

## 9. Diagrama de Atividades do Projeto

**Figura 7:** A seguir o diagrama de atividade do projeto.

![Diagrama de Atividades do Projeto](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/diagrama_de_atividades_do_projeto.png)

## 10. Ferramentas Utilizadas

Durante o desenvolvimento do sistema foram utilizadas as seguintes ferramentas:

1.  **GitHub** - Repositório de código-fonte, versionamento e controle de versões.
2.  **GitHub Projects (Kanban)** - Quadro Kanban para gestão do backlog e organização das sprints.
3.  **Quadro Kanban (Board do repositório)** - Organização visual das tarefas por colunas
4.  **Lucidchart** - Ferramenta utilizada para a criação de diagramas conceituais, de arquitetura, de workflow e de classes.
5.  **VS Code (Visual Studio Code)** - Editor de código-fonte leve e poderoso.
