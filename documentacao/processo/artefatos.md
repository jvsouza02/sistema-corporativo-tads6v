# Artefatos do Processo de Software

Este documento descreve os artefatos fundamentais que orientam e materializam o trabalho em nosso ciclo de desenvolvimento de software, garantindo alinhamento e qualidade desde a concepção até a entrega.

---

## 1. Documento de Visão do Produto

### Finalidade

A **Documento de Visão** é o alicerce estratégico do projeto. Ele articula a razão de ser do produto, define suas fronteiras em alto nível e apresenta a justificativa de negócio que impulsiona sua construção. Funciona como o principal ponto de alinhamento entre as partes interessadas (negócio, produto, tecnologia), estabelecendo **o que** precisa ser feito e **por quê**.

### Template

```markdown
# Visão do Produto: [Nome do Projeto]

# Documento de Visão do Produto — [Nome do Sistema]

## 1. Visão Geral do Produto
*(Descrição em alto nível do sistema, seus principais objetivos e o problema que resolve. Destaque o diferencial ou propósito central.)*  

**Exemplo:** Uma plataforma web que centraliza o gerenciamento de [tipo de negócio], incluindo cadastro de entidades principais, configuração de serviços, agenda, histórico e controle de status.

## 2. Público-alvo
- **[Tipo de Usuário 1]** — *(descrição das responsabilidades e objetivos deste ator dentro do sistema).*  
- **[Tipo de Usuário 2]** — *(descrição).*  
- **[Tipo de Usuário 3]** — *(descrição).*  

## 3. Necessidade de Negócio / Justificativa
*(Quais problemas o sistema resolve? Quais ganhos ele traz? Pode ser separado em dimensões como Operacional, Comercial, Decisional, etc.)*  

- **Operacional:** [Exemplo: eliminar uso de papel, reduzir conflitos de horário].  
- **Comercial:** [Exemplo: melhorar retenção de clientes e personalização de atendimento].  
- **Decisional:** [Exemplo: fornecer relatórios de desempenho].  

## 4. Escopo (o que está incluído / excluído)
**Incluído:**  
- [Funcionalidade essencial 1]  
- [Funcionalidade essencial 2]  
- [Funcionalidade essencial 3]  

**Excluído:**  
- [Funcionalidade fora do escopo 1]  
- [Funcionalidade fora do escopo 2]  

## 5. Principais Funcionalidades / Épicos
1. **[Nome do Épico 1]:** descrição breve.  
2. **[Nome do Épico 2]:** descrição breve.  
3. **[Nome do Épico 3]:** descrição breve.  
*(Liste os principais blocos de funcionalidades do sistema.)*  

## 6. Riscos
*(Liste riscos que podem afetar a adoção, uso ou sucesso do sistema.)*  

**Exemplo:** Baixa adoção por resistência à mudança de processo manual.  

## 7. Prioridades Iniciais
*(Defina quais funcionalidades ou épicos têm prioridade no desenvolvimento inicial.)*  

1. [Funcionalidade crítica 1]  
2. [Funcionalidade crítica 2]  

```

---

## 2. Especificação

### Propósito

As **Especificações** descrevem uma funcionalidade do sistema a partir da perspectiva de quem a utiliza. Seu principal objetivo é focar no **valor** entregue ao usuário, detalhando o requisito de forma concisa e testável. Cada especificação funciona como uma unidade de trabalho para a equipe de desenvolvimento e normalmente inclui atores, pré/pós-condições, fluxo normal e fluxos de exceção, critérios de aceitação e requisitos relacionados.

### Template

```markdown
# REQ## — <Título do Requisito>

**ESCOPO:**  
- [Funcionalidade essencial 1]  
- [Funcionalidade essencial 2]  
- [Funcionalidade essencial 3]  

**PROPÓSITO:**  
- [Descrição resumida do objetivo do requisito]  

**ATOR:**  
- [Ator responsável pela execução do caso de uso]  

---

## PRÉ-CONDIÇÕES
- [Condição necessária antes da execução do caso de uso]  
- [Outra condição, se aplicável]  

## PÓS-CONDIÇÕES
- [Resultado esperado após a execução bem-sucedida]  
- [Outro efeito decorrente da execução, se aplicável]  

---

## FLUXO NORMAL
1. O [ator] acessa o módulo **“<nome da funcionalidade>”**.  
2. O sistema exibe o formulário ou interface correspondente.  
3. O [ator] preenche os campos obrigatórios ou seleciona as opções desejadas.  
4. O sistema valida as informações inseridas.  
5. O sistema executa a ação solicitada (ex: salvar, editar, excluir).  
6. O sistema confirma a operação com uma mensagem de sucesso e atualiza a interface.  

---

## FLUXO DE EXCEÇÃO
- **E1 — Dados obrigatórios ausentes:**  
  O sistema exibe mensagem de erro informando que todos os campos obrigatórios devem ser preenchidos.  

- **E2 — Dados inválidos ou duplicados:**  
  O sistema impede a ação e informa o motivo (ex: formato incorreto ou duplicidade).  

- **E3 — Falha no processamento:**  
  O sistema informa o erro e orienta o usuário a tentar novamente.  

---

## FLUXO ALTERNATIVO
- **A1 — Variação opcional do fluxo principal:**  
  1. O [ator] opta por uma ação alternativa.  
  2. O sistema executa o comportamento correspondente.  

---

## REQUISITOS RELACIONADOS
- **RF##:** [Requisito funcional relacionado]  
- **RN##:** [Regra de negócio relacionada]  
- **RNF##:** [Requisito não funcional relacionado]

```

---

## 3. Dicionário de Dados

### Finalidade

O **Dicionário de Dados** descreve detalhadamente todas as entidades, atributos e relacionamentos utilizados no sistema. Ele define o significado de cada dado, o tipo, formato e restrições, garantindo consistência e clareza entre as fases de análise, especificação e desenvolvimento.

### Estrutura Recomendada

| Campo                       | Descrição                                                          |
| --------------------------- | ------------------------------------------------------------------ |
| **Tabela.Campo**            | Nome completo (ex.: `usuarios.email`).                             |
| **Nome lógico**             | Nome legível e intuitivo do campo.                                 |
| **Tipo (SGBD)**             | Tipo de dado (ex.: `varchar(255)`, `uuid`, `timestamp`).           |
| **Obrigatório**             | Indica se o campo é obrigatório.                                   |
| **Descrição / Significado** | Explica o propósito do campo.                                      |
| **Exemplo**                 | Valor típico do campo.                                             |
| **Restrições / Validações** | Regras como único, PK, FK, formato, intervalo.                     |
| **Chave (PK/FK/Índice)**    | Indica função do campo na estrutura do banco.                      |

### Template

```markdown
# Dicionário de Dados — [Nome do Sistema]

| Tabela.Campo | Nome lógico | Tipo (SGBD) | Obrigatório | Descrição / Significado | Exemplo | Restrições / Validações | Chave (PK/FK/Índice) |
|---|---|---|---|---|---|---|---|---|---|---|
| `usuarios.id` | ID do usuário | `uuid` | Sim | Identificador único do usuário | `3fa85f64-5717-4562-b3fc-2c963f66afa6` | PK, não nulo | PK |
| `usuarios.email` | E-mail do usuário | `varchar(255)` | Sim | E-mail para login e contato | `joao@example.com` | único, formato email | Índice único |
| `pedidos.total` | Total do pedido | `numeric(10,2)` | Sim | Valor total do pedido | `149.90` | >=0 | — |
```

---

## 4. Produto (Software Executável)

O Produto é o artefato final e tangível de todo o processo. Representa o software funcional, testado e pronto para ser entregue aos usuários ou disponibilizado em um ambiente de produção/teste. É a manifestação concreta das especificações implementadas.

---

## 5. Plano de Testes

Documento que define a estratégia, técnicas e métricas usadas para validar o sistema, garantindo que todas as funcionalidades atendam aos requisitos e critérios de aceitação estabelecidos.

### Template

```markdown
# Plano de Testes — [Nome do Sistema]

## 1. Objetivo

Descrever o objetivo principal do plano de testes, como garantir que o sistema ou aplicação atenda aos requisitos e especificações definidas, validando a qualidade e funcionalidade do produto.

---

## 2. Estratégia

Definir a abordagem geral para os testes, incluindo os tipos de testes que serão realizados (como testes de funcionalidade, de desempenho, de segurança, etc.) e como os testes serão distribuídos ao longo do ciclo de vida do desenvolvimento.

---

## 3. Técnica

Especificar as técnicas de teste que serão aplicadas, como testes manuais, automação de testes, testes exploratórios, etc. Incluir também os métodos que serão utilizados para garantir a cobertura de testes eficiente.

---

## 4. Indicadores

Definir os indicadores que serão usados para medir o sucesso dos testes, como taxa de defeitos encontrados, cobertura de código, tempo de execução de testes, entre outros. Estes indicadores ajudarão a avaliar a qualidade do processo de testes e a efetividade das atividades realizadas.
```
