# Documento de Especificação de Requisitos

**Discentes:** Yuri Fernandes, Maria da Paz, João Victor, Lucas Freitas  
**Projeto:** Sistema de Gestão de Barbearias

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

# CDU001 - Cadastrar Proprietário

**ESCOPO:** Cadastro de proprietários no sistema.  
**PROPÓSÓSITO:** Permitir que proprietários criem contas com nome, e-mail e senha para acessar o sistema de gestão.  
**ATOR:** Proprietário  

---

### PRÉ-CONDIÇÕES
- O usuário deve acessar a tela de cadastro.
- O e-mail informado não pode estar sendo usado por outro usuário.

### PÓS-CONDIÇÕES
- O cadastro do proprietário é criado com sucesso.
- O usuário é autenticado automaticamente no sistema.
- O sistema redireciona para o dashboard inicial.

---

### FLUXO NORMAL
1. O proprietário acessa a tela de registro.
2. O sistema mostra campos: nome, e-mail, senha.
3. O proprietário preenche os dados obrigatórios.
4. O sistema verifica se o e-mail já está cadastrado.
5. O sistema cria o usuário e o registro de proprietário.
6. O sistema autentica o usuário automaticamente.
7. O sistema redireciona para o dashboard.

---

### FLUXO DE EXCEÇÃO
- **E1 - Dados incompletos:** Sistema informa quais campos precisam ser preenchidos.  
- **E2 - E-mail já existe:** Sistema informa que o e-mail já está em uso.  
- **E3 - Erro inesperado:** Sistema pede para tentar novamente mais tarde.  

---

### REQUISITOS RELACIONADOS
- RF01: Cadastrar Proprietário  
- RN01: Cadastrar Proprietário de Forma Única  
- RNF02: Implementar Segurança  

---

---

# CDU002 - Gerenciar Barbearias

**ESCOPO:** Cadastro e visualização de detalhes de barbearias do proprietário.  
**PROPÓSITO:** Permitir que proprietários criem e visualizem detalhes de suas barbearias.  
**ATOR:** Proprietário  

---

### PRÉ-CONDIÇÕES
- Proprietário deve estar autenticado.
- Proprietário deve ter perfil criado no sistema.

### PÓS-CONDIÇÕES
- Barbearia criada e vinculada ao proprietário.
- Foto padrão gerada automaticamente se não fornecida.
- Dashboard atualizado com nova barbearia.

---

### FLUXO NORMAL
1. Proprietário acessa área de barbearias.
2. O sistema lista barbearias existentes.
3. O proprietário preenche o formulário com dados da barbearia.
4. O sistema associa automaticamente ao proprietário logado.
5. O sistema gera imagem automática se não for fornecida.
6. A barbearia é criada e o sistema redireciona para o dashboard.

---

### FLUXO DE EXCEÇÃO
- **E1 - Erro ao criar barbearia:** Sistema mostra mensagem de erro.

---

### REQUISITOS RELACIONADOS
- RF02: Gerenciar Barbearias  
- RF03: Listar Barbearias  
- RN02: Vincular Profissionais e Serviços à Barbearia  
- RN03: Gerenciar Múltiplas Barbearias  
- RNF01: Garantir Usabilidade  

---

---

# CDU003 - Listar Barbearias

**ESCOPO:** Visualização do dashboard com listagem de barbearias e métricas de desempenho semanal.  
**PROPÓSITO:** Fornecer visão geral do negócio com indicadores de desempenho semanal.  
**ATOR:** Proprietário  

---

### PRÉ-CONDIÇÕES
- Proprietário deve estar autenticado.

### PÓS-CONDIÇÕES
- Dashboard exibe métricas atualizadas.
- Dados da última semana calculados automaticamente.
- Métricas incluem: total de barbeiros, atendimentos na semana, valor total semanal.

---

### FLUXO NORMAL
1. Proprietário acessa o dashboard.
2. O sistema busca as barbearias do proprietário.
3. Para cada barbearia, o sistema calcula automaticamente:
   - Total de barbeiros ativos.
   - Atendimentos realizados na última semana.
   - Valor total gerado na semana.
4. O sistema exibe as métricas em uma lista organizada.

---

### REQUISITOS RELACIONADOS
- RF03: Listar Barbearias  
- RN03: Gerenciar Múltiplas Barbearias  
- RNF01: Garantir Usabilidade  

---

---

# CDU004 - Gerenciar Barbeiros

**ESCOPO:** Gestão de barbeiros existentes: edição de horários, transferência entre barbearias e remoção.  
**PROPÓSITO:** Permitir que proprietários administrem a equipe de barbeiros entre suas barbearias.  
**ATOR:** Proprietário  

---

### PRÉ-CONDIÇÕES
- Proprietário autenticado.
- Pelo menos uma barbearia cadastrada.
- Barbeiros previamente cadastrados no sistema.

### PÓS-CONDIÇÕES
- Horários atualizados.
- Barbeiro transferido entre barbearias do mesmo proprietário.
- Barbeiro removido.
- Lista de barbeiros atualizada em tempo real.

---

### FLUXO NORMAL
1. Proprietário acessa lista de barbeiros da barbearia.
2. O sistema mostra os barbeiros cadastrados.
3. O sistema lista outras barbearias para transferência.
4. O proprietário pode:
   - Editar horários;
   - Transferir barbeiros entre barbearias;
   - Remover barbeiros.
5. O sistema exibe confirmações das ações.

---

### FLUXO DE EXCEÇÃO
- **E1 - Barbearia não existe:** Sistema redireciona ao dashboard com aviso.  
- **E2 - Erro ao alterar dados:** Sistema informa falha.  
- **E3 - Erro ao transferir:** Sistema informa falha.  
- **E4 - Erro ao remover:** Sistema informa falha.  

---

### REQUISITOS RELACIONADOS
- RF04: Gerenciar Barbeiros  
- RN02: Vincular Profissionais e Serviços à Barbearia  
- RN05: Transferir Barbeiros Entre Barbearias  
- RN06: Restringir Acesso do Barbeiro  
- RNF01: Garantir Usabilidade  

---

---

# CDU005 - Registrar Atendimento

**ESCOPO:** Registro, edição e exclusão de atendimentos realizados pelos barbeiros.  
**PROPÓSITO:** Gerenciar o histórico completo de serviços prestados na barbearia.  
**ATOR:** Barbeiro  

---

### PRÉ-CONDIÇÕES
- Barbeiro autenticado.
- Barbeiro vinculado a uma barbearia.
- Pelo menos um serviço informado.

### PÓS-CONDIÇÕES
- Atendimento registrado/atualizado/removido.
- Valor total processado corretamente.
- Histórico atualizado automaticamente.
- Redirecionamento com mensagem de status.

---

### FLUXO NORMAL
1. Barbeiro acessa detalhes da barbearia onde trabalha.
2. O sistema mostra histórico de atendimentos ordenado por data.
3. O barbeiro preenche formulário com:
   - Serviços prestados;
   - Produtos utilizados;
   - Valor total;
   - Comentários.
4. O sistema valida que ao menos um serviço foi informado.
5. O sistema processa a formatação do valor.
6. O sistema valida que o valor não é negativo.
7. O atendimento é registrado e vinculado ao barbeiro e à barbearia.
8. A lista de atendimentos é atualizada em tempo real.

---

### FLUXO DE EXCEÇÃO
- **E1 - Nenhum serviço informado:** Sistema informa que serviço é obrigatório.  
- **E2 - Valor negativo:** Sistema informa que valor não pode ser negativo.  
- **E3 - Valor não preenchido:** Sistema informa que valor deve ser informado.  
- **E4 - Atendimento não existe:** Sistema avisa ao tentar editar/excluir.  
- **E5 - Erro ao salvar:** Sistema mostra detalhes do problema.  

---

### REQUISITOS RELACIONADOS
- RF05: Registrar Atendimento  
- RN04: Registrar Informações de Atendimento  
- RN06: Restringir Acesso do Barbeiro  
- RNF01: Garantir Usabilidade  


---

## 3. Diagrama de Classe do Sistema

**Figura 2:** Diagrama de classes do sistema de agendamento e gestão de barbearias.

![Diagrama de Classe](https://github.com/jvsouza02/sistema-corporativo-tads6v/blob/main/documentacao/produto/diagramas/Diagrama%20de%20Classe.png)


---
