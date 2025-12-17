# Documento de Especificação de Requisitos

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas.
**Projeto:** Sistema de Agendamento e Gestão de Barbearias.

## Registro de Alterações:

| Versão | Responsável    | Data       | Alterações                                              |
|--------|----------------|------------|---------------------------------------------------------|
| 1.0    | Yuri Fernandes | 06/10/2025 | Criação do diagrama de classes e do diagrama de caso de uso e suas especificações. |
| 1.1    | Yuri Fernandes | 11/10/2025 | Implementação de uma funcionalidade adicional no módulo de gestão de barbearias. |
| 1.2    | Yuri Fernandes | 18/11/2025 | Ajuste nas funcionalidades atuais de acordo com a nova demanda do cliente. |
| 1.3    | Yuri Fernandes | 25/11/2025 | Evolução do sistema de gerenciamento de barbearias através da inclusão de uma nova funcionalidade. |
| 1.4    | Yuri Fernandes | 10/11/2025 | Ajustes na especificação de caso de uso.                 |
| 1.5    | Yuri Fernandes | 06/12/2025 | Adicionando casos de uso especificados do Github.       |
| 1.6    | Yuri Fernandes | 15/12/2025 | Ajustando diagrama de classes para ficar de acordo com o sistema até o momento. |

## 1. Introdução

A presente especificação de requisitos tem como objetivo descrever de forma clara e organizada as características e comportamentos esperados do sistema de gestão de barbearias. Este documento busca alinhar o entendimento entre desenvolvedores, stakeholders e usuários, assegurando que todos tenham uma visão unificada sobre o propósito e o funcionamento do sistema.

A especificação apresenta os principais requisitos, casos de uso, regras e diagramas de classes que orientam o desenvolvimento, descrevendo como os atores interagem com o sistema e quais condições garantem seu correto funcionamento. Por meio deste documento, pretende-se estabelecer uma base sólida para o desenvolvimento, validação e manutenção do software, de modo que o produto atenda às necessidades do negócio e contribua para uma gestão mais eficiente e organizada das barbearias.

## 2. Modelo de Caso de Uso do Sistema

### 2.1. A seguir temos uma imagem ilustrando o diagrama de caso de uso do sistema.

![Diagrama de caso de uso do sistema de agendamento e gestão de barbearias](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/diagrama_caso_de_uso.png)

### 2.3. O modelo de casos de uso visa capturar e descrever as funcionalidades que um sistema deve prover para os atores que interagem com ele. Os atores identificados no contexto deste projeto estão descritos na tabela abaixo.

**Tabela 1: Descrição dos atores do MCDU.**

| Nome         | Descrição                                                                                                                                                                                                                                                                                                                                                   |
|--------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Proprietário | Administrador das barbearias no sistema. Realiza seu cadastro e login para acessar a plataforma, podendo cadastrar, editar e remover barbearias, informando dados como nome, endereço, telefone, e-mail, horários de funcionamento, descrição e foto de apresentação. Também é responsável por gerenciar os barbeiros vinculados às suas barbearias, incluindo cadastro, edição, remoção e transferência entre unidades. Além disso, gerencia os serviços oferecidos, os produtos e o estoque de cada barbearia, acompanha alertas de estoque baixo e consulta o histórico de atendimentos e indicadores de desempenho das unidades, como quantidade de atendimentos e valor total gerado. |
| Barbeiro     | Profissional vinculado a uma barbearia, que acessa o sistema por meio de login para gerenciar sua rotina de trabalho. Pode visualizar seus agendamentos diários ou semanais e registrar os atendimentos realizados, selecionando os serviços prestados, utilizando os produtos associados e adicionando produtos extras quando necessário. Também pode inserir comentários nos atendimentos, editar ou remover registros e consultar o histórico de atendimentos realizados, contribuindo para o controle operacional e financeiro da barbearia. |
| Cliente      | Usuário final da plataforma que se cadastra e realiza login para utilizar os serviços oferecidos pelas barbearias. Pode visualizar as barbearias disponíveis, consultar os horários de funcionamento e verificar a disponibilidade para agendamento. O cliente seleciona a barbearia, escolhe data e horário para realizar um agendamento e, posteriormente, pode acompanhar e consultar seu histórico de agendamentos, tendo uma experiência prática e conveniente no uso do sistema. |
| Sistema      | Ator automático responsável pela execução de comportamentos internos e eventos sem intervenção direta de usuários. O sistema controla regras de negócio, realiza cálculos automáticos, atualiza o estoque de produtos durante os atendimentos e monitora continuamente as quantidades disponíveis. Quando um produto atinge ou fica abaixo do limite mínimo definido, o sistema emite automaticamente alertas de estoque baixo para o proprietário, garantindo o controle e a integridade das operações da barbearia. |

### 2.4. A seguir são apresentadas as descrições de cada um dos casos de uso identificados. Os casos de uso envolvendo inserir, consultar, alterar e excluir (ICAE) são descritos na tabela abaixo, segundo o padrão da organização.

**Tabela 2: Descrição tabelada de cada caso de uso do MCDU.**

| ID     | Nome                      | Descrição                                                                                                                                                           | Ações Possíveis        | Observações                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     | Atores Responsáveis           | Requisitos Relacionados                  | Classes Envolvidas                        |
|--------|---------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------|------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------------|------------------------------------------|-------------------------------------------|
| CDU01  | Cadastrar Proprietário    | Permitir que o proprietário registre e mantenha seus dados de conta no sistema. O fluxo inclui cadastro com nome, e-mail e senha, validação de e-mail único e acesso ao sistema após autenticação.                             | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: cadastrar proprietário com nome, e-mail e senha. [C] Consultar: visualizar dados do proprietário. [A] Alterar: atualizar informações cadastrais. [E] Excluir: excluir cadastro se não houver barbearias vinculadas.                                                                                                                                                                                                                                                               | Proprietário                   | RF001, RNF001, RNF005, RN009             | Usuario, Proprietario                     |
| CDU002 | Cadastrar Cliente         | Permitir que o cliente crie uma conta no sistema para visualizar barbearias, realizar agendamentos e acompanhar seu histórico.                                                                                                | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: cadastrar cliente com nome, e-mail e senha. [C] Consultar: visualizar dados do cliente. [A] Alterar: atualizar informações cadastrais. [E] Excluir: excluir cadastro se não houver agendamentos ou atendimentos vinculados.                                                                                                                                                                                                                                                         | Cliente                        | RF002, RNF001, RNF005, RN009             | Usuario, Cliente                          |
| CDU003 | Realizar Login            | Permitir que clientes, barbeiros e proprietários acessem o sistema por meio de autenticação com e-mail e senha válidos, sendo redirecionados conforme seu perfil.                                                             | [C] Consultar          | [C] Consultar: autenticar usuário e permitir acesso à área correspondente ao seu perfil.                                                                                                                                                                                                                                                                                                                                                                                                         | Cliente, Barbeiro, Proprietário | RF003, RNF001, RNF005                    | Usuario, Proprietario, Barbeiro, Cliente |
| CDU004 | Listar Barbearias         | Permitir que o proprietário visualize todas as suas barbearias cadastradas com informações resumidas e indicadores de desempenho.                                                                                            | [C] Consultar          | [C] Consultar: listar barbearias do proprietário com nome, endereço, horários, quantidade de atendimentos, barbeiros e valor gerado.                                                                                                                                                                                                                                                                                                                                                           | Proprietário                   | RF004, RNF002, RN007                     | Barbearia, Proprietario, Atendimento, Barbeiro |
| CDU005 | Gerenciar Barbearia       | Permitir que o proprietário cadastre, edite e remova barbearias, mantendo todas as informações da unidade atualizadas.                                                                                                       | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: cadastrar barbearia com dados completos e foto. [C] Consultar: visualizar detalhes da barbearia. [A] Alterar: atualizar dados da unidade. [E] Excluir: remover barbearia se não houver vínculos ativos.                                                                                                                                                                                                                                                                     | Proprietário                   | RF005, RN007, RN009                      | Barbearia, Proprietario                   |
| CDU006 | Gerenciar Barbeiro        | Permitir ao proprietário cadastrar, editar, remover e transferir barbeiros entre suas barbearias.                                                                                                                            | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: cadastrar barbeiro com dados pessoais e horários. [C] Consultar: visualizar barbeiros vinculados à barbearia. [A] Alterar: atualizar dados ou transferir barbeiro. [E] Excluir: remover barbeiro se não houver atendimentos vinculados.                                                                                                                                                                                                                                          | Proprietário                   | RF006, RN006, RN009                      | Barbeiro, Barbearia, Usuario              |
| CDU007 | Gerenciar Serviço         | Permitir o gerenciamento dos serviços oferecidos pela barbearia, associando produtos e quantidades padrão utilizadas.                                                                                                       | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: cadastrar serviço com preço e produtos associados. [C] Consultar: visualizar serviços da barbearia. [A] Alterar: atualizar dados do serviço. [E] Excluir: excluir serviço se não houver atendimentos associados.                                                                                                                                                                                                                                                               | Proprietário                   | RF007, RN005, RN008, RN009               | Servico, Produto, ServicoProduto, Barbearia |
| CDU008 | Gerenciar Produto e Estoque | Permitir ao proprietário cadastrar produtos, controlar o estoque por barbearia, registrar reposições e acompanhar quantidades disponíveis.                                                                                   | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: cadastrar produto e definir estoque inicial. [C] Consultar: visualizar produtos e quantidades em estoque. [A] Alterar: registrar reposição ou ajuste de estoque. [E] Excluir: remover produto se não houver vínculos com serviços.                                                                                                                                                                                                                                             | Proprietário                   | RF008, RN003, RN004, RN009               | Produto, Estoque, Barbearia               |
| CDU009 | Emitir Alerta de Estoque Baixo | Monitorar automaticamente o estoque e emitir alertas quando a quantidade de um produto atingir ou ficar abaixo do limite mínimo.                                                                                              | [C] Consultar          | [C] Consultar: identificar produtos com estoque abaixo do mínimo e exibir alerta ao proprietário.                                                                                                                                                                                                                                                                                                                                                                                               | Sistema                        | RF009, RN004                             | Estoque, Produto, Barbearia               |
| CD010  | Realizar Agendamento      | Permitir que o cliente visualize horários disponíveis e registre um agendamento em uma barbearia.                                                                                                                             | [I] Inserir [C] Consultar | [I] Inserir: registrar agendamento escolhendo data e horário. [C] Consultar: visualizar horários disponíveis conforme expediente.                                                                                                                                                                                                                                                                                                                                                           | Cliente                        | RF010, RN001, RN002, RN010               | Agendamento, Cliente, Barbearia, Barbeiro |
| CDU011 | Visualizar Histórico de Agendamento | Permitir que o cliente visualize seus agendamentos realizados e respectivos status.                                                                                                                                           | [C] Consultar          | [C] Consultar: visualizar lista de agendamentos do cliente.                                                                                                                                                                                                                                                                                                                                                                                                                                   | Cliente                        | RF011, RN009                             | Agendamento, Cliente                      |
| CDU012 | Registrar Atendimento     | Permitir que o barbeiro registre atendimentos realizados, selecionando serviços, produtos e comentários, com cálculo automático do valor total e baixa de estoque.                                                           | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: registrar atendimento com serviços e produtos utilizados. [C] Consultar: visualizar atendimentos registrados. [A] Alterar: atualizar serviços, produtos ou comentários. [E] Excluir: remover registro de atendimento.                                                                                                                                                                                                                                                     | Barbeiro                       | RF012, RN003, RN008, RN009               | Atendimento, Servico, Produto, Estoque, Barbearia, Barbeiro, Cliente |
| CDU013 | Visualizar Histórico de Atendimento | Permitir que barbeiros e proprietários visualizem atendimentos realizados com informações completas.                                                                                                                          | [C] Consultar          | [C] Consultar: visualizar histórico de atendimentos por período e unidade.                                                                                                                                                                                                                                                                                                                                                                                                                    | Barbeiro, Proprietário         | RF013, RN009                             | Atendimento, Barbeiro, Proprietario, Cliente, Barbearia |

### 2.5. A seguir temos a documentação que detalha cada caso de uso do MCDU, com a descrição do fluxo de forma enumerada.

#### CDU001 - Cadastrar Proprietário

*   **ESCOPO:** Cadastro de proprietários no sistema.
*   **PROPÓSITO:** Permitir que proprietários criem contas com nome, e-mail e senha.
*   **ATOR:** Proprietário

**PRÉ-CONDIÇÕES**
1. Acessar a tela de cadastro.
2. E-mail não pode estar em uso.

**PÓS-CONDIÇÕES**
1. Proprietário cadastrado.
2. Proprietário autenticado automaticamente.
3. Sistema redireciona o usuário para a tela inicial, onde são exibidas suas barbearias.

**FLUXO NORMAL**
1. O proprietário acessa a tela de cadastro.
2. O sistema mostra os campos nome, e-mail e senha.
3. O proprietário preenche os campos obrigatórios.
4. O sistema verifica se o e-mail já existe.
5. O sistema cria o usuário e registra o proprietário.
6. O sistema autentica automaticamente.
7. O proprietário é redirecionado para a tela inicial.

**FLUXO DE EXCEÇÃO**
1. E1 – Dados incompletos: Sistema avisa campos obrigatórios.
2. E2 – E-mail já existe: Sistema avisa e impede cadastro.
3. E3 – Erro inesperado: Sistema orienta tentar mais tarde.

**REQUISITOS RELACIONADOS**
1. RF001
2. RNF001
3. RNF005
4. RN009

#### CDU002 - Cadastrar Cliente

*   **ESCOPO:** Cadastro de clientes.
*   **PROPÓSITO:** Permitir que clientes criem conta para visualizar barbearias e fazer agendamentos.
*   **ATOR:** Cliente

**PRÉ-CONDIÇÕES**
1. Acessar a tela de cadastro.
2. E-mail não pode estar em uso.

**PÓS-CONDIÇÕES**
1. Cliente cadastrado.
2. Cliente pode acessar o sistema.

**FLUXO NORMAL**
1. O cliente acessa a tela de cadastro.
2. O sistema exibe os campos nome, e-mail e senha.
3. O cliente preenche os campos obrigatórios.
4. O sistema verifica se o e-mail já existe.
5. O sistema cria o usuário e registra o cliente.
6. O sistema confirma o cadastro.
7. O cliente é redirecionado para a tela de login.

**FLUXO DE EXCEÇÃO**
1. E1 – Dados incompletos: Sistema informa campos faltantes.
2. E2 – E-mail já existe: Sistema informa conflito.
3. E3 – Erro inesperado: Sistema solicita tentar novamente.

**REQUISITOS RELACIONADOS**
1. RF002
2. RNF001
3. RNF005
4. RN009

#### CDU003 - Realizar Login

*   **ESCOPO:** Acesso ao sistema através de e-mail e senha.
*   **PROPÓSITO:** Permitir que usuários acessem sua área correspondente.
*   **ATOR:** Proprietário, Barbeiro, Cliente

**PRÉ-CONDIÇÕES**
1. Possuir cadastro.
2. Informar e-mail e senha válidos.

**PÓS-CONDIÇÕES**
1. Usuário autenticado.
2. Redirecionamento conforme seu tipo:
    *   2.a. Proprietário → tela inicial (lista de barbearias)
    *   2.b. Barbeiro → página de agendamentos do barbeiro
    *   2.c. Cliente → lista de barbearias disponíveis

**FLUXO NORMAL**
1. O usuário acessa a tela de login.
2. O sistema exibe campos e-mail e senha.
3. O usuário preenche as credenciais.
4. O sistema valida os dados.
5. O usuário é direcionado para sua área correspondente.

**FLUXO DE EXCEÇÃO**
1. E1 – Credenciais inválidas: Sistema informa erro.
2. E2 – Conta inexistente: Sistema informa que não existe cadastro.
3. E3 – Erro inesperado: Sistema informa falha.

**REQUISITOS RELACIONADOS**
1. RF003
2. RNF001
3. RNF005

#### CDU004 - Listar Barbearias

*   **ESCOPO:** Exibição das barbearias do proprietário e seus indicadores.
*   **PROPÓSITO:** Fornecer visão geral das unidades.
*   **ATOR:** Proprietário

**PRÉ-CONDIÇÕES**
1. Proprietário autenticado.

**PÓS-CONDIÇÕES**
1. Lista atualizada de barbearias exibida na tela inicial.

**FLUXO NORMAL**
1. O proprietário acessa a tela inicial.
2. O sistema carrega todas as barbearias vinculadas ao proprietário.
3. O sistema calcula: total de barbeiros vinculados, atendimentos realizados na semana, valor total semanal.
4. O sistema mostra as barbearias e seus dados resumidos.

**FLUXO DE EXCEÇÃO**
1. E1 – Falha ao carregar dados: Sistema informa erro.

**REQUISITOS RELACIONADOS**
1. RF004
2. RNF002
3. RN007

#### CDU005 - Gerenciar Barbearias

*   **ESCOPO:** Cadastro, edição e remoção de barbearias.
*   **PROPÓSITO:** Permitir que o proprietário administre suas unidades.
*   **ATOR:** Proprietário

**PRÉ-CONDIÇÕES**
1. Proprietário autenticado.

**PÓS-CONDIÇÕES**
1. Barbearia criada, editada ou removida.

**FLUXO NORMAL**
1. O proprietário acessa a tela inicial, onde suas barbearias aparecem.
2. O sistema exibe as barbearias cadastradas.
3. O proprietário preenche formulário com: nome, e-mail, endereço, telefone, horário de início e fim do expediente, descrição, foto.
4. O sistema vincula a barbearia ao proprietário.
5. O sistema gera foto padrão caso nenhuma seja enviada.
6. A barbearia é salva e exibida na tela inicial.

**FLUXO DE EXCEÇÃO**
1. E1 – Falha ao cadastrar: Sistema informa erro.

**REQUISITOS RELACIONADOS**
1. RF005
2. RN007
3. RN009

#### CDU006 - Gerenciar Barbeiros

*   **ESCOPO:** Administração dos barbeiros de cada barbearia.
*   **PROPÓSITO:** Permitir gerenciar profissionais vinculados às unidades.
*   **ATOR:** Proprietário

**PRÉ-CONDIÇÕES**
1. Proprietário autenticado.
2. Pelo menos uma barbearia cadastrada.

**PÓS-CONDIÇÕES**
1. Barbeiro cadastrado, editado, transferido ou removido.

**FLUXO NORMAL**
1. O proprietário acessa a página de detalhes da barbearia.
2. O sistema exibe barbeiros vinculados à unidade.
3. O proprietário consulta a lista de outras barbearias para transferência.
4. O proprietário pode realizar uma das ações: editar horários, transferir barbeiro, remover barbeiro.
5. O sistema confirma cada operação.

**FLUXO DE EXCEÇÃO**
1. E1 – Barbearia inexistente: Sistema redireciona.
2. E2 – Erro ao alterar dados: Sistema informa problema.
3. E3 – Erro ao transferir: Sistema informa problema.
4. E4 – Erro ao remover: Sistema informa problema.

**REQUISITOS RELACIONADOS**
1. RF006
2. RN006
3. RN009

#### CDU007 – Gerenciar Serviço

*   **ESCOPO:** Cadastro, edição e remoção de serviços oferecidos pela barbearia.
*   **PROPÓSITO:** Organizar a lista de serviços oferecidos em cada unidade.
*   **ATOR:** Proprietário

**PRÉ-CONDIÇÕES**
1. O proprietário deve estar autenticado no sistema.
2. O proprietário deve ter ao menos uma barbearia cadastrada.
3. Deve existir um catálogo de produtos para vincular aos serviços.

**PÓS-CONDIÇÕES**
1. Serviço criado, atualizado ou removido da barbearia.
2. Serviço disponível para uso nos atendimentos realizados pelos barbeiros.
3. Produtos associados registram a quantidade necessária por atendimento em mililitros (ml).

**FLUXO NORMAL**
1. O proprietário acessa a página de serviços da barbearia.
2. O sistema exibe os serviços cadastrados.
3. O proprietário escolhe cadastrar, editar ou remover serviço.
4. O proprietário preenche o formulário com: nome, descrição, preço, produtos associados e a quantidade necessária em ml.
5. O sistema salva as informações.
6. O sistema exibe a lista atualizada.

**FLUXO DE EXCEÇÃO**
1. E1 – Dados incompletos: Sistema informa erro.
2. E2 – Erro ao salvar: Sistema notifica falha.
3. E3 – Serviço usado em atendimento: Sistema solicita confirmação.

**REQUISITOS RELACIONADOS**
1. RF007
2. RN005
3. RN008
4. RN009

#### CDU008 – Gerenciar Produto e Estoque

*   **ESCOPO:** Cadastro de produtos e controle do estoque por barbearia.
*   **PROPÓSITO:** Manter registro dos produtos usados e disponíveis em cada unidade.
*   **ATOR:** Proprietário

**PRÉ-CONDIÇÕES**
1. Proprietário autenticado.
2. Barbearia cadastrada.
3. Produto deve possuir nome, descrição, preço e quantidade registrada em mililitros (ml).

**PÓS-CONDIÇÕES**
1. Produto criado, editado ou removido.
2. Estoque atualizado após cadastros, edições, remoções ou reposições.
3. Quantidades disponíveis registradas e mantidas em ml.

**FLUXO NORMAL**
1. Proprietário acessa a área de produtos da barbearia.
2. O sistema lista os produtos cadastrados.
3. O proprietário cadastra, edita ou remove produtos.
4. O proprietário registra reposições de quantidade em mililitros (ml).
5. O sistema atualiza o estoque automaticamente em ml.

**FLUXO DE EXCEÇÃO**
1. E1 – Dados incompletos: Sistema informa os dados faltantes.
2. E2 – Erro ao atualizar estoque: Sistema informa falha.

**REQUISITOS RELACIONADOS**
1. RF008
2. RN003
3. RN004
4. RN009

#### CDU009 – Emitir Alerta de Estoque Baixo

*   **ESCOPO:** Geração automática de alertas de estoque baixo.
*   **PROPÓSITO:** Avisar o proprietário quando produtos atingirem ou ficarem abaixo do mínimo definido.
*   **ATOR:** Proprietário

**PRÉ-CONDIÇÕES**
1. Proprietário autenticado.
2. Produtos cadastrados na barbearia.
3. Estoque mínimo definido em mililitros (ml) para cada produto.
4. Quantidade atual registrada no estoque (em ml).

**PÓS-CONDIÇÕES**
1. Alertas exibidos ao proprietário na tela da barbearia.
2. Produtos em nível crítico destacados para reposição.
3. Proprietário informado sobre itens que precisam de ação imediata.

**FLUXO NORMAL**
1. O sistema verifica o estoque dos produtos da barbearia.
2. O sistema identifica produtos cuja quantidade atual (em ml) está igual ou abaixo do mínimo definido (em ml).
3. O sistema exibe alertas de estoque baixo na página de detalhes da barbearia.

**FLUXO DE EXCEÇÃO**
1. E1 – Falha ao analisar estoque: Sistema informa erro e solicita nova tentativa.

**REQUISITOS RELACIONADOS**
1. RF009
2. RN004

#### CDU010 – Realizar Agendamento

*   **ESCOPO:** Registro de agendamentos feitos pelo cliente.
*   **PROPÓSITO:** Permitir que o cliente selecione barbearia, data e horário disponíveis.
*   **ATOR:** Cliente

**PRÉ-CONDIÇÕES**
1. Cliente autenticado.
2. Barbearias cadastradas.
3. Horários disponíveis conforme expediente da barbearia.

**PÓS-CONDIÇÕES**
1. Agendamento registrado e vinculado ao cliente e a barbearia.
2. Horário marcado como indisponível.

**FLUXO NORMAL**
1. Cliente acessa a lista de barbearias disponíveis.
2. O sistema exibe os horários disponíveis conforme o expediente da barbearia selecionada.
3. Cliente seleciona barbearia, data e horário.
4. O sistema valida a disponibilidade.
5. O sistema registra o agendamento.
6. O cliente recebe confirmação do agendamento.

**FLUXO DE EXCEÇÃO**
1. E1 – Horário indisponível: Sistema informa que o horário já está ocupado.
2. E2 – Dados incompletos: Sistema informa quais dados faltam.
3. E3 – Erro ao registrar: Sistema pede para tentar novamente.

**REQUISITOS RELACIONADOS**
1. RF010
2. RN001
3. RN002
4. RN010

#### CDU011 – Visualizar Histórico de Agendamento

*   **ESCOPO:** Exibição dos agendamentos realizados pelo cliente.
*   **PROPÓSITO:** Permitir que o cliente consulte datas e horários agendados.
*   **ATOR:** Cliente

**PRÉ-CONDIÇÕES**
1. Cliente autenticado.
2. Agendamentos registrados no sistema.

**PÓS-CONDIÇÕES**
1. Histórico exibido ao cliente.

**FLUXO NORMAL**
1. Cliente acessa a área de histórico de agendamentos.
2. O sistema lista todos os agendamentos do cliente.
3. O cliente visualiza data, horário, barbearia.

**FLUXO DE EXCEÇÃO**
1. E1 – Nenhum agendamento encontrado: Sistema informa ausência de registros.

**REQUISITOS RELACIONADOS**
1. RF011
2. RN009

#### CDU012 – Registrar Atendimento

*   **ESCOPO:** Registro dos atendimentos realizados pelo barbeiro.
*   **PROPÓSITO:** Registrar serviços, produtos usados e valor final, descontando do estoque as quantidades consumidas.
*   **ATOR:** Barbeiro

**PRÉ-CONDIÇÕES**
1. Barbeiro autenticado.
2. Barbeiro vinculado a uma barbearia.
3. Serviços possuem produtos associados com quantidade padrão em ml.
4. Estoque deve ter quantidade suficiente em ml dos produtos utilizados.

**PÓS-CONDIÇÕES**
1. Atendimento registrado.
2. Estoque atualizado com desconto das quantidades usadas em ml.
3. Histórico de atendimento atualizado.

**FLUXO NORMAL**
1. O barbeiro acessa sua página de agendamentos.
2. O sistema exibe atendimentos anteriores.
3. O barbeiro preenche o formulário informando: serviços prestados, produtos utilizados, quantidade em ml usada, valor total e comentários.
4. O sistema valida que pelo menos um serviço foi informado.
5. O sistema calcula automaticamente o valor total do atendimento.
6. O sistema desconta do estoque da barbearia a quantidade utilizada de cada produto em ml.
7. O atendimento é registrado.

**FLUXO DE EXCEÇÃO**
1. E1 – Nenhum serviço informado: Sistema informa erro.
2. E2 – Produto sem quantidade suficiente no estoque: Sistema informa erro.
3. E3 – Valor negativo: Sistema informa erro.
4. E4 – Valor não informado: Sistema informa erro.
5. E5 – Atendimento inexistente: Sistema informa erro.
6. E6 – Erro ao salvar: Sistema notifica falha.

**REQUISITOS RELACIONADOS**
1. RF012
2. RN003
3. RN008
4. RN009

#### CDU013 – Visualizar Histórico de Atendimento

*   **ESCOPO:** Exibir os atendimentos realizados na barbearia.
*   **PROPÓSITO:** Permitir que proprietários e barbeiros consultem o histórico completo de atendimentos.
*   **ATOR:** Proprietário, Barbeiro

**PRÉ-CONDIÇÕES**
1. Usuário autenticado.
2. Atendimentos registrados na barbearia.
3. Usuário deve estar vinculado à barbearia (proprietário ou barbeiro).

**PÓS-CONDIÇÕES**
1. Histórico exibido ao usuário.
2. Informações detalhadas disponíveis para consulta.

**FLUXO NORMAL**
1. O usuário acessa a área de histórico de atendimentos.
2. O sistema lista os atendimentos registrados na barbearia.
3. O usuário visualiza serviços realizados, produtos utilizados, data, cliente, barbeiro responsável e valor total.

**FLUXO DE EXCEÇÃO**
1. E1 – Nenhum atendimento encontrado: Sistema informa ausência de registros.

**REQUISITOS RELACIONADOS**
1. RF013
2. RN009

## 3. Diagrama de Classe do Sistema

![Diagrama classe do sistema de agendamento e gestão de barbearias](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/diagrama_de_classes.png)

## 4. Diagrama Entidade-Relacionamento

![Diagrama ER, representação visual do banco de dados do sistema](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/diagrama_entidade_relacionamento.png)
