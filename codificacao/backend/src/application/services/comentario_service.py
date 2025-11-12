from src.application.entities.comentario_entity import Comentario
from src.data.repositories.comentario_repository import ComentarioRepository

class ComentarioService:
    def __init__(self, repository=None):
        self.repository = repository or ComentarioRepository()

    def adicionar_comentario(
        self, 
        comentario_texto: str, 
        servico: str | None, 
        produto: str | None, 
        valor_total: float | None, 
        id_barbearia: str
    ):
        """
        Adiciona um novo comentário
        
        Validações:
        - CT001: Rejeita se não houver serviço nem produto
        - CT005: Rejeita se valor_total for negativo
        - Verifica se o comentário não está vazio
        """
        # A validação acontece no construtor do Comentario
        comentario = Comentario(comentario_texto, servico, produto, valor_total, id_barbearia)
        
        if not comentario.verificar_comentario():
            raise ValueError("Comentário inválido.")
        
        return self.repository.salvar(comentario)

    def listar_comentarios(self):
        """Lista todos os comentários"""
        return self.repository.listar_todos()
    
    def listar_atendimentos_por_barbearia(self, id_barbearia: str):
        """Lista comentários de uma barbearia específica"""
        return self.repository.listar_atendimentos_por_barbearia(id_barbearia)
    
    def listar_todos_atendimentos_por_barbearia(self, id_barbearia: str):
        """Lista todos os atendimentos de uma barbearia específica"""
        return self.repository.listar_todos_atendimentos_por_barbearia(id_barbearia)
    
    def editar_comentario(
        self, 
        comentario_id ,
        novo_texto,
        servico,
        produto,
        valor_total,
    ):
        """
        Edita um comentário existente
        
        CT004: Recalcula o valor total quando os dados são alterados
        CT005: Valida valores negativos
        CT001: Valida se há pelo menos serviço ou produto
        """
        comentario = self.repository.buscar_por_id(comentario_id)
        
        if not comentario:
            raise ValueError("Comentário não encontrado.")
        
        # Atualizar dados se fornecidos
        if novo_texto is not None:
            comentario.comentario = novo_texto
        if servico is not None:
            comentario.servico = servico
        if produto is not None:
            comentario.produto = produto
        if valor_total is not None:
            # CT005: Validar valor negativo
            if valor_total < 0:
                raise ValueError("Não é permitido adicionar itens com valor negativo")
            comentario.valor_total = valor_total
        
        if comentario.servico is None and comentario.produto is None:
            raise ValueError("É obrigatório escolher pelo menos um serviço ou produto")

        return self.repository.atualizar(comentario_id, novo_texto, servico, produto, valor_total)
    
    def deletar_comentario(self, comentario_id: str):
        """Deleta um comentário"""
        comentario = self.repository.buscar_por_id(comentario_id)
        
        if not comentario:
            raise ValueError("Comentário não encontrado.")
        
        self.repository.deletar(comentario_id)