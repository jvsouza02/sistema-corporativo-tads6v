from entities.comentario import Comentario
from repositories.comentario_repository import ComentarioRepository

class ComentarioService:
    def __init__(self, repository: ComentarioRepository):
        self.repository = repository

    def adicionar_comentario(self, comentario_texto: str) -> Comentario:
        comentario = Comentario(comentario_texto)
        if not comentario.verificar_comentario():
            raise ValueError("Comentário inválido.")
        return self.repository.salvar(comentario)

    def listar_comentarios(self) -> list[Comentario]:
        return self.repository.listar_todos()
    
    def editar_comentario(self, comentario_id: str, novo_texto: str) -> Comentario:
        comentario = self.repository.buscar_por_id(comentario_id)
        if not comentario:
            raise ValueError("Comentário não encontrado.")
        comentario.comentario = novo_texto
        if not comentario.verificar_comentario():
            raise ValueError("Comentário inválido.")
        return self.repository.atualizar(comentario)
    
    def deletar_comentario(self, comentario_id: str) -> None:
        comentario = self.repository.buscar_por_id(comentario_id)
        if not comentario:
            raise ValueError("Comentário não encontrado.")
        self.repository.deletar(comentario_id)