import uuid
from config.database import SessionLocal
from sqlalchemy import select as Select
from src.application.entities.comentario_entity import Comentario
from src.data.models.proprietario_model import ProprietarioModel

class ProprietarioRepository():
    def __init__(self):
        self.db = SessionLocal()

    def salvar(self, proprietario):
        proprietario_model = ProprietarioModel(
            id_proprietario=proprietario.id_proprietario,
            nome=proprietario.nome,
            email=proprietario.email,
            senha=proprietario.senha
        )
        try:
            self.db.add(proprietario_model)
            self.db.commit()
        except Exception as e:
            self.db.rollback()
            raise e
        return proprietario

    def listar_todos(self):
        result = self.db.execute(Select(ProprietarioModel).order_by(ProprietarioModel.data_atualizacao.desc()))
        return result.scalars().all()

    def buscar_por_id(self, proprietario_id: str):
        return self.db.query(ProprietarioModel).filter(ProprietarioModel.id_proprietario == proprietario_id).first()

    def atualizar(self, id_proprietario, nome, email, senha):
        proprietario_model = self.db.query(ProprietarioModel).filter(ProprietarioModel.id_proprietario == id_proprietario).first()
        if not proprietario_model:
            return None
        proprietario_model.nome = nome
        proprietario_model.email = email
        proprietario_model.senha = senha
        try:
            self.db.merge(proprietario_model)
            self.db.commit()
            self.db.refresh(nome, email, senha)
        except Exception as e:
            self.db.rollback()
            raise e
        return nome, email, senha

    def deletar(self, id_proprietario):
        proprietario = self.buscar_por_id(id_proprietario)
        if proprietario:
            try:
                self.db.delete(proprietario)
                self.db.commit()
            except Exception as e:
                self.db.rollback()
                raise e
        return proprietario