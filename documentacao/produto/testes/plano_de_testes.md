# Plano de Testes - Sistema de Agendamento e Gestão de Barbearias

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas  
**Projeto:** Sistema de Agendamento e Gestão de Barbearias

---

| **Seção** | **Detalhes** |
|---|---|
| **Título do Plano de Testes** | Plano de Testes - Sistema de Agendamento e Gestão de Barbearias |
| **Preparado por** | Yuri Fernandes, Maria da Paz (Analistas de Requisito e Qualidade) |
| **Data** | 03/11/2025 |

---

## 1. Introdução
Este documento apresenta o Plano de Testes do Sistema de Agendamento e Gestão de Barbearias.  
Ele explica como os testes serão organizados e realizados, garantindo que as funcionalidades funcionem corretamente antes da entrega final.

No plano estão descritos o escopo do que será testado, os objetivos dos testes, a forma de execução, o cronograma, os riscos, as entregas esperadas e os critérios para iniciar e encerrar os testes.  

Este documento serve como guia para a equipe de desenvolvimento e qualidade.

---

## 2. Escopo de Testes

**Módulos e funcionalidades a serem testados:**

- Criação e edição de barbearias.  
- Cadastro, edição e gerenciamento de barbeiros.  
- Registro, edição e exclusão de atendimentos.  
- Cálculo automático de valores totais em atendimentos.  
- Controle de acesso e autenticação de usuários (proprietário e barbeiro).  
- Exibição de mensagens de validação e feedback do sistema.  
- Visualização de histórico de atendimentos.

---

## 3. Objetivos de Testes

- Verificar se o sistema impede registrar um atendimento sem itens, garantindo que seja preciso escolher pelo menos um serviço ou produto.  
- Checar se o sistema aceita itens com valor zero e faz o cálculo total corretamente.  
- Testar se o sistema calcula os valores com centavos de forma certa, sem erros de arredondamento.  
- Garantir que não seja possível incluir itens com valor negativo e que o sistema mostre uma mensagem de erro adequada.  
- Confirmar se o valor total é atualizado automaticamente ao editar um atendimento, quando itens são adicionados, removidos ou alterados.  
- Verificar se o login do barbeiro funciona corretamente, tanto quando o e-mail está cadastrado e também quando não está cadastrado.  
- Assegurar que o sistema exiba as mensagens certas em cada situação, informando o usuário de forma clara e fácil de entender.

---

## 4. Abordagem de Testes

**Metodologias:**  
Os testes serão realizados de forma manual e automatizada, priorizando funcionalidades principais e fluxos críticos.

**Tipos de testes:**  
- Testes funcionais  
- Testes de interface  
- Testes de validação de regras de negócio

**Ferramentas utilizadas:**  
- `pytest` para automação de testes em Python  
- `pytest-html` para geração de relatórios

---

## 5. Cronograma de Testes

| **Fase** | **Data de Início** | **Data de Término** |
|---|---:|---:|
| Planejamento de testes | 29/10/2025 | 02/11/2025 |
| Criação dos cenários de teste | 07/11/2025 | 08/11/2025 |
| Execução dos testes unitários | 09/11/2025 | 11/11/2025 |

---

## 6. Riscos e Como Vamos Evitá-los

| **Risco** | **Estratégia** |
|---|---|
| Pouco tempo para testar | Priorizar testes das funcionalidades mais críticas |
| Dificuldade com automação | Focar em testes manuais para telas complexas |
| Mudanças durante o projeto | Manter comunicação próxima com a equipe de desenvolvimento |

---

## 7. Entregas

- Plano de testes atualizado  
- Documento de cenários de teste detalhados  
- Relatórios de execução dos testes  
- Registro de falhas encontradas e correções aplicadas

---

## 8. Critérios de Entrada e Saída

**Para começar os testes (Entrada):**

- O sistema precisa estar estável e funcionando.  
- As funcionalidades principais devem estar prontas.  
- Os casos de teste devem estar aprovados pela equipe.

**Para encerrar os testes (Saída):**

- Pelo menos 50% dos testes devem passar com sucesso.  
- Nenhum problema grave pode ficar sem correção.  
- Todos os fluxos principais devem funcionar sem erro.

---
