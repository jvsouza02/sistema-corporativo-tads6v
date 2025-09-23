from abc import ABC, abstractmethod
from application.entities.comentario import Comentario
from data.models.comentario_model import ComentarioModel

class IComentarioRepository(ABC):
    @abstractmethod
    def salvar(self, comentario: Comentario) -> Comentario:
        pass

    @abstractmethod
    def listar_todos(self) -> list[ComentarioModel]:
        pass

    @abstractmethod
    def buscar_por_id(self, comentario_id: str) -> ComentarioModel | None:
        pass

    @abstractmethod
    def atualizar(self, comentario: ComentarioModel) -> Comentario:
        pass

    @abstractmethod
    def deletar(self, comentario_id: str) -> None:
        pass