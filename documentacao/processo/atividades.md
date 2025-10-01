# Atividades do Processo de Software

Este documento apresenta as etapas do processo de desenvolvimento, destacando os objetivos de cada atividade, seus responsáveis e os artefatos envolvidos.

---

## 1. Analisar Negócio

### Objetivo
A atividade **Analisar Negócio** é o ponto inicial do processo. Sua finalidade é **compreender a fundo o contexto**, identificar os **objetivos estratégicos** e levantar as **necessidades** do cliente ou mercado. Essa análise assegura que os esforços do projeto estejam alinhados ao valor esperado pelo negócio.

### Responsável
**[Analista de Negócio (AN)](papeis.md#analista-de-negócio-an)**.

### Artefatos

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | Solicitações de Clientes, demandas de mercado, estratégias de negócio. |
| **Saídas** | Escopo do Projeto Definido, Requisitos Iniciais, **[Documento de Visão](artefatos.md#1-documento-de-visão)**. |

### Tarefas Principais
1. **Levantamento de Necessidades:** Entrevistar *stakeholders* para coletar expectativas e metas.  
2. **Estudo de Viabilidade:** Avaliar aspectos técnicos e financeiros da proposta.  
3. **Definição de Escopo:** Delimitar o que está incluído e excluído do projeto.  
4. **Priorização Inicial:** Organizar os requisitos mais relevantes para o negócio.  
5. **Registro da Visão:** Elaborar o **[Documento de Visão](artefatos.md#1-documento-de-visão)** formalizando a análise.  

---

## 2. Especificar

### Objetivo
A atividade **Especificar** converte a visão de alto nível em **requisitos claros e verificáveis**. Busca detalhar cada funcionalidade em unidades compreensíveis para o time de desenvolvimento e validáveis em testes.

### Responsável
**[Analista de Req/Q](papeis.md#analista-de-reqq-analista-de-requisitos-e-qualidade)**.

### Artefatos

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[Documento de Visão](artefatos.md#1-documento-de-visão)**, Requisitos Gerais. |
| **Saídas** | **[História de Usuário](artefatos.md#2-história-de-usuário)**|

### Tarefas Principais
1. **Criação de Especificações:** Detalhar funcionalidades no **[História de Usuário](artefatos.md#2-história-de-usuário)** no formato “Como... quero... para que...”.  
2. **Critérios de Aceitação:** Estabelecer condições que definem quando uma especificação está concluída.  
3. **Validação com a [Equipe](papeis.md#papeis):** Discutir requisitos com o **[Desenvolvedor](papeis.md#desenvolvedor)** para garantir clareza e viabilidade.  

---

## 3. Codificar

### Objetivo
A atividade **Codificar** corresponde à implementação. Nessa fase, o time desenvolve e integra o **código-fonte**, transformando o **[História de Usuário](artefatos.md#2-história-de-usuário)** em um **[Produto Executável](artefatos.md#3-produto-software-executável)** de acordo com os padrões de qualidade.

### Responsável
**[Desenvolvedor](papeis.md#desenvolvedor)**.

### Artefatos

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[História de Usuário](artefatos.md#2-história-de-usuário)** com Critérios de Aceitação. |
| **Saídas** | **[Produto Executável](artefatos.md#3-produto-software-executável)**, Código-fonte, Testes Unitários aprovados. |

### Tarefas Principais
1. **Planejamento Técnico:** Definir a arquitetura de baixo nível (classes, funções, módulos).  
2. **Implementação:** Escrever o código de acordo com as histórias de usuário.  
3. **Integração:** Unir os módulos ao sistema e resolver dependências.  
4. **Entrega do Produto:** Compilar e gerar o **[Produto Executável](artefatos.md#3-produto-software-executável)** para testes.  
