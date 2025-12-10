# Plano de Gestão de Mudanças e Evolução

**Projeto:** Sistema de Gestão de Barbearias

Este documento formaliza a estratégia para gerenciar a evolução do projeto **Sistema de Gestão de Barbearias**, garantindo que mudanças sejam tratadas de forma ágil, colaborativa e transparente, refletindo a natureza iterativa do desenvolvimento e utilizando as ferramentas Git e GitHub.

---

## 1. Abordagem de Controle de Mudanças

### 1.1. Priorização e Aprovação de Mudanças

**Processo de Solicitação:**

- Toda solicitação (correção de bug, melhoria ou nova funcionalidade) deve ser registrada como uma **Issue** no repositório no board do GitHub Projects do projeto.  
- O **Analista de Negócio (AN)** realiza a **Análise de Negócio** (atividade *Analisar Negócio*), avaliando impacto no minimundo e no escopo.

**Critério de Priorização:**

- As mudanças são ordenadas pelo **Cliente** durante a revisão da iteração.  
- Priorizar pelo **Valor de Negócio**: impacto direto em fluxo de clientes, agendamento (RF010), faturamento ou integridade de estoque (RF009, RF012).

**Aprovação:**

- **Mudanças de Escopo (Novas Features):** inseridas via revisão de sprint; o **Gerente de Projeto (GP)** decide se entram na iteração em *Planejamento de demandas*.  
- **Correções Críticas:** aprovadas imediatamente pelo Analista de Negócio com registro de `hotfix` na Issue.

### 1.2. Lidar com Mudanças Urgentes e Novas Funcionalidades

**Mudanças Urgentes (Hotfixes):**

- Se surgir erro crítico durante a sprint (ex.: atendimento que não salva ou estoque incorreto ao registrar atendimento), o fluxo normal pode ser pausado.  
- Criar Issue com label `hotfix` e `impacto:alto`, descrever cenário e critérios de aceitação.  
- Implementação em branch `hotfix/<id>-descricao`, testes rápidos, e implementação da correção.

**Novas Funcionalidades Inesperadas:**

- Demandas do cliente são cadastradas com status **Indefinido** no GitHub Projects.  
- Se imprescindível para entrega corrente, o GP negocia adiamento de outras tarefas para manter a capacidade da equipe (uso das estimativas de esforço definidas nas Issues).

---

## 2. Utilização de Ferramentas e Artefatos

### 2.1. Monitoramento e Rastreabilidade

Utilizamos **GitHub Projects** para rastrear o ciclo de vida das mudanças. As colunas do board refletem o status real do trabalho e correspondem aos status descritos no processo do projeto (Indefinido → Pronto → Em Andamento → Revisão → Feito).

| Status (Coluna) | Descrição e Critérios de Uso |
|---|---|
| **Indefinido** | Fila de espera: item criado, mas sem data/atribuição/iteração/estimativa. Permanecerá aqui até preencher esses elementos. |
| **Pronto** | Item analisado e pronto para iniciar. Deve ter: prioridade, responsável e iteração.
| **Em Andamento** | Item sendo implementado (branch criado, início documentado). Commits frequentes vinculados à Issue são obrigatórios. |
| **Revisão** | Implementação finalizada; aguarda revisão de código, validação de critérios de aceitação e atualização de documentação. |
| **Feito** | Item aceito pelo cliente/GP. |

### 2.2. Versionamento e Consistência (Git/GitHub)

Para organização, histórico e isolamento de trabalho adotamos estas convenções (ajustadas ao repositório atual):

**Estratégia de Branching:**

- `feature/<id>-descricao` — desenvolvimento de novas funcionalidades (ex.: `feature/12-registrar-atendimento`).  
- `fix/<id>-descricao` — correção de bugs.  
- `hotfix/<id>-descricao` — correções críticas em produção.  
- `docs/<id>-descricao` — alterações em documentação (podem ser aplicadas direto em `main` se não tiver efeito colateral).  
- `main` — branch de produção/estável. (Sem ambiente de homologação, testar localmente e via CI antes de mesclar.)

**Versionamento de Documentos:**

- Alterações de conteúdo: incrementar **+0.1** (ex.: 1.0 → 1.1).  
- Ajustes menores: incrementar **+0.0.1** (ex.: 1.1 → 1.1.1).  
- Inserir cabeçalho em cada documento: `Versão`, `Data`, `Autor`.

**Padrão de Commits:**

- Formato: ``<tipo>(<escopo>): <mensagem curta> (#<issue>)``  
  Exemplos: `feat(barbeiro): permitir transferência entre unidades (#23)`, `fix(estoque): corrigir decremento incorreto em ml (#54)`.  
- Todo commit deve referenciar a Issue correspondente. Exceção: ajustes exclusivamente documentais de processo.

**Pull Requests:**

- PR deve referenciar Issue.  
- Ativar proteção de branch em `main`: exigir 1 reviewer e CI passing antes do merge.

---

## 3. Comunicação e Adaptação

### 3.1. Documentação do Histórico de Decisões

- **Registro:** discussões e decisões sobre mudanças ficam registradas nos comentários das Issues..  
- **Sincronização:** documentação é parte do software — qualquer alteração relevante exige atualização dos artefatos relacionados (Documentos de Requisitos, Especificação, Diagrama de Domínio e de Classe).

### 3.2. Comunicação e Adaptação da Equipe

**Rituais de Comunicação:**

- Revisão de Sprint (cliente + GP): priorização das Issues para a próxima iteração.  
- Planejamento (GP): alocação de responsáveis e iterações.  
- Alertas de hotfix: uso de canal imediato (WhatsApp) além da Issue.

**Adaptação:**

- Revisar fluxo de trabalho periodicamente, se o processo estiver burocrático, atualizar `documentacao/processo`.  
