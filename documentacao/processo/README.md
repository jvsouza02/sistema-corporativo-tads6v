# Definição de Padrões e Processo de Desenvolvimento de Software

## Fases (colunas)

No nosso processo usamos estas fases/colunas para gerir o trabalho. Cada fase possui critérios claros de entrada e saída — **um item só pode ser movido para a próxima fase quando os critérios da fase atual estiverem atendidos**.

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

* [Gerente de Projeto](papeis.md#gerente-de-projeto): definir e configurar tudo sobre as tarefas (atribuir responsáveis quando necessário, definir datas, prioridade e iteração), aprovar início de iterações e coordenar a comunicação entre papéis. O Gerente de Projeto é a autoridade para mover itens da coluna *Indefinido* para *Pronto* quando todos os requisitos formais estiverem atendidos, ou para recuar itens quando for necessário. Além disso ele também é responsável pelas revisões dos itens.
* [Analista de Negócio](papeis.md#analista-de-negocio)
  Responsável por compreender as necessidades do dono da barbearia e dos clientes, traduzindo-as em funcionalidades que agregam valor. Produz visão de negócio e valida entregas com o cliente.
* [Analista de Requisitos](papeis.md#analista-de-requisitos)
  Responsável por documentar e detalhar as necessidades, transformando-as em requisitos claros, critérios de aceitação e roteiros de testes.
* [Desenvolvedor](papeis.md#desenvolvedor)
  Responsável por construir e implementar o sistema, transformando os requisitos em funcionalidades práticas, escrevendo código, testes e mantendo a qualidade.

### Atividades

* [Reunião de Análise de Demanda](atividades.md#5-reuniao-de-analise-de-demanda): detalhar novas demandas levantadas, decidir prioridades iniciais, identificar dependências e definir os elementos mínimos necessários para que um item **saiba** se permanecerá em *Indefinido* ou seja promovido a *Pronto* (data, responsável, prioridade, iteração, critérios de aceitação mínimos).
* [Analisar Negócio](atividades.md#1-analisar-negocio)
  Identificar e compreender as necessidades da barbearia e de seus clientes; gerar o Documento de Visão.
* [Especificar](atividades.md#2-especificar-funcionalidades)
  Documentar requisitos funcionais e não-funcionais; escrever critérios de aceitação testáveis.
* [Codificar](atividades.md#3-codificar)
  Implementar funcionalidades seguindo padrões de código e cobertura de testes.
* [Revisar](atividades.md#4-revisar)
  Revisar código, requisitos e validar critérios de aceitação antes da entrega final.


---

## Artefatos

* [Documento de Visão](artefatos.md#1-documento-de-visao)
  Descreve objetivos, público, escopo e funcionalidades principais do sistema.
* [Especificação de Funcionalidade](artefatos.md#2-especificacao-de-funcionalidade)
  Detalha requisitos funcionais com critérios de aceitação e exemplos de uso.
* [Produto](artefatos.md#3-produto)
  Resultado da codificação e integração, disponível para uso.

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
