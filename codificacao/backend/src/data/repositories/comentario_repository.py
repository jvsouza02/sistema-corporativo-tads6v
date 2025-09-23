from config.database import SessionLocal
from data.models.comentario_model import ComentarioModel
from application.entities.comentario import Comentario
from application.repositories.comentario_repository import IComentarioRepository

class ComentarioRepository(IComentarioRepository):
    def __init__(self):
        self.db = SessionLocal()

    def salvar(self, comentario: Comentario) -> Comentario:
        self.db.add(comentario)
        self.db.commit()
        self.db.refresh(comentario)
        return comentario

    def listar_todos(self) -> list[ComentarioModel]:
        return self.db.query(ComentarioModel).order_by(ComentarioModel.data_criacao).all()

    def buscar_por_id(self, comentario_id: str) -> ComentarioModel | None:
        return self.db.query(ComentarioModel).filter(ComentarioModel.id_comentario == comentario_id).first()

    def atualizar(self, comentario: Comentario) -> Comentario:
        self.db.merge(comentario)
        self.db.commit()
        self.db.refresh(comentario)
        return comentario

    def deletar(self, comentario_id: str) -> None:
        comentario = self.buscar_por_id(comentario_id)
        if comentario:
            self.db.delete(comentario)
            self.db.commit()