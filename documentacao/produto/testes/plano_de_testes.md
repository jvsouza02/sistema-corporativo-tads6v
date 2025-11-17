# Plano de Testes

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas  
**Projeto:** Sistema de Gestão de Barbearias  
**Preparado por:** Yuri Fernandes, Maria da Paz (Analistas de Requisito e Qualidade)  
**Data:** 03/11/2025  

---

## 1. Introdução

Este documento apresenta o Plano de Testes do Sistema de Agendamento e Gestão de Barbearias.  
Ele tem como objetivo explicar como os testes serão organizados e realizados, garantindo que todas as funcionalidades funcionem corretamente antes da entrega final.

O plano descreve o escopo do que será testado, os objetivos, a forma de execução, o cronograma, as entregas e os critérios de entrada e saída dos testes.

Esse documento serve como guia para a equipe de desenvolvimento e qualidade, garantindo que o sistema atenda aos requisitos e ofereça boa experiência ao usuário.

---

## 2. Escopo de Testes

### **Módulos e funcionalidades incluídos no escopo**
- Criação e edição de barbearias  
- Cadastro, edição e gerenciamento de barbeiros  
- Registro, edição e exclusão de atendimentos  
- Cálculo automático de valores totais em atendimentos  
- Controle de acesso e autenticação (proprietário e barbeiro)  
- Exibição de mensagens de validação e feedback do sistema  
- Visualização de histórico de atendimentos  

### **Fora do escopo**
- Testes de desempenho  
- Testes de carga  
- Testes de segurança  

---

## 3. Objetivos de Testes

- Garantir que o sistema impeça registrar atendimento sem itens (serviços ou produtos)  
- Confirmar que o sistema aceite itens com valor zero e calcule o total corretamente  
- Validar cálculos com centavos sem erros de arredondamento  
- Impedir inclusão de itens com valores negativos e exibir mensagem adequada  
- Confirmar atualização automática do valor total ao editar atendimentos  
- Testar o login do barbeiro para e-mail existente e inexistente  
- Verificar se o sistema exibe mensagens claras e adequadas em cada situação  

---

## 4. Abordagem de Testes

### **Metodologias**
Os testes terão foco nas regras de negócio, utilizando testes unitários para validar funções, classes e serviços de forma isolada.

### **Tipos de testes**
- **Testes Unitários (Caixa Branca)**  
  Validação da lógica interna, cálculos, validações e fluxos do domínio.

### **Ferramentas**
- PHPUnit (Laravel) para criação e execução dos testes e geração de relatórios  

---

## 5. Cronograma de Testes

| Fase                          | Início      | Fim         |
|------------------------------|-------------|-------------|
| Planejamento de testes       | 29/10/2025  | 02/11/2025  |
| Criação dos cenários de teste       | 07/11/2025  | 08/11/2025  |
| Execução dos testes unitários| 09/11/2025  | 11/11/2025  |

---

## 6. Entregas

- Plano de testes atualizado  
- Documento de cenários de teste detalhados  
- Relatórios de execução dos testes  

---

## 7. Critérios de Entrada e Saída

### **Critérios de Entrada**
- Sistema estável e funcionando  
- Funcionalidades principais concluídas  

### **Critérios de Saída**
- 100% dos testes passando  
- Nenhum erro crítico pendente  
- Todos os fluxos principais funcionando corretamente  

---
