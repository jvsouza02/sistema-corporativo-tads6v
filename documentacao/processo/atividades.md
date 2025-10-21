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
| **Saídas**   | Iteração |

### Tarefas principais

1. Convocar participantes necessários e preparar material de apoio (documentos, protótipos, minimundo).
2. Revisar cada demanda a ser analisada.
3. Definir/confirmar: responsável, prioridade (Baixa/Média/Alta/Crítica), iteração/posição no backlog e datas previstas.

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
Converter visão/escopo em requisitos claros, verificáveis e rastreáveis (Histórias de Usuário, REQ.xxx).

### Responsável
**[Analista de Req/Q](papeis.md#analista-de-reqq-analista-de-requisitos-e-qualidade)**.

### Artefatos

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[Documento de Visão](artefatos.md#1-documento-de-visão)**, Declaração de Escopo, Modelo de Domínio / Diagrama de Classes |
| **Saídas** | **[História de Usuário](artefatos.md#2-história-de-usuário)**, **[Dicionário de Dados](artefatos.md#3-dicionário-de-dados)**|

### Tarefas principais
1. Redigir Histórias de Usuário no formato: *Como um / Eu desejo / Para que*.
2. Definir Critérios de Aceitação (Dado / Quando / Então) para cada história.
4. Atualizar dicionário de dados.
5. Estimar esforço inicial e indicar dependências para a EAP.
6. Revisar com AN e Desenvolvedor para checar clareza e viabilidade.

---

## 4. Codificar

### Objetivo
A atividade **Codificar** corresponde à implementação. Nessa fase, o time desenvolve e integra o **código-fonte**, transformando o **[História de Usuário](artefatos.md#2-história-de-usuário)** em um **[Produto Executável](artefatos.md#3-produto-software-executável)** de acordo com os padrões de qualidade. Além disso, o desenvolvedor é responsável pela criação e manutenção dos **testes unitários**, garantindo que cada módulo do código funcione de forma isolada e conforme especificado.


### Responsável
**[Desenvolvedor](papeis.md#desenvolvedor)**.

### Artefatos

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[História de Usuário](artefatos.md#2-história-de-usuário)** com Critérios de Aceitação, Requisitos e Diagramas, **[Dicionário de Dados](artefatos.md#3-dicionário-de-dados)**|
| **Saídas** | **[Produto Executável](artefatos.md#3-produto-software-executável)**, Código-fonte, Testes Unitários. |

### Tarefas Principais
1. **Planejamento Técnico:** Definir a arquitetura de baixo nível (classes, funções, módulos).  
2. **Implementação:** Escrever o código de acordo com as histórias de usuário.  
3. **Integração:** Unir os módulos ao sistema e resolver dependências.  
5. **Elaboração de Testes Unitários:** Desenvolver testes automatizados para validar o comportamento esperado de classes, funções e métodos de forma isolada.
4. **Entrega do Produto:** Compilar e gerar o **[Produto Executável](artefatos.md#3-produto-software-executável)** para testes.

## 4. Revisar

### Objetivo
Verificar qualidade do código e aderência aos requisitos, garantindo que a entrega atenda padrões.

### Responsável
**[Gerente de Projeto](papeis.md#gerente-de-projeto)**.

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[História de Usuário](artefatos.md#2-história-de-usuário)** com Critérios de Aceitação, Documentação. |
| **Saídas** | Aprovação ou devolução com comentários,  observações/pendências documentadas.|

### Tarefas principais
1. Validar critérios de aceitação contra o comportamento implementado.
2. Aprovadores podem pedir melhoria, correções ou aceitar.
