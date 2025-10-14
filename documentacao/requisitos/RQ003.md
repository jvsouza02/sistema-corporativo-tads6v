# Histórias de Usuário: REQ003- Gerenciar Cabeleireiros

## 1. Narrativa (O Quê, Quem, Por Quê)

**COMO UM** *Proprietário da barbearia*,  
**EU DESEJO** *cadastrar, visualizar, editar e remover os perfis dos profissionais (cabeleireiros)*,  
**PARA QUE** *eu possa manter a equipe organizada, definir quem está disponível para agendamentos e garantir que a agenda online reflita a capacidade real da barbearia*.

## 2. Critérios de Aceitação (Regras de Negócio e Cenários)

### Cenário 1: Cadastrar um novo cabeleireiro com sucesso

- **Dado** que eu estou logado como Proprietário na página de "Gerenciar Profissionais".
- **Quando** eu preencho o formulário com os dados de um novo cabeleireiro, incluindo nome e horário de trabalho.
- **E** eu clico no botão "Salvar".
- **Então** eu devo ver uma mensagem de sucesso confirmando o cadastro.
- **E** o novo cabeleireiro deve aparecer na lista de profissionais ativos.

### Cenário 2: Editar os dados de um cabeleireiro existente

- **Dado** que o cabeleireiro "Carlos Andrade" está cadastrado no sistema.
- **Quando** eu localizo "Carlos Andrade" na lista e clico em "Editar".
- **E** eu altero seu horário de trabalho para incluir os sábados.
- **E** eu clico em "Salvar Alterações".
- **Então** o sistema deve confirmar a atualização.
- **E** a agenda de "Carlos Andrade" deve passar a exibir horários disponíveis aos sábados para novos agendamentos.

### Cenário 3: Tentar remover um cabeleireiro com agendamentos futuros

- **Dado** que a cabeleireira "Ana Souza" possui agendamentos confirmados para a próxima semana.
- **Quando** eu tento remover "Ana Souza" da lista de profissionais.
- **Então** o sistema deve impedir a remoção.
- **E** eu devo visualizar uma mensagem de erro explicando que "Não é possível remover profissionais com agendamentos futuros".

### Cenário 4: Remover um cabeleireiro sem agendamentos futuros

- **Dado** que o cabeleireiro "Jorge Martins" não possui nenhum agendamento futuro em seu nome.
- **Quando** eu clico em "Remover" no perfil de "Jorge Martins".
- **E** eu confirmo a ação na caixa de diálogo.
- **Então** "Jorge Martins" deve ser removido da lista de profissionais ativos.
- **E** ele não deve mais aparecer como uma opção para novos agendamentos.

### Cenário 5: Visualizar a lista de todos os cabeleireiros

- **Dado** que eu estou logado como Proprietário.
- **Quando** eu acesso a página "Gerenciar Profissionais".
- **Então** eu devo ver uma lista com o nome de todos os cabeleireiros atualmente cadastrados na barbearia.

