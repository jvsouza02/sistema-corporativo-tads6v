# Atividades do Processo de Software

Este documento apresenta as etapas do processo de desenvolvimento, destacando os objetivos de cada atividade, seus responsáveis e os artefatos envolvidos.

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

## 2. Gerenciamento do Escopo do Projeto

### Objetivo
Criar a Estrutura Analítica do Projeto (EAP) com base nos requisitos levantados, detalhando todas as entregas e subdivisões necessárias para o desenvolvimento completo do projeto.

### Responsável
**[Analista de Req/Q](papeis.md#analista-de-reqq-analista-de-requisitos-e-qualidade)**.

### Artefatos

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[Documento de Visão](artefatos.md#1-documento-de-visão)**, Declaração de Escopo, Minimundo / Modelo de Caso de Uso |
| **Saídas** | **[História de Usuário](artefatos.md#2-gerenciamento-do-escopo-do-projeto)**|

### Tarefas principais
1. Redigir Histórias de Usuário no formato: *Como um / Eu desejo / Para que*.
2. Definir Critérios de Aceitação (Dado / Quando / Então) para cada história.
4. Mapear requisitos para elementos do Diagrama de Classes (entidades/atributos/relacionamentos).
5. Estimar esforço inicial e indicar dependências para a EAP.
6. Revisar com AN e Desenvolvedor para checar clareza e viabilidade.

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
| **Saídas** | **[História de Usuário](artefatos.md#2-história-de-usuário)**|

### Tarefas principais
1. Redigir Histórias de Usuário no formato: *Como um / Eu desejo / Para que*.
2. Definir Critérios de Aceitação (Dado / Quando / Então) para cada história.
4. Mapear requisitos para elementos do Diagrama de Classes (entidades/atributos/relacionamentos).
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
| **Entradas** | **[História de Usuário](artefatos.md#2-história-de-usuário)** com Critérios de Aceitação, Requisitos e Diagramas |
| **Saídas** | **[Produto Executável](artefatos.md#3-produto-software-executável)**, Código-fonte, Testes Unitários aprovados. |

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
**[Desenvolvedor](papeis.md#desenvolvedor)**, **[Testador](papeis.md#testador)**.

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[História de Usuário](artefatos.md#2-história-de-usuário)** com Critérios de Aceitação, Documentação. |
| **Saídas** | Aprovação ou devolução com comentários,  observações/pendências documentadas.|

### Tarefas principais
1. Validar critérios de aceitação contra o comportamento implementado.
2. Aprovadores podem pedir melhoria, correções ou aceitar.
3. Se aceito, liberação para ambiente de testes.

## 5. Testar

### Objetivo
Validar que o produto cumpre os requisitos funcionais e não-funcionais e que os defeitos foram encontrados antes da entrega.

### Responsável
**[Testador](papeis.md#testador)**.

| Elemento | Descrição |
| :--- | :--- |
| **Entradas** | **[Plano de Testes](artefatos.md#4-plano-de-testes)**, Critérios de Aceitação, Código-fonte|
| **Saídas** |  Bugs/defeitos registrados (issues) com severidade e evidências, Verificação dos critérios de saída para mover item a **[Feito](README.md#fases)**|

### Tarefas Principais
1. **Planejamento de Testes:** Elaborar o [Plano de Testes](artefatos.md#4-plano-de-testes) definindo o escopo, tipos de teste, ferramentas e critérios de aceitação.  
2. **Testes Unitários:** Implementar e executar testes automatizados para cada unidade de código.  
4. **Testes de Aceitação:** Validar se o sistema atende às expectativas do cliente.  
5. **Registro de Defeitos:** Documentar não conformidades e acompanhar correções.
