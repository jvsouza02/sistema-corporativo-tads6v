# Documento de Requisitos do Sistema

## Discentes
Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas.

## Projeto
Sistema de Agendamento e Gestão de Barbearias.

---

## 1. Introdução

Este documento apresenta a especificação inicial para o Sistema de Agendamento e Gestão da Barbearia. A Seção 2 detalha o propósito do sistema, explicando sua função central no gerenciamento de horários e recursos. Na Seção 3 estabelece o minimundo (contexto de negócio), ilustrando como o sistema organiza as informações sobre serviços, profissionais e clientes para otimizar a operação da barbearia. Já a Seção 4 apresenta o Diagrama de Domínio, uma representação visual das classes conceituais, atributos e relacionamentos chave do minimundo. Por fim, a Seção 5 lista os requisitos do usuário, que descrevem as necessidades funcionais e operacionais do sistema.

---

## 2. Descrição do Propósito do Sistema

O propósito principal do sistema é oferecer uma plataforma integrada voltada à gestão de barbearias, reunindo em um único ambiente digital os recursos necessários para organização, controle e acompanhamento das atividades do negócio. O sistema busca proporcionar maior eficiência administrativa, otimização de processos e melhoria na experiência de todos os envolvidos na operação da barbearia.

---

## 3. Descrição do Minimundo

A plataforma de agendamento e gestão de barbearias centraliza todas as operações necessárias para proprietários, barbeiros e clientes. Por meio dela, é possível organizar serviços, controlar atendimentos, gerenciar equipes, administrar o estoque de produtos e acompanhar o desempenho das unidades de forma prática e integrada.

O proprietário realiza seu cadastro informando nome, e-mail e senha, ou acessa o sistema por meio de login. Após a autenticação, ele é direcionado para a tela inicial, onde visualiza todas as barbearias que possui cadastradas. Para cada barbearia, são exibidas informações principais, como nome, endereço, horário de início e fim do expediente, quantidade de atendimentos realizados na semana, quantidade de barbeiros vinculados e o valor total gerado pelos atendimentos semanais. Nessa mesma tela, o proprietário pode editar ou remover suas barbearias.

O proprietário pode cadastrar novas barbearias informando nome, e-mail, endereço, telefone, horário de início e fim do expediente, descrição e uma foto de apresentação. Ao acessar a página de detalhes de uma barbearia, ele tem acesso completo às informações da unidade, podendo editar os dados, acompanhar o histórico de atendimentos, gerenciar a equipe de barbeiros e controlar o estoque de produtos da barbearia.

Dentro de cada barbearia, o proprietário pode cadastrar barbeiros, preenchendo nome, e-mail, senha e horário de início e fim do expediente de cada profissional. Também é possível editar ou remover barbeiros cadastrados. Além disso, o sistema permite que o proprietário transfira barbeiros entre as barbearias que possui, facilitando a redistribuição da equipe conforme as necessidades de cada unidade.

O proprietário também gerencia os serviços oferecidos pela barbearia, como cortes de cabelo, barba, coloração, entre outros. Cada serviço possui nome, descrição e preço, além de produtos associados. Para cada produto vinculado a um serviço, é registrada a quantidade necessária por atendimento, padronizada em mililitros (ml).

A plataforma mantém um catálogo de produtos consumíveis utilizados na barbearia, como shampoos, condicionadores, loções, tintas e outros. Cada produto possui preço, descrição e estoque disponível, sendo que as quantidades são registradas em mililitros (ml) por barbearia.

O sistema realiza a gestão de estoque, armazenando a quantidade disponível de cada produto em cada unidade. Sempre que a quantidade de um produto fica igual ou inferior ao limite mínimo definido, a plataforma exibe alertas de estoque baixo, permitindo que o proprietário identifique rapidamente os itens que precisam ser repostos. Toda saída de produtos durante os atendimentos reduz automaticamente o estoque, e o proprietário também pode registrar reposições de produtos.

O barbeiro, ao realizar login no sistema, acessa sua página de agendamentos, onde pode visualizar a lista de atendimentos agendados do dia ou da semana, facilitando o gerenciamento de sua rotina. Durante um atendimento, o barbeiro registra os serviços prestados ao cliente. Ao selecionar um serviço, o sistema carrega automaticamente os produtos padrão associados a ele. O barbeiro também pode adicionar mais de um produto extra ao atendimento, escolhendo qualquer item adicional disponível no catálogo da barbearia.

Após selecionar os serviços e produtos utilizados, o sistema soma automaticamente os valores para calcular o total do atendimento. O barbeiro pode adicionar comentários ao registro do atendimento, além de editar ou remover serviços e produtos, sendo que o sistema recalcula o valor total sempre que alterações são realizadas.

O cliente pode criar uma conta informando nome, e-mail e senha. Após o cadastro, ele pode visualizar as barbearias disponíveis e verificar os horários disponíveis para agendamento. O cliente escolhe uma barbearia e, com base nos horários de funcionamento da unidade, o sistema exibe apenas os horários livres. Dessa forma, o cliente pode selecionar o horário desejado, confirmar o agendamento e, posteriormente, acessar o histórico de seus agendamentos.

A plataforma integra todas essas operações em um único ambiente, garantindo organização, eficiência e uma gestão completa da barbearia. Com isso, os proprietários conseguem controlar suas unidades com facilidade, os barbeiros realizam atendimentos de forma estruturada e os clientes têm uma experiência fluida e conveniente ao agendar e acompanhar seus atendimentos. O sistema promove automatização, redução de erros, melhoria no atendimento e centralização dos processos, contribuindo para o crescimento e aprimoramento do negócio.

---

## 4. Diagrama de Domínio

O diagrama de domínio é uma representação visual das entidades conceituais.

![Diagrama de Domínio](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/diagrama_de_dominio.png)

---

## 5. Requisitos de Usuário

Tomando por base o contexto do sistema, foram identificados os seguintes requisitos de usuário:

### 5.1. Requisitos Funcionais

**Tabela 1: Descrição dos requisitos funcionais do sistema.**

| ID | Nome | Descrição | Prioridade | Dependência |
|----|------|-----------|------------|-------------|
| RF001 | Cadastrar Proprietário | Permite que novos proprietários criem conta informando nome, e-mail e senha para acessar o sistema. | Alta | |
| RF002 | Cadastrar Cliente | Permite que novos clientes criem conta informando nome, e-mail e senha para visualizar barbearias e realizar agendamentos. | Alta | |
| RF003 | Realizar Login | Permite que qualquer usuário (proprietário, barbeiro ou cliente) acesse o sistema usando e-mail e senha válidos, redirecionando para sua área específica. | Alta | RF001, RF002 |
| RF004 | Listar Barbearia | Exibir todas as suas barbearias cadastradas, apresentando nome, endereço, horários de funcionamento, quantidade de atendimentos da semana, número de barbeiros e valor total gerado pelos atendimentos semanais, permitindo selecionar uma barbearia para acessar seus detalhes. | Alta | RF003 |
| RF005 | Gerenciar Barbearia | O sistema deve permitir ao proprietário cadastrar novas barbearias e editar ou remover unidades já existentes, informando nome, e-mail, endereço, telefone, horários de expediente, descrição e foto de apresentação. | Alta | RF004 |
| RF006 | Gerenciar Barbeiro | O sistema deve permitir ao proprietário cadastrar, editar, remover e transferir barbeiros entre suas barbearias, registrando nome, e-mail, senha e horários de expediente para cada profissional. | Alta | RF005 |
| RF007 | Gerenciar Serviço | O sistema deve permitir cadastrar, editar e remover serviços oferecidos pela barbearia (como corte, barba e coloração), registrando nome, descrição, preço e os produtos associados que serão utilizados no atendimento. | Alta | RF005 |
| RF008 | Gerenciar Produto e Estoque | O sistema deve permitir cadastrar produtos utilizados nas barbearias, registrando preço e descrição, controlando o estoque individual por barbearia, registrando saídas automáticas em atendimentos e permitindo reposições de forma manual. | Alta | RF005 |
| RF009 | Emitir Alerta de Estoque Baixo | O sistema deve exibir automaticamente alertas quando a quantidade de um produto atingir ou ficar abaixo do limite mínimo definido para a barbearia, permitindo ao proprietário identificar facilmente itens que precisam de reposição. | Alta | RF008 |
| RF010 | Realizar Agendamento | O sistema deve permitir que o cliente visualize barbearias e horários disponíveis com base no expediente da unidade e registre um agendamento selecionando data e horário desejados. | Alta | RF002, RF003 |
| RF011 | Visualizar Histórico de Agendamento | O sistema deve permitir que o cliente visualize seus agendamentos realizados, incluindo informações como data, horário e status. | Média | RF010 |
| RF012 | Registrar Atendimento | O sistema deve permitir ao barbeiro registrar atendimentos, selecionando os serviços prestados e seus produtos associados, adicionar produtos extras, incluir comentários e recalcular automaticamente o valor total a cada atualização, abatendo os produtos usados do estoque da barbearia. | Alta | RF006, RF007, RF008 |
| RF013 | Visualizar Histórico de Atendimento | O sistema deve permitir que barbeiros e proprietários visualizem atendimentos realizados, contendo informações como data, cliente, serviços prestados, produtos utilizados e valor total calculado. | Média | RF012 |

---

### 5.2. Requisitos Não Funcionais

**Tabela 2: Descrição dos requisitos não funcionais do sistema.**

| ID | Nome | Descrição | Prioridade | Dependência |
|----|------|-----------|------------|-------------|
| RNF001 | Controlar autenticação e autorização | Todos os acessos devem ser protegidos por autenticação; usuários com perfis distintos acessam apenas funcionalidades permitidas. | Alta | RF003 |
| RNF002 | Garantir disponibilidade do sistema | O sistema deve estar disponível para uso contínuo, permitindo acesso às funcionalidades principais. | Média | RF004, RF010 |
| RNF003 | Assegurar desempenho adequado | Listagens e operações principais devem apresentar tempo de resposta aceitável, especialmente para consultas paginadas. | Média | RF008, RF013 |
| RNF004 | Permitir escalabilidade do sistema | O sistema deve suportar múltiplas barbearias e usuários simultaneamente sem alteração na lógica de negócio. | Média | RF004, RF005 |
| RNF005 | Proteger os dados do sistema | Senhas devem ser armazenadas de forma segura (hash) e dados sensíveis não devem ser expostos indevidamente. | Alta | RF003 |
| RNF006 | Implementar testes automatizados | O sistema deve possuir testes automatizados (unitários e integrados) para garantir a confiabilidade das funcionalidades críticas. | Média | RF003 |

---

### 5.3. Regras de Negócios

**Tabela 3: Descrição das regras de negócio do sistema.**

| ID | Nome | Descrição | Prioridade | Dependência |
|----|------|-----------|------------|-------------|
| RN001 | Impedir conflito de agendamento | Não permitir dois agendamentos para o mesmo barbeiro no mesmo horário dentro da mesma barbearia. | Alta | RF010 |
| RN002 | Selecionar barbeiro disponível automaticamente | Ao criar um agendamento, o sistema deve selecionar automaticamente um barbeiro disponível no horário solicitado. | Alta | RF006, RF010 |
| RN003 | Atualizar estoque após atendimento | Produtos utilizados em um atendimento devem reduzir automaticamente a quantidade disponível em estoque. | Alta | RF008, RF012 |
| RN004 | Alertar sobre estoque baixo | Quando a quantidade em estoque atingir ou ficar abaixo do mínimo definido, o sistema deve sinalizar alerta ao responsável. | Alta | RF008, RF009 |
| RN005 | Impedir duplicidade de serviços na barbearia | Não é permitido cadastrar dois serviços com o mesmo nome dentro de uma mesma barbearia. | Média | RF007 |
| RN006 | Restringir transferência de barbeiro ao proprietário | Um barbeiro só pode ser transferido entre barbearias pertencentes ao mesmo proprietário. | Média | RF005, RF006 |
| RN007 | Restringir gerenciamento de barbearias ao proprietário | Um proprietário só pode gerenciar barbearias que estejam vinculadas a ele. | Alta | RF004, RF005 |
| RN008 | Padronizar quantidade de produto por serviço | A quantidade de produto utilizada em cada serviço segue um padrão definido (ex.: mililitros). | Média | RF007 |
| RN009 | Registrar histórico de alterações | O sistema deve registrar o histórico de alterações realizadas em registros críticos, identificando usuário, data e tipo de alteração. | Média | RNF001 |
| RN010 | Impedir agendamento fora do horário de funcionamento | O sistema deve validar se o horário solicitado está dentro do horário de funcionamento configurado para a barbearia. | Alta | RF010, RNF002 |
