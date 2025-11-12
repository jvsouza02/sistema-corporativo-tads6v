# Plano de Projeto

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas  
**Projeto:** Sistema de Gestão de Barbearias  
**Versão:** 1.0  
**Data:** 10/11/2025  

---

## 1. Escopo do Projeto

Este projeto tem como objetivo principal desenvolver um sistema de gestão completo e acessível para barbearias de pequeno e médio porte.  
A plataforma web será desenvolvida para substituir métodos tradicionais de organização, como agendas físicas e planilhas, oferecendo uma solução digital integrada que permita o gerenciamento eficiente de clientes, agendamentos, serviços e equipe de trabalho.

O sistema busca resolver problemas comuns enfrentados por esses estabelecimentos, como desorganização de horários, dificuldade no controle financeiro e falta de profissionalização no atendimento ao cliente.

O desenvolvimento do projeto seguirá boas práticas para garantir que o sistema seja estável, seguro e confiável, atendendo às necessidades reais dos usuários. Dessa forma, o produto final oferecerá uma solução prática e eficiente para a gestão de barbearias, contribuindo para a organização, o controle operacional e a melhoria da experiência tanto dos profissionais quanto dos clientes.

Além disso, o sistema tem o objetivo de modernizar as barbearias, oferecendo uma ferramenta digital que ajude os proprietários a tomarem decisões e acompanhar o desempenho do negócio.  
Com funções que reúnem as informações em um só lugar e automatizam tarefas do dia a dia, o projeto busca tornar a administração mais rápida, organizada e eficiente.

---

### 1.1 Objetivo

O objetivo do projeto é desenvolver uma plataforma web intuitiva e funcional que auxilie barbearias de pequeno e médio porte na organização e controle de suas atividades.  
O sistema permitirá o gerenciamento centralizado de clientes, serviços, horários e equipe, promovendo maior eficiência operacional e melhorando a qualidade do atendimento.

---

### 1.2 Entregáveis

Os principais produtos e resultados que serão gerados ao longo do projeto incluem:

- **Plano de Projeto:** documento que descreve o planejamento geral do projeto, incluindo cronograma, estimativas de custo, escopo, equipe e metodologia adotada.  
- **Documento de Visão:** apresenta uma descrição geral do sistema, seus objetivos e público-alvo.  
- **Documento de Requisitos:** lista detalhada das funcionalidades, restrições e regras de negócio.  
- **Especificações Técnicas:** informações técnicas sobre a estrutura e funcionamento do sistema.  
- **Plano de Testes:** documento que define como as funcionalidades serão verificadas e validadas.  
- **Sistema Pronto:** versão final e funcional da plataforma web acessível pelo navegador.  
- **Código-Fonte:** todo o código desenvolvido, acompanhado de instruções para implantação.  
- **Relatório Final:** resumo de todas as etapas do projeto, resultados e conclusões.

---

### 1.3 Limites do Escopo

- Não vamos fazer **sistema de pagamento** – o sistema não vai processar pagamentos com cartão ou outras formas.  
- Não vamos criar **aplicativo para celular** – o sistema vai funcionar pelo navegador do celular e computador.  
- Não vai ter **login por redes sociais** – os usuários vão fazer cadastro direto no sistema.  
- Não terá **controle de estoque** – não vamos gerenciar produtos em estoque.  

---

## 2. Cronograma

| Etapa | Descrição | Início | Término | Responsável |
|-------|------------|--------|----------|--------------|
| 1 | Planejamento e Levantamento de Requisitos | 05/10/2025 | 09/10/2025 | Analista de Negócio, Analista de Requisito e Qualidade |
| 2 | Especificação e Modelagem | 10/10/2025 | 18/10/2025 | Analista de Requisito e Qualidade |
| 3 | Desenvolvimento do Sistema | 19/10/2025 | 04/11/2025 | Desenvolvedor |
| 4 | Testes e Qualidade | 07/11/2025 | 18/11/2025 | Desenvolvedor, Analista de Requisito e Qualidade |
| 5 | Implantação e Encerramento | 25/11/2025 | 25/11/2025 | Toda Equipe |

---

## 3. Estimativas de Esforço e Custo

| ID | Atividade | Esforço (h) | Custo/h (R$) | Custo Total (R$) | Responsável |
|----|------------|-------------|---------------|------------------|--------------|
| EC01 | Levantamento de Requisitos e Documento de Visão | 30 | 15,00 | 450,00 | Analista de Negócio, Analista de Requisito e Qualidade |
| EC02 | Especificação de Requisitos e Diagramas | 40 | 15,00 | 600,00 | Analista de Requisito e Qualidade |
| EC03 | Desenvolvimento das Funcionalidades do Sistema | 100 | 20,00 | 2.000,00 | Desenvolvedor |
| EC04 | Elaboração e Execução de Testes | 40 | 15,00 | 600,00 | Desenvolvedor, Analista de Requisito e Qualidade |
| EC05 | Finalização e Entrega do Produto | 30 | 12,50 | 375,00 | Toda Equipe |

---

## 4. EAP - Estrutura Analítica do Projeto

![EAP - Estrutura Analítica do Projeto](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/EAP.jpg)

---

## 4.1 Definição das Atividades dos Pacotes de Trabalho

#### 1. GERENCIAMENTO DE PROJETOS

**1.1 Levantamento de Demandas do Cliente**  
- **Atividades:** Coletar e documentar necessidades, expectativas e funcionalidades desejadas pelo cliente para o sistema.  
- **Recursos:** Acesso ao Cliente, Documento de Requisitos.

**1.2 Reuniões de Aceitação com Cliente**  
- **Atividades:** Apresentar funcionalidades desenvolvidas, coletar feedback e ajustar conforme validação do cliente.  
- **Recursos:** Versão de Teste do Sistema, Lista de Feedback.

**1.3 Definição de Escopo e Cronograma**  
- **Atividades:** Delimitar objetivos, entregas e prazos do projeto, alinhando expectativas com o cliente.  
- **Recursos:** Demandas do Cliente, Template de Escopo, Ferramenta de Cronograma.

**1.4 Elaboração da EAP e Estimativas**  
- **Atividades:** Decompor o projeto em pacotes de trabalho e estimar esforço, tempo e recursos necessários.  
- **Recursos:** Documento de Escopo, Template de EAP, Dados para Estimativa.

---

#### 2. REQUISITOS DO PRODUTO

**2.1 Elaboração do Documento de Visão**  
- **Atividades:** Definir objetivos, escopo, atores principais e funcionalidades macro do sistema.  
- **Recursos:** Demandas Iniciais, Template de Documento.

**2.2 Desenvolvimento do Minimundo e Diagrama de Domínio**  
- **Atividades:** Modelar o contexto do negócio e relacionamentos entre entidades do sistema.  
- **Recursos:** Documento de Visão, Ferramenta de Modelagem (UML).

**2.3 Levantamento e Especificação de Requisitos**  
- **Atividades:** Detalhar requisitos funcionais, não funcionais e regras de negócio do sistema.  
- **Recursos:** Demandas do Cliente, Template de Requisitos.

**2.4 Criação de Diagrama e Especificações de Caso de Uso**  
- **Atividades:** Modelar interações entre atores e sistema e especificar fluxos de uso.  
- **Recursos:** Requisitos Especificados, Ferramenta de Modelagem (UML).

**2.5 Construção do Diagrama de Classes**  
- **Atividades:** Projetar a estrutura estática do sistema com classes, atributos, métodos e relacionamentos.  
- **Recursos:** Diagrama de Domínio, Ferramenta de Modelagem (UML).

---

#### 3. CONSTRUÇÃO

**3.1 Implementação do Sistema de Cadastro de Proprietários**  
- **Atividades:** Desenvolver funcionalidades de cadastro e autenticação de proprietários, incluindo validação de e-mail único e armazenamento seguro de senhas.  
- **Recursos:** IDE, Linguagem de Programação, Banco de Dados, Requisitos Detalhados.

**3.2 Desenvolvimento do Módulo de Gestão de Barbearias**  
- **Atividades:** Implementar cadastro, edição e exclusão de barbearias, com validação de dados e vinculação ao proprietário.  
- **Recursos:** IDE, Linguagem de Programação, Banco de Dados, Requisitos Detalhados. 

**3.3 Criação do Sistema de Listagem de Barbearias com Métricas**  
- **Atividades:** Desenvolver interface para exibição de barbearias com métricas de desempenho (atendimentos, barbeiros, faturamento).  
- **Recursos:** IDE, Linguagem de Programação, Biblioteca de Métricas, Banco de Dados, Requisitos Detalhados.

**3.4 Implementação da Gestão de Barbeiros**  
- **Atividades:** Criar funcionalidades de cadastro, edição, transferência e remoção de barbeiros entre barbearias.  
- **Recursos:** IDE, Linguagem de Programação, Banco de Dados, Requisitos Detalhados.

**3.5 Desenvolvimento do Registro de Atendimentos**  
- **Atividades:** Implementar registro de atendimentos com seleção de serviços/produtos e cálculo automático de valores.  
- **Recursos:** IDE, Linguagem de Programação, Banco de Dados, Requisitos Detalhados.

---

#### 4. TESTES E QUALIDADE

**4.1 Elaboração do Plano de Testes**  
- **Atividades:** Definir estratégia, escopo, recursos e cronograma das atividades de teste.  
- **Recursos:** Requisitos do Sistema, Template de Plano de Testes.

**4.2 Criação de Cenários de Teste**  
- **Atividades:** Desenvolver casos de teste baseados em requisitos e casos de uso do sistema.  
- **Recursos:** Plano de Testes.

**4.3 Implementação de Testes Unitários**  
- **Atividades:** Desenvolver e executar testes automatizados para validar unidades individuais de código.  
- **Recursos:** Código-fonte, Ferramenta de Teste Unitário.

**4.4 Geração de Relatório de Testes**  
- **Atividades:** Documentar resultados, defeitos identificados e métricas de qualidade do sistema.  
- **Recursos:** Dados dos Testes Executados, Template de Relatório.

---

#### 5. ENCERRAMENTO

**5.1 Consolidação da Documentação**  
- **Atividades:** Revisar, organizar e versionar toda a documentação técnica e de usuário do projeto.  
- **Recursos:** Documentos de todas as fases, Ferramenta de Armazenamento.

**5.2 Entrega do Código Fonte**  
- **Atividades:** Preparar e entregar código-fonte final com instruções de implantação e configuração.  
- **Recursos:** Código-fonte Final, Documentação de Instalação.

**5.3 Demonstração do Sistema Funcional**  
- **Atividades:** Apresentar sistema em ambiente de produção validando atendimento a todos os requisitos.  
- **Recursos:** Sistema Pronto.

**5.4 Apresentação e Avaliação Final do Projeto**  
- **Atividades:** Realizar retrospectiva, documentar lições aprendidas e formalizar encerramento do projeto.  
- **Recursos:** Relatório Final do Projeto.

---

## 5. Lista de Atividades

| ID | Atividade | Início | Término | Status | Responsável |
|----|------------|--------|----------|----------|--------------|
| LA01 | Levantamento de Demandas do Cliente | 18/09/2025 | 20/09/2025 | Concluído | Analista de Negócio |
| LA02 | Reuniões de Aceitação com Cliente | 21/09/2025 | 23/09/2025 | Concluído | Analista de Negócio |
| LA03 | Definição de Escopo e Cronograma | 24/09/2025 | 26/09/2025 | Concluído | Gerente de Projeto |
| LA04 | Elaboração da EAP e Estimativas | 27/09/2025 | 29/09/2025 | Concluído | Analista de Negócio, Gerente de Projeto |
| LA05 | Elaboração do Documento de Visão | 30/09/2025 | 02/10/2025 | Concluído | Analista de Negócio |
| LA06 | Desenvolvimento do Minimundo e Diagrama de Domínio | 03/10/2025 | 05/10/2025 | Concluído | Analista de Requisito e Qualidade |
| LA07 | Levantamento e Especificação de Requisitos | 06/10/2025 | 10/10/2025 | Concluído | Analista de Requisito e Qualidade |
| LA08 | Criação de Diagrama e Especificações de Caso de Uso | 11/10/2025 | 13/10/2025 | Concluído | Analista de Requisito e Qualidade |
| LA09 | Construção do Diagrama de Classes | 14/10/2025 | 16/10/2025 | Concluído | Analista de Requisito e Qualidade |
| LA10 | Implementação do Sistema de Cadastro de Proprietários | 17/10/2025 | 22/10/2025 | Concluído | Desenvolvedor |
| LA11 | Desenvolvimento do Módulo de Gestão de Barbearias | 23/10/2025 | 30/10/2025 | Concluído | Desenvolvedor |
| LA12 | Criação do Sistema de Listagem de Barbearias com Métricas | 31/10/2025 | 05/11/2025 | Concluído | Desenvolvedor |
| LA13 | Implementação da Gestão de Barbeiros | 06/11/2025 | 10/11/2025 | Concluído | Desenvolvedor |
| LA14 | Desenvolvimento do Registro de Atendimentos | 11/11/2025 | 15/11/2025 | Concluído | Desenvolvedor |
| LA15 | Elaboração do Plano de Testes | 16/11/2025 | 18/11/2025 | Concluído | Analista de Requisito e Qualidade |
| LA16 | Criação de Cenários de Teste | 19/11/2025 | 21/11/2025 | Concluído | Analista de Requisito e Qualidade |
| LA17 | Implementação de Testes Unitários | 22/11/2025 | 26/11/2025 | Concluído | Desenvolvedor |
| LA18 | Geração de Relatório de Testes | 27/11/2025 | 30/11/2025 | Concluído | Desenvolvedor |
| LA19 | Consolidação da Documentação | 01/12/2025 | 05/12/2025 | Concluído | Analista de Requisito e Qualidade, Gerente de Projeto |
| LA20 | Entrega do Código Fonte | 06/12/2025 | 08/12/2025 | Concluído | Desenvolvedor |
| LA21 | Demonstração do Sistema Funcional | 09/12/2025 | 12/12/2025 | Concluído | Desenvolvedor |
| LA22 | Apresentação e Avaliação Final do Projeto | 13/12/2025 | 17/12/2025 | Planejado | Toda Equipe |

---

## 6. Diagrama de Gantt

![Diagrama de Gantt](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/grafico_de_gantt.png)

---

## 7. Diagrama de Atividades do Projeto

![Diagrama de Atividades](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/diagrama_de_atvidade_do_projeto.png)
