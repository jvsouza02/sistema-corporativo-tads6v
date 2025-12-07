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
