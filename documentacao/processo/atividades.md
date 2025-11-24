# Atividades do Processo de Software

Este documento apresenta as etapas do processo de desenvolvimento, destacando os objetivos de cada atividade, seus responsáveis e os artefatos envolvidos.

## 1. Planejamento de Demandas

### Objetivo

Registrar, priorizar e configurar novas demandas levantadas, definindo responsáveis, iterações, dependências e critérios para que uma demanda seja considerada **Pronta**. Também atualiza o plano de projeto conforme o planejamento das iterações.

### Responsáveis

**[Gerente de Projeto (GP)](papeis.md#gerente-de-projeto-gp)** | **[Analista de Negócio (AN)](papeis.md#analista-de-negócio-an)**

### Artefatos

| Elemento     | Descrição                                                                                                                                                                   |
| :----------- | :-------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Entradas** | Solicitações de stakeholders, Documento de Visão (quando disponível), Produto.                                                                    |
| **Saídas**   | Iteração, Manutenção do **[Plano de Projeto](artefatos.md#8-plano-de-projeto)** |

### Tarefas principais

1. Convocar participantes necessários e preparar material de apoio (documentos, protótipos, minimundo).
2. Revisar cada demanda a ser analisada.
3. Definir/confirmar: responsável, prioridade (Baixa/Média/Alta/Crítica), iteração/posição no backlog e datas previstas.
4. Atualizar o **Plano de Projeto** com as novas demandas e ajustes de cronograma.

---

## 2. Analisar Negócio

### Objetivo
Entender o contexto do cliente, levantar o minimundo/domínio, identificar objetivos e delimitar o escopo inicial do projeto.

### Responsável
**[Analista de Negócio (AN)](papeis.md#analista-de-negócio-an)**.

### Artefatos

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | Solicitações de Clientes, demandas de mercado, estratégias de negócio. |
| **Saídas** | **[Documento de Visão](artefatos.md#1-documento-de-visão)**, **[Documento de Requisitos](artefatos.md#2-documento-de-requisitos)** |

### Tarefas principais
1. Conduzir entrevistas com stakeholders (cliente, docentes).
2. Documentar o minimundo (modelo de domínio / diagrama de classes).
3. Identificar funcionalidades essenciais e restrições.
4. Delimitar o escopo inicial (contexto, objetivo, funções principais).
5. Encaminhar artefatos para o Analista de Req/Q para especificação. 

---

## 3. Especificar

### Objetivo
Transformar os requisitos levantados e o escopo definido em especificações técnicas detalhadas e verificáveis, garantindo rastreabilidade entre requisitos e implementações.

### Responsável
**[Analista de Req/Q](papeis.md#analista-de-reqq-analista-de-requisitos-e-qualidade)**.

### Artefatos

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[Documento de Visão](artefatos.md#1-documento-de-visão)**, **[Documento de Requisitos](artefatos.md#2-documento-de-requisitos)** |
| **Saídas** |  **[Documento de Especificação de Requisitos](artefatos.md#3-documento-de-especificação-de-requisitos)**, **[Especificação](artefatos.md#4-especificação)**, **[Dicionário de Dados](artefatos.md#5-dicionário-de-dados)**|

### Tarefas principais
1. Identificar e registrar o **Escopo** de cada caso de uso, delimitando funcionalidades essenciais.  
2. Definir o **Propósito** de cada especificação, descrevendo o valor entregue ao usuário.  
3. Mapear os **Atores** envolvidos (principais e secundários/sistemas externos).  
4. Levantar e documentar **Pré-condições** e **Pós-condições** para execução do caso de uso.  
5. Descrever o **Fluxo Normal** de interação entre ator e sistema.  
6. Detalhar os **Fluxos de Exceção**, prevendo comportamentos alternativos e mensagens de erro.  
7. Relacionar os **Requisitos Funcionais e Não Funcionais** associados ao caso de uso.  
8. Atualizar **dicionário de dados** com possíveis novos dados.
9. Validar a especificação junto ao Analista de Negócio e Desenvolvedor para garantir clareza e viabilidade.

---

## 4. Planejamento e Especificação de Testes

### Objetivo
Esta atividade tem como objetivo definir a estratégia e os elementos necessários para o processo de teste do sistema. Envolve a criação do Plano de Testes, que descreve o escopo, os objetivos, os critérios e os recursos necessários, e dos Cenários de Teste, que especificam as situações práticas a serem executadas para validar as funcionalidades implementadas e garantir a conformidade com os requisitos definidos.

### Responsável
**[Analista de Req/Q](papeis.md#analista-de-reqq-analista-de-requisitos-e-qualidade)**.

### Artefatos
| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[Especificação](artefatos.md#4-especificação)**, **[Dicionário de Dados](artefatos.md#5-dicionário-de-dados)** |
| **Saídas** | **[Plano de Testes](artefatos.md#7-plano-de-testes)**, **[Cenários de Teste](artefatos.md#9-cenários-de-teste)**|

### Tarefas Principais
1. Identificar os objetivos e o escopo dos testes.  
2. Definir os tipos e níveis de teste que serão aplicados.  
3. Especificar os recursos, ferramentas e ambientes necessários.  
4. Elaborar o Plano de Testes com a estratégia e critérios de aceitação.  
5. Definir os Cenários de Teste com base nos requisitos e funcionalidades do sistema. 

---

## 5. Codificar

### Objetivo
A atividade **Codificar** corresponde à implementação. Nessa fase, o time desenvolve e integra o **código-fonte**, transformando a **[especificação](artefatos.md#4-especificação)** em um **[Produto Executável](artefatos.md#6-produto-software-executável)** de acordo com os padrões de qualidade. Além disso, o desenvolvedor é responsável pela criação e manutenção dos **testes unitários**, garantindo que cada módulo do código funcione de forma isolada e conforme especificado.


### Responsável
**[Desenvolvedor](papeis.md#desenvolvedor)**.

### Artefatos

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[Especificação](artefatos.md#4-especificação)** com Critérios de Aceitação, Requisitos e Diagramas, **[Dicionário de Dados](artefatos.md#5-dicionário-de-dados)**|
| **Saídas** | **[Produto Executável](artefatos.md#6-produto-software-executável)**, Código-fonte, Testes Unitários. |

### Tarefas Principais
1. **Planejamento Técnico:** Definir a arquitetura de baixo nível (classes, funções, módulos).  
2. **Implementação:** Escrever o código de acordo com as Especificações.  
3. **Integração:** Unir os módulos ao sistema e resolver dependências.  
5. **Elaboração de Testes Unitários:** Desenvolver testes automatizados para validar o comportamento esperado de classes, funções e métodos de forma isolada.
4. **Entrega do Produto:** Compilar e gerar o **[Produto Executável](artefatos.md#6-produto-software-executável)** para testes.

## 6. Revisar

### Objetivo
Verificar qualidade do código e aderência aos requisitos, garantindo que a entrega atenda padrões.

### Responsável
**[Gerente de Projeto](papeis.md#gerente-de-projeto)**.

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[Especificação](artefatos.md#4-especificação)**, Documentação, **[Produto/Código](artefatos.md#6-produto-software-executável)**|
| **Saídas** | Aprovação ou devolução com comentários,  observações/pendências documentadas.|

### Tarefas principais
1. Validar critérios de aceitação contra o comportamento implementado.
2. Aprovadores podem pedir melhoria, correções ou aceitar.
