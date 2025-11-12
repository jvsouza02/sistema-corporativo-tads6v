from src.application.services.comentario_service import ComentarioService
from src.presentation.schemas.comentario_request import ComentarioRequest
from src.presentation.schemas.comentario_response import ComentarioResponse

class ComentarioController:
    def __init__(self):
        self.comentario_service = ComentarioService()

    def criar_comentario(self, comentario_request: ComentarioRequest):
        """
        Cria um novo comentário
        
        Validações automáticas via Service/Entity:
        - CT001: Rejeita se não houver serviço nem produto
        - CT005: Rejeita se valor_total for negativo
        """
        comentario = self.comentario_service.adicionar_comentario(
            comentario_request.comentario,
            comentario_request.servico,
            comentario_request.produto,
            comentario_request.valor_total,
            comentario_request.id_barbearia
        )
        return {
            "id_comentario": comentario["id_comentario"],
            "comentario": comentario["comentario"],
            "data_atualizacao": comentario["data_atualizacao"]
        }
    
    def listar_comentarios(self):
        """Lista todos os comentários"""
        comentarios = self.comentario_service.listar_comentarios()
        return [ComentarioResponse(
            id_comentario=str(c.id_comentario),
            comentario=str(c.comentario),
            data_atualizacao=str(c.data_atualizacao),
            id_barbearia=str(c.id_barbearia)
        ) for c in comentarios]

    def atualizar_comentario(self, comentario_request):
        """
        Atualiza um comentário existente
        
        CT004: Recalcula automaticamente o valor total
        """
        comentario = self.comentario_service.editar_comentario(
            comentario_request["id_comentario"],
            comentario_request.get("comentario"),
            comentario_request.get("servico"),
            comentario_request.get("produto"),
            comentario_request.get("valor_total"),
        )
        return comentario
    
    def deletar_comentario(self, id_comentario: str) -> None:
        """Deleta um comentário"""
        self.comentario_service.deletar_comentario(id_comentario)