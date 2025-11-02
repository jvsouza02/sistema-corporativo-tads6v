# Documento de Visão

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas.

**Projeto**: Sistema de Agendamento e Gestão de Barbearias.

*Registro de Alterações:*

| **Versão** | **Responsável**    | **Data**     | **Alterações** |
|------------|--------------------|--------------|----------------|
| 1.0 | Yuri Fernandes | 05/10/2025 | Criação do documento de requisitos, abrangendo minimundo, diagrama de domínio, requisitos e regras de negócio |
| 1.1 | Yuri Fernandes | 20/10/2025 | Adição de novas funcionalidades do sistema, mudança em terminologias, alterações feitas no minimundo e requisitos do usuário. |
| 1.2 | Yuri Fernandes | 28/10/2025 | Incrementação de uma nova funcionalidade no gerenciamento de barbearias. |
| 1.3 | Yuri Fernandes | 02/11/2025 | Ajustes de funcionalidades sugeridas após a reunião com o cliente, alterações nas descrições do minimundo e nos requisitos funcionais e regras de negócio. |

## 1. Introdução

Este documento apresenta a especificação inicial para o Sistema de Agendamento e Gestão da Barbearia. A Seção 2 detalha o propósito do sistema, explicando sua função central no gerenciamento de horários e recursos. A Seção 3 estabelece o minimundo (contexto de negócio), ilustrando como o sistema organiza as informações sobre serviços, profissionais e clientes para otimizar a operação da barbearia. Por fim, a Seção 4 lista os requisitos do usuário, que descrevem as necessidades funcionais e operacionais do sistema.

## 2. Descrição do Propósito do Sistema

O propósito principal do sistema é ser uma plataforma completa para a gestão e agendamento de serviços em barbearias, centralizando as operações para clientes, cabeleireiros e proprietários em um único ambiente. Ele visa simplificar e automatizar o processo de agendamento de serviços como cortes de cabelo, barba e coloração para os clientes, enquanto fornece aos proprietários e cabeleireiros as ferramentas necessárias para gerenciar de forma eficiente a agenda, os profissionais, os serviços, o histórico de atendimentos e as informações do negócio, promovendo assim maior organização, controle e satisfação de todos os envolvidos.

## 3. Descrição do Minimundo

A plataforma de agendamento e gestão de barbearias organiza serviços de cortes de cabelo, barba e coloração capilar, permitindo que clientes, barbeiros e proprietários gerenciem atendimentos de forma prática e eficiente. Ela oferece ferramentas para controle de agendamentos e apresenta relatórios de desempenho por meio de relatórios consolidados, facilitando a gestão do negócio e aprimorando a experiência dos clientes.

O proprietário realiza seu cadastro informando dados pessoais como nome, telefone, e-mail e senha. Em seguida, ele é direcionado para o cadastro da barbearia, onde registra informações como nome, CNPJ, e-mail, endereço, telefone, descrição e foto. A plataforma permite que um mesmo proprietário tenha várias barbearias, podendo cadastrar e gerenciar cada unidade de forma independente. Após cadastrar uma barbearia, o proprietário acessa o painel de gerenciamento, centralizando todas as funções administrativas e operacionais. O proprietário pode ver uma listagem das suas barbearias e, ao clicar em cada barbearia, visualizar os agendamentos do dia.

No painel de gerenciamento, o proprietário pode cadastrar e gerenciar barbeiros, definindo horários de trabalho, atribuindo tarefas e registrando informações como nome, e-mail, senha, telefone, cargo, salário e foto, além de cadastrar e administrar os serviços oferecidos, organizados em categorias como Corte de Cabelo, Barba e Coloração Capilar, registrando nome, descrição, preço, duração e tipo de serviço, abrangendo diferentes estilos e técnicas. O sistema também permite ao proprietário remanejar barbeiros entre as barbearias que ele possui, transferindo profissionais de uma unidade para outra de forma prática, conforme a necessidade operacional. Um calendário de agendamentos permite ao proprietário e aos barbeiros visualizar horários disponíveis e consultar agendamentos por dia, barbearia ou profissional, sendo possível criar agendamentos manuais e gerenciar toda a agenda da barbearia.

O barbeiro acessa o painel de gerenciamento da barbearia em que está designado, onde pode visualizar apenas seus próprios agendamentos e dados relacionados àquela unidade. Ele consulta sua agenda, realiza os atendimentos e registra no sistema todas as informações referentes a cada serviço prestado, incluindo o tipo de serviço executado (como corte, barba ou coloração capilar), observações sobre o cliente e o valor pago pelo atendimento. Cada agendamento possui um status que indica se o serviço ainda não foi iniciado ou está em andamento (reservado), se o atendimento foi concluído (finalizado) ou se o cliente faltou (expirado).

Na área do cliente, os usuários podem criar suas contas informando nome, e-mail, telefone e senha, pesquisar barbearias e serviços disponíveis, e realizar agendamentos escolhendo a data, o horário e o tipo de serviço desejado. Após o atendimento, os clientes podem acessar o histórico de agendamentos para consultar todos os serviços realizados e avaliar cada atendimento com notas e comentários, registrando suas impressões sobre a experiência.

O sistema disponibiliza relatórios de desempenho com informações consolidadas sobre faturamento e volume de atendimentos em períodos semanais e mensais. Esses relatórios permitem ao proprietário acompanhar o desempenho financeiro e operacional de cada unidade, oferecendo uma visão clara da performance do negócio.

Portanto, a plataforma centraliza todas as operações da barbearia em um único ambiente, desde o cadastro e gerenciamento de barbearias por parte do proprietário até o agendamento de serviços pelos clientes, proporcionando maior eficiência, organização e uma experiência satisfatória para todos os usuários envolvidos.

## 5. Requisitos de Usuário

Tomando por base o contexto do sistema, foram identificados os seguintes requisitos de usuário:

### 5.1. Requisitos Funcionais

*Tabela 1: Descrição dos requisitos funcionais do sistema.*

| **ID** | **Nome** | **Descrição** | **Prioridade** | **Dependência** |
|--------|----------|---------------|----------------|-----------------|
| **RF01** | Cadastrar Proprietário | Permitir que o usuário realize seu cadastro como proprietário, informando dados pessoais (nome, telefone, e-mail e senha). Após o cadastro, ele deve ser direcionado para o fluxo de criação da primeira barbearia. | Alta |  |
| **RF02** | Gerenciar Barbearia | Permitir que o proprietário cadastre, visualize, edite e exclua barbearias, informando dados como nome, CNPJ, endereço, telefone, e-mail, horário de funcionamento, descrição e foto. O sistema deve listar todas as barbearias cadastradas, possibilitando ao proprietário gerenciar cada unidade de forma independente e acessar os agendamentos do dia. | Alta | **RF01** |
| **RF03** | Gerenciar Barbeiros | Permitir que o proprietário cadastre, edite e exclua barbeiros, definindo horários de trabalho, cargo e atribuições. O sistema deve registrar informações como nome, e-mail, telefone, senha, salário e foto, além de permitir o remanejamento de barbeiros entre barbearias do mesmo proprietário. | Alta | **RF02** |
| **RF04** | Cadastrar Serviços | Permitir que o proprietário cadastre e organize os serviços oferecidos pela barbearia, classificando-os por categoria (Corte de Cabelo, Barba e Coloração Capilar), incluindo nome, descrição, duração, preço e tipo de serviço. | Alta | **RF02** |
| **RF05** | Gerenciar Agenda | Disponibilizar um calendário que permita ao proprietário e aos barbeiros visualizar e administrar os agendamentos por dia, horário, barbearia e profissional. O sistema deve impedir sobreposição de horários e permitir criar agendamentos manuais quando necessário. | Alta | **RF02, RF03, RF04** |
| **RF06** | Cadastrar Cliente | Permitir que o cliente crie uma conta informando nome, e-mail, telefone e senha, possibilitando o acesso à plataforma para realizar e gerenciar agendamentos. | Alta |  |
| **RF07** | Realizar Agendamento | Permitir que o cliente, proprietário ou o barbeiro realize agendamentos, selecionando barbearia, serviço, data, horário e profissional. O sistema deve verificar a disponibilidade e registrar o status "Reservado". | Alta | **RF02, RF04, RF05, RF06** |
| **RF08** | Registrar Atendimento | Permitir que o barbeiro registre os detalhes de cada atendimento realizado, incluindo tipo de serviço, observações sobre o cliente e possíveis recomendações para atendimentos futuros. | Alta | **RF05, RF07** |
| **RF09** | Atualizar Status do Atendimento | Permitir que o barbeiro altere o status do agendamento, definindo-o como "Reservado" (em espera), "Concluído" (finalizado) ou "Expirado" (cliente ausente). Essas atualizações devem refletir automaticamente na agenda e nos relatórios. | Alta | **RF08** |
| **RF10** | Consultar Histórico de Atendimentos | Permitir que o cliente visualize seus atendimentos anteriores, com informações como data, tipo de serviço, profissional responsável e observações registradas. | Média | **RF06, RF08, RF09** |
| **RF11** | Avaliar Atendimento | Permitir que o cliente avalie os atendimentos concluídos, registrando notas e comentários sobre o serviço e o profissional. As avaliações devem ser armazenadas e associadas ao histórico e relatórios da barbearia. | Média | **RF06, RF09, RF10** |
| **RF12** | Gerar Relatórios | Permitir que apenas o proprietário acesse relatórios consolidados de desempenho, contendo informações sobre faturamento e volume de atendimentos por período (semanal e mensal) de cada barbearia. | Média | **RF02, RF06, RF18, RF09** |

### 5.2. Requisitos Não Funcionais

*Tabela 2: Descrição dos requisitos não funcionais do sistema.*

| **ID** | **Nome** | **Descrição** | **Prioridade** | **Dependência** |
|--------|----------|---------------|----------------|-----------------|
| **RNF01** | Assegurar Desempenho | O sistema deve funcionar bem mesmo com várias pessoas usando ao mesmo tempo, sem travar ou demorar para carregar. As telas principais devem abrir em até 2 segundos. | Alta | **RF01, RF03, RF06, RF08** |
| **RNF02** | Garantir Usabilidade | O sistema deve ser fácil de usar. O usuário deve conseguir fazer as ações principais (agendar, registrar atendimento, ver histórico) com poucos cliques, sem precisar de ajuda. | Alta |  |
| **RNF03** | Implementar Segurança | O sistema deve criptografar senhas, autenticar usuários e controlar o acesso por perfil, protegendo dados pessoais. | Alta | **RF01, RF04, RF07** |
| **RNF04** | Assegurar Compatibilidade | O sistema deve funcionar bem em diferentes navegadores (como Chrome, Firefox e Edge). | Alta |  |
| **RNF05** | Manter Confiabilidade | O sistema deve garantir integridade, consistência e persistência dos dados, evitando perdas e falhas em operações críticas. | Média | **RF06, RF08, RF09, RF10** |
| **RNF06** | Facilitar Manutenção | O sistema deve possuir código modular, documentado e testável, para simplificar correções e evoluções futuras. | Média |  |
| **RNF07** | Suportar Escalabilidade | O sistema deve suportar o aumento de barbearias, profissionais e clientes sem degradação perceptível de desempenho. | Média | **RF02, RF03, RF06** |

### 5.3. Regras de Negócios

*Tabela 3: Descrição das regras de negócio do sistema.*

| **ID** | **Nome** | **Descrição** | **Prioridade** | **Dependência** |
|--------|----------|---------------|----------------|-----------------|
| **RN01** | Cadastrar Proprietário de Forma Única | Cada proprietário deve ter apenas um cadastro no sistema, utilizando e-mail único e não repetido. | Alta | **RF01** |
| **RN02** | Vincular Profissionais e Serviços à Barbearia | Todo barbeiro e serviço devem estar vinculados a uma barbearia existente. Nenhum deles pode ser cadastrado sem essa associação. | Alta | **RF02, RF03, RF04** |
| **RN03** | Gerenciar Várias Barbearias por Proprietário | O proprietário pode cadastrar e administrar mais de uma barbearia, mas cada barbearia deve ter um CNPJ diferente. | Alta | **RF02** |
| **RN04** | Evitar Conflitos de Horário | O sistema não deve permitir dois agendamentos no mesmo horário para o mesmo barbeiro. | Alta | **RF05, RF07** |
| **RN05** | Permitir Agendamentos Apenas em Horários Válidos | O cliente só pode agendar um serviço dentro do horário de funcionamento da barbearia e dentro do turno de trabalho do barbeiro. | Alta | **RF02, RF03, RF05** |
| **RN06** | Controlar o Status dos Atendimentos | Todo agendamento deve ter um status ("Reservado", "Concluído" ou "Expirado"), que muda automaticamente conforme o serviço é realizado ou perdido. | Média | **RF08, RF09** |
| **RN07** | Registrar Informações do Atendimento | O barbeiro deve preencher os detalhes do atendimento, como tipo de serviço, produtos usados e observações sobre o cliente. | Média | **RF08** |
| **RN08** | Permitir Avaliar Atendimentos Concluídos | O cliente só pode avaliar um serviço depois que ele foi concluído, e a avaliação fica ligada ao barbeiro e à barbearia. | Média | **RF09, RF11** |
| **RN09** | Gerar Histórico de Atendimentos | Quando o atendimento termina, o sistema deve registrar automaticamente o histórico do cliente e do barbeiro, sem permitir alterações depois. | Média | **RF08, RF10** |
| **RN10** | Gerar Relatórios com Dados Reais | Os relatórios devem mostrar apenas informações de atendimentos concluídos e avaliações feitas pelos clientes. | Média | **RF08, RF09, RF12** |
| **RN11** | Controlar o Acesso de Cada Tipo de Usuário | Cada tipo de usuário (proprietário, barbeiro ou cliente) só pode acessar as funções que fazem parte do seu papel no sistema. | Alta | **RF01, RF03, RF06, RNF03** |
| **RN12** | Controlar Remanejamento de Barbeiros | O sistema deve permitir que o proprietário remanejar barbeiros entre as barbearias que administra, garantindo que cada profissional esteja vinculado corretamente à unidade de destino e que seus horários sejam atualizados. | Média | **RF03** |
| **RN13** | Restringir Acesso à Agenda do Barbeiro | Cada barbeiro deve visualizar apenas sua agenda e informações da barbearia onde está designado, sem acesso aos dados de outros profissionais ou unidades. | Alta | **RF03, RF05** |
