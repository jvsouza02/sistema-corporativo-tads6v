# Plano de Testes - Sistema de Agendamento e Gestão de Barbearias

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas  
**Projeto:** Sistema de Agendamento e Gestão de Barbearias  

---

| **Seção**          | **Detalhes**                                                                 |
|--------------------|------------------------------------------------------------------------------|
| **Título do Plano de Testes** | Plano de Testes - Sistema de Agendamento e Gestão de Barbearias - Versão 1.0 |
| **Preparado por**  | Yuri Fernandes, Maria da Paz (Analistas de Requisito e Qualidade)            |
| **Data**           | 03/11/2025                                                                  |

---

## 1. Introdução
Este plano descreve a estratégia e os procedimentos de teste para o **Sistema de Agendamento e Gestão de Barbearias**.  
O objetivo é validar que todas as funcionalidades principais funcionem corretamente, como agendamentos, cadastro de clientes, barbeiros e barbearias, garantindo que não haja conflitos de horários e que cada usuário acesse apenas o que é permitido.

---

## 2. Escopo de Testes
**Módulos e funcionalidades a serem testados:**
- Criação e edição de barbearias  
- Registro de atendimentos e histórico  

---

## 3. Objetivos de Testes
- Garantir que os agendamentos não conflitem no mesmo horário com o mesmo barbeiro  
- Validar que o sistema impeça agendamentos fora do horário de funcionamento  
- Assegurar que cada tipo de usuário acesse apenas as funções permitidas  
- Verificar se os relatórios mostram corretamente o faturamento e atendimentos  
- Confirmar que o fluxo completo de agendamento funcione sem erros  

---

## 4. Abordagem de Testes
**Metodologias:**  
Testes manuais e automatizados, com foco nas funcionalidades mais importantes.  

**Tipos de testes:**  
- Testes unitários (testes de partes específicas do código)  

**Ferramentas utilizadas:**  
- `pytest` para testes automatizados em Python  
- Relatórios com `pytest-html` para exibir resultados  

---

## 5. Cronograma de Testes
| **Fase**                 | **Data de Início** | **Data de Término** |
|---------------------------|-------------------|---------------------|
| Planejamento de testes    | 29/10/2025        | 02/11/2025          |
| Projeto de Caso de Teste  | 06/11/2025        | 08/11/2025          |
| Testes Unitários          | 08/11/2025        | 11/11/2025          |

---

## 6. Riscos e Como Vamos Evitá-los
| **Risco**                   | **Estratégia**                                               |
|-----------------------------|--------------------------------------------------------------|
| Pouco tempo para testar     | Priorizar testes das funcionalidades mais críticas           |
| Dificuldade com automação   | Focar em testes manuais para telas complexas                 |
| Mudanças durante o projeto  | Manter comunicação próxima com a equipe de desenvolvimento   |

---

## 7. Entregas
- Plano de testes  
- Casos de teste detalhados  
- Relatórios de execução de testes  
- Lista de problemas encontrados e suas correções  

---

## 8. Critérios de Entrada e Saída
**Critérios de Entrada (para iniciar os testes):**  
- O sistema precisa estar estável e funcionando  
- As funcionalidades principais devem estar prontas  
- Os casos de teste devem estar aprovados pela equipe  

**Critérios de Saída (para encerrar os testes):**  
- Pelo menos 50% dos testes devem passar com sucesso  
- Nenhum problema grave pode ficar sem correção  
- Todos os fluxos principais devem funcionar sem erro  
