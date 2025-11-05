# Atividades do Processo de Software

Este documento apresenta as etapas do processo de desenvolvimento, destacando os objetivos de cada atividade, seus responsáveis e os artefatos envolvidos.

## 1. Planejamento de Demandas

### Objetivo

Detalhar e configurar novas demandas levantadas, decidindo prioridade, responsável, iteração, dependências e critérios mínimos necessários para que um item possa ser promovido de **Indefinido** para **Pronto**.

### Responsáveis

**[Gerente de Projeto (GP)](papeis.md#gerente-de-projeto-gp)** | **[Analista de Negócio (AN)](papeis.md#analista-de-negócio-an)**

### Artefatos

| Elemento     | Descrição                                                                                                                                                                   |
| :----------- | :-------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Entradas** | Solicitações de stakeholders, Documento de Visão (quando disponível), Produto.                                                                    |
| **Saídas**   | Iteração | EAP

### Tarefas principais

1. Convocar participantes necessários e preparar material de apoio (documentos, protótipos, minimundo).
2. Revisar cada demanda a ser analisada.
3. Definir/confirmar: responsável, prioridade (Baixa/Média/Alta/Crítica), iteração/posição no backlog e datas previstas.
4. Reajustar diagrama EAP

---

## 1. Analisar Negócio

### Objetivo
Entender o contexto do cliente, levantar o minimundo/domínio, identificar objetivos e delimitar o escopo inicial do projeto.

### Responsável
**[Analista de Negócio (AN)](papeis.md#analista-de-negócio-an)**.

### Artefatos

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | Solicitações de Clientes, demandas de mercado, estratégias de negócio. |
| **Saídas** | Declaração de Escopo, Requisitos Iniciais, **[Documento de Visão](artefatos.md#1-documento-de-visão)**. |

### Tarefas principais
1. Conduzir entrevistas com stakeholders (cliente, docentes).
2. Documentar o minimundo (modelo de domínio / diagrama de classes).
3. Identificar funcionalidades essenciais e restrições.
4. Escrever a Declaração de Escopo (contexto, objetivo, funções principais, performance/restrições).
5. Encaminhar artefatos para o Analista de Req/Q para especificação. 

---

## 3. Especificar

### Objetivo
Converter visão/escopo em requisitos claros, verificáveis e rastreáveis (Especificações, REQ.xxx).

### Responsável
**[Analista de Req/Q](papeis.md#analista-de-reqq-analista-de-requisitos-e-qualidade)**.

### Artefatos

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[Documento de Visão](artefatos.md#1-documento-de-visão)**, Declaração de Escopo, Modelo de Domínio / Diagrama de Classes |
| **Saídas** | **[Especificação](artefatos.md#2-especificação)**, **[Dicionário de Dados](artefatos.md#3-dicionário-de-dados)**|

### Tarefas principais
1. Identificar e registrar o **Escopo** de cada caso de uso, delimitando funcionalidades essenciais.  
2. Definir o **Propósito** de cada especificação, descrevendo o valor entregue ao usuário.  
3. Mapear os **Atores** envolvidos (principais e secundários/sistemas externos).  
4. Levantar e documentar **Pré-condições** e **Pós-condições** para execução do caso de uso.  
5. Descrever o **Fluxo Normal** de interação entre ator e sistema.  
6. Detalhar os **Fluxos de Exceção**, prevendo comportamentos alternativos e mensagens de erro.  
7. Relacionar os **Requisitos Funcionais e Não Funcionais** associados ao caso de uso.  
8. Validar a especificação junto ao Analista de Negócio e Desenvolvedor para garantir clareza e viabilidade.

---

## 4. Elaborar plano de testes

### Objetivo
Definir e documentar a estratégia, técnicas e indicadores que orientarão a execução dos testes do sistema, assegurando que todas as funcionalidades e requisitos especificados sejam devidamente validados. Essa atividade visa garantir a qualidade e a conformidade do produto com as expectativas do cliente.

### Responsável
**[Analista de Req/Q](papeis.md#analista-de-reqq-analista-de-requisitos-e-qualidade)**.

### Artefatos
| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[Especificação](artefatos.md#2-especificação)**, **[Dicionário de Dados](artefatos.md#3-dicionário-de-dados)** |
| **Saídas** | **[Plano de Testes](artefatos.md#5-plano-de-testes)**|

### Tarefas Principais
1. Descrever o propósito do plano e o que se pretende garantir com a execução dos testes.
2. Determinar os tipos de testes que serão aplicados (funcional, desempenho, segurança etc.) e como serão distribuídos ao longo do desenvolvimento.
3. Especificar se os testes serão manuais, automatizados, exploratórios, entre outros.
4. Escolher métricas que permitam avaliar a eficácia dos testes (como taxa de defeitos, tempo de execução, cobertura de código etc.).
5. Revisar o documento junto aos desenvolvedores e demais envolvidos para garantir que o escopo e os critérios estejam corretos.

---

## 5. Codificar

### Objetivo
A atividade **Codificar** corresponde à implementação. Nessa fase, o time desenvolve e integra o **código-fonte**, transformando a **[especificação](artefatos.md#2-especificação)** em um **[Produto Executável](artefatos.md#3-produto-software-executável)** de acordo com os padrões de qualidade. Além disso, o desenvolvedor é responsável pela criação e manutenção dos **testes unitários**, garantindo que cada módulo do código funcione de forma isolada e conforme especificado.


### Responsável
**[Desenvolvedor](papeis.md#desenvolvedor)**.

### Artefatos

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[Especificação](artefatos.md#2-especificação)** com Critérios de Aceitação, Requisitos e Diagramas, **[Dicionário de Dados](artefatos.md#3-dicionário-de-dados)**|
| **Saídas** | **[Produto Executável](artefatos.md#3-produto-software-executável)**, Código-fonte, Testes Unitários. |

### Tarefas Principais
1. **Planejamento Técnico:** Definir a arquitetura de baixo nível (classes, funções, módulos).  
2. **Implementação:** Escrever o código de acordo com as Especificações.  
3. **Integração:** Unir os módulos ao sistema e resolver dependências.  
5. **Elaboração de Testes Unitários:** Desenvolver testes automatizados para validar o comportamento esperado de classes, funções e métodos de forma isolada.
4. **Entrega do Produto:** Compilar e gerar o **[Produto Executável](artefatos.md#3-produto-software-executável)** para testes.

## 6. Revisar

### Objetivo
Verificar qualidade do código e aderência aos requisitos, garantindo que a entrega atenda padrões.

### Responsável
**[Gerente de Projeto](papeis.md#gerente-de-projeto)**.

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[Especificação](artefatos.md#2-especificação)**, Documentação, [Produto/Código](artefatos.md#4-produto-software-executável)|
| **Saídas** | Aprovação ou devolução com comentários,  observações/pendências documentadas.|

### Tarefas principais
1. Validar critérios de aceitação contra o comportamento implementado.
2. Aprovadores podem pedir melhoria, correções ou aceitar.
