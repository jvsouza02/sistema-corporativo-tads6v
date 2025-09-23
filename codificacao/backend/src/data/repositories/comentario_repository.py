from config.database import SessionLocal
from application.entities.comentario import Comentario
from application.repositories.comentario_repository import IComentarioRepository

class ComentarioRepositoryDB(IComentarioRepository):
    def __init__(self):
        self.db = SessionLocal()

    def salvar(self, comentario: Comentario) -> Comentario:
        self.db.add(comentario)
        self.db.commit()
        self.db.refresh(comentario)
        return comentario

    def listar_todos(self) -> list[Comentario]:
        return self.db.query(Comentario).all()

    def buscar_por_id(self, comentario_id: str) -> Comentario | None:
        return self.db.query(Comentario).filter(Comentario.id_comentario == comentario_id).first()

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