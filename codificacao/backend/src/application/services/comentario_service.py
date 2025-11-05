from src.application.entities.comentario_entity import Comentario
from src.data.repositories.comentario_repository import ComentarioRepository

repository = ComentarioRepository()
class ComentarioService:

    def adicionar_comentario(self, comentario_texto: str, id_barbearia: str):
        comentario = Comentario(comentario_texto, id_barbearia)
        if not comentario.verificar_comentario():
            raise ValueError("Comentário inválido.")
        return repository.salvar(comentario)

    def listar_comentarios(self):
        return repository.listar_todos()
    
    def listar_atendimentos_por_barbearia(self, id_barbearia: str):
        return repository.listar_atendimentos_por_barbearia(id_barbearia)
    
    def editar_comentario(self, comentario_id, novo_texto):
        return repository.atualizar(comentario_id, novo_texto)
    
    def deletar_comentario(self, comentario_id: str):
        comentario = repository.buscar_por_id(comentario_id)
        if not comentario:
            raise ValueError("Comentário não encontrado.")
        repository.deletar(comentario_id)