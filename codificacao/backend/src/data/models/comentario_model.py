import uuid
from sqlalchemy.dialects.postgresql import UUID
from sqlalchemy import Column, String, DateTime
from datetime import datetime
from config.database import Base

class ComentarioModel(Base):
    __tablename__ = "comentarios"

    id_comentario = Column(UUID(as_uuid=True), primary_key=True, default=uuid.uuid4)
    comentario = Column(String, nullable=False)
    id_profissional = Column(String, nullable=False)
    data_criacao = Column(DateTime, default=datetime.now, nullable=False)
    data_atualizacao = Column(DateTime, default=datetime.now, onupdate=datetime.now, nullable=False)