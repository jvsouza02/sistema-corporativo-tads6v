# Plano de Teste - Sistema de Agendamento e Gestão de Barbearias  

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
Este documento apresenta o **Plano de Testes** do *Sistema de Agendamento e Gestão de Barbearias*.  
Ele tem como objetivo explicar como os testes do sistema serão organizados e realizados, garantindo que todas as funcionalidades funcionem corretamente antes da entrega final.  

No plano estão descritos o **escopo** do que será testado, os **objetivos** que se deseja alcançar com os testes, a **forma como eles serão aplicados**, o **cronograma de execução**, os **riscos que podem ocorrer** durante o processo, além das **entregas esperadas** e dos **critérios usados para iniciar e finalizar os testes**.  

Esse documento serve como guia para a equipe de desenvolvimento e qualidade, ajudando a garantir que o sistema atenda aos requisitos e ofereça uma boa experiência para seus usuários.  

---

## 2. Escopo de Testes  
**Módulos e funcionalidades a serem testados:**  
- Criação e edição de barbearias  
- Cadastro, edição e gerenciamento de barbeiros  
- Registro, edição e exclusão de atendimentos  
- Cálculo automático de valores totais em atendimentos  
- Controle de acesso e autenticação de usuários (proprietário e barbeiro)  
- Exibição de mensagens de validação e feedback do sistema  
- Visualização de histórico de atendimentos  

**Fora do escopo:**  
- Testes de desempenho, carga e segurança 

---

## 3. Objetivos de Testes  
- **Verificar a conformidade** das funcionalidades com os requisitos definidos no documento de requisitos 
- **Validar o correto funcionamento** dos módulos de criação, edição e gerenciamento de barbearias, barbeiros e atendimentos
- **Assegurar a integridade dos cálculos automáticos** realizados nos registros de atendimento 
- **Confirmar a consistência das informações exibidas** e o comportamento esperado nas diferentes ações do usuário 
- **Garantir a exibição adequada de mensagens** de erro, alerta e sucesso durante as operações 
- **Validar o controle de acesso e autenticação** de usuários de diferentes perfis (proprietário e barbeiro)
- **Identificar e registrar eventuais falhas**, inconsistências ou comportamentos incorretos para posterior correção

---

## 4. Abordagem de Testes  
**Metodologias:**  
Os testes serão realizados de forma **manual e automatizada**, priorizando as funcionalidades principais do sistema e os fluxos mais críticos para o usuário.  

**Tipos de testes:**  
- Testes funcionais  
- Testes de interface  
- Testes de validação de regras de negócio  

**Ferramentas utilizadas:**  
- `pytest` para automação de testes em Python  
- `pytest-html` para geração de relatórios de resultados  

---

## 5. Cronograma de Testes  
| **Fase**                 | **Data de Início** | **Data de Término** |
|---------------------------|-------------------|---------------------|
| Planejamento de testes    | 29/10/2025        | 02/11/2025          |
| Criação dos cenários de teste | 07/11/2025        | 08/11/2025          |
| Execução dos testes       | 09/11/2025        | 11/11/2025          |

---

## 6. Riscos e Como Vamos Evitá-los  
| **Risco**                   | **Estratégia**                                               |
|-----------------------------|--------------------------------------------------------------|
| Pouco tempo para testar     | Priorizar as funcionalidades mais importantes e críticas     |
| Dificuldade na automação    | Focar em testes manuais para áreas mais complexas            |
| Mudanças no sistema durante os testes | Manter comunicação constante com a equipe de desenvolvimento |

---

## 7. Entregas  
- Plano de testes atualizado  
- Documento de cenários de teste detalhados  
- Relatórios de execução dos testes  
- Registro de falhas encontradas e correções aplicadas  

---

## 8. Critérios de Entrada e Saída  
**Critérios de Entrada (para iniciar os testes):**  
- O sistema deve estar estável e funcional  
- As principais funcionalidades precisam estar prontas  
- Os casos de teste devem estar revisados e aprovados  

**Critérios de Saída (para encerrar os testes):**  
- Todos os testes críticos devem ser executados  
- Nenhum erro grave deve permanecer sem correção  
- Os fluxos principais do sistema devem funcionar corretamente  
