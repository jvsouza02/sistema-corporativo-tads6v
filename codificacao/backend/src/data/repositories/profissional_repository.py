from config.database import SessionLocal
from sqlalchemy import select as Select
from src.application.entities.profissional_entity import Profissional
from src.data.models.profissional_model import ProfissionalModel
from src.data.models.usuario_model import UsuarioModel


class ProfissionalRepository:
    def __init__(self):
        self.db = SessionLocal()

    def cadastrar_profissional(self, profissional: Profissional):
        usuario_model = UsuarioModel(
            email=profissional.email,
            papel="profissional"
        )

        self.db.add(usuario_model)
        self.db.flush()

        profissional_model = ProfissionalModel(
            nome=profissional.nome,
            horario_inicio=profissional.horario_inicio,
            horario_fim=profissional.horario_fim,
            id_barbearia=profissional.id_barbearia,
            id_usuario=usuario_model.id_usuario
        )

        self.db.add(profissional_model)
        self.db.commit()
        self.db.refresh(usuario_model)
        self.db.refresh(profissional_model)

        return {
            'id_profissional': profissional_model.id_profissional,
            'nome': profissional_model.nome,
            'horario_inicio': profissional_model.horario_inicio,
            'horario_fim': profissional_model.horario_fim,
            'id_barbearia': profissional_model.id_barbearia,
            'papel': 'profissional'
        }
    
    def model_to_entity(self, profissional_model: ProfissionalModel):
        return {
            'id_profissional': profissional_model.id_profissional,
            'nome': profissional_model.nome,
            'horario_inicio': profissional_model.horario_inicio,
            'horario_fim': profissional_model.horario_fim,
            'id_barbearia': profissional_model.id_barbearia,
            'papel': 'profissional'
        }
    
    def buscar_profissional(self, id_usuario):
        profissional = self.db.query(ProfissionalModel).filter(ProfissionalModel.id_usuario == id_usuario).first()
        return self.model_to_entity(profissional)
    
    def listar_todos(self):
        result = self.db.execute(Select(ProfissionalModel).order_by(ProfissionalModel.data_atualizacao.desc()))
        return result.scalars().all()
    
    def editar_horario(self, id_profissional, horario_inicio, horario_fim):
        profissional_model = self.db.query(ProfissionalModel).filter(ProfissionalModel.id_profissional == id_profissional).first()
        if not profissional_model:
            return None
        profissional_model.horario_inicio = horario_inicio
        profissional_model.horario_fim = horario_fim
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
