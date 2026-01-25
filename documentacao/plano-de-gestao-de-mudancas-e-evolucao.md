# Plano de Gestão de Mudanças e Evolução

**Projeto:** Sistema de Gestão de Barbearias  

---

## Sumário
- [1. Abordagem de Controle de Mudanças](#1-abordagem-de-controle-de-mudanças)  
  - [1.1. Priorização e Aprovação de Mudanças](#11-priorização-e-aprovação-de-mudanças)  
  - [1.2. Lidar com Mudanças Urgentes e Novas Funcionalidades](#12-lidar-com-mudanças-urgentes-e-novas-funcionalidades)  
- [2. Utilização de Ferramentas e Artefatos](#2-utilização-de-ferramentas-e-artefatos)  
  - [2.1. Monitoramento e Rastreabilidade (GitHub Projects)](#21-monitoramento-e-rastreabilidade-github-projects)  
  - [2.2. Versionamento e Consistência (Git/GitHub)](#22-versionamento-e-consistência-gitgithub)  
- [3. Comunicação e Adaptação](#3-comunicação-e-adaptação)  
  - [3.1. Documentação do Histórico de Decisões](#31-documentação-do-histórico-de-decisões)  
  - [3.2. Comunicação e Adaptação da Equipe](#32-comunicação-e-adaptação-da-equipe)  
- [Apêndices: Templates, Labels, Exemplos](#apêndices-templates-labels-exemplos)

---

## 1. Abordagem de Controle de Mudanças

### 1.1. Priorização e Aprovação de Mudanças

**Visão geral do fluxo**  
1. Qualquer solicitação (correção, melhoria, nova funcionalidade) é registrada como **Issue** no repositório.  
2. O **Analista de Negócio (AN)** realiza a pré-análise: impacto no minimundo, requisitos afetados, riscos e dependências.  
3. A Issue recebe: tipo (`bug|feature|improvement`), prioridade provisória, impacto e responsável provisório.  
4. Em revisão de iteração (Sprint Review) o **Cliente** e o **Gerente de Projeto (GP)** validam prioridade final e definem fica para iteração futura ou é rejeitada.

**Critérios de priorização**  
As decisões devem ponderar, pelo menos, os seguintes critérios (em ordem prática de avaliação):

- **Valor para o cliente / negócio** — impacto direto no fluxo de clientes, agendamento (RF010), faturamento ou integridade de estoque (RF009, RF012).  
- **Risco / severidade** — potencial de causar perda de dados, indisponibilidade ou impacto financeiro.  
- **Urgência** — se afeta produção ou entrega contratual.  
- **Esforço estimado** — custo em horas/pontos e viabilidade dentro da capacidade da equipe.  
- **Dependências técnicas** — bloqueios que exigem outras entregas antes.  

Cada Issue deverá ter uma nota/taxonomia resultante (ex.: `Prioridade: Alto | Médio | Baixo`) baseada nestes critérios.

**Processo de aprovação / rejeição**  
- **Novas features (mudança de escopo):** decisão tomada pelo GP durante planejamento de sprint, após recomendação do AN; só entram na iteração se houver capacidade e acordo do cliente.  
- **Correções não-críticas:** aprovadas pelo GP/AN dentro do fluxo normal (serão agendadas).  
- **Correções críticas (hotfix):** aprovadas imediatamente pelo AN (ver seção 1.2).  
- **Rejeição:** deve ser registrada na Issue com justificativa, possível alternativa sugerida e, se pertinente, link para outra Issue que trate da solução.

**Responsabilidades**  
- **Cliente:** valida prioridade final e aceita entregas.  
- **Analista de Negócio (AN):** analisa impacto, escreve critérios de aceitação e recomenda prioridade.  
- **Gerente de Projeto (GP):** decide alocação em iterações e resolve conflitos de prioridade.  
- **Desenvolvedor/QA:** estimam esforço e garantem qualidade das entregas.

---

### 1.2. Lidar com Mudanças Urgentes e Novas Funcionalidades

**Hotfixes (Mudanças Urgentes)**  
Fluxo recomendado quando um problema crítico ocorre em produção:

1. Abrir **Issue** com labels `hotfix` e `impacto:alto`. Incluir: cenário, passos para reproduzir, ambiente afetado, criticidade e critérios de aceitação.  
2. **Analista de Negócio** confirma criticidade; GP autoriza execução imediata.  
3. Criar branch: `hotfix/<issue>-curto-descricao` (ex.: `hotfix/54-erro-salvar-atendimento`).  
4. Implementar correção com testes rápidos automatizados e/ou manuais. Commits vinculados à Issue.  
5. Rodar CI; se disponível, executar deploy controlado. Sem ambiente de homologação, exige validação local + CI passing + revisão rápida.  
6. Merge para `main` após 1 reviewer e CI verde; depois merge para branches que precisam receber o hotfix (ex.: `develop` se houver).  
7. Fechar Issue e publicar a descrição do problema e ação tomada.

**Novas funcionalidades inesperadas de alto valor**  
Se o cliente solicitar algo de alto valor durante uma sprint:

- Registrar como Issue com status `Indefinido` e `impacto` e estimativa preliminar.  
- GP e AN avaliam: se imprescindível para a entrega corrente, GP negocia replanejamento (adiamento de tarefas de menor valor usando estimativas). Essa negociação deve ser registrada na Issue e na ata da reunião de planejamento.  
- Se aceita, criar branch `feature/<id>-descricao` e aplicar as regras normais de PR/CI. Se não for possível, programar para próxima iteração e comunicar o cliente.

**Regra prática:** mudanças que afetem o escopo da iteração só entram se houver acordo formal (cliente + GP) e se houver capacidade mensurada nas estimativas.

---

## 2. Utilização de Ferramentas e Artefatos

### 2.1. Monitoramento e Rastreabilidade (GitHub Projects)

**Configuração do GitHub Projects**  
Board configurado com as colunas:  
`Indefinido → Pronto → Em Andamento → Revisão → Feito`

**Descrição e critérios por coluna**

- **Indefinido**  
  - Itens recém-criados. Falta prioridade, atribuição, estimativa ou iteração.  
  - Ação: AN preenche campos mínimos (descrição, critérios de aceitação provisórios).

- **Pronto**  
  - Item analisado e pronto para começar. Deve ter: prioridade, responsável (assignee), iteração (milestone) e estimativa.  
  - Ação: Devs podem puxar para `Em Andamento`.

- **Em Andamento**  
  - Branch criada e trabalho iniciado. Commits frequentes devem referenciar a Issue.  
  - Ação: Desenvolvedor sinaliza progresso e registra blockers nos comentários.

- **Revisão**  
  - Implementação finalizada; PR aberto; aguarda revisão de código, validação de critérios de aceitação e atualização de documentação.  
  - Ação: Reviewer realiza code review e valida critérios de aceitação.

- **Feito**  
  - Item aceito pelo cliente/GP e merge concluído em `main`. Documentação atualizada.

**Labels e campos**  
- `type:bug|feature|improvement`  
- `priority:alto|medio|baixo`  
- `impacto:alto|medio|baixo`  
- `effort:XS|S|M|L|XL` 
- `hotfix`  
- `status:indefinido|pronto|em-andamento|revisao|feito`

**Issue template (mínimo obrigatório)**  
- **Título:** `[type] <resumo curto> (#<id se houver>)`  
- **Descrição:** contexto, problema/necessidade, passos para reproduzir (se bug), cenário esperado.  
- **Critérios de aceitação:** lista clara e testável.  
- **Impacto:** sistemas/funcionalidades afetadas. 
- **Milestone:** iteração/versão alvo.

**Rastreabilidade**  
- Todos os commits devem mencionar a Issue (`#<id>`).  
- PRs devem referenciar a Issue e o board moverá a Issue automaticamente se configurado.  
- Fechamento de Issue deve ocorrer somente após merge e validação do GP/cliente.

---

### 2.2. Versionamento e Consistência (Git/GitHub)

**Estratégia de branching**  

- `main` — branch de produção/estável. Deploy a partir daqui. Protegida por regras de merge.  
- `feature/<id>-descricao` — novas funcionalidades. Ex.: `feature/12-registrar-atendimento`.  
- `fix/<id>-descricao` — correções não-críticas.  
- `hotfix/<id>-descricao` — correções críticas em produção.  
- `docs/<id>-descricao` — alterações documentais.

**Regras de proteção e qualidade**  
- Proteção de branch `main`: exigir `CI passing` e ao menos **1 reviewer** aprovado antes do merge.   
- Tags / Releases: usar **SemVer** para versões públicas (`v1.0.0`) e criar release notes no GitHub para cada tag.

**Política de commits**  
- Formato recomendado: `<tipo>(<escopo>): <mensagem curta> (#<issue>)`  
  - `tipo` ∈ {`feat`, `fix`, `docs`, `chore`, `refactor`, `test`}  
  - Exemplo: `feat(agendamento): permitir reagendamento de horário (#34)`  
- Mensagem de commit deve descrever concisamente a mudança. Referenciar sempre a Issue.

**Pull Request (PR) — checklist mínimo**  
- PR descreve finalidade e relaciona Issue.  
- Critérios de aceitação da Issue estão cumpridos.  
- Documentação atualizada (se necessário).  
- Pelo menos 1 reviewer aprovado.  

---

## 3. Comunicação e Adaptação

### 3.1. Documentação do Histórico de Decisões

**Registro de decisões**  
- Todas as decisões relacionadas a mudanças (correções, melhorias ou novas funcionalidades) serão registradas **exclusivamente nos comentários das Issues e Pull Requests do GitHub**.  
- A Issue concentra o contexto da mudança (problema, motivação e alternativas discutidas), enquanto a Pull Request registra as decisões finais tomadas durante a implementação e revisão.  
- Comentários relevantes devem ser claros e objetivos, descrevendo o *porquê* da decisão, impactos esperados e eventuais compromissos técnicos assumidos.

**Sincronização das informações**  
- Sempre que uma mudança impactar requisitos, regras de negócio ou design do sistema, isso deverá ser explicitamente descrito nos comentários da Issue ou da Pull Request correspondente.  
- A finalização de uma Issue só ocorre após a confirmação, nos comentários, de que todos os impactos da mudança foram tratados e revisados pela equipe.

**Rastreabilidade do histórico**  
- O histórico completo das decisões e mudanças ficará rastreável por meio do encadeamento entre **Issues, Pull Requests, commits e comentários** no GitHub.  
- Dessa forma, qualquer membro da equipe poderá consultar decisões passadas diretamente no fluxo de trabalho do projeto, garantindo transparência, rastreabilidade e alinhamento contínuo sem a necessidade de documentação paralela.

### 3.2. Comunicação e Adaptação da Equipe

**Rituais e canais de comunicação**  
- **Planejamento de Sprint:** definição e priorização das Issues que serão trabalhadas na iteração, alinhando escopo, esforço e responsabilidades da equipe.  
- **Revisão de Sprint (Sprint Review):** apresentação das funcionalidades implementadas, validação das entregas e definição de ajustes ou novas prioridades para as próximas Issues.  
- Toda a comunicação sobre mudanças, dúvidas ou decisões ocorre preferencialmente **nos comentários das Issues e Pull Requests**, garantindo registro e rastreabilidade.  
- Não são utilizados canais paralelos formais (como dailies ou retrospectivas); a coordenação acontece de forma assíncrona pelo GitHub.

**Adaptação da equipe ao processo**  
- O fluxo de trabalho adotado (uso de Issues, Pull Requests, commits e revisões) deve ser compreendido por todos os membros da equipe.  
- Sempre que o processo for ajustado (por necessidade prática ou simplificação), a mudança deve ser discutida durante a Review ou Planejamento e aplicada diretamente no fluxo de trabalho do repositório.  
- Todos os integrantes devem saber:    
  - Utilizar comentários para alinhamento e esclarecimento;  
  - Seguir convenções de commit e vincular commits às Issues correspondentes.

**Minimizar confusão e retrabalho**  
- As Issues devem conter descrições claras e critérios mínimos de aceitação antes de serem incluídas no planejamento.  
- Alterações no mesmo módulo ou funcionalidade devem ser coordenadas por meio de comentários na Issue correspondente.  
- Durante o Planejamento, as estimativas e a quantidade de Issues selecionadas devem respeitar a capacidade real da equipe, evitando sobrecarga e retrabalho.

---

## Apêndices: Templates, Labels, Exemplos

### A. Labels
- `type:bug`, `type:feature`, `type:improvement`  
- `priority:alto`, `priority:medio`, `priority:baixo`  
- `impacto:alto`, `impacto:medio`, `impacto:baixo`  
- `effort:XS`, `effort:S`, `effort:M`, `effort:L`, `effort:XL`  
- `hotfix`, `blocked`, `needs-info`, `docs`