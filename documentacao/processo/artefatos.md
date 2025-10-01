# Artefatos do Processo de Software

Este documento descreve os artefatos fundamentais que orientam e materializam o trabalho em nosso ciclo de desenvolvimento de software, garantindo alinhamento e qualidade desde a concepção até a entrega.

---

## 1. Documento de Visão do Produto

### Finalidade
O **Documento de Visão** é o alicerce estratégico do projeto. Ele articula a razão de ser do produto, define suas fronteiras em alto nível e apresenta a justificativa de negócio que impulsiona sua construção. Funciona como o principal ponto de alinhamento entre as partes interessadas (negócio, produto, tecnologia), estabelecendo **o que** precisa ser feito e **por quê**.

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
O **Documento de Expecificação** descreve uma funcionalidade do sistema a partir da perspectiva de quem a utiliza. Seu principal objetivo é focar no **valor** entregue ao usuário, detalhando o requisito de forma concisa e testável. É a principal unidade de trabalho para a equipe de desenvolvimento.

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

## 3. Produto (Software Executável)

O Produto é o artefato final e tangível de todo o processo. Representa o software funcional, testado e pronto para ser entregue aos usuários ou disponibilizado em um ambiente de produção/teste. É a manifestação concreta das histórias implementadas.

### Template

```markdown
```
