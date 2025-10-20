# Histórias de Usuário: REQ001 — Registrar Atendimento

## 1. Narrativa (O Quê, Quem, Por Quê)

**COMO UM** *Barbeiro*,  
**EU DESEJO** *registrar os detalhes do atendimento de um cliente, incluindo produtos utilizados e observações*,  
**PARA QUE** *eu possa documentar os serviços realizados, acompanhar o histórico de cada cliente e personalizar atendimentos futuros*.

## 2. Critérios de Aceitação (Regras de Negócio e Cenários)

### Cenário 1: Registrar atendimento de um agendamento concluído

- **Dado** que um agendamento possui status “Concluído”.  
- **Quando** o barbeiro acessa o formulário de registro de atendimento.  
- **E** insere os detalhes do serviço, produtos utilizados e observações.  
- **E** clica em “Salvar”.  
- **Então** o sistema deve registrar o atendimento no histórico do cliente.

### Cenário 2: Consultar atendimentos registrados

- **Dado** que o barbeiro deseja visualizar atendimentos anteriores.  
- **Quando** ele acessa o histórico de atendimentos de um cliente.  
- **Então** ele deve visualizar todos os registros anteriores com detalhes, produtos utilizados e observações.

### Cenário 3: Editar um registro de atendimento

- **Dado** que o barbeiro identificou uma informação incorreta em um atendimento registrado.  
- **Quando** ele acessa o registro e clica em “Editar”.  
- **E** altera os dados necessários e confirma a alteração.  
- **Então** o sistema deve atualizar o registro no histórico com as novas informações.

### Cenário 4: Excluir um registro de atendimento

- **Dado** que o barbeiro deseja remover um registro do histórico.  
- **Quando** ele clica em “Excluir” e confirma a ação.  
- **Então** o registro deve ser removido do histórico, garantindo a integridade dos demais dados.
