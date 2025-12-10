# Plano de Testes

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas  
**Projeto:** Sistema de Gestão de Barbearias

| Seção | Detalhes |
|-------|----------|
| **Título do Plano de Testes** | Plano de Testes - Sistema de Agendamento e Gestão de Barbearias - Versão 1.0 |
| **Preparado por** | Yuri Fernandes, Maria da Paz (Analistas de Requisito e Qualidade) |
| **Data** | 03/11/2025 |

---

## 1. Introdução
Este documento apresenta o Plano de Testes do Sistema de Agendamento e Gestão de Barbearias. Ele tem como objetivo explicar como os testes serão organizados e realizados, garantindo que todas as funcionalidades funcionem corretamente antes da entrega final.

O plano descreve o escopo do que será testado, os objetivos, a forma de execução, o cronograma, as entregas e os critérios de entrada e saída dos testes.

Esse documento serve como guia para a equipe de desenvolvimento e qualidade, garantindo que o sistema atenda aos requisitos, que os componentes se integrem corretamente (banco de dados, API e regras de negócio) e ofereça boa experiência ao usuário.

---

## 2. Escopo de Testes

### **Módulos e funcionalidades a serem testados (escopo geral):**
- Criação e edição de barbearias  
- Cadastro, edição e gerenciamento de barbeiros  
- Registro, edição e exclusão de atendimentos  
- Cálculo automático de valores totais em atendimentos  
- Controle de acesso e autenticação de usuários (proprietário e barbeiro)  
- Exibição de mensagens de validação e feedback do sistema  
- Visualização de histórico de atendimentos  
- Persistência e recuperação de dados no Banco de Dados – Respostas das rotas (Endpoints) da API/Aplicação  

### **Fora do escopo:**
- Testes de desempenho  
- Testes de usabilidade  
- Testes de segurança avançada (Penetration Testing)

---

## 3. Objetivos de Testes (foco desta etapa)

### **Testes Unitários:**
- Verificar se o sistema impede registrar um atendimento sem itens  
- Checar se o sistema aceita itens com valor zero e calcula corretamente  
- Garantir cálculo correto com valores fracionados (centavos)  
- Impedir itens com valor negativo e exibir erro adequado  
- Atualização automática do valor total ao editar atendimentos  
- Verificar funcionamento do login do barbeiro  
- Assegurar mensagens de erro e feedback corretas em cada situação  

### **Testes de Integração:**
- Salvar dados de um atendimento corretamente no banco  
- Verificar exclusão (ou soft delete) de registros  
- Validar códigos HTTP corretos (200, 201, 403, 404)  
- Testar fluxo completo de autenticação  
- Garantir integridade das relações entre tabelas  

---

## 4. Abordagem de Testes

### **Metodologias:**
Os testes serão divididos em duas camadas:
- **Regras de Negócio (Unitários)**: validação de funções e classes isoladas  
- **Fluxo de Dados (Integração)**: validação do Controller, Service e Banco

### **Tipos de testes:**
- **Testes Unitários (Caixa Branca):** lógica interna e validações  
- **Testes de Integração (Caixa Cinza/Preta):** rotas, HTTP e persistência  

### **Ferramentas utilizadas:**
- **PHPUnit (Laravel):**
  - Criação e execução dos testes  
  - Uso de `RefreshDatabase`  
  - Geração de relatórios de cobertura  

---

## 5. Cronograma de Testes

| Fase | Data de Início | Data de Término |
|------|----------------|-----------------|
| Planeamento de testes | 29/10/2025 | 02/11/2025 |
| Criação dos cenários unitários | 07/11/2025 | 08/11/2025 |
| Execução dos testes unitários | 09/11/2025 | 11/11/2025 |
| Criação dos cenários de integração | 09/12/2025 | 10/12/2025 |

---

## 6. Entregas
- Plano de testes atualizado  
- Documento de cenários de teste detalhados (Unitários e Integração)  
- Relatórios de execução dos testes (com evidências das rotas e banco)  

---

## 7. Critérios de Entrada e Saída

### **Entrada (para iniciar testes):**
- Sistema estável e funcional  
- Funcionalidades principais implementadas  
- Ambiente de testes configurado  

### **Saída (para concluir testes):**
- 100% dos testes aprovados  
- Nenhum problema grave pendente  
- Fluxos principais funcionando sem erros  
- Cobertura de código aceitável (> 70%)  

