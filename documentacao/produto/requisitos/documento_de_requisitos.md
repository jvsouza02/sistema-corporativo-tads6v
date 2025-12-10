# Documento de Requisitos do Sistema

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas  
**Projeto:** Sistema Gestão de Barbearias  

---

## 1. Introdução

Este documento apresenta a especificação inicial para o Sistema de Gestão da Barbearia.  
A Seção 2 detalha o propósito do sistema, explicando sua função central no gerenciamento de horários e recursos.  
Na Seção 3 é estabelecido o minimundo (contexto de negócio)**, ilustrando como o sistema organiza as informações sobre serviços, profissionais e clientes para otimizar a operação da barbearia.  
A Seção 4 apresenta o Diagrama de Domínio, uma representação visual das classes conceituais, atributos e relacionamentos-chave do minimundo.  
Por fim, a Seção 5 lista os requisitos do usuário, descrevendo as necessidades funcionais e operacionais do sistema.

---

## 2. Descrição do Propósito do Sistema

O propósito principal do sistema é oferecer uma **plataforma integrada voltada à gestão de barbearias**, reunindo em um único ambiente digital os recursos necessários para **organização, controle e acompanhamento das atividades do negócio**.  
O sistema busca proporcionar maior eficiência administrativa, otimização de processos e melhoria na experiência de todos os envolvidos na operação da barbearia.

---

## 3. Descrição do Minimundo

A plataforma de agendamento e gestão de barbearias centraliza todas as operações necessárias para proprietários, barbeiros e clientes, permitindo organizar serviços, controlar atendimentos, gerenciar equipes, administrar estoque e acompanhar o desempenho das unidades de forma prática e integrada.

O proprietário realiza seu cadastro informando nome, e-mail e senha, ou acessa o sistema por meio de login. Após autenticar-se, ele é direcionado para a tela inicial, onde pode visualizar todas as suas barbearias cadastradas. Cada barbearia exibe suas informações principais, como nome, endereço, horário de início e fim de expediente, quantidade de atendimentos da semana, quantidade de barbeiros vinculados e o valor total gerado pelos atendimentos semanais. Além disso, nessa mesma página, ele pode editar ou remover suas barbearias.

O proprietário pode cadastrar novas barbearias, informando nome, e-mail, endereço, telefone, horário de início e fim do expediente, descrição e uma foto de apresentação. Dentro da página de detalhes de uma barbearia, o proprietário tem acesso completo às informações da unidade, podendo editar dados, acompanhar o histórico de atendimentos, gerenciar sua equipe de barbeiros e o estoque de produtos da barbearia.

Ele pode cadastrar barbeiros vinculados à barbearia, preenchendo nome, e-mail, senha e horário de início e fim de expediente, além de editar ou remover os profissionais. O proprietário também pode transferir barbeiros entre as barbearias que possui, facilitando a redistribuição da equipe conforme as necessidades de cada unidade.

Além dos profissionais, o proprietário gerencia os serviços oferecidos, como cortes de cabelo, barba, coloração e outros. Cada serviço possui nome, descrição, preço e produtos associados; para cada produto relacionado registra-se também a quantidade necessária por atendimento (padronizada em mililitros - ml). O sistema mantém um catálogo de produtos consumíveis usados na barbearia, como shampoos, condicionadores, loções, tintas etc. Cada produto possui preço, descrição e o estoque disponível, ambos registrados em mililitros (ml) por barbearia.

A plataforma realiza a gestão de estoque, armazenando a quantidade disponível de cada produto em cada unidade. Sempre que produtos ficam com quantidade igual ou inferior ao limite mínimo definido, o sistema exibe alertas de estoque baixo, permitindo ao proprietário visualizar rapidamente quais itens precisam ser repostos. Toda saída de produtos durante os atendimentos reduz automaticamente o estoque, e o proprietário também pode registrar reposições.

O barbeiro, ao fazer login, acessa sua página de agendamentos. Ele pode visualizar a lista de todos os agendamentos do dia ou da semana, facilitando o gerenciamento de sua rotina. Durante um atendimento, o barbeiro registra os serviços prestados ao cliente; ao selecionar um serviço, o sistema automaticamente carrega os produtos padrão associados a ele. O barbeiro também pode adicionar mais de um produto extra ao atendimento, escolhendo qualquer item adicional disponível no catálogo da barbearia. Após selecionar os serviços e produtos, o sistema soma automaticamente os valores para calcular o total do atendimento. O barbeiro ainda pode adicionar comentários e editar ou remover o registro, sendo que o sistema recalcula o valor total sempre que alterações são feitas.

O cliente, por sua vez, pode criar uma conta informando nome, e-mail e senha. Após o cadastro, ele pode visualizar barbearias disponíveis e verificar horários disponíveis para agendamento. O cliente escolhe uma barbearia e, com base nos horários de funcionamento da unidade, o sistema exibe apenas horários disponíveis. Assim, o cliente pode selecionar o horário desejado, confirmar o agendamento e, posteriormente, acessar seu histórico de agendamentos.

A plataforma integra todas essas operações em um único ambiente, garantindo organização, eficiência e uma gestão completa da barbearia. Proprietários conseguem controlar suas unidades com facilidade, barbeiros realizam atendimentos de forma estruturada e os clientes têm uma experiência fluida e conveniente ao agendar e acompanhar os seus agendamentos. Dessa forma, o sistema promove automatização, redução de erros, melhora no atendimento e centralização do processo de gestão, contribuindo para o crescimento e o aprimoramento do negócio.


---

## 4. Diagrama de Domínio

O diagrama de domínio é uma representação visual das entidades conceituais.

![Diagrama de Domínio](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/diagrama_de_dominio.png)

---

## 5. Requisitos de Usuário

Com base no contexto do sistema, foram identificados os seguintes requisitos de usuário.

---

### 5.1 Requisitos Funcionais

| ID    | Nome                           | Descrição                                                                                                                                                                                                 | Prioridade | Dependência |
|:------|:-------------------------------|:-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:-----------|:-------------|
| RF001 | Cadastrar Proprietário         | Permitir que o proprietário realize seu cadastro informando nome, e-mail e senha. Após o cadastro, ele é direcionado para a tela inicial para criar e gerenciar suas barbearias.                           | Alta       | —            |
| RF002 | Cadastrar Cliente              | Permitir que o cliente realize seu cadastro informando nome, e-mail e senha para visualizar barbearias e realizar agendamentos.                                                                           | Alta       | —            |
| RF003 | Realizar Login                 | Permitir que proprietários, barbeiros e clientes acessem o sistema usando e-mail e senha válidos, sendo redirecionados para sua área específica.                                                          | Alta       | RF001, RF002 |
| RF004 | Listar Barbearias              | Permitir que o proprietário visualize todas as suas barbearias cadastradas, exibindo dados como nome, endereço, horários de expediente, barbeiros vinculados e resumo semanal de atendimentos.            | Alta       | RF003        |
| RF005 | Gerenciar Barbearia            | Permitir criar, editar ou remover barbearias, informando nome, e-mail, endereço, telefone, horários de funcionamento, descrição e foto de apresentação.                                                    | Alta       | RF004        |
| RF006 | Gerenciar Barbeiro             | Permitir cadastrar, editar, remover e transferir barbeiros entre barbearias, registrando nome, e-mail, senha e horários de expediente.                                                                     | Alta       | RF005        |
| RF007 | Gerenciar Serviço              | Permitir cadastrar, editar e remover serviços, registrando nome, descrição, preço e produtos associados. Para cada produto associado, deve ser registrada a quantidade necessária por atendimento em mililitros (ml). | Alta       | RF005        |
| RF008 | Gerenciar Produto e Estoque    | Permitir cadastrar produtos usados na barbearia, registrando nome, descrição, preço e quantidade. O estoque e todas as reposições devem ser registrados exclusivamente em mililitros (ml).           | Alta       | RF005        |
| RF009 | Emitir Alerta de Estoque Baixo | Exibir alertas automáticos quando a quantidade de um produto atingir ou ficar abaixo do limite mínimo definido. A verificação utiliza valores registrados em mililitros (ml).                         | Alta       | RF008        |
| RF010 | Realizar Agendamento           | Permitir que o cliente visualize horários disponíveis com base no expediente da barbearia e registre um agendamento selecionando data e horário.                                                          | Alta       | RF002, RF003 |
| RF011 | Visualizar Histórico de Agendamento | Permitir que o cliente visualize seus agendamentos realizados, com data, horário e status.                                                                                                                | Média      | RF010        |
| RF012 | Registrar Atendimento          | Permitir registrar atendimentos, selecionando serviços e produtos utilizados. O sistema deve descontar automaticamente do estoque da barbearia a quantidade consumida de cada produto em mililitros (ml). | Alta       | RF006, RF007, RF008 |
| RF013 | Visualizar Histórico de Atendimento | Permitir que barbeiros e proprietários visualizem atendimentos realizados, contendo data, cliente, serviços prestados, produtos utilizados e valor total.                                                 | Média      | RF012        |

---

### 5.2 Requisitos Não Funcionais

| ID    | Nome                 | Descrição                                                                                         | Prioridade | Dependência |
|:------|:---------------------|:--------------------------------------------------------------------------------------------------|:------------|:-------------|
| RNF01 | Garantir Usabilidade | O sistema deve possuir interface intuitiva, permitindo que o usuário execute as ações principais de forma rápida. | Alta | — |
| RNF02 | Implementar Segurança | O sistema deve criptografar senhas, autenticar usuários e controlar acesso conforme o tipo de perfil. | Alta | RF01, RF04 |
| RNF03 | Manter Confiabilidade | O sistema deve assegurar integridade e persistência dos dados, evitando perdas em operações críticas. | Média | — |
| RNF04 | Facilitar Manutenção  | O sistema deve possuir código modular, documentado e testável, permitindo evolução e correções futuras. | Média | — |

---

