import uuid
from sqlalchemy.dialects.postgresql import UUID
from sqlalchemy import Column, String, DateTime, ForeignKey
from datetime import datetime
from config.database import Base

class ComentarioModel(Base):
    __tablename__ = "comentarios"

    id_comentario = Column(UUID(as_uuid=True), primary_key=True, default=uuid.uuid4)
    comentario = Column(String, nullable=False)
    servico = Column(String, nullable=False)
    produto = Column(String, nullable=False)
    valor_total = Column(String, nullable=False)
    id_barbearia = Column(UUID(as_uuid=True), ForeignKey("barbearias.id_barbearia"), nullable=False)
    data_criacao = Column(DateTime, default=datetime.now, nullable=False)
    data_atualizacao = Column(DateTime, default=datetime.now, onupdate=datetime.now, nullable=False)