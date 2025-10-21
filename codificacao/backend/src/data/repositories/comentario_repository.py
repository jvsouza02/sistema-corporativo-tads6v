from config.database import SessionLocal
from sqlalchemy import select as Select
from src.application.entities.comentario_entity import Comentario
from src.data.models.comentario_model import ComentarioModel

class ComentarioRepository():
    def __init__(self):
        self.db = SessionLocal()

    def _to_entity(self, model: ComentarioModel):
        return (str(model.id_comentario), str(model.comentario), str(model.id_profissional), str(model.data_criacao), str(model.data_atualizacao))

    def salvar(self, comentario):
        comentario_salvo = ComentarioModel(
            id_comentario=comentario.id_comentario,
            comentario=comentario.comentario,
            id_profissional=comentario.id_profissional,
            data_criacao=comentario.data_criacao,
            data_atualizacao=comentario.data_atualizacao
        )
        try:
            self.db.add(comentario_salvo)
            self.db.commit()
        except Exception as e:
            self.db.rollback()
            raise e
        return comentario

    def listar_todos(self):
        result = self.db.execute(Select(ComentarioModel).order_by(ComentarioModel.data_atualizacao.desc()))
        return result.scalars().all()

    def buscar_por_id(self, comentario_id: str):
        return self.db.query(ComentarioModel).filter(ComentarioModel.id_comentario == comentario_id).first()

    def atualizar(self, id_comentario, comentario):
        comentario_model = self.db.query(ComentarioModel).filter(ComentarioModel.id_comentario == id_comentario).first()
        if not comentario_model:
            return None
        comentario_model.comentario = comentario
        try:
            self.db.merge(comentario_model)
            self.db.commit()
            self.db.refresh(comentario)
        except Exception as e:
            self.db.rollback()
            raise e
        return comentario

    def deletar(self, comentario_id: str):
        comentario = self.buscar_por_id(comentario_id)
        if comentario:
            try:
                self.db.delete(comentario)
                self.db.commit()
            except Exception as e:
                self.db.rollback()
                raise e
        return comentario