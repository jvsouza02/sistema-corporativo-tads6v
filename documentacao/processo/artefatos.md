# Artefatos do Processo de Software

Este documento descreve os artefatos fundamentais que orientam e materializam o trabalho em nosso ciclo de desenvolvimento de software, garantindo alinhamento e qualidade desde a concepção até a entrega.

---

## 1. Documento de Visão do Produto

### Finalidade
O **Documento de Visão** é o alicerce estratégico do projeto. Ele articula a razão de ser do produto, define suas fronteiras em alto nível e apresenta a justificativa de negócio que impulsiona sua construção. Funciona como o principal ponto de alinhamento entre as partes interessadas (negócio, produto, tecnologia), estabelecendo **o que** precisa ser feito e **por quê**.

### Template

```markdown
# Visão do Produto: [Nome do Projeto]

## 1. Justificativa e Oportunidade de Negócio
*(Detalhamento do cenário atual, o problema a ser resolvido ou a oportunidade de mercado que este software visa capturar. Qual dor estamos curando?)*

**Exemplo:** A gestão de inventário é realizada por meio de planilhas, resultando em inconsistências de dados, falhas na reposição de produtos e, consequentemente, perda de vendas e insatisfação dos clientes.

## 2. Escopo e Fronteiras do Produto
*(Delimite de forma clara o que o produto se propõe a fazer e, crucialmente, o que está fora de seu escopo para evitar desvios de foco.)*

- **Capacidades Essenciais (Alto Nível):**
    - [Exemplo: Gerenciamento centralizado de produtos e fornecedores]
    - [Exemplo: Monitoramento do inventário em tempo real]
    - [Exemplo: Alertas automáticos para estoque baixo]

- **Fora do Escopo (Exclusões Explícitas):**
    - [Exemplo: Módulo de faturamento e emissão de notas fiscais]
    - [Exemplo: Integração nativa com sistemas de CRM de terceiros]
## 3. Diagrama de Casos de Uso (Simplificado)
*(Representação visual simples das principais funcionalidades e dos atores que as utilizam.)*

```

---

## 2. Documento de Expecificação

### Propósito
O **Documento de Expecificação** descreve uma funcionalidade do sistema a partir da perspectiva de quem a utiliza. Seu principal objetivo é focar no **valor** entregue ao usuário, detalhando o requisito de forma concisa e testável. É a principal unidade de trabalho para a equipe de desenvolvimento.

### Template

```markdown
# Documento de Especificação: [ID - Título da Funcionalidade]

## 1. Narrativa (O Quê, Quem, Por Quê)
**COMO UM** [Perfil de Usuário],
**EU DESEJO** [Realizar uma ação ou ter uma capacidade],
**PARA QUE** [Eu possa alcançar um objetivo ou obter um benefício].

**Exemplo:**
**Como um** *Gerente de Produto*,
**Eu desejo** *visualizar um dashboard com o progresso das especificações por status (A Fazer, Em Andamento, Concluído)*,
**Para que** *eu possa identificar gargalos e comunicar o andamento do projeto com mais clareza*.

## 2. Critérios de Aceitação (Regras de Negócio e Cenários)
*(Condições objetivas que, uma vez atendidas, confirmam que a especificação foi implementada corretamente. São a base para os testes de qualidade.)*

- **Cenário 1:** Visualização padrão do dashboard.
    - **Dado** que eu acessei a página do dashboard.
    - **Quando** a página carregar completamente.
    - **Então** eu devo ver três colunas: 'A Fazer', 'Em Andamento' e 'Concluído'.
    - **E** cada especificação deve ser exibida na coluna correspondente ao seu status atual.

- **Cenário 2:** A atualização do status de uma especificação reflete no dashboard.
    - **Dado** que a especificação "ABC-123" está na coluna 'A Fazer'.
    - **Quando** eu movo a especificação "ABC-123" para 'Em Andamento'.
    - **Então** o dashboard deve ser atualizado automaticamente, mostrando "ABC-123" na coluna 'Em Andamento'.
```

## 3. Produto (Software Executável)

O Produto é o artefato final e tangível de todo o processo. Representa o software funcional, testado e pronto para ser entregue aos usuários ou disponibilizado em um ambiente de produção/teste. É a manifestação concreta das especificações implementadas.

### Template

```markdown
```
