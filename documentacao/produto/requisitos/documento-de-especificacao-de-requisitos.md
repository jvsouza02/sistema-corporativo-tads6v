# Documento de Especificação de Requisitos

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas.
**Projeto:** Sistema de Agendamento e Gestão de Barbearias.

---

## Registro de Alterações

| Versão | Responsável    | Data       | Alterações                                                                                      |
|--------|----------------|------------|-------------------------------------------------------------------------------------------------|
| 1.0    | Yuri Fernandes | 06/10/2025 | Criação do diagrama de classes e do diagrama de caso de uso e suas especificações.             |
| 1.1    | Yuri Fernandes | 11/10/2025 | Implementação de uma funcionalidade adicional no módulo de gestão de barbearias.                |
| 1.2    | Yuri Fernandes | 18/11/2025 | Ajuste nas funcionalidades atuais de acordo com a nova demanda do cliente.                      |
| 1.3    | Yuri Fernandes | 25/11/2025 | Evolução do sistema de gerenciamento de barbearias através da inclusão de uma nova funcionalidade. |
| 1.4    | Yuri Fernandes | 10/11/2025 | Ajustes na especificação de caso de uso.                                                       |
| 1.5    | Yuri Fernandes | 06/12/2025 | Adicionando casos de uso especificados do Github.                                              |
| 1.6    | Yuri Fernandes | 15/12/2025 | Ajustando diagrama de classes para ficar de acordo com o sistema até o momento.                 |

---

## 1. Introdução

A presente especificação de requisitos tem como objetivo descrever de forma clara e organizada as características e comportamentos esperados do sistema de gestão de barbearias. Este documento busca alinhar o entendimento entre desenvolvedores, stakeholders e usuários, assegurando que todos tenham uma visão unificada sobre o propósito e o funcionamento do sistema.

A especificação apresenta os principais requisitos, casos de uso, regras e diagramas de classes que orientam o desenvolvimento, descrevendo como os atores interagem com o sistema e quais condições garantem seu correto funcionamento. Por meio deste documento, pretende-se estabelecer uma base sólida para o desenvolvimento, validação e manutenção do software, de modo que o produto atenda às necessidades do negócio e contribua para uma gestão mais eficiente e organizada das barbearias.

---

## 2. Modelo de Caso de Uso do Sistema

### 2.1. Diagrama de Caso de Uso

A seguir temos uma imagem ilustrando o diagrama de caso de uso do sistema.

![Diagrama de caso de uso do sistema de agendamento e gestão de barbearias](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/diagrama_caso_de_uso.png)

### 2.2. Descrição dos Atores

O modelo de casos de uso visa capturar e descrever as funcionalidades que um sistema deve prover para os atores que interagem com ele. Os atores identificados no contexto deste projeto estão descritos na tabela abaixo.

| Nome         | Descrição                                                                                                                                                                                                                                                                                                                                                   |
|--------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Proprietário | Administrador das barbearias no sistema. Realiza seu cadastro e login para acessar a plataforma, podendo cadastrar, editar e remover barbearias, informando dados como nome, endereço, telefone, e-mail, horários de funcionamento, descrição e foto de apresentação. Também é responsável por gerenciar os barbeiros vinculados às suas barbearias, incluindo cadastro, edição, remoção e transferência entre unidades. Além disso, gerencia os serviços oferecidos, os produtos e o estoque de cada barbearia, acompanha alertas de estoque baixo e consulta o histórico de atendimentos e indicadores de desempenho das unidades, como quantidade de atendimentos e valor total gerado. |
| Barbeiro     | Profissional vinculado a uma barbearia, que acessa o sistema por meio de login para gerenciar sua rotina de trabalho. Pode visualizar seus agendamentos diários ou semanais e registrar os atendimentos realizados, selecionando os serviços prestados, utilizando os produtos associados e adicionando produtos extras quando necessário. Também pode inserir comentários nos atendimentos, editar ou remover registros e consultar o histórico de atendimentos realizados, contribuindo para o controle operacional e financeiro da barbearia. |
| Cliente      | Usuário final da plataforma que se cadastra e realiza login para utilizar os serviços oferecidos pelas barbearias. Pode visualizar as barbearias disponíveis, consultar os horários de funcionamento e verificar a disponibilidade para agendamento. O cliente seleciona a barbearia, escolhe data e horário para realizar um agendamento e, posteriormente, pode acompanhar e consultar seu histórico de agendamentos, tendo uma experiência prática e conveniente no uso do sistema. |
| Sistema      | Ator automático responsável pela execução de comportamentos internos e eventos sem intervenção direta de usuários. O sistema controla regras de negócio, realiza cálculos automáticos, atualiza o estoque de produtos durante os atendimentos e monitora continuamente as quantidades disponíveis. Quando um produto atinge ou fica abaixo do limite mínimo definido, o sistema emite automaticamente alertas de estoque baixo para o proprietário, garantindo o controle e a integridade das operações da barbearia. |

### 2.3. Tabela de Casos de Uso

A seguir são apresentadas as descrições de cada um dos casos de uso identificados. Os casos de uso envolvendo inserir, consultar, alterar e excluir (ICAE) são descritos na tabela abaixo, segundo o padrão da organização.

| ID     | Nome                      | Descrição                                                                                                                                                           | Ações Possíveis        | Observações                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     | Atores Responsáveis           | Requisitos Relacionados                  | Classes Envolvidas                        |
|--------|---------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------|------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------------|------------------------------------------|-------------------------------------------|
| CDU01  | Cadastrar Proprietário    | Permitir que o proprietário registre e mantenha seus dados de conta no sistema. O fluxo inclui cadastro com nome, e-mail e senha, validação de e-mail único e acesso ao sistema após autenticação.                             | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: cadastrar proprietário com nome, e-mail e senha. [C] Consultar: visualizar dados do proprietário. [A] Alterar: atualizar informações cadastrais. [E] Excluir: excluir cadastro se não houver barbearias vinculadas.                                                                                                                                                                                                                                                               | Proprietário                   | RF001, RNF001, RNF005                     | Usuario, Proprietario                     |
| CDU002 | Cadastrar Cliente         | Permitir que o cliente crie uma conta no sistema para visualizar barbearias, realizar agendamentos e acompanhar seu histórico.                                                                                                | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: cadastrar cliente com nome, e-mail e senha. [C] Consultar: visualizar dados do cliente. [A] Alterar: atualizar informações cadastrais. [E] Excluir: excluir cadastro se não houver agendamentos ou atendimentos vinculados.                                                                                                                                                                                                                                                         | Cliente                        | RF002, RNF001, RNF005                     | Usuario, Cliente                          |
| CDU003 | Realizar Login            | Permitir que clientes, barbeiros e proprietários acessem o sistema por meio de autenticação com e-mail e senha válidos, sendo redirecionados conforme seu perfil.                                                             | [C] Consultar          | [C] Consultar: autenticar usuário e permitir acesso à área correspondente ao seu perfil.                                                                                                                                                                                                                                                                                                                                                                                                         | Cliente, Barbeiro, Proprietário | RF003, RNF001, RNF005                    | Usuario, Proprietario, Barbeiro, Cliente |
| CDU004 | Listar Barbearias         | Permitir que o proprietário visualize todas as suas barbearias cadastradas com informações resumidas e indicadores de desempenho.                                                                                            | [C] Consultar          | [C] Consultar: listar barbearias do proprietário com nome, endereço, horários, quantidade de atendimentos, barbeiros e valor gerado.                                                                                                                                                                                                                                                                                                                                                           | Proprietário                   | RF004, RNF003, RN005                      | Barbearia, Proprietario, Atendimento, Barbeiro |
| CDU005 | Gerenciar Barbearia       | Permitir que o proprietário cadastre, edite e remova barbearias, mantendo todas as informações da unidade atualizadas.                                                                                                       | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: cadastrar barbearia com dados completos e foto. [C] Consultar: visualizar detalhes da barbearia. [A] Alterar: atualizar dados da unidade. [E] Excluir: remover barbearia se não houver vínculos ativos.                                                                                                                                                                                                                                                                     | Proprietário                   | RF005, RN004, RN005                      | Barbearia, Proprietario                   |
| CDU006 | Gerenciar Barbeiro        | Permitir ao proprietário cadastrar, editar, remover e transferir barbeiros entre suas barbearias.                                                                                                                            | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: cadastrar barbeiro com dados pessoais e horários. [C] Consultar: visualizar barbeiros vinculados à barbearia. [A] Alterar: atualizar dados ou transferir barbeiro. [E] Excluir: remover barbeiro se não houver atendimentos vinculados.                                                                                                                                                                                                                                          | Proprietário                   | RF006, RN001, RN004                      | Barbeiro, Barbearia, Usuario              |
| CDU007 | Gerenciar Serviço         | Permitir o gerenciamento dos serviços oferecidos pela barbearia, associando produtos e quantidades padrão utilizadas.                                                                                                       | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: cadastrar serviço com preço e produtos associados. [C] Consultar: visualizar serviços da barbearia. [A] Alterar: atualizar dados do serviço. [E] Excluir: excluir serviço se não houver atendimentos associados.                                                                                                                                                                                                                                                               | Proprietário                   | RF007, RN006                             | Servico, Produto, ServicoProduto, Barbearia |
| CDU008 | Gerenciar Produto e Estoque | Permitir ao proprietário cadastrar produtos, controlar o estoque por barbearia, registrar reposições e acompanhar quantidades disponíveis.                                                                                   | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: cadastrar produto e definir estoque inicial. [C] Consultar: visualizar produtos e quantidades em estoque. [A] Alterar: registrar reposição ou ajuste de estoque. [E] Excluir: remover produto se não houver vínculos com serviços.                                                                                                                                                                                                                                             | Proprietário                   | RF008, RN003, RN003                      | Produto, Estoque, Barbearia               |
| CDU009 | Emitir Alerta de Estoque Baixo | Monitorar automaticamente o estoque e emitir alertas quando a quantidade de um produto atingir ou ficar abaixo do limite mínimo.                                                                                              | [C] Consultar          | [C] Consultar: identificar produtos com estoque abaixo do mínimo e exibir alerta ao proprietário.                                                                                                                                                                                                                                                                                                                                                                                               | Sistema                        | RF009, RN004, RNF002                     | Estoque, Produto, Barbearia               |
| CD010  | Realizar Agendamento      | Permitir que o cliente visualize horários disponíveis e registre um agendamento em uma barbearia.                                                                                                                             | [I] Inserir [C] Consultar | [I] Inserir: registrar agendamento escolhendo data e horário. [C] Consultar: visualizar horários disponíveis conforme expediente.                                                                                                                                                                                                                                                                                                                                                           | Cliente                        | RF010, RN001, RN007, RN008               | Agendamento, Cliente, Barbearia, Barbeiro |
| CDU011 | Visualizar Histórico de Agendamento | Permitir que o cliente visualize seus agendamentos realizados e respectivos status.                                                                                                                                           | [C] Consultar          | [C] Consultar: visualizar lista de agendamentos do cliente.                                                                                                                                                                                                                                                                                                                                                                                                                                   | Cliente                        | RF011, RN009                             | Agendamento, Cliente                      |
| CDU012 | Registrar Atendimento     | Permitir que o barbeiro registre atendimentos realizados, selecionando serviços, produtos e comentários, com cálculo automático do valor total e baixa de estoque.                                                           | [I] Inserir [C] Consultar [A] Alterar [E] Excluir | [I] Inserir: registrar atendimento com serviços e produtos utilizados. [C] Consultar: visualizar atendimentos registrados. [A] Alterar: atualizar serviços, produtos ou comentários. [E] Excluir: remover registro de atendimento.                                                                                                                                                                                                                                                     | Barbeiro                       | RF012, RN002, RN006, RN009, RN010        | Atendimento, Servico, Produto, Estoque, Barbearia, Barbeiro, Cliente |
| CDU013 | Visualizar Histórico de Atendimento | Permitir que barbeiros e proprietários visualizem atendimentos realizados com informações completas.                                                                                                                          | [C] Consultar          | [C] Consultar: visualizar histórico de atendimentos por período e unidade.                                                                                                                                                                                                                                                                                                                                                                                                                    | Barbeiro, Proprietário         | RF013, RN009                             | Atendimento, Barbeiro, Proprietario, Cliente, Barbearia |

### 2.4. Descrição Detalhada dos Casos de Uso

A seguir temos a documentação que detalha cada caso de uso do MCDU, com a descrição do fluxo de forma enumerada.

#### CDU001 – Cadastrar Proprietário

**Objetivo:** Permitir que uma pessoa crie uma conta como proprietário informando nome, e-mail e senha para acessar o sistema.
**Ator:** Proprietário
**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
1. O usuário deve acessar a página de cadastro.
2. O usuário ainda não pode possuir conta com o e-mail informado.

**PÓS-CONDIÇÕES**
1. O proprietário passa a existir no sistema.
2. O proprietário é autenticado automaticamente.
3. O sistema direciona o proprietário para o dashboard.

**FLUXO PRINCIPAL**
1. O proprietário acessa a página de cadastro.
2. O sistema mostra os campos para nome, e-mail, senha, confirmação de senha e tipo de conta.
3. O proprietário informa seus dados.
4. O sistema valida os dados informados.
5. O sistema verifica se o e-mail ainda não está em uso.
6. O sistema cria a conta do usuário.
7. O sistema registra o proprietário.
8. O sistema autentica o proprietário automaticamente.
9. O sistema mostra o dashboard do proprietário.

**FLUXOS DE EXCEÇÃO**
1. Dados Incompletos
    1.1. Um ou mais campos obrigatórios não são informados pelo proprietário.
    1.2. O sistema identifica os campos em branco e exibe uma mensagem indicando quais são obrigatórios.
    1.3. O cadastro não é realizado e o sistema retorna para a etapa de preenchimento dos dados.
2. E-mail Já Existente
    2.1. O sistema identifica que o e-mail informado já está cadastrado para outro usuário.
    2.2. O sistema informa ao usuário que a conta já existe e sugere a recuperação de senha ou o uso de outro e-mail.
    2.3. O cadastro não é realizado.
3. Erro Inesperado
    3.1. Ocorre uma falha não prevista durante o processo de cadastro (ex: indisponibilidade do banco de dados).
    3.2. O sistema informa ao proprietário que houve um erro e orienta a tentar novamente.
    3.3. O cadastro não é realizado.

**REQUISITOS DE USUÁRIO RELACIONADOS**
1. RF001 - Cadastrar Proprietário: Permite que novos proprietários criem conta informando nome, e-mail e senha para acessar o sistema.
2. RNF001 - Controlar autenticação e autorização: Todos os acessos devem ser protegidos por autenticação; usuários com perfis distintos acessam apenas funcionalidades permitidas.
3. RNF005 - Proteger os dados do sistema: Senhas devem ser armazenadas de forma segura (hash) e dados sensíveis não devem ser expostos indevidamente.

#### CDU002 – Cadastrar Cliente

**Objetivo:** Permitir que uma pessoa crie uma conta como cliente informando nome, e-mail e senha para visualizar barbearias e realizar agendamentos.
**Ator:** Cliente
**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
1. O usuário deve acessar a página de cadastro.
2. O usuário ainda não pode possuir conta com o e-mail informado.

**PÓS-CONDIÇÕES**
1. O cliente passa a existir no sistema.
2. O sistema redireciona o cliente para a página de login com mensagem de sucesso.

**FLUXO PRINCIPAL**
1. O cliente acessa a página de criação de conta.
2. O sistema mostra os campos para nome, e-mail, senha e confirmação de senha.
3. O cliente informa seus dados.
4. O sistema valida os dados informados.
5. O sistema verifica se o e-mail ainda não está em uso.
6. O sistema cria a conta do usuário.
7. O sistema registra o cliente.
8. O sistema redireciona o cliente para a página de login com uma mensagem de sucesso.

**FLUXOS DE EXCEÇÃO**
1. Dados Incompletos
    1.1. O cliente deixa de preencher um ou mais campos obrigatórios.
    1.2. O sistema não realiza o cadastro e exibe uma mensagem solicitando o preenchimento de todos os campos.
2. E-mail Já Existente
    2.1. O e-mail informado pelo cliente já está vinculado a uma conta ativa no sistema.
    2.2. O sistema notifica o cliente sobre a duplicidade e o cadastro não é realizado.
3. Erro Inesperado
    3.1. Uma falha ocorre durante a tentativa de criação da conta (ex: erro de conexão).
    3.2. O sistema exibe uma mensagem genérica de erro e orienta o cliente a tentar o cadastro novamente.

**REQUISITOS DE USUÁRIO RELACIONADOS**
1. RF002 - Cadastrar Cliente: Permite que novos clientes criem conta informando nome, e-mail e senha para visualizar barbearias e realizar agendamentos.
2. RNF001 - Controlar autenticação e autorização: Todos os acessos devem ser protegidos por autenticação; usuários com perfis distintos acessam apenas funcionalidades permitidas.
3. RNF005 - Proteger os dados do sistema: Senhas devem ser armazenadas de forma segura (hash) e dados sensíveis não devem ser expostos indevidamente.

#### CDU003 – Realizar Login

**Objetivo:** Permitir que proprietários, barbeiros e clientes acessem o sistema informando e-mail e senha válidos.
**Ator:** Cliente, Barbeiro, Proprietário
**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
1. O usuário deve possuir conta cadastrada.
2. O usuário deve acessar a página de login.

**PÓS-CONDIÇÕES**
1. O usuário é autenticado.
2. O sistema direciona o usuário para sua página correspondente (dashboard, painel do barbeiro ou painel do cliente).

**FLUXO PRINCIPAL**
1. O usuário acessa a página de login.
2. O sistema mostra os campos de e-mail e senha.
3. O usuário informa suas credenciais.
4. O sistema valida os dados informados.
5. O sistema verifica se as credenciais são válidas.
6. O sistema autentica o usuário.
7. O sistema direciona o usuário para sua página correspondente.

**FLUXOS DE EXCEÇÃO**
1. Dados Inválidos
    1.1. O usuário tenta prosseguir com campos vazios ou com formato de e-mail inválido.
    1.2. O sistema exibe uma mensagem informando que os campos são obrigatórios e devem ser preenchidos corretamente.
    1.3. O acesso não é realizado.
2. Credenciais Incorretas
    2.1. A combinação de e-mail e senha informada não corresponde a nenhuma conta cadastrada.
    2.2. O sistema informa que as credenciais estão incorretas, sem especificar se o erro foi no e-mail ou na senha, por segurança.
    2.3. O acesso não é realizado.
3. Erro Inesperado
    3.1. Uma falha ocorre durante o processo de autenticação (ex: serviço de autenticação indisponível).
    3.2. O sistema exibe uma mensagem de erro genérico e orienta o usuário a tentar novamente.

**REQUISITOS DE USUÁRIO RELACIONADOS**
1. RF003 - Realizar Login: Permite que qualquer usuário (proprietário, barbeiro ou cliente) acesse o sistema usando e-mail e senha válidos, redirecionando para sua página específica.
2. RNF001 - Controlar autenticação e autorização: Todos os acessos devem ser protegidos por autenticação; usuários com perfis distintos acessam apenas funcionalidades permitidas.
3. RNF005 - Proteger os dados do sistema: Senhas devem ser armazenadas de forma segura (hash) e dados sensíveis não devem ser expostos indevidamente.

#### CDU004 – Listar Barbearia

**Objetivo:** Permitir que o proprietário visualize todas as suas barbearias cadastradas com informações principais.
**Ator:** Proprietário
**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
1. O proprietário deve estar autenticado.

**PÓS-CONDIÇÕES**
1. As barbearias do proprietário são exibidas em uma lista com suas informações principais.

**FLUXO PRINCIPAL**
1. O proprietário acessa o dashboard (painel principal).
2. O sistema busca as barbearias vinculadas ao proprietário.
3. O sistema reúne os dados principais de cada barbearia.
4. O sistema mostra nome, endereço, horários, quantidade de atendimentos da semana, número de barbeiros e valor total gerado.
5. O proprietário visualiza a lista de barbearias.
6. O proprietário clica em uma barbearia para ver os detalhes.

**FLUXOS DE EXCEÇÃO**
1. Nenhuma Barbearia Encontrada
    1.1. O proprietário ainda não cadastrou nenhuma barbearia no sistema.
    1.2. O sistema exibe uma mensagem informativa e sugere que ele cadastre sua primeira barbearia, com um botão de ação direta.
2. Erro Inesperado
    2.1. Ocorre uma falha durante a busca ou carregamento das barbearias (ex: problema na conexão com o banco de dados).
    2.2. O sistema exibe uma mensagem de erro e sugere ao proprietário que recarregue a página.

**REQUISITOS DE USUÁRIO RELACIONADOS**
1. RF004 - Listar Barbearia: Exibir todas as suas barbearias cadastradas, apresentando nome, endereço, horários de funcionamento, quantidade de atendimentos da semana, número de barbeiros e valor total gerado pelos atendimentos semanais, permitindo clicar em uma barbearia para acessar seus detalhes.
2. RNF003 - Assegurar desempenho adequado: Listagens e operações principais devem apresentar tempo de resposta aceitável, especialmente para consultas paginadas.
3. RN005 - Restringir gerenciamento de barbearias ao proprietário: O proprietário só pode ver e administrar as barbearias que estão registradas em seu nome.

#### CDU005 – Gerenciar Barbearia

**Objetivo:** Permitir que o proprietário cadastre novas barbearias mantendo as informações sempre atualizadas.
**Ator:** Proprietário
**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
1. O proprietário deve estar autenticado.
2. O proprietário deve acessar o dashboard.

**PÓS-CONDIÇÕES**
1. A barbearia é cadastrada conforme a ação realizada.
2. As informações permanecem registradas corretamente no sistema.

**FLUXO PRINCIPAL**
1. O proprietário clica no botão "Nova Barbearia" no dashboard.
2. O sistema mostra uma janela com campos para nome, e-mail, endereço, telefone, horários, foto e descrição.
3. O proprietário informa os dados da nova barbearia.
4. O sistema valida os dados informados.
5. O sistema cria a nova barbearia.
6. O sistema exibe a confirmação de criação e atualiza o dashboard.

**FLUXOS DE EXCEÇÃO**
1. Dados Incompletos
    1.1. O proprietário não preenche um ou mais campos obrigatórios (ex: nome, endereço).
    1.2. O sistema não realiza o cadastro e destaca os campos que precisam ser preenchidos.
2. Erro Inesperado
    2.1. Ocorre uma falha durante a operação de salvamento (ex: erro de validação específico no servidor).
    2.2. O sistema informa sobre o erro e mantém os dados preenchidos pelo proprietário no formulário, permitindo uma nova tentativa sem retrabalho.

**REQUISITOS DE USUÁRIO RELACIONADOS**
1. RF005 - Gerenciar Barbearia: O sistema deve permitir ao proprietário cadastrar novas barbearias informando nome, e-mail, endereço, telefone, horários de expediente, descrição e foto de apresentação.
2. RNF004 - Permitir escalabilidade do sistema: O sistema deve suportar múltiplas barbearias e usuários simultaneamente sem alteração na lógica de negócio.
3. RN005 - Restringir gerenciamento de barbearias ao proprietário: O proprietário só pode ver e administrar as barbearias que estão registradas em seu nome.

#### CDU006 – Gerenciar Barbeiro

**Objetivo:** Permitir que o proprietário cadastre, edite, remova e transfira barbeiros entre suas barbearias.
**Ator:** Proprietário
**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
1. O proprietário deve estar autenticado.
2. O proprietário deve acessar a página de barbeiros de uma barbearia.

**PÓS-CONDIÇÕES**
1. O barbeiro é cadastrado, atualizado, removido ou transferido conforme a ação realizada.

**FLUXO PRINCIPAL**
1. O proprietário acessa a página de barbeiros da barbearia.
2. O sistema mostra as opções para cadastrar, editar, remover ou transferir barbeiros.
3. O proprietário escolhe a ação desejada (Cadastrar).
4. O sistema mostra os campos necessários (nome, e-mail, senha, horários).
5. O proprietário informa os dados do barbeiro.
6. O sistema valida os dados informados.
7. O sistema registra a ação realizada.
8. O sistema atualiza a lista de barbeiros da barbearia.

**FLUXOS DE EXCEÇÃO**
1. Dados Incompletos
    1.1. O proprietário não informa um ou mais dados obrigatórios para o cadastro do barbeiro.
    1.2. A ação de cadastro não é realizada e o sistema solicita o preenchimento completo.
2. E-mail Já Existente
    2.1. O e-mail informado para o novo barbeiro já está cadastrado para outro usuário (seja barbeiro, cliente ou proprietário) no sistema.
    2.2. O sistema impede o cadastro e solicita um e-mail único.
3. Erro Inesperado
    3.1. Uma falha ocorre durante o processo de criação ou atualização do barbeiro.
    3.2. O sistema exibe uma mensagem de erro e mantém os dados preenchidos para correção.

**REQUISITOS DE USUÁRIO RELACIONADOS**
1. RF006 - Gerenciar Barbeiro: O sistema deve permitir ao proprietário cadastrar, editar, remover e transferir barbeiros entre suas barbearias, registrando nome, e-mail, senha e horários de expediente para cada profissional.
2. RNF001 - Controlar autenticação e autorização: Todos os acessos devem ser protegidos por autenticação; usuários com perfis distintos acessam apenas funcionalidades permitidas.
3. RN004 - Restringir transferência de barbeiro ao proprietário: Um barbeiro só pode ser movido entre barbearias que pertencem ao mesmo proprietário.

#### CDU007 – Gerenciar Serviço (Cadastrar)

**Objetivo:** Permitir que o proprietário cadastre, edite e remova os serviços oferecidos pela barbearia.
**Ator:** Proprietário
**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
1. O proprietário deve estar autenticado.
2. O proprietário deve acessar a página de serviços de uma barbearia.

**PÓS-CONDIÇÕES**
1. O serviço é cadastrado, atualizado ou removido conforme a ação realizada.

**FLUXO PRINCIPAL**
1. O proprietário acessa a página de serviços da barbearia.
2. O sistema mostra as opções para cadastrar, editar ou remover serviços.
3. O proprietário escolhe a ação desejada (Cadastrar).
4. O sistema mostra os campos necessários (nome, descrição, preço, produtos associados).
5. O proprietário informa os dados do serviço.
6. O sistema valida os dados informados.
7. O sistema registra a ação realizada.
8. O sistema atualiza a lista de serviços da barbearia.

**FLUXOS DE EXCEÇÃO**
1. Dados Incompletos
    1.1. Campos obrigatórios, como nome ou preço do serviço, não são informados.
    1.2. A ação de cadastro não é executada e o sistema solicita a informação faltante.
2. Serviço Duplicado
    2.1. O proprietário tenta cadastrar um serviço com um nome idêntico ao de um serviço já existente na mesma barbearia.
    2.2. O sistema impede a duplicação e sugere a edição do serviço existente ou a escolha de um nome diferente.
3. Erro Inesperado
    3.1. Uma falha ocorre durante o processo de salvar o serviço (ex: erro ao associar produtos).
    3.2. O sistema exibe uma mensagem de erro e preserva os dados já preenchidos pelo proprietário.

**REQUISITOS DE USUÁRIO RELACIONADOS**
1. RF007 - Gerenciar Serviço: O sistema deve permitir cadastrar, editar e remover serviços oferecidos pela barbearia (como corte, barba e coloração), registrando nome, descrição, preço e os produtos associados que serão utilizados no atendimento.
2. RN006 - Padronizar quantidade de produto por serviço: A quantidade de cada produto usado em um serviço é medida e registrada em mililitros.

#### CDU008 – Gerenciar Produto e Estoque

**Objetivo:** Permitir que o proprietário cadastre produtos e controle o estoque da barbearia.
**Ator:** Proprietário
**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
1. O proprietário deve estar autenticado.
2. O proprietário deve acessar a página de produtos de uma barbearia.

**PÓS-CONDIÇÕES**
1. O produto é cadastrado, atualizado ou removido.
2. O estoque é ajustado conforme as ações realizadas.

**FLUXO PRINCIPAL**
1. O proprietário acessa a página de produtos da barbearia.
2. O sistema mostra as opções para cadastrar, editar, remover produtos ou repor estoque.
3. O proprietário escolhe a ação desejada (Cadastrar).
4. O sistema mostra os campos necessários (nome, descrição, preço, quantidade inicial, limite mínimo).
5. O proprietário informa os dados do produto.
6. O sistema valida os dados informados.
7. O sistema registra a ação realizada.
8. O sistema atualiza a lista de produtos e estoque da barbearia.

**FLUXOS DE EXCEÇÃO**
1. Dados Incompletos
    1.1. Informações obrigatórias como nome do produto ou quantidade inicial não são fornecidas.
    1.2. O cadastro não é realizado e o sistema solicita o preenchimento completo.
2. Valor Inválido
    2.1. O proprietário informa um valor negativo ou inválido para campos como preço ou quantidade de estoque.
    2.2. O sistema rejeita o valor e solicita que seja inserido um número válido, maior ou igual a zero.
3. Erro Inesperado
    3.1. Uma falha ocorre durante a operação de salvamento do produto ou ajuste de estoque.
    3.2. O sistema informa sobre o erro e mantém os dados preenchidos no formulário.

**REQUISITOS DE USUÁRIO RELACIONADOS**
1. RF008 - Gerenciar Produto e Estoque: O sistema deve permitir cadastrar produtos utilizados nas barbearias, registrando preço e descrição, controlando o estoque individual por barbearia, registrando saídas automáticas em atendimentos e permitindo reposições de forma manual.
2. RNF003 - Assegurar desempenho adequado: Listagens e operações principais devem apresentar tempo de resposta aceitável, especialmente para consultas paginadas.
3. RN003 - Alertar sobre estoque baixo: Exibe um aviso quando a quantidade de um produto chega ou fica abaixo do limite mínimo estabelecido.

#### CDU009 – Emitir Alerta de Estoque Baixo

**Objetivo:** Informar o proprietário quando a quantidade de um produto estiver igual ou abaixo do limite mínimo.
**Ator:** Sistema
**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
1. Deve existir ao menos um produto cadastrado na barbearia.
2. O produto deve possuir um limite mínimo definido.

**PÓS-CONDIÇÕES**
1. O proprietário é informado sobre produtos com estoque baixo através de alertas visuais na interface.

**FLUXO PRINCIPAL**
1. O sistema acompanha as quantidades em estoque.
2. A quantidade de um produto atinge ou fica abaixo do limite mínimo configurado.
3. O sistema identifica a situação de estoque baixo.
4. O sistema gera um alerta visual (ex: badge, notificação, item em lista destacado) na interface do proprietário.
5. O proprietário visualiza o aviso ao acessar as páginas relacionadas (dashboard, página de produtos).

**FLUXOS DE EXCEÇÃO**
1. Falha na Verificação
    1.1. O sistema não consegue realizar a verificação automática do estoque (ex: job ou processo agendado falha).
    1.2. O alerta não é emitido e o erro é registrado nos logs do sistema para monitoramento.

**REQUISITOS DE USUÁRIO RELACIONADOS**
1. RF009 - Emitir Alerta de Estoque Baixo: O sistema deve exibir automaticamente alertas quando a quantidade de um produto atingir ou ficar abaixo do limite mínimo definido para a barbearia, permitindo ao proprietário identificar facilmente itens que precisam de reposição.
2. RN003 - Alertar sobre estoque baixo: Exibe um aviso quando a quantidade de um produto chega ou fica abaixo do limite mínimo estabelecido.
3. RNF002 - Garantir disponibilidade do sistema: O sistema deve estar disponível para uso contínuo, permitindo acesso às funcionalidades principais.

#### CDU010 – Realizar Agendamento

**Objetivo:** Permitir que o cliente escolha uma barbearia, data e horário para realizar um agendamento.
**Ator:** Cliente
**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
1. O cliente deve estar autenticado.
2. Devem existir barbearias cadastradas e com horários de funcionamento definidos.

**PÓS-CONDIÇÕES**
1. O agendamento é registrado no sistema com status "agendado".

**FLUXO PRINCIPAL**
1. O cliente acessa a página de agendamentos.
2. O sistema mostra as barbearias disponíveis.
3. O cliente seleciona uma barbearia.
4. O sistema permite que o cliente escolha uma data.
5. O sistema mostra os horários disponíveis no expediente da barbearia para a data selecionada, bloqueando os horários já agendados.
6. O cliente escolhe um horário disponível.
7. O sistema verifica a disponibilidade.
8. O sistema registra o agendamento com o status "agendado", sem associar a um barbeiro específico.
9. O sistema confirma o agendamento ao cliente.

**FLUXOS DE EXCEÇÃO**
1. Horário Indisponível
    1.1. O cliente tenta confirmar um agendamento para um horário que acabou de ser reservado por outro cliente.
    1.2. O sistema informa sobre o conflito de horário, sugere horários alternativos próximos e o agendamento não é realizado.
2. Fora do Horário de Funcionamento
    2.1. O cliente seleciona um horário que não está dentro do expediente configurado para a barbearia.
    2.2. O sistema informa que o horário é inválido e exibe novamente a faixa de horários correta.
    2.3. O agendamento não é realizado.
3. Data Passada
    3.1. O cliente tenta agendar para uma data ou horário que já passou em relação ao momento atual.
    3.2. O sistema impede o agendamento retroativo e solicita a escolha de uma data futura.

**REQUISITOS DE USUÁRIO RELACIONADOS**
1. RF010 - Realizar Agendamento: O sistema deve permitir que o cliente visualize barbearias e horários disponíveis com base no expediente da unidade e registre um agendamento selecionando data e horário desejados.
2. RN001 - Verificar disponibilidade de horário na barbearia: Verifica se já existe outro agendamento marcado para o mesmo horário antes de confirmar um novo agendamento.
3. RN007 - Validar horário de agendamento: Garante que o cliente só possa marcar horários dentro do período de funcionamento estabelecido pela barbearia.
4. RN008 - Impedir agendamento retroativo: Não permite que o cliente agende um horário que já passou em relação ao momento atual.

#### CDU011 – Visualizar Histórico de Agendamento

**Objetivo:** Permitir que o cliente visualize seus agendamentos realizados.
**Ator:** Cliente
**Prioridade:** Média

**PRÉ-CONDIÇÕES**
1. O cliente deve estar autenticado.

**PÓS-CONDIÇÕES**
1. O histórico de agendamentos do cliente é exibido com as informações principais.

**FLUXO PRINCIPAL**
1. O cliente acessa a página de "Meus Agendamentos".
2. O sistema busca os agendamentos registrados para aquele cliente.
3. O sistema organiza as informações (geralmente ordenando por data mais recente).
4. O sistema mostra para cada agendamento: data, horário, barbearia e status.
5. O cliente visualiza seu histórico.

**FLUXOS DE EXCEÇÃO**
1. Nenhum Agendamento Encontrado
    1.1. O cliente ainda não possui nenhum agendamento registrado no sistema.
    1.2. O sistema exibe uma mensagem amigável informando isso e sugere a criação de um novo agendamento, com um link para a página de agendamentos.
2. Erro ao Carregar
    2.1. Ocorre uma falha ao buscar os dados do histórico no servidor ou banco de dados.
    2.2. O sistema exibe uma mensagem de erro temporário e sugere que o cliente recarregue a página.

**REQUISITOS DE USUÁRIO RELACIONADOS**
1. RF011 - Visualizar Histórico de Agendamento: O sistema deve permitir que o cliente visualize seus agendamentos realizados, incluindo informações como data, horário, barbearia e status.
2. RNF003 - Assegurar desempenho adequado: Listagens e operações principais devem apresentar tempo de resposta aceitável, especialmente para consultas paginadas.

#### CDU012 – Registrar Atendimento

**Objetivo:** Permitir que o barbeiro registre os serviços e produtos utilizados em um atendimento.
**Ator:** Barbeiro
**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
1. O barbeiro deve estar autenticado.
2. Deve existir um agendamento para a barbearia do barbeiro ou um cliente deve ser selecionado para atendimento avulso.

**PÓS-CONDIÇÕES**
1. O atendimento é registrado com status "finalizado".
2. O estoque é atualizado automaticamente com a baixa dos produtos utilizados.
3. Se havia um agendamento associado, seu status é atualizado para "concluído".

**FLUXO PRINCIPAL**
1. O barbeiro acessa a página de detalhes da barbearia.
2. O sistema mostra os agendamentos do dia com status "agendado".
3. O barbeiro seleciona um agendamento e clica em "Iniciar atendimento" ou inicia um atendimento sem agendamento.
4. O sistema mostra um formulário com os serviços disponíveis, produtos extras e campo para observações.
5. O barbeiro seleciona os serviços prestados.
6. O sistema carrega automaticamente os produtos padrão associados aos serviços selecionados.
7. O barbeiro adiciona produtos extras, se necessário.
8. O sistema calcula o valor total automaticamente a cada alteração.
9. O barbeiro adiciona comentários, se desejar.
10. O barbeiro confirma o registro do atendimento.
11. O sistema registra o atendimento com status "finalizado".
12. O sistema reduz a quantidade utilizada de cada produto do estoque da barbearia.
13. Se havia um agendamento associado, o sistema atualiza seu status para "concluído".

**FLUXOS DE EXCEÇÃO**
1. Dados Incompletos
    1.1. O barbeiro tenta finalizar o atendimento sem ter selecionado nenhum serviço.
    1.2. O sistema impede o registro e solicita a seleção de pelo menos um serviço.
2. Estoque Insuficiente
    2.1. A quantidade necessária de um produto para realizar os serviços selecionados não está disponível no estoque da barbearia.
    2.2. O sistema alerta o barbeiro sobre o produto em falta, impede o registro do atendimento e sugere a reposição do estoque ou alteração dos serviços.
3. Agendamento Não Pertence à Barbearia
    3.1. O barbeiro tenta iniciar um atendimento a partir de um agendamento que está vinculado a outra barbearia (não a que ele está logado).
    3.2. O sistema impede o registro e informa que o agendamento não pode ser atendido naquela unidade.

**REQUISITOS DE USUÁRIO RELACIONADOS**
1. RF012 - Registrar Atendimento: O sistema deve permitir ao barbeiro registrar atendimentos, selecionando os serviços prestados e seus produtos associados, adicionar produtos extras, incluir comentários e recalcular automaticamente o valor total a cada atualização, abatendo os produtos usados do estoque da barbearia.
2. RN002 - Atualizar estoque após atendimento: A quantidade de produtos utilizada durante um atendimento é automaticamente subtraída do estoque disponível.
3. RN006 - Padronizar quantidade de produto por serviço: A quantidade de cada produto usado em um serviço é medida e registrada em mililitros.
4. RN009 - Atualizar status do agendamento após atendimento: Quando um atendimento é registrado a partir de um agendamento, o status do agendamento é alterado automaticamente para "concluído".
5. RN010 - Verificar propriedade do agendamento: Garante que um agendamento pertence à barbearia onde o atendimento está sendo registrado.

#### CDU013 – Visualizar Histórico de Atendimento

**Objetivo:** Permitir que barbeiros e proprietários visualizem atendimentos já realizados.
**Ator:** Barbeiro, Proprietário
**Prioridade:** Média

**PRÉ-CONDIÇÕES**
1. O usuário (barbeiro ou proprietário) deve estar autenticado.
2. O usuário deve ter permissão de visualização para a barbearia em questão.

**PÓS-CONDIÇÕES**
1. O histórico de atendimentos da barbearia é exibido para o usuário.

**FLUXO PRINCIPAL**
1. O usuário acessa a página de detalhes da barbearia.
2. O sistema busca os registros de atendimentos disponíveis para aquela barbearia, conforme as permissões do usuário.
3. O sistema organiza as informações.
4. O sistema mostra para cada atendimento: data, cliente, serviços prestados, produtos utilizados e valor total calculado.
5. O usuário visualiza os atendimentos.

**FLUXOS DE EXCEÇÃO**
1. Nenhum Atendimento Encontrado
    1.1. Ainda não foi registrado nenhum atendimento para a barbearia selecionada.
    1.2. O sistema exibe uma mensagem informativa explicando que o histórico estará disponível após o primeiro atendimento registrado.
2. Erro ao Carregar Histórico
    2.1. Ocorre uma falha na busca dos dados de atendimentos.
    2.2. O sistema exibe uma mensagem de erro e sugere ao usuário tentar novamente em alguns instantes ou, se persistir, entrar em contato com o suporte.
3. Acesso Não Autorizado
    3.1. Um usuário (ex: um barbeiro) tenta acessar o histórico de atendimentos de uma barbearia à qual não está vinculado.
    3.2. O sistema restringe o acesso, exibe uma mensagem de permissão negada e redireciona o usuário para sua página apropriada (ex: sua própria barbearia ou dashboard).

**REQUISITOS DE USUÁRIO RELACIONADOS**
1. RF013 - Visualizar Histórico de Atendimento: O sistema deve permitir que barbeiros e proprietários visualizem atendimentos realizados, contendo informações como data, cliente, serviços prestados, produtos utilizados e valor total calculado.
2. RNF003 - Assegurar desempenho adequado: Listagens e operações principais devem apresentar tempo de resposta aceitável, especialmente para consultas paginadas.

---

## 3. Diagrama de Classe do Sistema

![Diagrama classe do sistema de agendamento e gestão de barbearias](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/diagrama_de_classes.png)

---

## 4. Diagrama Entidade-Relacionamento

![Diagrama ER, representação visual do banco de dados do sistema](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/diagrama_entidade_relacionamento.png)

---
