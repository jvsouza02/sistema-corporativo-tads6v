# Definição de Padrões e Processo de Desenvolvimento de Software

## Status (colunas)

No nosso processo usamos estes status para gerir o trabalho. Cada status possui critérios claros de entrada e saída — **um item só pode ser movido para o próximo status quando os critérios do status atual estiverem atendidos**.

### 1. Indefinido

* **Descrição:** Itens levantados, mas ainda não analisados nem priorizados.
* **Quando usar:** Qualquer item que **não tenha** ao menos **data**, **responsável (atribuição)**, e **iteração** definidos deve ser criado/colocado na coluna *Indefinido*.

  > **Regra obrigatória:** se faltar **qualquer** um desses quatro elementos (data, atribuição, prioridade, iteração) o item DEVE permanecer em *Indefinido* até que o gerente de projeto o configure.
* **Critérios de saída (para ir a *Pronto*):**

  * Documento/descrição mínima do item criada.
  * Dono/responsável atribuído.
  * Data(s) inicial e final previstas ou iteração atribuída.

### 2. Pronto

* **Descrição:** Itens analisados e detalhados; prontos para iniciar desenvolvimento.
* **Critérios de entrada:**

  * Atendeu todos os requisitos de saída da fase *Indefinido*.
* **Critérios de saída (para ir a *Em Andamento*):**

  * Aprovação do Gerente de Projeto quando for necessário iniciar na iteração atual.

### 3. Em Andamento

* **Descrição:** Itens sendo implementados ou testados ativamente.
* **Critérios de entrada:** Itens que saíram de *Pronto* e tiveram início documentado (data/hora de início, branch/ambiente de desenvolvimento, etc).
* **Boas práticas durante esta fase:**

  * Commits frequentes e atrelados ao ID do item.

* **Critérios de saída (para ir a *Revisão*):**

  * Implementação concluída conforme critérios de aceitação.

### 4. Revisão

* **Descrição:** Verificação final — revisão de código e validação de requisitos.
* **Atividades típicas:**

  * Verificação de impacto em outras áreas/sistemas.

* **Critérios de saída (para ir a *Feito*):**

  * Aprovados os resultados de aceitação.
  * Documentação atualizada (se necessário).

### 5. Feito

* **Descrição:** Itens concluídos e aceitos (entregues).
* **Critérios de entrada:**

  * Validação final pelo gerente de projeto.
---

## Processo

### Papéis

* [Gerente de Projeto (GP)](papeis.md#gerente-de-projeto-gp)  
  Responsável por planejar, acompanhar e coordenar as atividades do projeto. Define prioridades, atribui responsáveis, gerencia prazos e comunica os papéis envolvidos. Também realiza revisões das entregas, validando critérios de aceitação e aprovando ou solicitando ajustes nos produtos desenvolvidos.

* [Analista de Negócio (AN)](papeis.md#analista-de-negócio-an)  
  Compreende o contexto e as necessidades do cliente, levantando informações de negócio e traduzindo-as em objetivos e funcionalidades do sistema. Produz o **Documento de Visão** e apoia a validação das entregas junto aos stakeholders.

* [Analista de Requisitos e Qualidade (Req/Q)](papeis.md#analista-de-reqq-analista-de-requisitos-e-qualidade)  
  Transforma os requisitos de negócio em especificações técnicas detalhadas, garantindo clareza e rastreabilidade. Define critérios de aceitação, elabora o **Plano de Testes** e os **Cenários de Teste**, assegurando a qualidade e a conformidade das entregas com os requisitos definidos.

* [Desenvolvedor](papeis.md#desenvolvedor)  
  Constrói e implementa as funcionalidades do sistema conforme as especificações. Escreve o código-fonte, realiza testes unitários e integra módulos, garantindo desempenho, manutenibilidade e aderência aos padrões de qualidade.


### Atividades

* [Planejamento de Demandas](atividades.md#1-planejamento-de-demandas)  
  Registrar, priorizar e configurar novas demandas levantadas, definindo responsáveis, iterações, dependências e critérios para que uma demanda seja considerada **Pronta**. Também atualiza o **Plano de Projeto** conforme o planejamento das iterações.

* [Analisar Negócio](atividades.md#2-analisar-negócio)  
  Entender o contexto do cliente, levantar o minimundo/domínio, identificar objetivos e delimitar o escopo inicial do projeto, gerando o **Documento de Visão** e o **Documento de Requisitos**.

* [Especificar](atividades.md#3-especificar)  
  Transformar os requisitos levantados e o escopo definido em especificações técnicas detalhadas e verificáveis, garantindo rastreabilidade entre requisitos e implementações.

* [Planejamento e Especificação de Testes](atividades.md#4-planejamento-e-especificação-de-testes)  
  Definir a estratégia, os tipos e os critérios de aceitação dos testes, além de elaborar o **Plano de Testes** e os **Cenários de Teste** que validam a conformidade do sistema com os requisitos definidos.

* [Codificar](atividades.md#5-codificar)  
  Implementar e integrar o código-fonte com base nas especificações, garantindo qualidade, cobertura de testes unitários e geração do **Produto Executável**.

* [Revisar](atividades.md#6-revisar)  
  Verificar a qualidade do código e a aderência aos requisitos, validando os critérios de aceitação e aprovando ou retornando o produto para ajustes.

---

## Artefatos

* [Documento de Visão](artefatos.md#1-documento-de-visao)  
  Descreve objetivos, público-alvo, escopo de alto nível, justificativa de negócio e principais funcionalidades do produto.

* [Documento de Requisitos](artefatos.md#2-documento-de-requisitos)  
  Registra requisitos funcionais, não funcionais e regras de negócio; inclui prioridades, dependências e histórico de alterações.

* [Documento de Especificação de Requisitos](artefatos.md#3-documento-de-especificacao-de-requisitos)  
  Detalha casos de uso, atores, fluxos (normais e de exceção) e diagramas que orientam implementação e testes.

* [Especificação (REQ##)](artefatos.md#4-especificacao)  
  Unidade de trabalho concisa e testável que descreve uma funcionalidade do ponto de vista do usuário, com pré/pós-condições, fluxo, exceções e critérios de aceitação.

* [Dicionário de Dados](artefatos.md#5-dicionario-de-dados)  
  Documenta entidades, atributos, tipos, exemplos e restrições (PK/FK/índices), garantindo consistência entre análise, desenvolvimento e testes.

* [Produto (Software Executável)](artefatos.md#6-produto)  
  Resultado da codificação e integração: o software funcional, compilado/empacotado e pronto para testes ou entrega.

* [Planejamento e Cenários de Teste](artefatos.md#7-planejamento-e-cenarios-de-teste)  
  Consolida a estratégia, técnicas, métricas e os cenários de teste (casos práticos) que verificam o atendimento dos requisitos e critérios de aceitação.

* [Plano de Projeto](artefatos.md#8-plano-de-projeto)  
  Define escopo detalhado, EAP, estimativas de esforço e custo, cronograma (Gantt) e marcos para acompanhamento e controle do projeto.



---

## Padrões Estabelecidos para o Desenvolvimento

### Padrão de Diretórios

Artefatos só podem ser criados dentro desta estrutura:

* `requisitos/` — Artefatos que detalham funcionalidades e qualidade (com diagramas, casos de uso e especificações).

  * `requisitos/requisitos-funcionais/`
  * `requisitos/requisitos-nao-funcionais/`
* `codificacao/` — Código fonte, scripts de build, instruções de deploy e demais artefatos de implementação.

### Padrão para criar os Artefatos de Requisitos

* **Cada artefato** de requisito deve representar uma funcionalidade específica.
* **Nomenclatura:** `REQ.` + identificação numérica de **3 dígitos** + `.md`

  * Ex.: `REQ.000.md`, `REQ.101.md`

* Organização: os arquivos devem ficar nos diretórios corretos (`requisitos-funcionais` ou `requisitos-nao-funcionais`) conforme sua natureza.
