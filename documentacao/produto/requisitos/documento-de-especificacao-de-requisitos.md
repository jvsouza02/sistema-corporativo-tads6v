# Documento de Especificação de Requisitos

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas.</br>
**Projeto:** Sistema de Agendamento e Gestão de Barbearias.

## Registro de Alterações

---

## Introdução

A presente especificação de requisitos tem como objetivo descrever de forma clara e organizada as características e comportamentos esperados do sistema de gestão de barbearias. Este documento busca alinhar o entendimento entre desenvolvedores, stakeholders e usuários, assegurando que todos tenham uma visão unificada sobre o propósito e o funcionamento do sistema.

A especificação apresenta os principais requisitos, casos de uso, regras e diagramas de classes que orientam o desenvolvimento, descrevendo como os atores interagem com o sistema e quais condições garantem seu correto funcionamento. Por meio deste documento, pretende-se estabelecer uma base sólida para o desenvolvimento, validação e manutenção do software, de modo que o produto atenda às necessidades do negócio e contribua para uma gestão mais eficiente e organizada das barbearias.

---

## 2. Modelo de Caso de Uso do Sistema

### 2.1. Diagrama de Caso de Uso

A seguir temos uma imagem ilustrando o diagrama de caso de uso do sistema.

**Figura 1:** Diagrama de caso de uso do sistema de agendamento e gestão de barbearias.

![Diagrama de Caso de Uso](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/Diagrama-Caso-De-Uso.png?raw=true)

### 2.2. Descrição dos Atores

O modelo de casos de uso visa capturar e descrever as funcionalidades que um sistema deve prover para os atores que interagem com ele. Os atores identificados no contexto deste projeto estão descritos na tabela abaixo.

**Tabela 1:** Descrição dos atores do MCDU.

| Nome | Descrição |
|------|-----------|
| **Proprietário** | Administrador das barbearias no sistema. Realiza seu cadastro e login para acessar a plataforma, podendo cadastrar, editar e remover barbearias, informando dados como nome, endereço, telefone, e-mail, horários de funcionamento, descrição e foto de apresentação. Também é responsável por gerenciar os barbeiros vinculados às suas barbearias, incluindo cadastro, edição, remoção e transferência entre unidades. Além disso, gerencia os serviços oferecidos, os produtos e o estoque de cada barbearia, acompanha alertas de estoque baixo e consulta o histórico de atendimentos e indicadores de desempenho das unidades, como quantidade de atendimentos e valor total gerado. |
| **Barbeiro** | Profissional vinculado a uma barbearia, que acessa o sistema por meio de login para gerenciar sua rotina de trabalho. Pode visualizar seus agendamentos diários ou semanais e registrar os atendimentos realizados, selecionando os serviços prestados, utilizando os produtos associados e adicionando produtos extras quando necessário. Também pode inserir comentários nos atendimentos, editar ou remover registros e consultar o histórico de atendimentos realizados, contribuindo para o controle operacional e financeiro da barbearia. |
| **Cliente** | Usuário final da plataforma que se cadastra e realiza login para utilizar os serviços oferecidos pelas barbearias. Pode visualizar as barbearias disponíveis, consultar os horários de funcionamento e verificar a disponibilidade para agendamento. O cliente seleciona a barbearia, escolhe data e horário para realizar um agendamento e, posteriormente, pode acompanhar e consultar seu histórico de agendamentos, tendo uma experiência prática e conveniente no uso do sistema. |

### 2.3. Descrição dos Casos de Uso

A seguir são apresentadas as descrições de cada um dos casos de uso identificados. Os casos de uso envolvendo inserir, consultar, alterar e excluir (ICAE) são descritos na tabela abaixo, segundo o padrão da organização.

**Tabela 2:** Descrição tabelada de cada caso de uso do MCDU.

| ID | Nome | Descrição | Ações Possíveis | Observações | Atores Responsáveis | Requisitos Relacionados | Classes Envolvidas |
|----|------|-----------|-----------------|-------------|---------------------|------------------------|-------------------|
| CDU01 | Cadastrar Proprietário | Permitir que o proprietário registre e mantenha seus dados de conta no sistema. O fluxo inclui cadastro com nome, e-mail e senha, validação de e-mail único e acesso ao sistema após autenticação. | [I] Inserir<br>[C] Consultar<br>[A] Alterar<br>[E] Excluir | [I] Inserir: cadastrar proprietário com nome, e-mail e senha.<br>[C] Consultar: visualizar dados do proprietário.<br>[A] Alterar: atualizar informações cadastrais.<br>[E] Excluir: excluir cadastro se não houver barbearias vinculadas. | Proprietário | RF001, RNF001, RNF005, RN009 | Usuario, Proprietario |
| CDU002 | Cadastrar Cliente | Permitir que o cliente crie uma conta no sistema para visualizar barbearias, realizar agendamentos e acompanhar seu histórico. | [I] Inserir<br>[C] Consultar<br>[A] Alterar<br>[E] Excluir | [I] Inserir: cadastrar cliente com nome, e-mail e senha.<br>[C] Consultar: visualizar dados do cliente.<br>[A] Alterar: atualizar informações cadastrais.<br>[E] Excluir: excluir cadastro se não houver agendamentos ou atendimentos vinculados. | Cliente | RF002, RNF001, RNF005, RN009 | Usuario, Cliente |
| CDU003 | Realizar Login | Permitir que clientes, barbeiros e proprietários acessem o sistema por meio de autenticação com e-mail e senha válidos, sendo redirecionados conforme seu perfil. | [C] Consultar | [C] Consultar: autenticar usuário e permitir acesso à área correspondente ao seu perfil. | Cliente, Barbeiro, Proprietário | RF003, RNF001, RNF005 | Usuario, Proprietario, Barbeiro, Cliente |
| CDU004 | Consultar Barbearia | Permitir que o proprietário visualize todas as suas barbearias cadastradas com informações resumidas e indicadores de desempenho. | [C] Consultar | [C] Consultar: listar barbearias do proprietário com nome, endereço, horários, quantidade de atendimentos, barbeiros e valor gerado. | Proprietário | RF004, RNF002, RN007 | Barbearia, Proprietario, Atendimento, Barbeiro |
| CDU005 | Gerenciar Barbearia | Permitir que o proprietário cadastre, edite e remova barbearias, mantendo todas as informações da unidade atualizadas. | [I] Inserir<br>[C] Consultar<br>[A] Alterar<br>[E] Excluir | [I] Inserir: cadastrar barbearia com dados completos e foto.<br>[C] Consultar: visualizar detalhes da barbearia.<br>[A] Alterar: atualizar dados da unidade.<br>[E] Excluir: remover barbearia se não houver vínculos ativos. | Proprietário | RF005, RN007, RN009 | Barbearia, Proprietario |
| CDU006 | Gerenciar Barbeiro | Permitir ao proprietário cadastrar, editar, remover e transferir barbeiros entre suas barbearias. | [I] Inserir<br>[C] Consultar<br>[A] Alterar<br>[E] Excluir | [I] Inserir: cadastrar barbeiro com dados pessoais e horários.<br>[C] Consultar: visualizar barbeiros vinculados à barbearia.<br>[A] Alterar: atualizar dados ou transferir barbeiro.<br>[E] Excluir: remover barbeiro se não houver atendimentos vinculados. | Proprietário | RF006, RN006, RN009 | Barbeiro, Barbearia, Usuario |
| CDU007 | Gerenciar Serviço | Permitir o gerenciamento dos serviços oferecidos pela barbearia, associando produtos e quantidades padrão utilizadas. | [I] Inserir<br>[C] Consultar<br>[A] Alterar<br>[E] Excluir | [I] Inserir: cadastrar serviço com preço e produtos associados.<br>[C] Consultar: visualizar serviços da barbearia.<br>[A] Alterar: atualizar dados do serviço.<br>[E] Excluir: excluir serviço se não houver atendimentos associados. | Proprietário | RF007, RN005, RN008, RN009 | Servico, Produto, ServicoProduto, Barbearia |
| CDU008 | Gerenciar Produto e Estoque | Permitir ao proprietário cadastrar produtos, controlar o estoque por barbearia, registrar reposições e acompanhar quantidades disponíveis. | [I] Inserir<br>[C] Consultar<br>[A] Alterar<br>[E] Excluir | [I] Inserir: cadastrar produto e definir estoque inicial.<br>[C] Consultar: visualizar produtos e quantidades em estoque.<br>[A] Alterar: registrar reposição ou ajuste de estoque.<br>[E] Excluir: remover produto se não houver vínculos com serviços. | Proprietário | RF008, RN003, RN004, RN009 | Produto, Estoque, Barbearia |
| CDU009 | Emitir Alerta de Estoque Baixo | Monitorar automaticamente o estoque e emitir alertas quando a quantidade de um produto atingir ou ficar abaixo do limite mínimo. | [C] Consultar | [C] Consultar: identificar produtos com estoque abaixo do mínimo e exibir alerta ao proprietário. | Proprietário | RF009, RN004 | Estoque, Produto, Barbearia |
| CDU010 | Realizar Agendamento | Permitir que o cliente visualize horários disponíveis e registre um agendamento em uma barbearia. | [I] Inserir<br>[C] Consultar | [I] Inserir: registrar agendamento escolhendo data e horário.<br>[C] Consultar: visualizar horários disponíveis conforme expediente. | Cliente | RF010, RN001, RN002, RN010 | Agendamento, Cliente, Barbearia, Barbeiro |
| CDU011 | Visualizar Histórico de Agendamento | Permitir que o cliente visualize seus agendamentos realizados e respectivos status. | [C] Consultar | [C] Consultar: visualizar lista de agendamentos do cliente. | Cliente | RF011, RN009 | Agendamento, Cliente |
| CDU012 | Registrar Atendimento | Permitir que o barbeiro registre atendimentos realizados, selecionando serviços, produtos e comentários, com cálculo automático do valor total e baixa de estoque. | [I] Inserir<br>[C] Consultar<br>[A] Alterar<br>[E] Excluir | [I] Inserir: registrar atendimento com serviços e produtos utilizados.<br>[C] Consultar: visualizar atendimentos registrados.<br>[A] Alterar: atualizar serviços, produtos ou comentários.<br>[E] Excluir: remover registro de atendimento. | Barbeiro | RF012, RN003, RN008, RN009 | Atendimento, Servico, Produto, Estoque, Barbearia, Barbeiro, Cliente |
| CDU013 | Visualizar Histórico de Atendimento | Permitir que barbeiros e proprietários visualizem atendimentos realizados com informações completas. | [C] Consultar | [C] Consultar: visualizar histórico de atendimentos por período e unidade. | Barbeiro, Proprietário | RF013, RN009 | Atendimento, Barbeiro, Proprietario, Cliente, Barbearia |

### 2.4. Especificação Detalhada dos Casos de Uso

A seguir temos a documentação que detalha cada caso de uso do MCDU, com a descrição do fluxo de forma enumerada.

---

#### **CDU001 – Cadastrar Proprietário**

**Objetivo:** Permitir que uma pessoa crie uma conta como proprietário, informando nome, e-mail e senha, para acessar o sistema e gerenciar suas barbearias.

**Ator:** Proprietário

**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
- O usuário deve acessar a página de cadastro do sistema.
- O usuário ainda não pode possuir uma conta cadastrada com o e-mail informado.

**PÓS-CONDIÇÕES**
- O proprietário passa a existir no sistema.
- O proprietário é autenticado automaticamente após o cadastro.
- O sistema redireciona o proprietário para o dashboard principal.

**FLUXO PRINCIPAL**
1. O proprietário acessa a página de cadastro.
2. O sistema exibe os campos para preenchimento de nome, e-mail, senha, confirmação de senha e tipo de conta.
3. O proprietário informa seus dados pessoais.
4. O sistema valida os dados informados.
5. O sistema verifica se o e-mail informado ainda não está em uso.
6. O sistema cria a conta do usuário.
7. O sistema registra o proprietário no banco de dados.
8. O sistema autentica automaticamente o proprietário.
9. O sistema exibe o dashboard do proprietário.

**FLUXOS DE EXCEÇÃO**

**Dados Incompletos**
1. Um ou mais campos obrigatórios não são informados pelo proprietário.
2. O sistema identifica os campos em branco e exibe uma mensagem informando quais campos são obrigatórios.
3. O cadastro não é realizado e o sistema retorna para a etapa de preenchimento dos dados.

**E-mail Já Existente**
1. O sistema identifica que o e-mail informado já está cadastrado para outro usuário.
2. O sistema informa ao proprietário que a conta já existe e sugere a recuperação de senha ou o uso de outro e-mail.
3. O cadastro não é realizado.

**Erro Inesperado**
1. Ocorre uma falha não prevista durante o processo de cadastro, como indisponibilidade do banco de dados.
2. O sistema informa ao proprietário que ocorreu um erro inesperado e orienta a tentar novamente.
3. O cadastro não é realizado.

**REQUISITOS DE USUÁRIO RELACIONADOS**
- **RF001** – Cadastrar Proprietário: Permite que novos proprietários criem uma conta no sistema informando nome, e-mail e senha, possibilitando o acesso às funcionalidades de gerenciamento de barbearias.
- **RNF001** – Controlar autenticação e autorização: Garante que todos os acessos ao sistema sejam protegidos por autenticação, permitindo que usuários com perfis distintos acessem apenas as funcionalidades autorizadas.
- **RNF005** – Proteger os dados do sistema: Define que senhas devem ser armazenadas de forma segura, utilizando mecanismos de criptografia (hash), e que dados sensíveis dos usuários não devem ser expostos indevidamente.

---

#### **CDU002 – Cadastrar Cliente**

**Objetivo:** Permitir que uma pessoa crie uma conta como cliente, informando nome, e-mail e senha, para visualizar barbearias e realizar agendamentos.

**Ator:** Cliente

**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
- O usuário deve acessar a página de cadastro do sistema.
- O usuário não pode possuir uma conta existente com o e-mail informado.

**PÓS-CONDIÇÕES**
- O cliente passa a existir no sistema.
- O sistema redireciona o cliente para a página de login com uma mensagem de sucesso.

**FLUXO PRINCIPAL**
1. O cliente acessa a página de criação de conta.
2. O sistema exibe os campos de nome, e-mail, senha e confirmação de senha.
3. O cliente informa seus dados.
4. O sistema valida os dados informados.
5. O sistema verifica se o e-mail ainda não está cadastrado.
6. O sistema cria a conta do usuário.
7. O sistema registra o cliente no sistema.
8. O sistema redireciona o cliente para a página de login com uma mensagem de sucesso.

**FLUXOS DE EXCEÇÃO**

**Dados Incompletos**
1. O cliente deixa de preencher um ou mais campos obrigatórios.
2. O sistema não realiza o cadastro e exibe uma mensagem solicitando o preenchimento de todos os campos.

**E-mail Já Existente**
1. O e-mail informado já está vinculado a uma conta ativa no sistema.
2. O sistema informa o cliente sobre a duplicidade e impede o cadastro.

**Erro Inesperado**
1. Ocorre uma falha durante a tentativa de criação da conta, como erro de conexão.
2. O sistema exibe uma mensagem genérica de erro e orienta o cliente a tentar novamente.

**REQUISITOS DE USUÁRIO RELACIONADOS**
- **RF002** – Cadastrar Cliente: Permite que novos clientes criem uma conta no sistema informando nome, e-mail e senha para acessar funcionalidades de visualização de barbearias e realização de agendamentos.
- **RNF001** – Controlar autenticação e autorização: Garante que todos os acessos ao sistema sejam protegidos por autenticação e controle de permissões conforme o perfil do usuário.
- **RNF005** – Proteger os dados do sistema: Assegura que as informações sensíveis dos clientes, como senhas e dados pessoais, sejam armazenadas e tratadas de forma segura.

---

#### **CDU003 – Realizar Login**

**Objetivo:** Permitir que proprietários, barbeiros e clientes acessem o sistema utilizando e-mail e senha válidos.

**Ator:** Cliente, Barbeiro, Proprietário

**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
- O usuário deve possuir uma conta previamente cadastrada.
- O usuário deve acessar a página de login do sistema.

**PÓS-CONDIÇÕES**
- O usuário é autenticado com sucesso.
- O sistema direciona o usuário para a página correspondente ao seu perfil.

**FLUXO PRINCIPAL**
1. O usuário acessa a página de login.
2. O sistema exibe os campos de e-mail e senha.
3. O usuário informa suas credenciais.
4. O sistema valida os dados informados.
5. O sistema verifica se as credenciais são válidas.
6. O sistema autentica o usuário.
7. O sistema redireciona o usuário para sua página correspondente.

**FLUXOS DE EXCEÇÃO**

**Dados Inválidos**
1. O usuário tenta prosseguir com campos vazios ou e-mail em formato inválido.
2. O sistema informa que os campos devem ser preenchidos corretamente.
3. O acesso não é realizado.

**Credenciais Incorretas**
1. O e-mail ou a senha informados não correspondem a nenhuma conta cadastrada.
2. O sistema informa que as credenciais estão incorretas.
3. O acesso não é realizado.

**Erro Inesperado**
1. Ocorre uma falha no processo de autenticação.
2. O sistema exibe uma mensagem de erro genérico e orienta o usuário a tentar novamente.

**REQUISITOS DE USUÁRIO RELACIONADOS**
- **RF003** – Realizar Login: Permite que qualquer usuário do sistema acesse a plataforma utilizando e-mail e senha válidos, sendo direcionado à interface correspondente ao seu perfil.
- **RNF001** – Controlar autenticação e autorização: Garante que apenas usuários autenticados tenham acesso ao sistema e que cada perfil tenha acesso restrito às funcionalidades permitidas.
- **RNF005** – Proteger os dados do sistema: Define que as credenciais dos usuários devem ser protegidas contra acessos não autorizados.

---

#### **CDU004 – Consultar Barbearia**

**Objetivo:** Permitir que o proprietário visualize todas as barbearias cadastradas em seu nome, com informações principais.

**Ator:** Proprietário

**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
- O proprietário deve estar autenticado no sistema.

**PÓS-CONDIÇÕES**
- As barbearias do proprietário são exibidas em uma lista com suas principais informações.

**FLUXO PRINCIPAL**
1. O proprietário acessa o dashboard do sistema.
2. O sistema busca todas as barbearias vinculadas ao proprietário.
3. O sistema reúne as informações principais de cada barbearia.
4. O sistema exibe nome, endereço, horários de funcionamento, quantidade de atendimentos da semana, número de barbeiros e valor total gerado.
5. O proprietário visualiza a lista de barbearias.
6. O proprietário seleciona uma barbearia para visualizar seus detalhes.

**FLUXOS DE EXCEÇÃO**

**Nenhuma Barbearia Encontrada**
1. O proprietário não possui barbearias cadastradas.
2. O sistema exibe uma mensagem informativa e sugere o cadastro de uma nova barbearia.

**Erro Inesperado**
1. Ocorre uma falha durante a busca das barbearias.
2. O sistema exibe uma mensagem de erro e sugere recarregar a página.

**REQUISITOS DE USUÁRIO RELACIONADOS**
- **RF004** – Listar Barbearia: Permite que o proprietário visualize todas as suas barbearias cadastradas, apresentando informações relevantes e permitindo o acesso aos detalhes de cada unidade.
- **RNF003** – Assegurar desempenho adequado: Garante que a listagem das barbearias seja carregada com tempo de resposta aceitável, mesmo com grande volume de dados.
- **RN005** – Restringir gerenciamento de barbearias ao proprietário: Define que o proprietário só pode visualizar e gerenciar barbearias que estejam registradas em seu nome.

---

#### **CDU005 – Gerenciar Barbearia**

**Objetivo:** Permitir que o proprietário cadastre novas barbearias e mantenha as informações das barbearias sempre atualizadas no sistema.

**Ator:** Proprietário

**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
- O proprietário deve estar autenticado no sistema.
- O proprietário deve acessar o dashboard do sistema.

**PÓS-CONDIÇÕES**
- A barbearia é cadastrada, atualizada ou removida conforme a ação realizada.
- As informações da barbearia permanecem registradas corretamente no sistema.

**FLUXO PRINCIPAL**
1. O proprietário acessa o dashboard do sistema.
2. O proprietário seleciona a opção "Nova Barbearia" ou escolhe uma barbearia existente para edição.
3. O sistema exibe um formulário com os campos de nome, e-mail, endereço, telefone, horários de funcionamento, descrição e foto.
4. O proprietário informa ou atualiza os dados da barbearia.
5. O sistema valida os dados informados.
6. O sistema registra as informações da barbearia.
7. O sistema exibe uma mensagem de confirmação da operação realizada.
8. O sistema atualiza a lista de barbearias exibida no dashboard.

**FLUXOS DE EXCEÇÃO**

**Dados Incompletos**
1. O proprietário deixa de preencher um ou mais campos obrigatórios, como nome ou endereço.
2. O sistema impede o salvamento e destaca os campos que precisam ser preenchidos.

**Erro Inesperado**
1. Ocorre uma falha durante o salvamento das informações da barbearia.
2. O sistema informa o erro e mantém os dados preenchidos, permitindo nova tentativa.

**REQUISITOS DE USUÁRIO RELACIONADOS**
- **RF005** – Gerenciar Barbearia: Permite que o proprietário cadastre, edite e mantenha atualizadas as informações das barbearias, incluindo nome, endereço, telefone, horários de funcionamento, descrição e imagem de apresentação.
- **RNF004** – Permitir escalabilidade do sistema: Garante que o sistema suporte múltiplas barbearias e usuários simultaneamente, sem comprometer a integridade das informações.
- **RN005** – Restringir gerenciamento de barbearias ao proprietário: Define que apenas o proprietário pode gerenciar as barbearias que estão vinculadas ao seu cadastro.

---

#### **CDU006 – Gerenciar Barbeiro**

**Objetivo:** Permitir que o proprietário cadastre, edite, remova e transfira barbeiros entre suas barbearias.

**Ator:** Proprietário

**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
- O proprietário deve estar autenticado.
- O proprietário deve acessar a página de gerenciamento de barbeiros de uma barbearia.

**PÓS-CONDIÇÕES**
- O barbeiro é cadastrado, atualizado, removido ou transferido conforme a ação realizada.
- As informações do barbeiro permanecem atualizadas no sistema.

**FLUXO PRINCIPAL**
1. O proprietário acessa a página de barbeiros da barbearia.
2. O sistema exibe a lista de barbeiros e as opções de cadastrar, editar, remover ou transferir.
3. O proprietário seleciona a ação desejada (Cadastrar).
4. O sistema exibe os campos para nome, e-mail, senha e horários de expediente.
5. O proprietário informa os dados do barbeiro.
6. O sistema valida os dados informados.
7. O sistema registra a ação realizada.
8. O sistema atualiza a lista de barbeiros exibida.

**FLUXOS DE EXCEÇÃO**

**Dados Incompletos**
1. O proprietário não informa um ou mais campos obrigatórios.
2. O sistema impede o cadastro e solicita o preenchimento completo.

**E-mail Já Existente**
1. O e-mail informado já está associado a outro usuário do sistema.
2. O sistema bloqueia o cadastro e solicita um e-mail válido e único.

**Erro Inesperado**
1. Ocorre uma falha durante o cadastro, edição ou transferência do barbeiro.
2. O sistema informa o erro e mantém os dados preenchidos para correção.

**REQUISITOS DE USUÁRIO RELACIONADOS**
- **RF006** – Gerenciar Barbeiro: Permite ao proprietário cadastrar, editar, remover e transferir barbeiros entre suas barbearias, registrando nome, e-mail, senha e horários de trabalho de cada profissional.
- **RNF001** – Controlar autenticação e autorização: Garante que apenas usuários autenticados e autorizados possam acessar as funcionalidades de gerenciamento de barbeiros.
- **RN004** – Restringir transferência de barbeiro ao proprietário: Define que barbeiros só podem ser transferidos entre barbearias pertencentes ao mesmo proprietário.

---

#### **CDU007 – Gerenciar Serviço**

**Objetivo:** Permitir que o proprietário cadastre, edite e remova os serviços oferecidos pela barbearia.

**Ator:** Proprietário

**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
- O proprietário deve estar autenticado.
- O proprietário deve acessar a página de serviços de uma barbearia.

**PÓS-CONDIÇÕES**
- O serviço é cadastrado, atualizado ou removido conforme a ação realizada.
- As informações dos serviços ficam disponíveis para uso em atendimentos.

**FLUXO PRINCIPAL**
1. O proprietário acessa a página de serviços da barbearia.
2. O sistema exibe os serviços cadastrados e as opções de cadastrar, editar ou remover.
3. O proprietário seleciona a opção de cadastro de serviço.
4. O sistema exibe os campos de nome, descrição, preço e produtos associados.
5. O proprietário informa os dados do serviço.
6. O sistema valida os dados informados.
7. O sistema registra a ação realizada.
8. O sistema atualiza a lista de serviços exibida.

**FLUXOS DE EXCEÇÃO**

**Dados Incompletos**
1. Campos obrigatórios, como nome ou preço, não são informados.
2. O sistema impede o cadastro e solicita o preenchimento correto.

**Serviço Duplicado**
1. O proprietário tenta cadastrar um serviço com nome já existente.
2. O sistema bloqueia a duplicação e solicita um nome diferente.

**Erro Inesperado**
1. Ocorre uma falha ao salvar o serviço.
2. O sistema informa o erro e mantém os dados preenchidos.

**REQUISITOS DE USUÁRIO RELACIONADOS**
- **RF007** – Gerenciar Serviço: Permite cadastrar, editar e remover serviços da barbearia, registrando nome, descrição, preço e os produtos utilizados durante o atendimento.
- **RN006** – Padronizar quantidade de produto por serviço: Define que a quantidade de produto utilizada em cada serviço deve ser registrada de forma padronizada, utilizando unidade de medida em mililitros.

---

#### **CDU008 – Gerenciar Produto e Estoque**

**Objetivo:** Permitir que o proprietário cadastre produtos utilizados na barbearia e controle o estoque de cada item.

**Ator:** Proprietário

**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
- O proprietário deve estar autenticado.
- O proprietário deve acessar a página de produtos da barbearia.

**PÓS-CONDIÇÕES**
- O produto é cadastrado, atualizado ou removido.
- O estoque é ajustado conforme as ações realizadas.

**FLUXO PRINCIPAL**
1. O proprietário acessa a página de produtos da barbearia.
2. O sistema exibe a lista de produtos e as opções de cadastrar, editar, remover ou repor estoque.
3. O proprietário seleciona a opção de cadastro de produto.
4. O sistema exibe os campos de nome, descrição, preço, quantidade inicial e limite mínimo.
5. O proprietário informa os dados do produto.
6. O sistema valida os dados informados.
7. O sistema registra a ação realizada.
8. O sistema atualiza a lista de produtos e o estoque.

**FLUXOS DE EXCEÇÃO**

**Dados Incompletos**
1. O proprietário não informa campos obrigatórios, como nome ou quantidade inicial.
2. O sistema impede o cadastro e solicita o preenchimento completo.

**Valor Inválido**
1. O proprietário informa valores negativos ou inválidos para preço ou estoque.
2. O sistema rejeita os valores e solicita a correção.

**Erro Inesperado**
1. Ocorre uma falha ao salvar o produto ou ajustar o estoque.
2. O sistema informa o erro e mantém os dados preenchidos.

**REQUISITOS DE USUÁRIO RELACIONADOS**
- **RF008** – Gerenciar Produto e Estoque: Permite cadastrar produtos utilizados na barbearia, controlando estoque individual por unidade, registrando saídas automáticas em atendimentos e possibilitando reposições manuais.
- **RNF003** – Assegurar desempenho adequado: Garante que operações de listagem e atualização de produtos e estoque apresentem tempo de resposta aceitável.
- **RN003** – Alertar sobre estoque baixo: Define que o sistema deve emitir alertas quando a quantidade de um produto atingir ou ficar abaixo do limite mínimo configurado.

---

#### **CDU009 – Emitir Alerta de Estoque Baixo**

**Objetivo:** Informar automaticamente o proprietário quando a quantidade de um produto atingir ou ficar abaixo do limite mínimo configurado.

**Ator:** Proprietário

**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
- Deve existir ao menos um produto cadastrado na barbearia.
- O produto deve possuir um limite mínimo de estoque definido.

**PÓS-CONDIÇÕES**
- O proprietário é informado sobre produtos com estoque baixo por meio de alertas visuais na interface do sistema.

**FLUXO PRINCIPAL**
1. O sistema monitora continuamente as quantidades de produtos em estoque.
2. A quantidade de um produto atinge ou fica abaixo do limite mínimo configurado.
3. O sistema identifica a condição de estoque baixo.
4. O sistema gera um alerta visual na interface do proprietário, como notificações, indicadores ou destaque em listas.
5. O proprietário visualiza o alerta ao acessar o dashboard ou a página de produtos.

**FLUXOS DE EXCEÇÃO**

**Falha na Verificação de Estoque**
1. O sistema não consegue executar o processo automático de verificação do estoque.
2. O alerta não é emitido e a falha é registrada nos logs do sistema para monitoramento e correção futura.

**REQUISITOS DE USUÁRIO RELACIONADOS**
- **RF009** – Emitir Alerta de Estoque Baixo: Permite que o sistema notifique automaticamente o proprietário quando a quantidade de um produto atingir ou ficar abaixo do limite mínimo definido, facilitando a reposição de itens críticos.
- **RN003** – Alertar sobre estoque baixo: Define que o sistema deve exibir avisos visuais claros sempre que um produto estiver com estoque baixo ou esgotado.
- **RNF002** – Garantir disponibilidade do sistema: Assegura que o sistema permaneça disponível para monitoramento contínuo do estoque e exibição de alertas.

---

#### **CDU010 – Realizar Agendamento**

**Objetivo:** Permitir que o cliente selecione uma barbearia, data e horário disponíveis para realizar um agendamento.

**Ator:** Cliente

**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
- O cliente deve estar autenticado no sistema.
- Devem existir barbearias cadastradas com horários de funcionamento definidos.

**PÓS-CONDIÇÕES**
- O agendamento é registrado no sistema com status "agendado".

**FLUXO PRINCIPAL**
1. O cliente acessa a página de agendamentos.
2. O sistema exibe as barbearias disponíveis.
3. O cliente seleciona uma barbearia.
4. O sistema permite que o cliente selecione uma data desejada.
5. O sistema exibe os horários disponíveis conforme o expediente da barbearia, bloqueando horários já agendados.
6. O cliente escolhe um horário disponível.
7. O sistema verifica a disponibilidade do horário selecionado.
8. O sistema registra o agendamento com status "agendado", sem associar um barbeiro específico.
9. O sistema confirma o agendamento ao cliente.

**FLUXOS DE EXCEÇÃO**

**Horário Indisponível**
1. O cliente tenta confirmar um horário que foi reservado por outro cliente.
2. O sistema informa o conflito e sugere horários alternativos.

**Fora do Horário de Funcionamento**
1. O cliente seleciona um horário fora do expediente da barbearia.
2. O sistema informa que o horário é inválido e solicita nova seleção.

**Data ou Horário Passado**
1. O cliente tenta agendar para uma data ou horário já passado.
2. O sistema bloqueia o agendamento e solicita uma data futura.

**REQUISITOS DE USUÁRIO RELACIONADOS**
- **RF010** – Realizar Agendamento: Permite que o cliente visualize barbearias e horários disponíveis e registre um agendamento selecionando a data e o horário desejados.
- **RN001** – Verificar disponibilidade de horário: Define que o sistema deve verificar se já existe um agendamento para o horário selecionado antes de confirmar um novo.
- **RN007** – Validar horário de agendamento: Garante que o cliente só possa agendar horários dentro do período de funcionamento da barbearia.
- **RN008** – Impedir agendamento retroativo: Impede que o cliente realize agendamentos para datas ou horários anteriores ao momento atual.

---

#### **CDU011 – Visualizar Histórico de Agendamento**

**Objetivo:** Permitir que o cliente visualize todos os seus agendamentos realizados no sistema.

**Ator:** Cliente

**Prioridade:** Média

**PRÉ-CONDIÇÕES**
- O cliente deve estar autenticado.

**PÓS-CONDIÇÕES**
- O histórico de agendamentos do cliente é exibido com informações detalhadas.

**FLUXO PRINCIPAL**
1. O cliente acessa a página "Meus Agendamentos".
2. O sistema busca os agendamentos vinculados ao cliente.
3. O sistema organiza os agendamentos, normalmente por data mais recente.
4. O sistema exibe para cada agendamento a data, horário, barbearia e status.
5. O cliente visualiza seu histórico de agendamentos.

**FLUXOS DE EXCEÇÃO**

**Nenhum Agendamento Encontrado**
1. O cliente não possui agendamentos registrados.
2. O sistema exibe uma mensagem informativa e sugere a criação de um novo agendamento.

**Erro ao Carregar Histórico**
1. Ocorre uma falha na busca das informações.
2. O sistema exibe uma mensagem de erro temporário.

**REQUISITOS DE USUÁRIO RELACIONADOS**
- **RF011** – Visualizar Histórico de Agendamento: Permite que o cliente visualize todos os seus agendamentos realizados, contendo informações como data, horário, barbearia e status.
- **RNF003** – Assegurar desempenho adequado: Garante que a listagem do histórico de agendamentos seja exibida com tempo de resposta aceitável.

---

#### **CDU012 – Registrar Atendimento**

**Objetivo:** Permitir que o barbeiro registre os serviços realizados e os produtos utilizados em um atendimento.

**Ator:** Barbeiro

**Prioridade:** Alta

**PRÉ-CONDIÇÕES**
- O barbeiro deve estar autenticado.
- Deve existir um agendamento para a barbearia ou um cliente deve ser selecionado para atendimento avulso.

**PÓS-CONDIÇÕES**
- O atendimento é registrado com status "finalizado".
- O estoque de produtos é atualizado automaticamente.
- O status do agendamento, quando existente, é atualizado para "concluído".

**FLUXO PRINCIPAL**
1. O barbeiro acessa a página da barbearia.
2. O sistema exibe os agendamentos do dia com status "agendado".
3. O barbeiro seleciona um agendamento ou inicia um atendimento avulso.
4. O sistema exibe um formulário com serviços, produtos extras e campo de observações.
5. O barbeiro seleciona os serviços realizados.
6. O sistema carrega automaticamente os produtos associados aos serviços.
7. O barbeiro adiciona produtos extras, se necessário.
8. O sistema recalcula o valor total do atendimento automaticamente.
9. O barbeiro adiciona observações, se desejar.
10. O barbeiro confirma o atendimento.
11. O sistema registra o atendimento como "finalizado".
12. O sistema atualiza o estoque de produtos.
13. O sistema atualiza o status do agendamento para "concluído", quando aplicável.

**FLUXOS DE EXCEÇÃO**

**Dados Incompletos**
1. O barbeiro tenta finalizar o atendimento sem selecionar serviços.
2. O sistema impede o registro e solicita a seleção de pelo menos um serviço.

**Estoque Insuficiente**
1. A quantidade necessária de um produto não está disponível.
2. O sistema bloqueia o registro e sugere reposição ou alteração dos serviços.

**Agendamento Inválido**
1. O barbeiro tenta atender um agendamento de outra barbearia.
2. O sistema impede o registro e informa o erro.

**REQUISITOS DE USUÁRIO RELACIONADOS**
- **RF012** – Registrar Atendimento: Permite que o barbeiro registre atendimentos, selecionando serviços, produtos associados, adicionando observações e calculando automaticamente o valor total.
- **RN002** – Atualizar estoque após atendimento: Define que os produtos utilizados em um atendimento devem ser automaticamente subtraídos do estoque.
- **RN006** – Padronizar quantidade de produto por serviço: Garante que a quantidade de produto utilizada em cada serviço seja registrada em mililitros.
- **RN009** – Atualizar status do agendamento: Define que o status do agendamento deve ser alterado automaticamente para "concluído" após o atendimento.
- **RN010** – Verificar propriedade do agendamento: Garante que apenas agendamentos pertencentes à barbearia do barbeiro possam ser atendidos.

---

#### **CDU013 – Visualizar Histórico de Atendimento**

**Objetivo:** Permitir que barbeiros e proprietários visualizem os atendimentos já realizados.

**Ator:** Barbeiro, Proprietário

**Prioridade:** Média

**PRÉ-CONDIÇÕES**
- O usuário deve estar autenticado.
- O usuário deve possuir permissão para visualizar a barbearia.

**PÓS-CONDIÇÕES**
- O histórico de atendimentos da barbearia é exibido.

**FLUXO PRINCIPAL**
1. O usuário acessa a página de detalhes da barbearia.
2. O sistema busca os atendimentos registrados.
3. O sistema organiza os registros de atendimento.
4. O sistema exibe data, cliente, serviços, produtos utilizados e valor total.
5. O usuário visualiza o histórico de atendimentos.

**FLUXOS DE EXCEÇÃO**

**Nenhum Atendimento Encontrado**
1. Não existem atendimentos registrados.
2. O sistema exibe uma mensagem informativa.

**Erro ao Carregar Histórico**
1. Ocorre uma falha ao buscar os dados.
2. O sistema informa o erro e sugere nova tentativa.

**Acesso Não Autorizado**
1. O usuário tenta acessar uma barbearia à qual não possui vínculo.
2. O sistema bloqueia o acesso e redireciona o usuário.

**REQUISITOS DE USUÁRIO RELACIONADOS**
- **RF013** – Visualizar Histórico de Atendimento: Permite que barbeiros e proprietários visualizem atendimentos realizados, contendo informações detalhadas sobre serviços, produtos e valores.
- **RNF003** – Assegurar desempenho adequado: Garante que o histórico de atendimentos seja exibido com desempenho adequado, mesmo com grande volume de registros.

---

## 3. Diagrama de Classe do Sistema

**Figura 2:** Diagrama de classe do sistema de agendamento e gestão de barbearias.

![Diagrama de Classe](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/Diagrama-Classe.png?raw=true)

---

## 4. Diagrama Entidade-Relacionamento

**Figura 3:** Diagrama ER, representação visual do banco de dados do sistema.

![Diagrama ER](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/Diagrama-ER.png?raw=true)

