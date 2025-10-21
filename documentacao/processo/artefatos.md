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

## 2. História de Usuário

### Propósito

As **Histórias de Usuários** descreve uma funcionalidade do sistema a partir da perspectiva de quem a utiliza. Seu principal objetivo é focar no **valor** entregue ao usuário, detalhando o requisito de forma concisa e testável. É a principal unidade de trabalho para a equipe de desenvolvimento.

### Template

```markdown
# Histórias de Usuário: [ID - Título da Funcionalidade]

## 1. Narrativa (O Quê, Quem, Por Quê)
**COMO UM** [Perfil de Usuário],
**EU DESEJO** [Realizar uma ação ou ter uma capacidade],
**PARA QUE** [Eu possa alcançar um objetivo ou obter um benefício].

**Exemplo:**
**Como um** *Gerente de Produto*,
**Eu desejo** *visualizar um dashboard com o progresso das histórias de usuário por status (A Fazer, Em Andamento, Concluído)*,
**Para que** *eu possa identificar gargalos e comunicar o andamento do projeto com mais clareza*.

## 2. Critérios de Aceitação (Regras de Negócio e Cenários)
*(Condições objetivas que, uma vez atendidas, confirmam que a história foi implementada corretamente. São a base para os testes de qualidade.)*

- **Cenário 1:** Visualização padrão do dashboard.
    - **Dado** que eu acessei a página do dashboard.
    - **Quando** a página carregar completamente.
    - **Então** eu devo ver três colunas: 'A Fazer', 'Em Andamento' e 'Concluído'.
    - **E** cada história deve ser exibida na coluna correspondente ao seu status atual.

- **Cenário 2:** A atualização do status de uma história reflete no dashboard.
    - **Dado** que a história "ABC-123" está na coluna 'A Fazer'.
    - **Quando** eu movo a história "ABC-123" para 'Em Andamento'.
    - **Então** o dashboard deve ser atualizado automaticamente, mostrando "ABC-123" na coluna 'Em Andamento'.
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
| **Versão**                  | Versão do documento.                                               |

### Template

```markdown
# Dicionário de Dados — [Nome do Sistema]

| Tabela.Campo | Nome lógico | Tipo (SGBD) | Obrigatório | Descrição / Significado | Exemplo | Restrições / Validações | Chave (PK/FK/Índice) | Versão |
|---|---|---|---|---|---|---|---|---|---|---|
| `usuarios.id` | ID do usuário | `uuid` | Sim | Identificador único do usuário | `3fa85f64-5717-4562-b3fc-2c963f66afa6` | PK, não nulo | PK | 1.0 |
| `usuarios.email` | E-mail do usuário | `varchar(255)` | Sim | E-mail para login e contato | `joao@example.com` | único, formato email | Índice único | 1.0 |
| `pedidos.total` | Total do pedido | `numeric(10,2)` | Sim | Valor total do pedido | `149.90` | >=0 | — | 1.0 |
```

---

## 4. Produto (Software Executável)

O Produto é o artefato final e tangível de todo o processo. Representa o software funcional, testado e pronto para ser entregue aos usuários ou disponibilizado em um ambiente de produção/teste. É a manifestação concreta das histórias implementadas.

---

## 5. Plano de Testes

O Plano de Testes define a estratégia, o escopo e os critérios de validação do produto. Inclui os tipos de teste a serem realizados (unitário e aceitação), ferramentas, responsáveis e métricas de sucesso.

### Template

```markdown
# Plano de Testes — [Nome do Sistema]

## 1. Objetivo
Descrever a abordagem e o planejamento das atividades de teste para garantir que o produto atenda aos requisitos funcionais e não funcionais.

## 2. Escopo
- Módulos a serem testados.
- Tipos de teste: unitário, integração, sistema e aceitação.

## 3. Estratégia de Teste
- Ferramentas: JUnit, Postman, Selenium, etc.
- Frequência e responsáveis.
- Critérios de entrada e saída de cada fase.

## 4. Tipos de Teste
### Testes Unitários
- Responsável: Desenvolvedor.
- Objetivo: validar o comportamento isolado de classes e métodos.
- Ferramenta: JUnit.
- Local: `tests/unit/`.

### Testes de Integração
- Responsável: Testador (QA) e Desenvolvedor.
- Objetivo: validar a comunicação entre módulos.
- Ferramenta: Postman, RestAssured.

### Testes de Sistema e Aceitação
- Responsável: Testador (QA).
- Objetivo: garantir que o sistema atenda aos requisitos e critérios de aceitação.
- Ferramenta: Selenium, Cypress.

## 5. Cronograma
| Iteração | Atividade | Responsável | Entregável |
|-----------|------------|--------------|-------------|
| Iteração 1 | Testes unitários dos módulos X e Y | Dev | Relatório de execução |
| Iteração 2 | Testes de integração | QA | Log de validação |
| Iteração 3 | Testes de aceitação | QA | Relatório final |

## 6. Critérios de Aceitação
- 100% dos testes unitários devem passar.
- Nenhum defeito crítico pendente antes da entrega.
- Cobertura mínima de testes automatizados: 80%.

## 7. Registro de Resultados
- Local dos relatórios: `/tests/reports/`
- Processo de acompanhamento de falhas: issues no repositório.
```
