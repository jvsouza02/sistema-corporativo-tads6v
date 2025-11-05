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
    
    def listar_profissionais_por_barbearia(self, id_barbearia: str):
        profissionais = (
            self.db.query(ProfissionalModel)
            .filter(ProfissionalModel.id_barbearia == id_barbearia)
            .all()
        )

        return [
            {
                "id_profissional": str(p.id_profissional),
                "nome": p.nome,
                "horario_inicio": p.horario_inicio,
                "horario_fim": p.horario_fim,
                "id_barbearia": str(p.id_barbearia),
                "id_usuario": str(p.id_usuario)
            }
            for p in profissionais
        ]

    def buscar_por_id(self, id_profissional):
        p = self.db.query(ProfissionalModel).filter_by(id_profissional=id_profissional).first()
        if not p:
            return None

        return {
            "id_profissional": str(p.id_profissional),
            "nome": p.nome,
            "horario_inicio": p.horario_inicio,
            "horario_fim": p.horario_fim,
            "id_barbearia": str(p.id_barbearia),
            "id_usuario": str(p.id_usuario)
        }

    def atualizar_barbearia(self, id_profissional, id_barbearia):
        profissional = (
            self.db.query(ProfissionalModel)
            .filter(ProfissionalModel.id_profissional == id_profissional)
            .first()
        )
        profissional.id_barbearia = id_barbearia
        self.db.commit()
