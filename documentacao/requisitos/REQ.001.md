### Título
**Registrar e consultar histórico de atendimentos**

### Descrição
**Como** usuário autorizado da barbearia (proprietário ou cabeleireiro)  
**Eu quero** registrar, consultar, editar e excluir observações sobre atendimentos (cada observação com data e hora)  
**Para que** eu possa documentar os serviços realizados e personalizar futuros atendimentos.

### Critérios de Aceitação
- **CA1 — Criar registro:** Ao submeter um comentário válido, o sistema salva o comentário com **timestamp** e o exibe na lista.  
- **CA2 — Validação:** Se o campo comentário estiver vazio, o sistema não salva e mostra erro informando que o comentário é obrigatório.  
- **CA3 — Listagem:** O usuário autorizado consegue visualizar todos os comentários salvos, cada um com texto, data e hora.  
- **CA4 — Editar:** O usuário autorizado consegue editar um comentário existente e a alteração é persistida.  
- **CA5 — Excluir:** O usuário autorizado consegue excluir um comentário e este deixa de aparecer na lista.   
- **CA6 — Persistência:** Todos os registros ficam armazenados no banco de dados e disponíveis para futuras consultas.
