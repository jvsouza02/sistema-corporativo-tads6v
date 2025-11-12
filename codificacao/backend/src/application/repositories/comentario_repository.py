from abc import ABC, abstractmethod
from codificacao.backend.src.application.entities.comentario_entity import Comentario

class IComentarioRepository(ABC):
    @abstractmethod
    def salvar(self, comentario: Comentario) -> Comentario:
        pass

    @abstractmethod
    def listar_todos(self) -> list[Comentario]:
        pass

    @abstractmethod
    def buscar_por_id(self, comentario_id: str) -> Comentario | None:
        pass

    @abstractmethod
    def atualizar(self, comentario: Comentario) -> Comentario:
        pass

    @abstractmethod
    def deletar(self, comentario_id: str) -> None:
        pass