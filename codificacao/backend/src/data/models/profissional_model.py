import uuid
from sqlalchemy.dialects.postgresql import UUID
from sqlalchemy import Column, String, DateTime, ForeignKey
from datetime import datetime
from config.database import Base


class ProfissionalModel(Base):
    __tablename__ = "profissionais"
    
    id_profissional = Column(UUID(as_uuid=True), primary_key=True, default=uuid.uuid4)
    nome = Column(String, nullable=False)
    horario_inicio = Column(String, nullable=False)
    horario_fim = Column(String, nullable=False)
    id_barbearia = Column(UUID(as_uuid=True), ForeignKey("barbearias.id_barbearia"), nullable=False)
    id_usuario = Column(UUID(as_uuid=True), ForeignKey("usuarios.id_usuario"), nullable=False)
    data_criacao = Column(DateTime, default=datetime.now, nullable=False)
    data_atualizacao = Column(DateTime, default=datetime.now, onupdate=datetime.now, nullable=False)