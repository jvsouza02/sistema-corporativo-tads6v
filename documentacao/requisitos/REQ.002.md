# Histórias de Usuário: REQ002 — Cadastrar Barbearia

## 1. Narrativa (O Quê, Quem, Por Quê)

**COMO UM** *Proprietário da barbearia*,  
**EU DESEJO** *registrar informações essenciais da barbearia, como nome, CNPJ, e-mail, endereço, telefone, horário de funcionamento, descrição e foto*,  
**PARA QUE** *eu possa iniciar imediatamente o uso do sistema como administrador e gestor da minha nova barbearia*.

## 2. Critérios de Aceitação (Regras de Negócio e Cenários)

### Cenário 1: Cadastrar uma nova barbearia com sucesso

- **Dado** que o proprietário acessa a tela de cadastro de barbearia.  
- **Quando** ele preenche todos os campos obrigatórios (nome, CNPJ, e-mail, endereço, telefone, horário de funcionamento, descrição e foto).  
- **E** clica em “Salvar”.  
- **Então** o sistema deve criar o registro da barbearia e salvar todos os dados.

### Cenário 2: Validação de campos obrigatórios

- **Dado** que o proprietário deixa algum campo obrigatório vazio.  
- **Quando** ele tenta submeter o formulário.  
- **Então** o sistema deve bloquear o cadastro e exibir mensagens de erro indicando os campos que precisam ser preenchidos.

### Cenário 3: Confirmação e acesso ao painel

- **Dado** que o cadastro foi realizado com sucesso.  
- **Quando** o proprietário conclui o registro.  
- **Então** ele deve ser direcionado automaticamente ao painel de gerenciamento da barbearia.

### Cenário 4: Consulta dos dados cadastrados

- **Dado** que o proprietário deseja verificar os dados da barbearia.  
- **Quando** ele acessa a página de informações da barbearia.  
- **Então** ele deve visualizar todas as informações cadastradas corretamente.

### Cenário 5: Regra de unicidade de e-mail

- **Dado** que já existe uma barbearia registrada com determinado e-mail.  
- **Quando** o proprietário tenta cadastrar outra barbearia usando o mesmo e-mail.  
- **Então** o sistema deve impedir o cadastro e exibir uma mensagem de erro informando que o e-mail já está em uso.

