from config.database import SessionLocal
from sqlalchemy import select as Select
from src.application.entities.profissional_entity import Profissional
from src.data.models.profissional_model import ProfissionalModel


class ProfissionalRepository:
    def __init__(self):
        self.db = SessionLocal()

    def cadastrar_profissional(self, profissional: Profissional):
        profissional_model = ProfissionalModel(**profissional.dict())
        self.db.add(profissional_model)
        self.db.commit()
        self.db.refresh(profissional_model)
        return profissional_model

    def listar_todos(self):
        result = self.db.execute(Select(ProfissionalModel).order_by(ProfissionalModel.data_atualizacao.desc()))
        return result.scalars().all()
    
    def editar_horario(self, id_profissional, horario_trabalho):
        profissional_model = self.db.query(ProfissionalModel).filter(ProfissionalModel.id_profissional == id_profissional).first()
        if not profissional_model:
            return None
        profissional_model.horario_trabalho = horario_trabalho
        try:
            self.db.merge(profissional_model)
            self.db.commit()
            self.db.refresh(profissional_model)
        except Exception as e:
            self.db.rollback()
            raise e
        return profissional_model
    
    def deletar(self, id_profissional):
        profissional = self.db.query(ProfissionalModel).filter(ProfissionalModel.id_profissional == id_profissional).first()
        if profissional:
            try:
                self.db.delete(profissional)
                self.db.commit()
            except Exception as e:
                self.db.rollback()
                raise e
        return profissional
