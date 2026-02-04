# Plano de Projeto

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas</br>
**Projeto:** Sistema de Gestão de Barbearias

---

## 1. Escopo do Projeto

Este projeto tem como objetivo desenvolver um sistema de gestão para barbearias de pequeno e médio porte, por meio de uma plataforma web acessível pelo navegador. O sistema será utilizado para substituir métodos tradicionais de organização, como agendas físicas e planilhas, oferecendo uma solução digital para controlar clientes, agendamentos, produtos e estoque, serviços e equipe de trabalho.

O sistema busca resolver problemas comuns enfrentados pelas barbearias, como desorganização de horários, dificuldade no controle das atividades e falta de padronização no atendimento. A solução permite que os proprietários acompanhem o funcionamento do negócio, que os barbeiros registrem atendimentos de forma organizada e que os clientes realizem agendamentos de maneira simples e rápida.

O desenvolvimento do projeto seguirá boas práticas de engenharia de software, com foco em organização, qualidade e confiabilidade. O sistema centraliza informações, automatiza tarefas do dia a dia e apoia a tomada de decisões, contribuindo para a modernização e melhoria da gestão das barbearias.

### 1.1 Metodologia

O projeto será desenvolvido utilizando uma metodologia iterativa e incremental, permitindo que o sistema evolua aos poucos, com entregas frequentes e possibilidade de ajustes ao longo do desenvolvimento.

Para a organização e acompanhamento das atividades, será utilizado o GitHub Projects com quadro Kanban, que permite a visualização das tarefas, controle do andamento e melhor organização do trabalho.

### 1.2 Fases do Projeto

O desenvolvimento do sistema será organizado em iterações semanais, também chamadas de sprints. A cada semana, novas funcionalidades são desenvolvidas ou aprimoradas de forma gradual.

Ao final de cada sprint, será realizada uma reunião com o cliente para apresentação das funcionalidades desenvolvidas, validação das entregas e levantamento de novas demandas para as próximas iterações.

### 1.3 Controles do Projeto

O projeto adota controles simples para garantir organização, qualidade e acompanhamento das atividades. A gestão do trabalho é realizada por meio de um quadro Kanban, permitindo identificar o status de cada tarefa durante o desenvolvimento.

São definidos critérios claros de entrada e saída para cada status do quadro Kanban, como Indefinido, Pronto, Em Andamento, Revisão e Feito. Além disso, há padronização dos documentos produzidos, versionamento do código-fonte e validação das funcionalidades antes de serem consideradas concluídas, garantindo maior controle e confiabilidade no projeto.

### 1.4 Entregáveis

Ao longo do projeto, serão entregues os seguintes itens:

- Plano de Projeto
- Documento de Visão
- Documento de Requisitos
- Documento de Especificação de Requisitos
- Especificações Técnicas
- Plano de Testes
- Cenários de Teste
- Relatórios de Teste
- Código-fonte desenvolvido
- Sistema pronto para uso

### 1.5 Fora do Escopo

Não fazem parte deste projeto:

- Funcionalidades de pagamento, como cartão ou outras formas
- Desenvolvimento de aplicativo para celular, pois o sistema funcionará pelo navegador
- Login por redes sociais, sendo o cadastro feito diretamente no sistema

---

## 2. Gerenciamento de Riscos

**Tabela 1: Avaliar e tratar incertezas e ameaças**

| ID | Risco Identificado | Probabilidade | Impacto | Prevenção | Plano de Ação |
|----|-------------------|---------------|---------|-----------|---------------|
| GR01 | Usuários terem dificuldade em usar o sistema no início | Alta | Médio | Orientação básica e telas simples | Apoio inicial e adaptação gradual ao uso |
| GR02 | Clientes cadastrados com informações incompletas | Média | Médio | Solicitar dados obrigatórios no cadastro | Atualizar os dados manualmente |
| GR03 | Agendamentos feitos para horários já ocupados | Baixa | Médio | Verificação de horários disponíveis | Reagendar o atendimento e avisar o cliente |
| GR04 | Agendamento marcado para horário passado | Baixa | Baixo | Bloquear datas anteriores | Solicitar novo agendamento |
| GR05 | Atendimento registrado sem serviço informado | Baixa | Médio | Exigir escolha do serviço | Corrigir o atendimento registrado |
| GR06 | Valor do atendimento informado incorretamente | Média | Médio | Conferência do valor antes de salvar | Ajustar o valor após o registro |
| GR07 | Produto utilizado não registrado no atendimento | Média | Alto | Orientar registro correto dos produtos | Ajustar manualmente o estoque |
| GR08 | Estoque ficar incorreto por erro de registro | Média | Alto | Conferência periódica do estoque | Correção manual das quantidades |
| GR09 | Produto acabar sem aviso prévio | Baixa | Médio | Definir quantidade mínima | Reposição do produto no estoque |
| GR10 | Exclusão acidental de atendimentos ou cadastros | Baixa | Médio | Confirmação antes de excluir | Recriar o registro excluído |
| GR11 | Usuário acessar área que não deveria | Baixa | Alto | Controle de acesso por tipo de usuário | Bloquear acesso e revisar permissões |

---

## 3. EAP - Estrutura Analítica do Projeto

**Figura 1:** A seguir o EAP, organizando todas as entregas e tarefas de forma visual.

![EAP](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/EAP%20-%20Barbearias%20-%20P%C3%A1gina%204%20(1).png)

---

## 4.1. Definição Das Atividades Dos Pacotes De Trabalho

### 1.1 Definir Contexto e Responsabilidades do Sistema

**Objetivo**

Definir o contexto do sistema, seus limites, responsabilidades, público-alvo e estabelecer o escopo inicial do projeto.

**Descrição**

Esta etapa tem como finalidade compreender o problema de negócio, identificar os envolvidos, definir papéis e responsabilidades, bem como estruturar o plano do projeto e o escopo inicial do sistema de gestão de barbearias.

**Atividades do EAP**

- **1.1.1 – Análise de Negócio I: Contexto do Sistema**  
  Realizar a análise inicial do negócio, identificando o contexto, objetivos e limites do sistema.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

- **1.1.2 – Criação de Papéis e Responsabilidades**  
  Definir os papéis dos usuários do sistema e suas respectivas responsabilidades.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

- **1.1.3 – Criação de um Plano de Projeto Definindo o Escopo do Projeto**  
  Elaborar o plano do projeto, detalhando escopo, objetivos e entregas principais.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

- **1.1.4 – Determinando Público-Alvo e Necessidade do Negócio**  
  Identificar o público-alvo do sistema e as principais necessidades de negócio.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

**Artefatos**

Documento de Contexto do Sistema; Plano de Projeto; Definição de Escopo; Documento de Papéis e Responsabilidades.

---

### 1.2 Gerenciar Cadastros de Barbearias e Barbeiros, e Registrar Atendimentos

**Objetivo**

Implementar as funcionalidades básicas de cadastro de barbearias e barbeiros, além de registrar atendimentos realizados, estabelecendo as operações fundamentais do sistema.

**Descrição**

Esta etapa visa estabelecer as bases do sistema, permitindo o gerenciamento das barbearias, dos barbeiros e o registro dos atendimentos realizados, garantindo a rastreabilidade das operações diárias.

**Atividades do EAP**

- **1.2.1 – Análise de Negócio II: Atender as Funções das Barbearias, Barbeiros e Atendimentos**  
  Compreender as necessidades de negócio relacionadas ao cadastro de barbearias, barbeiros e registro de atendimentos.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

- **1.2.2 – Levantamento de Requisitos I: Registrar Atendimento, Gerenciar Barbearias e Gerenciar Barbeiros**  
  Levantar os requisitos funcionais e não funcionais para as funcionalidades de registro de atendimento, gerenciamento de barbearias e gerenciamento de barbeiros.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.2.3 – Especificação de Requisitos I: Registrar Atendimento, Gerenciar Barbearias e Gerenciar Barbeiros**  
  Especificar detalhadamente os requisitos levantados, garantindo clareza e testabilidade.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.2.4 – Implementação da Funcionalidade de Gerenciar Barbearias**  
  Desenvolver a funcionalidade de gerenciamento de barbearias (cadastrar, editar, excluir, listar).  
  Responsáveis: Desenvolvedor (DEV)

- **1.2.5 – Implementação da Funcionalidade de Gerenciar Barbeiros**  
  Desenvolver a funcionalidade de gerenciamento de barbeiros (cadastrar, editar, excluir, listar).  
  Responsáveis: Desenvolvedor (DEV)

- **1.2.6 – Implementação da Funcionalidade de Registrar Atendimentos**  
  Desenvolver a funcionalidade de registro de atendimentos (realizar atendimento, registrar detalhes).  
  Responsáveis: Desenvolvedor (DEV)

- **1.2.7 – Criando Documentos de Requisitos e Especificação de Requisitos**  
  Consolidar os documentos de requisitos e especificação produzidos.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

**Artefatos**

Documento de Requisitos; Especificação de Requisitos; Código Fonte das Funcionalidades; Manual do Usuário (parcial).

---

### 1.3 Administrar Funções ao Proprietário e Acesso ao Sistema

**Objetivo**

Implementar as funcionalidades de gerenciamento de proprietários e controle de acesso (login) ao sistema, garantindo segurança e gestão de usuários.

**Descrição**

Nesta etapa, são desenvolvidas as funcionalidades que permitem o gerenciamento de proprietários e o sistema de autenticação (login), além de aprimoramentos nas funcionalidades já implementadas para maior estabilidade.

**Atividades do EAP**

- **1.3.1 – Análise de Negócio III: Atender a Função de Gerenciamento de Proprietário**  
  Compreender as necessidades de negócio relacionadas ao gerenciamento de proprietários e controle de acesso.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

- **1.3.2 – Levantamento de Requisitos II: Gerenciar Proprietários e Realizar Login**  
  Levantar os requisitos para gerenciamento de proprietários e funcionalidade de login.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.3.3 – Especificação de Requisitos II: Gerenciar Proprietários e Realizar Login**  
  Especificar detalhadamente os requisitos levantados.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.3.4 – Implementação da Funcionalidade de Gerenciar Proprietários**  
  Desenvolver a funcionalidade de gerenciamento de proprietários.  
  Responsáveis: Desenvolvedor (DEV)

- **1.3.5 – Implementação da Funcionalidade de Realizar Login**  
  Desenvolver a funcionalidade de autenticação (login) no sistema.  
  Responsáveis: Desenvolvedor (DEV)

- **1.3.6 – Aprimoramento da Funcionalidade I de Registrar Atendimentos e Gerenciar Barbearias**  
  Realizar ajustes e melhorias nas funcionalidades de registrar atendimentos e gerenciar barbearias.  
  Responsáveis: Desenvolvedor (DEV)

**Artefatos**

Documento de Requisitos Atualizado; Especificação de Requisitos Atualizada; Código Fonte das Funcionalidades; Manual do Usuário (parcial).

---

### 1.4 Visualizar Consulta de Barbearias e Realização de Agendamentos

**Objetivo**

Implementar funcionalidades de consulta de barbearias e realização de agendamentos, além de aprimorar funcionalidades existentes para melhorar a experiência do cliente.

**Descrição**

Esta etapa foca em permitir que os clientes visualizem detalhes das barbearias e realizem agendamentos, melhorando a experiência do usuário e a integração entre funcionalidades.

**Atividades do EAP**

- **1.4.1 – Análise de Negócio IV: Para Consultar Detalhes das Barbearias e Realizar Agendamentos**  
  Compreender as necessidades de negócio relacionadas à consulta de barbearias e agendamentos.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

- **1.4.2 – Levantamento de Requisitos III: Consultar Barbearias e Realizar Agendamentos**  
  Levantar os requisitos para consulta de barbearias e realização de agendamentos.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.4.3 – Especificação de Requisitos III: Consultar Barbearias e Realizar Agendamentos**  
  Especificar detalhadamente os requisitos levantados.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.4.4 – Implementação da Funcionalidade de Consultar Barbearias**  
  Desenvolver a funcionalidade de consulta de barbearias.  
  Responsáveis: Desenvolvedor (DEV)

- **1.4.5 – Implementação da Funcionalidade de Realizar Agendamentos**  
  Desenvolver a funcionalidade de realização de agendamentos.  
  Responsáveis: Desenvolvedor (DEV)

- **1.4.6 – Aprimoramento da Funcionalidade II: Registrar Atendimentos e Gerenciar Barbearias**  
  Realizar ajustes e melhorias nas funcionalidades de registrar atendimentos e gerenciar barbearias.  
  Responsáveis: Desenvolvedor (DEV)

**Artefatos**

Documento de Requisitos Atualizado; Especificação de Requisitos Atualizada; Código Fonte das Funcionalidades; Manual do Usuário (parcial).

---

### 1.5 Transferir Barbeiros Entre Barbearias

**Objetivo**

Implementar a funcionalidade de transferência de barbeiros entre barbearias e criar o plano de testes para validação do sistema.

**Descrição**

Esta etapa visa desenvolver a funcionalidade que permite transferir barbeiros entre barbearias, garantindo flexibilidade na gestão de recursos humanos, e estabelecer o plano de testes do sistema.

**Atividades do EAP**

- **1.5.1 – Análise de Negócio V: Para Transferência de Barbeiros Entre Barbearias**  
  Compreender as necessidades de negócio relacionadas à transferência de barbeiros.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

- **1.5.2 – Requisito de Requisitos: Consultar Barbearias, Gerenciar Barbeiros para a Função de Transferência de Barbeiros**  
  Levantar os requisitos para a funcionalidade de transferência de barbeiros.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.5.3 – Requisito na Especificação de Requisitos: Consultar Barbearias, Gerenciar Barbeiros, Para a Função Transferência de Barbeiros e Métricas**  
  Especificar detalhadamente os requisitos da funcionalidade de transferência de barbeiros e métricas relacionadas.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.5.4 – Aprimoramento da Funcionalidade III: Consultar Barbearias e Gerenciar Barbeiros**  
  Realizar ajustes e melhorias nas funcionalidades de consultar barbearias e gerenciar barbeiros para suportar a transferência.  
  Responsáveis: Desenvolvedor (DEV)

- **1.5.5 – Criando Plano de Testes**  
  Elaborar o plano de testes do sistema, definindo estratégias, cenários e critérios de aceitação.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

**Artefatos**

Documento de Requisitos Atualizado; Especificação de Requisitos Atualizada; Plano de Testes; Código Fonte das Funcionalidades.

---

### 1.6 Realizar Testes Unitários

**Objetivo**

Realizar testes unitários no sistema e ajustar os planos de projeto e testes com base nos resultados obtidos.

**Descrição**

Esta etapa é dedicada à execução de testes unitários para garantir a qualidade do código, além de ajustes nos planos de projeto e testes com base no andamento do desenvolvimento.

**Atividades do EAP**

- **1.6.1 – Criação de Cenários de Teste I: Testes Unitários**  
  Criar cenários de teste para os testes unitários.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.6.2 – Ajuste no Plano de Projeto I: Inserindo EAP, Cronograma e Esforço e Custos, e Gestão de Riscos**  
  Atualizar o plano do projeto com EAP, cronograma, esforço, custos e gestão de riscos.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

- **1.6.3 – Implementação Testes I: Testes Unitários**  
  Executar os testes unitários no código desenvolvido.  
  Responsáveis: Desenvolvedor (DEV)

- **1.6.4 – Ajuste no Plano de Testes I: Aprimorar Modelo de Documento**  
  Aprimorar o plano de testes com base nos resultados iniciais.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

**Artefatos**

Cenários de Teste Unitário; Plano de Projeto Atualizado; Plano de Testes Atualizado; Relatório de Testes Unitários.

---

### 1.7 Resolver Inconsistências na Documentação

**Objetivo**

Corrigir inconsistências identificadas na documentação e nos testes unitários, ajustando planos conforme necessário.

**Descrição**

Com base nos resultados dos testes unitários e revisão da documentação, esta etapa visa corrigir falhas e inconsistências, garantindo a integridade dos artefatos do projeto.

**Atividades do EAP**

- **1.7.1 – Correção de Testes I: Testes Unitários Apresentando Falha**  
  Corrigir as falhas identificadas nos testes unitários.  
  Responsáveis: Desenvolvedor (DEV)

- **1.7.2 – Criar Relatório de Testes I**  
  Elaborar relatório dos testes unitários realizados.  
  Responsáveis: Desenvolvedor (DEV)

- **1.7.3 – Ajuste no Plano de Testes II: Adicionar Tecnologias Usadas Para Testes**  
  Atualizar o plano de testes com as tecnologias utilizadas.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.7.4 – Ajustar Documento de Especificação de Requisitos: Inconsistências com o Sistema nos Diagramas**  
  Corrigir inconsistências nos diagramas do documento de especificação de requisitos.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.7.5 – Gerando Relatório de Testes I**  
  Consolidar o relatório de testes I.  
  Responsáveis: Desenvolvedor (DEV)

- **1.7.6 – Ajustes no Plano de Projeto II: Correção na EAP e Cronograma**  
  Ajustar o plano do projeto corrigindo a EAP e o cronograma.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

**Artefatos**

Relatório de Testes Unitários; Documento de Especificação de Requisitos Atualizado; Plano de Testes Atualizado; Plano de Projeto Atualizado.

---

### 1.8 Gerenciar Histórico de Atendimentos e Serviços

**Objetivo**

Implementar funcionalidades de gerenciamento de serviços e histórico de atendimentos para ampliar a capacidade analítica do sistema.

**Descrição**

Esta etapa expande o sistema com funcionalidades para gerenciar serviços oferecidos pelas barbearias e manter o histórico de atendimentos, enriquecendo a capacidade de relatórios e análise.

**Atividades do EAP**

- **1.8.1 – Análise de Negócio VI: Para as Funções de Gerenciamento de Serviços e Histórico de Atendimento**  
  Compreender as necessidades de negócio relacionadas a serviços e histórico de atendimentos.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

- **1.8.2 – Levantamento de Requisitos IV: Gerenciar Serviços e Histórico de Atendimento**  
  Levantar os requisitos para gerenciamento de serviços e histórico de atendimentos.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.8.3 – Especificação de Requisitos IV: Gerenciar Serviços e Histórico de Atendimento**  
  Especificar detalhadamente os requisitos levantados.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.8.4 – Implementação da Funcionalidade de Gerenciar Serviços**  
  Desenvolver a funcionalidade de gerenciamento de serviços.  
  Responsáveis: Desenvolvedor (DEV)

- **1.8.5 – Implementação da Funcionalidade de Histórico de Atendimentos**  
  Desenvolver a funcionalidade de histórico de atendimentos.  
  Responsáveis: Desenvolvedor (DEV)

**Artefatos**

Documento de Requisitos Atualizado; Especificação de Requisitos Atualizada; Código Fonte das Funcionalidades; Manual do Usuário (parcial).

---

### 1.9 Cadastrar Clientes ao Sistema e Gerenciar Produtos e Estoques

**Objetivo**

Implementar funcionalidades de cadastro de clientes, gerenciamento de produtos e estoques, histórico de agendamentos e alerta de estoque baixo.

**Descrição**

Nesta etapa, o sistema é ampliado com funcionalidades de cadastro de clientes, gestão de produtos e estoques, além de histórico de agendamentos e alertas, integrando várias áreas do negócio.

**Atividades do EAP**

- **1.9.1 – Análise de Negócio VII: Para as Funções de Gestão de Clientes, Produtos e Histórico de Agendamentos**  
  Compreender as necessidades de negócio relacionadas a clientes, produtos, estoque e agendamentos.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

- **1.9.2 – Levantamento de Requisitos V: Cadastrar Clientes, Realizar Agendamento e Gerenciar Produtos e Estoque**  
  Levantar os requisitos para cadastro de clientes, agendamentos e gestão de produtos e estoque.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.9.3 – Especificação de Requisitos V: Cadastrar Clientes, Realizar Agendamento e Gerenciar Produtos e Estoque**  
  Especificar detalhadamente os requisitos levantados.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.9.4 – Implementação da Funcionalidade de Cadastrar Clientes**  
  Desenvolver a funcionalidade de cadastro de clientes.  
  Responsáveis: Desenvolvedor (DEV)

- **1.9.5 – Implementação da Funcionalidade de Histórico de Agendamento**  
  Desenvolver a funcionalidade de histórico de agendamentos.  
  Responsáveis: Desenvolvedor (DEV)

- **1.9.6 – Implementação da Funcionalidade de Gerenciar de Produtos e Estoque**  
  Desenvolver a funcionalidade de gerenciamento de produtos e estoque.  
  Responsáveis: Desenvolvedor (DEV)

- **1.9.7 – Implementação da Funcionalidade de Alerta de Estoque Baixo**  
  Desenvolver a funcionalidade de alerta de estoque baixo.  
  Responsáveis: Desenvolvedor (DEV)

**Artefatos**

Documento de Requisitos Atualizado; Especificação de Requisitos Atualizada; Código Fonte das Funcionalidades; Manual do Usuário (parcial).

---

### 1.10 Realizar Testes de Integração

**Objetivo**

Realizar testes de integração no sistema, aprimorar funcionalidades e ajustar planos conforme os resultados.

**Descrição**

Esta etapa é dedicada à execução de testes de integração para verificar a interoperabilidade entre os módulos do sistema, com ajustes nas funcionalidades e planos conforme necessários.

**Atividades do EAP**

- **1.10.1 – Implementação de Testes II: Testes de Integração**  
  Executar testes de integração entre os módulos do sistema.  
  Responsáveis: Desenvolvedor (DEV)

- **1.10.2 – Aprimoramento da Funcionalidade IV: Registrar Atendimento**  
  Realizar melhorias na funcionalidade de registrar atendimento com base nos testes.  
  Responsáveis: Desenvolvedor (DEV)

- **1.10.3 – Criar Cenários de Teste II: Teste de Integração**  
  Criar cenários de teste para os testes de integração.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.10.4 – Ajuste no Plano de Testes III: Incluir Teste de Integração**  
  Atualizar o plano de testes incluindo os testes de integração.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.10.5 – Ajuste no Plano de Projeto III: EAP seguir padrão iterativo-incremental**  
  Ajustar o plano do projeto para seguir o padrão iterativo-incremental.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

- **1.10.6 – Gerando Relatório de Testes II**  
  Elaborar relatório dos testes de integração.  
  Responsáveis: Desenvolvedor (DEV)

**Artefatos**

Cenários de Teste de Integração; Relatório de Testes de Integração; Plano de Testes Atualizado; Plano de Projeto Atualizado; Código Fonte Aprimorado.

---

### 1.11 Realizar Testes Exploratórios

**Objetivo**

Realizar testes exploratórios no sistema e ajustar o plano de testes para abranger cenários não previstos.

**Descrição**

Nesta etapa, são realizados testes exploratórios para identificar falhas não previstas nos testes formais, aumentando a confiabilidade do sistema.

**Atividades do EAP**

- **1.11.1 – Criação de Cenários de Teste III: Testes Exploratórios**  
  Criar cenários de teste para os testes exploratórios.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.11.2 – Ajuste Plano de Testes IV: Incluir Teste Exploratório**  
  Atualizar o plano de testes incluindo os testes exploratórios.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

**Artefatos**

Cenários de Teste Exploratório; Plano de Testes Atualizado.

---

### 1.12 Consolidar Documentação e Testes

**Objetivo**

Consolidar toda a documentação do projeto, realizar testes finais e gerar relatórios completos.

**Descrição**

Esta etapa final visa revisar e consolidar toda a documentação do projeto, realizar os últimos testes (exploratórios e correções de unitários) e gerar os relatórios finais de testes, garantindo a completude do projeto.

**Atividades do EAP**

- **1.12.1 – Implementação de Testes III: Teste Exploratório**  
  Executar testes exploratórios no sistema.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.12.2 – Ajuste no Documento de Especificação de Requisitos: Diagramas de classe, DER**  
  Ajustar os diagramas de classe e DER no documento de especificação de requisitos.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.12.3 – Ajuste no Documento de Requisitos: Diagrama de Domínio**  
  Ajustar o diagrama de domínio no documento de requisitos.  
  Responsáveis: Analista de Requisitos e QA (AR/QA)

- **1.12.4 – Ajuste Plano de Projeto IV: EAP, Cronograma e Gráficos de Monitoramento**  
  Atualizar o plano do projeto com a EAP final, cronograma e gráficos de monitoramento.  
  Responsáveis: Gerente de Projeto (GP) e Analista de Negócio (AN)

- **1.12.5 – Correção de Testes II: Testes Unitários Apresentando Falha**  
  Corrigir falhas remanescentes nos testes unitários.  
  Responsáveis: Desenvolvedor (DEV)

- **1.12.6 – Gerando Relatório de Testes III**  
  Elaborar o relatório final de testes.  
  Responsáveis: Desenvolvedor (DEV)

**Artefatos**

Documento de Especificação de Requisitos Final; Documento de Requisitos Final; Plano de Projeto Final; Relatório Final de Testes; Código Fonte Final.

---

## 5. Estimativa de Esforço e Custo e Cronograma de Atividades

### 5.1 Definir contexto e responsabilidades do sistema

| Atividade | GP (h) | AN (h) | AR/QA (h) | DEV (h) | Horas Totais | Início | Término | Custo (R$) |
|-----------|--------|--------|-----------|---------|--------------|--------|---------|------------|
| 1.1.1 Análise de Negócio I: Contexto do Sistema | 4h | 4h | 0h | 0h | 8h | 01/10/2025 | 01/10/2025 | 526,32 |
| 1.1.2 Criação de Papéis e Responsabilidades | 4h | 4h | 0h | 0h | 8h | 02/10/2025 | 02/10/2025 | 526,32 |
| 1.1.3 Criação de um Plano de Projeto Definindo o Escopo do Projeto | 8h | 4h | 0h | 0h | 12h | 03/10/2025 | 03/10/2025 | 802,63 |
| 1.1.4 Determinando Público-Alvo e Necessidade do Negócio | 4h | 4h | 0h | 0h | 8h | 04/10/2025 | 04/10/2025 | 526,32 |
| **Total do Pacote 1** | **20h** | **16h** | **0h** | **0h** | **36h** | **01/10/2025** | **04/10/2025** | **2.381,59** |

### 5.2 Gerenciar Cadastros de Barbearias e Barbeiros, e Registrar Atendimentos

| Atividade | GP (h) | AN (h) | AR/QA (h) | DEV (h) | Horas Totais | Início | Término | Custo (R$) |
|-----------|--------|--------|-----------|---------|--------------|--------|---------|------------|
| 1.2.1 Análise de Negócio II: Atender as Funções das Barbearias, Barbeiros e Atendimentos | 4h | 4h | 0h | 0h | 8h | 08/10/2025 | 08/10/2025 | 526,32 |
| 1.2.2 Levantamento de Requisitos I: Registrar Atendimento, Gerenciar Barbearias e Gerenciar Barbeiros | 0h | 0h | 4h | 0h | 4h | 09/10/2025 | 09/10/2025 | 225,00 |
| 1.2.3 Especificação de Requisitos I: Registrar Atendimento, Gerenciar Barbearias e Gerenciar Barbeiros | 0h | 0h | 4h | 0h | 4h | 10/10/2015 | 10/10/2025 | 225,00 |
| 1.2.4 Implementação da Funcionalidade de Gerenciar Barbearias | 0h | 0h | 0h | 16h | 16h | 11/10/2025 | 12/10/2025 | 422,00 |
| 1.2.5 Implementação da Funcionalidade de Gerenciar Barbeiros | 0h | 0h | 0h | 16h | 16h | 11/10/2025 | 12/10/2025 | 422,00 |
| 1.2.6 Implementação da Funcionalidade de Registrar Atendimentos | 0h | 0h | 0h | 16h | 16h | 13/10/2025 | 14/10/2025 | 422,00 |
| 1.2.7 Criando Documentos de Requisitos e Especificação de Requisitos | 0h | 0h | 4h | 0h | 4h | 14/10/2025 | 14/10/2025 | 225,00 |
| **Total Pacote 2** | **4h** | **4h** | **12h** | **48h** | **68h** | **08/10/2025** | **14/10/2025** | **2.467,32** |

### 5.3 Administrar Funções ao Proprietário e Acesso ao Sistema

| Atividade | GP (h) | AN (h) | AR/QA (h) | DEV (h) | Horas Totais | Início | Término | Custo (R$) |
|-----------|--------|--------|-----------|---------|--------------|--------|---------|------------|
| 1.3.1 Análise de Negócio III: Atender a Função de Gerenciamento de Proprietário | 4h | 4h | 0h | 0h | 8h | 15/10/2025 | 15/10/2025 | 526,32 |
| 1.3.2 Levantamento de Requisitos II: Gerenciar Proprietários e Realizar Login | 0h | 0h | 4h | 0h | 4h | 16/10/2025 | 16/10/2025 | 225,00 |
| 1.3.3 Especificação de Requisitos II: Gerenciar Proprietários e Realizar Login | 0h | 0h | 4h | 0h | 4h | 17/10/2025 | 17/10/2025 | 225,00 |
| 1.3.4 Implementação da Funcionalidade de Gerenciar Proprietários | 0h | 0h | 0h | 16h | 16h | 18/10/2025 | 19/10/2025 | 422,00 |
| 1.3.5 Implementação da Funcionalidade de Realizar Login | 0h | 0h | 0h | 16h | 16h | 18/10/2025 | 19/10/2025 | 422,00 |
| 1.3.6 Aprimoramento da Funcionalidade I de Registrar Atendimentos e Gerenciar Barbearias | 0h | 0h | 0h | 8h | 8h | 20/10/2025 | 20/10/2025 | 211,00 |
| **Total Pacote 3** | **4h** | **4h** | **8h** | **40h** | **56h** | **15/10/2025** | **20/10/2025** | **2.031,32** |

### 5.4 Visualizar Consulta de Barbearias e Realização de Agendamentos

| Atividade | GP (h) | AN (h) | AR/QA (h) | DEV (h) | Horas Totais | Início | Término | Custo (R$) |
|-----------|--------|--------|-----------|---------|--------------|--------|---------|------------|
| 1.4.1 Análise de Negócio IV: Para Consultar Detalhes das Barbearias e Realizar Agendamentos | 4h | 4h | 0h | 0h | 8h | 23/10/2025 | 23/10/2025 | 526,32 |
| 1.4.2 Levantamento de Requisitos III: Consultar Barbearias e Realizar Agendamentos | 0h | 0h | 4h | 0h | 4h | 24/10/2025 | 24/10/2025 | 225,00 |
| 1.4.3 Especificação de Requisitos III: Consultar Barbearias e Realizar Agendamentos | 0h | 0h | 4h | 0h | 4h | 25/10/2025 | 25/10/2025 | 225,00 |
| 1.4.4 Implementação da Funcionalidade de Consultar Barbearias | 0h | 0h | 0h | 16h | 16h | 26/10/2025 | 27/10/2025 | 422,00 |
| 1.4.5 Implementação da Funcionalidade de Realizar Agendamentos | 0h | 0h | 0h | 16h | 16h | 26/10/2025 | 27/10/2025 | 422,00 |
| 1.4.6 Aprimoramento da Funcionalidade II: Registrar Atendimentos e Gerenciar Barbearias | 0h | 0h | 0h | 8h | 8h | 28/10/2025 | 28/10/2025 | 211,00 |
| **Total Pacote 4** | **4h** | **8h** | **8h** | **40h** | **56h** | **23/10/2025** | **28/10/2025** | **2.031,32** |

### 5.5 Transferir Barbeiros Entre Barbearias

| Atividade | GP (h) | AN (h) | AR/QA (h) | DEV (h) | Horas Totais | Início | Término | Custo (R$) |
|-----------|--------|--------|-----------|---------|--------------|--------|---------|------------|
| 1.5.1 Análise de Negócio V: Para Transferência de Barbeiros Entre Barbearias | 4h | 4h | 0h | 0h | 8h | 30/10/2025 | 30/10/2025 | 526,32 |
| 1.5.2 Requisito de Requisitos: Consultar Barbearias, Gerenciar Barbeiros para a Função de Transferência de Barbeiros | 0h | 0h | 4h | 0h | 4h | 31/10/2025 | 31/10/2025 | 225,00 |
| 1.5.3 Requisito na Especificação de Requisitos: Consultar Barbearias, Gerenciar Barbeiros, Para a Função Transferência de Barbeiros e Métricas | 0h | 0h | 4h | 0h | 4h | 01/11/2025 | 01/11/2025 | 225,00 |
| 1.5.4 Aprimoramento da Funcionalidade III: Consultar Barbearias e Gerenciar Barbeiros | 0h | 0h | 0h | 16h | 16h | 02/11/2025 | 03/11/2025 | 422,00 |
| 1.5.5 Criando Plano de Testes | 0h | 0h | 4h | 0h | 4h | 04/11/2025 | 04/11/2025 | 225,00 |
| **Total Pacote 5** | **4h** | **4h** | **12h** | **16h** | **36h** | **30/10/2025** | **04/11/2025** | **1.623,32** |

### 5.6 Realizar Testes Unitários

| Atividade | GP (h) | AN (h) | AR/QA (h) | DEV (h) | Horas Totais | Início | Término | Custo (R$) |
|-----------|--------|--------|-----------|---------|--------------|--------|---------|------------|
| 1.6.1 Criação de Cenários de Teste I: Testes Unitários | 0h | 0h | 4h | 0h | 4h | 06/11/2025 | 06/11/2025 | 225,00 |
| 1.6.2 Ajuste no Plano de Projeto I: Inserindo EAP, Cronograma e Esforço e Custos, e Gestão de Riscos | 8h | 4h | 0h | 0h | 12h | 07/11/2025 | 07/11/2025 | 802,63 |
| 1.6.3 Implementação Testes I: Testes Unitários | 0h | 0h | 0h | 16h | 16h | 08/11/2025 | 09/11/2025 | 422,00 |
| 1.6.4 Ajuste no Plano de Testes I: Aprimorar Modelo de Documento | 0h | 0h | 4h | 0h | 4h | 10/11/2025 | 10/11/2025 | 225,00 |
| **Total Pacote 6** | **8h** | **4h** | **8h** | **16h** | **36h** | **06/11/2025** | **10/11/2025** | **1.674,63** |

### 5.7 Resolver Inconsistências na Documentação

| Atividade | GP (h) | AN (h) | AR/QA (h) | DEV (h) | Horas Totais | Início | Término | Custo (R$) |
|-----------|--------|--------|-----------|---------|--------------|--------|---------|------------|
| 1.7.1 Correção de Testes I: Testes Unitários Apresentando Falha | 0h | 0h | 0h | 8h | 8h | 13/11/2025 | 13/11/2025 | 211,00 |
| 1.7.2 Criar Relatório de Testes I | 0h | 0h | 0h | 4h | 4h | 14/11/2025 | 14/11/2025 | 105,50 |
| 1.7.3 Ajuste no Plano de Testes II: Adicionar Tecnologias Usadas Para Testes | 0h | 0h | 4h | 0h | 4h | 15/11/2025 | 15/11/2025 | 225,00 |
| 1.7.4 Ajustar Documento de Especificação de Requisitos: Inconsistências com o Sistema nos Diagramas | 0h | 0h | 8h | 0h | 8h | 16/11/2025 | 17/11/2025 | 450,00 |
| 1.7.5 Gerando Relatório de Testes I | 0h | 0h | 0h | 4h | 4h | 18/11/2025 | 18/11/2025 | 105,50 |
| 1.7.6 Ajustes no Plano de Projeto II: Correção na EAP e Cronograma | 8h | 4h | 0h | 0h | 12h | 19/11/2025 | 19/11/2025 | 802,63 |
| **Total Pacote 7** | **8h** | **4h** | **12h** | **16h** | **40h** | **13/11/2025** | **19/11/2025** | **1.899,63** |

### 5.8 Gerenciar Histórico de Atendimentos e Serviços

| Atividade | GP (h) | AN (h) | AR/QA (h) | DEV (h) | Horas Totais | Início | Término | Custo (R$) |
|-----------|--------|--------|-----------|---------|--------------|--------|---------|------------|
| 1.8.1 Análise de Negócio VI: Para as Funções de Gerenciamento de Serviços e Histórico de Atendimento | 4h | 4h | 0h | 0h | 8h | 20/11/2025 | 20/11/2025 | 526,32 |
| 1.8.2 Levantamento de Requisitos IV: Gerenciar Serviços e Histórico de Atendimento | 0h | 0h | 4h | 0h | 4h | 21/11/2025 | 21/11/2025 | 225,00 |
| 1.8.3 Especificação de Requisitos IV: Gerenciar Serviços e Histórico de Atendimento | 0h | 0h | 4h | 0h | 4h | 22/11/2025 | 22/11/2025 | 225,00 |
| 1.8.4 Implementação da Funcionalidade de Gerenciar Serviços | 0h | 0h | 0h | 16h | 16h | 23/11/2025 | 24/11/2025 | 422,00 |
| 1.8.5 Implementação da Funcionalidade de Histórico de Atendimentos | 0h | 0h | 0h | 16h | 16h | 25/11/2025 | 26/11/2025 | 422,00 |
| **Total Pacote 8** | **4h** | **4h** | **8h** | **32h** | **48h** | **20/11/2025** | **26/11/2025** | **1.820,32** |

### 5.9 Cadastrar Clientes ao Sistema e Gerenciar Produtos e Estoques

| Atividade | GP (h) | AN (h) | AR/QA (h) | DEV (h) | Horas Totais | Início | Término | Custo (R$) |
|-----------|--------|--------|-----------|---------|--------------|--------|---------|------------|
| 1.9.1 Análise de Negócio VII: Para as Funções de Gestão de Clientes, Produtos e Histórico de Agendamentos | 4h | 4h | 0h | 0h | 8h | 27/11/2025 | 27/11/2025 | 526,32 |
| 1.9.2 Levantamento de Requisitos V: Cadastrar Clientes, Realizar Agendamento e Gerenciar Produtos e Estoque | 0h | 0h | 4h | 0h | 4h | 28/11/2025 | 28/11/2025 | 225,00 |
| 1.9.3 Especificação de Requisitos V: Cadastrar Clientes, Realizar Agendamento e Gerenciar Produtos e Estoque | 0h | 0h | 4h | 0h | 4h | 29/11/2025 | 29/11/2025 | 225,00 |
| 1.9.4 Implementação da Funcionalidade de Cadastrar Clientes | 0h | 0h | 0h | 16h | 16h | 30/11/2025 | 01/12/2025 | 422,00 |
| 1.9.5 Implementação da Funcionalidade de Histórico de Agendamento | 0h | 0h | 0h | 16h | 16h | 30/11/2025 | 01/12/2025 | 422,00 |
| 1.9.6 Implementação da Funcionalidade de Gerenciar de Produtos e Estoque | 0h | 0h | 0h | 16h | 16h | 02/12/2025 | 03/12/2025 | 422,00 |
| 1.9.7 Implementação da Funcionalidade de Alerta de Estoque Baixo | 0h | 0h | 0h | 8h | 8h | 03/12/2025 | 03/12/2025 | 211,00 |
| **Total Pacote 9** | **4h** | **4h** | **8h** | **56h** | **68h** | **27/11/2025** | **03/12/2025** | **2.453,32** |

### 5.10 Realizar Testes de Integração

| Atividade | GP (h) | AN (h) | AR/QA (h) | DEV (h) | Horas Totais | Início | Término | Custo (R$) |
|-----------|--------|--------|-----------|---------|--------------|--------|---------|------------|
| 1.10.1 Implementação de Testes II: Testes de Integração | 0h | 0h | 0h | 16h | 16h | 04/12/2025 | 05/12/2025 | 422,00 |
| 1.10.2 Aprimoramento da Funcionalidade IV: Registrar Atendimento | 0h | 0h | 0h | 8h | 8h | 06/12/2025 | 06/12/2025 | 211,00 |
| 1.10.3 Criar Cenários de Teste II: Teste de Integração | 0h | 0h | 4h | 0h | 4h | 07/12/2025 | 07/12/2025 | 225,00 |
| 1.10.4 Ajuste no Plano de Testes III: Incluir Teste de Integração | 0h | 0h | 4h | 0h | 4h | 08/12/2025 | 08/12/2025 | 225,00 |
| 1.10.5 Ajuste no Plano de Projeto III: EAP seguir padrão iterativo-incremental | 8h | 4h | 0h | 0h | 12h | 09/12/2025 | 09/12/2025 | 802,63 |
| 1.10.6 Gerando Relatório de Testes II | 0h | 0h | 0h | 4h | 4h | 10/12/2025 | 10/12/2025 | 105,50 |
| **Total Pacote 10** | **8h** | **4h** | **8h** | **28h** | **48h** | **04/12/2025** | **10/12/2025** | **1.991,13** |

### 5.11 Realizar Testes Exploratórios

| Atividade | GP (h) | AN (h) | AR/QA (h) | DEV (h) | Horas Totais | Início | Término | Custo (R$) |
|-----------|--------|--------|-----------|---------|--------------|--------|---------|------------|
| 1.11.1 Criação de Cenários de Teste III: Testes Exploratórios | 0h | 0h | 4h | 0h | 4h | 22/01/2026 | 22/01/2026 | 225,00 |
| 1.11.2 Ajuste Plano de Testes IV: Incluir Teste Exploratório | 0h | 0h | 4h | 0h | 4h | 23/01/2026 | 23/01/2026 | 225,00 |
| **Total Pacote 11** | **0h** | **0h** | **8h** | **0h** | **8h** | **22/01/2026** | **23/01/2026** | **450,00** |

### 5.12 Consolidar Documentação e Testes

| Atividade | GP (h) | AN (h) | AR/QA (h) | DEV (h) | Horas Totais | Início | Término | Custo (R$) |
|-----------|--------|--------|-----------|---------|--------------|--------|---------|------------|
| 1.12.1 Correção de Testes II: Testes Unitários Apresentando Falha | 0h | 0h | 0h | 8h | 8h | 29/01/2026 | 30/01/2026 | 211,00 |
| 1.12.2 Ajuste no Documento de Especificação de Requisitos: Diagramas de classe, DER | 0h | 0h | 4h | 0h | 4h | 29/01/2026 | 29/01/2026 | 225,00 |
| 1.12.3 Ajuste no Documento de Requisitos: Diagrama de Domínio | 0h | 0h | 4h | 0h | 4h | 30/01/2026 | 30/01/2026 | 225,00 |
| 1.12.4 Implementação de Testes III: Teste Exploratório | 0h | 0h | 4h | 0h | 4h | 31/01/2026 | 02/02/2026 | 225,00 |
| 1.12.5 Ajuste Plano de Projeto IV: EAP, Cronograma e Gráficos de Monitoramento | 8h | 4h | 0h | 0h | 12h | 02/02/2026 | 02/02/2026 | 802,63 |
| 1.12.6 Gerando Relatório de Testes III | 0h | 0h | 0h | 4h | 4h | 03/02/2026 | 03/02/2026 | 105,50 |
| **Total Pacote 12** | **8h** | **4h** | **12h** | **12h** | **36h** | **29/01/2026** | **03/02/2026** | **1.794,13** |

---

## 6. Resumo Geral do Esforço e Custo

| Papel | Total de Horas | Custo Total (R$) |
|-------|----------------|------------------|
| Gerente de Projeto (GP) | 76h | R$ 5.250,00 |
| Analista de Negócio (AN) | 56h | R$ 3.500,00 |
| Analista de Requisitos e Qualidade (AR/QA) | 104h | R$ 5.850,00 |
| Desenvolvedor (DEV) | 304h | R$ 8.018,00 |
| **Total Geral** | **540h** | **R$ 22.618,00** |

---

## 7. Acompanhamento do Desempenho do Projeto

### Figura 2: Gráfico Ideal x Real

Compara o progresso ideal e o progresso real do projeto ao longo do tempo. A linha azul mostra como o projeto deveria avançar, e a linha vermelha mostra como realmente avançou. O projeto começou bem, teve atrasos em novembro de 2025, mas conseguiu se recuperar e terminou no prazo em fevereiro de 2026.

![Gráfico Ideal x Real](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/grafico-ideal-x-real.png)

### Figura 3: Gráfico VP, VA e VR

Apresenta o valor planejado (VP), o valor agregado (VA) e o valor real (VR) do projeto. A linha azul é o planejamento original. As linhas vermelha e verde estão juntas, mostrando que o custo do trabalho ficou dentro do esperado. Mesmo com os atrasos de novembro, não houve gastos extras.

![Gráfico Valor Planejado, Valor Agregado e Valor Real](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/Grafico-Valor-Planejado-Valor-Agregado-Valor-Real.png)

### Figura 4: Índice de Desempenho de Prazo (IDT)

Demonstra o índice de desempenho de prazo (IDT) do projeto. Quando a linha está em 1,0, o projeto está no prazo. Em novembro, a linha subiu até 1,12, indicando um atraso de 12%. Depois, voltou a 1,0, mostrando que o projeto terminou na data prevista.

![Gráfico Índice de Desempenho](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/Grafico-indice-Desempenho.png)

### Figura 5: Índice de Desempenho de Custo (IDC)

Apresenta o índice de desempenho de custo (IDC) do projeto. A linha reta em 1,0 durante todo o período indica que o projeto gastou exatamente o que foi planejado. Não houve desperdício de dinheiro nem estouro de orçamento.

![Gráfico Índice de Desempenho de Custo](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/Grafico-Indice-Desempenho-Custo.png)

---

## 8. Diagrama de Gantt

**Figura 6:** O diagrama de Gantt é uma ferramenta visual de gestão de projetos que exibe tarefas e cronogramas em uma linha do tempo.

![Diagrama de Gantt](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/Grafico-Gantt.jpeg)

---

## 9. Diagrama de Atividades do Projeto

**Figura 7:** A seguir o diagrama de atividade do projeto.

![Diagrama de Atividades](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/projeto/diagramas/Diagrama-Atividade-Projeto.png)

---

## 10. Ferramentas Utilizadas

Durante o desenvolvimento do sistema foram utilizadas as seguintes ferramentas:

- **GitHub** - Repositório de código-fonte, versionamento e controle de versões.
- **GitHub Projects (Kanban)** - Quadro Kanban para gestão do backlog e organização das sprints.
- **Quadro Kanban (Board do repositório)** - Organização visual das tarefas por colunas
- **Lucidchart** - Ferramenta utilizada para a criação de diagramas conceituais, de arquitetura, de workflow e de classes.
- **VS Code (Visual Studio Code)** - Editor de código-fonte leve e poderoso.
