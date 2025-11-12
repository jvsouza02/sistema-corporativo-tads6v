# Documento de Requisitos do Sistema

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas  
**Projeto:** Sistema de Agendamento e Gestão de Barbearias  

---

## Registro de Alterações

| Versão | Responsável     | Data       | Alterações                                                                                                   |
|:-------|:----------------|:-----------|:-------------------------------------------------------------------------------------------------------------|
| 1.0    | Yuri Fernandes  | 05/10/2025 | Criação do documento de requisitos, abrangendo minimundo, diagrama de domínio, requisitos e regras de negócio |
| 1.1    | Yuri Fernandes  | 20/10/2025 | Adição de novas funcionalidades do sistema, mudança em terminologias, alterações feitas no minimundo e requisitos do usuário |
| 1.2    | Yuri Fernandes  | 28/10/2025 | Incrementação de uma nova funcionalidade no gerenciamento de barbearias |
| 1.3    | Yuri Fernandes  | 02/11/2025 | Ajustes de funcionalidades sugeridas após reunião com o cliente, alterações nas descrições do minimundo e nos requisitos funcionais e regras de negócio |
| 1.4    | Yuri Fernandes  | 10/11/2025 | Realizando alterações em descrições de algumas funcionalidades |

---

## 1. Introdução

Este documento apresenta a especificação inicial para o **Sistema de Agendamento e Gestão da Barbearia**.  
A Seção 2 detalha o propósito do sistema, explicando sua função central no gerenciamento de horários e recursos.  
Na Seção 3 é estabelecido o **minimundo (contexto de negócio)**, ilustrando como o sistema organiza as informações sobre serviços, profissionais e clientes para otimizar a operação da barbearia.  
A Seção 4 apresenta o **Diagrama de Domínio**, uma representação visual das classes conceituais, atributos e relacionamentos-chave do minimundo.  
Por fim, a Seção 5 lista os **requisitos do usuário**, descrevendo as necessidades funcionais e operacionais do sistema.

---

## 2. Descrição do Propósito do Sistema

O propósito principal do sistema é oferecer uma **plataforma integrada voltada à gestão de barbearias**, reunindo em um único ambiente digital os recursos necessários para **organização, controle e acompanhamento das atividades do negócio**.  
O sistema busca proporcionar **maior eficiência administrativa**, **otimização de processos** e **melhoria na experiência de todos os envolvidos** na operação da barbearia.

---

## 3. Descrição do Minimundo

A plataforma de gestão de barbearias organiza serviços de cortes de cabelo, barba e coloração capilar, permitindo que barbeiros e proprietários gerenciem atendimentos de forma prática e eficiente.  
Ela oferece ferramentas para controle de atendimentos e apresenta dados de desempenho, facilitando a gestão do negócio e aprimorando a experiência dos clientes.

O **proprietário** realiza um cadastro informando seu nome, e-mail e senha, ou acessa o sistema por meio de login com o e-mail.  
Após autenticar-se, ele é redirecionado para a tela inicial, onde pode **criar e gerenciar as informações da sua barbearia**, como nome, e-mail, endereço, telefone, horário de início e fim, descrição e foto.  
Nessa página inicial, o proprietário tem acesso a uma **listagem de todas as suas barbearias cadastradas**.  
Em cada barbearia listada, são exibidas suas informações principais (nome, endereço, horário de funcionamento), além da quantidade de atendimentos semanais, quantidade de barbeiros e o valor total gerado pelos atendimentos da semana.

Ao clicar em uma barbearia, o proprietário tem acesso à página de detalhes, onde pode visualizar informações completas e acompanhar o histórico de atendimentos realizados.  
Ele também pode **gerenciar os profissionais vinculados**, incluindo cadastro, edição, remoção e transferência de barbeiros entre barbearias, facilitando a redistribuição da equipe conforme a necessidade.

O **barbeiro**, ao fazer login com o e-mail, pode acessar uma página com a listagem de atendimentos.  
Ao realizar atendimentos, ele registra os detalhes de cada serviço executado.  
Os **serviços e produtos** (ex.: cortes, barba, coloração, shampoos, condicionadores, tintas etc.) já estão previamente cadastrados no sistema, cada um com seu preço.  
Ao registrar um atendimento, o barbeiro seleciona os serviços prestados e os produtos utilizados a partir desse catálogo; o sistema soma automaticamente os valores selecionados para calcular o valor total do atendimento.  
O barbeiro também pode editar ou remover registros, e o sistema recalcula o valor total sempre que houver alterações.

A plataforma centraliza todas as operações da barbearia em um único ambiente, facilitando o atendimento, o gerenciamento da equipe e o acompanhamento do desempenho do negócio, proporcionando **eficiência, organização e uma experiência satisfatória para clientes, barbeiros e proprietários**.

---

## 4. Diagrama de Domínio

O diagrama de domínio é uma representação visual das entidades conceituais.

![Diagrama de Domínio](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/diagrama_de_dominio.png)

---

## 5. Requisitos de Usuário

Com base no contexto do sistema, foram identificados os seguintes requisitos de usuário.

---

### 5.1 Requisitos Funcionais

| ID   | Nome                 | Descrição                                                                                                                                 | Prioridade | Dependência |
|:-----|:---------------------|:------------------------------------------------------------------------------------------------------------------------------------------|:------------|:-------------|
| RF01 | Cadastrar Proprietário | Permitir que o proprietário realize seu cadastro informando nome, e-mail e senha. Após o cadastro, ele é direcionado para a tela inicial para criar e gerenciar suas barbearias. | Alta | — |
| RF02 | Gerenciar Barbearias | Permitir que o proprietário crie, edite e visualize barbearias, informando dados como nome, e-mail, endereço, telefone, horário de início e fim, descrição e foto. | Alta | RF01 |
| RF03 | Listar Barbearias    | Permitir que o sistema liste todas as barbearias cadastradas do proprietário, exibindo informações principais e dados de desempenho semanal. | Alta | RF02 |
| RF04 | Gerenciar Barbeiros  | Permitir que o proprietário cadastre, edite, remova e transfira barbeiros entre suas barbearias, com nome, e-mail e horários de trabalho. | Alta | RF02 |
| RF05 | Registrar Atendimento | Permitir que o barbeiro registre os detalhes de cada atendimento realizado, selecionando serviços e produtos. O sistema soma automaticamente os valores e permite edição. | Alta | RF04 |

---

### 5.2 Requisitos Não Funcionais

| ID    | Nome                 | Descrição                                                                                         | Prioridade | Dependência |
|:------|:---------------------|:--------------------------------------------------------------------------------------------------|:------------|:-------------|
| RNF01 | Garantir Usabilidade | O sistema deve possuir interface intuitiva, permitindo que o usuário execute as ações principais de forma rápida. | Alta | — |
| RNF02 | Implementar Segurança | O sistema deve criptografar senhas, autenticar usuários e controlar acesso conforme o tipo de perfil. | Alta | RF01, RF04 |
| RNF03 | Manter Confiabilidade | O sistema deve assegurar integridade e persistência dos dados, evitando perdas em operações críticas. | Média | — |
| RNF04 | Facilitar Manutenção  | O sistema deve possuir código modular, documentado e testável, permitindo evolução e correções futuras. | Média | — |

---

### 5.3 Regras de Negócio

| ID   | Nome                                | Descrição                                                                                                      | Prioridade | Dependência |
|:-----|:------------------------------------|:---------------------------------------------------------------------------------------------------------------|:------------|:-------------|
| RN01 | Cadastrar Proprietário de Forma Única | Cada proprietário deve ter apenas um cadastro no sistema, com e-mail único e não repetido.                     | Alta | RF01 |
| RN02 | Vincular Profissionais e Serviços à Barbearia | Todo barbeiro e atendimento devem estar vinculados a uma barbearia existente.                                 | Alta | RF02, RF03, RF05 |
| RN03 | Gerenciar Múltiplas Barbearias       | O proprietário pode cadastrar e gerenciar várias barbearias, cada uma com suas informações independentes.       | Alta | RF02 |
| RN04 | Registrar Informações de Atendimento | O barbeiro deve registrar os serviços e produtos utilizados em cada atendimento, com cálculo automático do valor total. | Média | RF05 |
| RN05 | Transferir Barbeiros Entre Barbearias | O sistema deve permitir ao proprietário transferir barbeiros entre barbearias, atualizando vínculos e horários. | Média | RF04 |
| RN06 | Restringir Acesso do Barbeiro        | Cada barbeiro só pode visualizar seus próprios atendimentos e informações da barbearia onde atua.              | Alta | RF04, RF05 |

---
