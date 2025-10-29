from config.database import SessionLocal
from src.data.models.usuario_model import UsuarioModel

class UsuarioRepository:
    def __init__(self):
        self.db = SessionLocal()

    def get_by_email(self, email):
        return self.db.query(UsuarioModel).filter(UsuarioModel.email == email).first()