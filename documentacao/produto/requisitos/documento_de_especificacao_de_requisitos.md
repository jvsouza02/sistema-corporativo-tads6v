# Documento de Especificação de Requisitos

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas  
**Projeto:** Sistema de Agendamento e Gestão de Barbearias

---

## Registro de Alterações

| Versão | Responsável     | Data       | Alterações                                                                 |
|---------|------------------|------------|----------------------------------------------------------------------------|
| 1.0     | Yuri Fernandes   | 06/10/2025 | Criação do diagrama de classes e do diagrama de caso de uso e suas especificações. |
| 1.1     | Yuri Fernandes   | 11/10/2025 | Implementação de uma funcionalidade adicional no módulo de gestão de barbearias. |
| 1.2     | Yuri Fernandes   | 18/11/2025 | Ajuste nas funcionalidades atuais de acordo com a nova demanda do cliente. |
| 1.3     | Yuri Fernandes   | 25/11/2025 | Evolução do sistema de gerenciamento de barbearias através da inclusão de uma nova funcionalidade. |
| 1.4     | Yuri Fernandes   | 10/11/2025 | Ajustes na especificação de caso de uso. |

---

## 1. Introdução

A presente especificação de requisitos tem como objetivo descrever de forma clara e organizada as características e comportamentos esperados do sistema de gestão de barbearias. Este documento busca alinhar o entendimento entre desenvolvedores, stakeholders e usuários, assegurando que todos tenham uma visão unificada sobre o propósito e o funcionamento do sistema.

A especificação apresenta os principais requisitos, casos de uso, regras e diagramas de classes que orientam o desenvolvimento, descrevendo como os atores interagem com o sistema e quais condições garantem seu correto funcionamento. Por meio deste documento, pretende-se estabelecer uma base sólida para o desenvolvimento, validação e manutenção do software, de modo que o produto atenda às necessidades do negócio e contribua para uma gestão mais eficiente e organizada das barbearias.

---

## 2. Modelo de Caso de Uso do Sistema

### 2.1. Diagrama de Caso de Uso

**Figura 1:** Diagrama de caso de uso do sistema de agendamento e gestão de barbearias.

![Diagrama de Caso de Uso](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/diagrama_de_caso_de_uso.png)


---

### 2.3. Descrição dos Atores

| Nome        | Descrição |
|--------------|-----------|
| **Proprietário** | Administrador da barbearia(s) no sistema. Ele se cadastra e realiza login, podendo criar e gerenciar as informações de suas barbearias (nome, endereço, horários de funcionamento, telefone, e-mail, descrição e foto). Também gerencia os barbeiros (dados pessoais, horários, transferências entre unidades) e acompanha o desempenho de cada barbearia por meio da listagem que mostra atendimentos semanais, barbeiros ativos e o valor total gerado na semana. |
| **Barbeiro** | Profissional que realiza os atendimentos nas barbearias. Ele acessa o sistema para visualizar os atendimentos realizados e registrar detalhes de cada serviço executado, selecionando os serviços e produtos utilizados. O sistema calcula automaticamente o valor total do atendimento, permitindo que o barbeiro edite ou remova registros conforme necessário. |

---

### 2.4. Tabela de Casos de Uso (ICAE)

| ID | Nome | Descrição | Ações Possíveis | Atores Responsáveis | Requisitos Relacionados | Classes Envolvidas |
|----|------|------------|-----------------|----------------------|--------------------------|--------------------|
| **CDU01** | Cadastrar Proprietário | Permitir que o proprietário registre e mantenha seus dados de conta no sistema. O fluxo inclui o cadastro com nome, e-mail e senha, validação de e-mail único e redirecionamento para a tela inicial após autenticação. | Inserir, Consultar, Alterar, Excluir | Proprietário | RF01, RN01 | — |
| **CDU02** | Gerenciar Barbearias | Permitir que o proprietário crie, visualize, edite e exclua barbearias sob sua administração. | Inserir, Consultar, Alterar, Excluir | Proprietário | RF02, RN02, RN03 | — |
| **CDU03** | Listar Barbearias | Exibir todas as barbearias cadastradas, com informações principais e métricas de desempenho. | Consultar | Proprietário | RF03, RN03 | — |
| **CDU04** | Gerenciar Barbeiros | Cadastrar, consultar, alterar e excluir barbeiros vinculados às barbearias. | Inserir, Consultar, Alterar, Excluir | Proprietário | RF04, RN02, RN05, RN06 | — |
| **CDU05** | Registrar Atendimento | Registrar e manter os atendimentos realizados pelo barbeiro, informando serviços e produtos utilizados. | Inserir, Consultar, Alterar, Excluir | Barbeiro | RF05, RN02, RN04, RN06 | — |

---

### 2.5. Detalhamento dos Casos de Uso

---

#### **CDU01 – Cadastrar Proprietário**

**Escopo:** Cadastro e gerenciamento do proprietário no sistema.  
**Propósito:** Permitir que o proprietário crie uma conta com nome, e-mail e senha, garantindo que o e-mail não se repita.  
**Ator:** Proprietário  

**Pré-condições:**
- O usuário deve acessar a tela de cadastro.  
- O e-mail informado não pode estar sendo usado por outro proprietário.  

**Pós-condições:**
- Cadastro realizado com sucesso.  
- Redirecionamento para a tela inicial.  

**Fluxo Normal:**
1. Proprietário acessa a tela de cadastro.  
2. Preenche nome, e-mail e senha.  
3. Sistema valida e cria o cadastro.  
4. Exibe mensagem de sucesso.  

**Fluxos de Exceção:**
- E1: Campos obrigatórios vazios.  
- E2: E-mail já cadastrado.  
- E3: Erro ao salvar.  

**Requisitos Relacionados:** RF01, RN01, RNF02

---

#### **CDU02 – Gerenciar Barbearias**

**Escopo:** Cadastro e gerenciamento das barbearias pertencentes ao proprietário.  
**Propósito:** Permitir que o proprietário cadastre novas barbearias e edite informações.  
**Ator:** Proprietário  

**Pré-condições:**  
- Proprietário deve estar logado.  
- O e-mail da barbearia deve ser único.  

**Pós-condições:**  
- Barbearia criada e vinculada.  
- Listagem atualizada.  

**Fluxo Normal:**  
1. Proprietário acessa “Minhas Barbearias”.  
2. Clica em “Cadastrar Barbearia”.  
3. Preenche dados e salva.  
4. Sistema valida e confirma o registro.  

**Fluxos de Exceção:**  
- E1: Campos obrigatórios vazios.  
- E2: E-mail já usado.  
- E3: Erro ao salvar.  
- E4: Nenhuma barbearia cadastrada.  

**Requisitos Relacionados:** RF02, RF03, RN02, RN03, RNF01

---

#### **CDU03 – Listar Barbearias**

**Escopo:** Exibir barbearias cadastradas do proprietário.  
**Propósito:** Visualizar dados e desempenho das barbearias.  
**Ator:** Proprietário  

**Pré-condições:**  
- Proprietário logado.  
- Ao menos uma barbearia cadastrada.  

**Pós-condições:**  
- Lista exibida corretamente.  

**Fluxo Normal:**  
1. Proprietário acessa “Minhas Barbearias”.  
2. Sistema exibe listagem.  

**Fluxos de Exceção:**  
- E1: Falha na consulta.  
- E2: Nenhuma barbearia cadastrada.  

**Requisitos Relacionados:** RF03, RN03, RNF01

---

#### **CDU04 – Gerenciar Barbeiros**

**Escopo:** Cadastrar, editar, remover e transferir barbeiros.  
**Propósito:** Permitir gestão completa dos barbeiros das barbearias.  
**Ator:** Proprietário  

**Pré-condições:**  
- Proprietário logado.  
- Ao menos uma barbearia cadastrada.  

**Pós-condições:**  
- Barbeiro cadastrado e vinculado.  

**Fluxo Normal:**  
1. Proprietário acessa “Barbeiros”.  
2. Clica em “Novo Barbeiro”.  
3. Preenche e salva.  
4. Sistema confirma operação.  

**Fluxos de Exceção:**  
- E1: Campos obrigatórios vazios.  
- E2: E-mail já usado.  
- E3: Erro ao salvar.  

**Requisitos Relacionados:** RF04, RN02, RN05, RN06, RNF01

---

#### **CDU05 – Registrar Atendimento**

**Escopo:** Registro e histórico dos atendimentos realizados.  
**Propósito:** Permitir registro de serviços e produtos utilizados.  
**Ator:** Barbeiro  

**Pré-condições:**  
- Barbeiro logado.  
- Vinculado a uma barbearia.  
- Serviços e produtos cadastrados.  

**Pós-condições:**  
- Atendimento salvo e histórico atualizado.  

**Fluxo Normal:**  
1. Barbeiro acessa “Atendimentos”.  
2. Clica em “Novo Atendimento”.  
3. Seleciona serviços e produtos.  
4. Sistema calcula e salva.  

**Fluxos de Exceção:**  
- E1: Nenhum serviço selecionado.  
- E2: Erro ao salvar.  

**Requisitos Relacionados:** RF05, RN04, RN06, RNF01

---

## 3. Diagrama de Classe do Sistema

**Figura 2:** Diagrama de classes do sistema de agendamento e gestão de barbearias.

![Diagrama de Classe](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/diagrama_de_classes.png)


---
