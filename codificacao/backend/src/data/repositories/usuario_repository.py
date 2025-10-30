from config.database import SessionLocal
from sqlalchemy import select as Select
from src.data.models.usuario_model import UsuarioModel

class UsuarioRepository:
    def __init__(self):
        self.db = SessionLocal()

    def model_to_entity(self, model):
        return {
            'id_usuario': model.id_usuario,
            'email': model.email,
            'papel': model.papel
        }

    def get_by_email(self, email):
        usuario = self.db.query(UsuarioModel).filter(UsuarioModel.email == email).first()
        return self.model_to_entity(usuario)