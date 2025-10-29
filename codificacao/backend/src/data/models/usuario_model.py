import uuid
from sqlalchemy.dialects.postgresql import UUID
from sqlalchemy import Column, String, DateTime
from datetime import datetime
from config.database import Base

class UsuarioModel(Base):
    __tablename__ = "usuarios"

    id_usuario = Column(UUID(as_uuid=True), primary_key=True, default=uuid.uuid4)
    email = Column(String, nullable=False)
    papel = Column(String, nullable=False)
    data_criacao = Column(DateTime, default=datetime.now, nullable=False)
    data_atualizacao = Column(DateTime, default=datetime.now, onupdate=datetime.now, nullable=False)