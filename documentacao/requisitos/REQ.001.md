# Título  
**Registrar Atendimento**

## Descrição  
**Como** Cabeleireiro  
**Eu quero** registrar detalhes do serviço, incluindo produtos utilizados e observações sobre o cliente, além de poder consultar, alterar e excluir este registro.  
**Para que** eu possa documentar os serviços realizados e personalizar futuros atendimentos.

## Critérios de Aceitação  
- **CA1 — Condição:** O Cabeleireiro só deve conseguir registrar o atendimento se o agendamento estiver com o status “Concluído”.  
- **CA2 — Registro:** O Cabeleireiro deve conseguir inserir os detalhes do atendimento (produtos utilizados e observações), e o sistema deve registrar a informação no histórico.  
- **CA3 — Consulta:** O Cabeleireiro deve conseguir visualizar os detalhes de um atendimento que já foram registrados no histórico.  
- **CA4 — Edição:** O Cabeleireiro deve conseguir modificar (alterar) o registro do atendimento e o sistema deve persistir a alteração.  
- **CA5 — Exclusão:** O Cabeleireiro deve conseguir remover (apagar) um registro de atendimento, se necessário.  
- **CA6 — Confiabilidade:** O sistema deve garantir a integridade dos dados e armazenar o registro do atendimento no histórico para consultas futuras.

