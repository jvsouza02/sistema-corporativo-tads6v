import uuid
from sqlalchemy import Column, String, DateTime
from config.database import Base
from sqlalchemy.dialects.postgresql import UUID
from datetime import datetime

class BarbeariaModel(Base):
    __tablename__ = "barbearias"

    id_barbearia = Column(UUID(as_uuid=True), primary_key=True, default=uuid.uuid4)
    nome = Column(String, nullable=False)
    email = Column(String, nullable=False)
    endereco = Column(String, nullable=False)
    telefone = Column(String, nullable=False)
    horario_funcionamento = Column(String, nullable=False)
    horario_fechamento = Column(String, nullable=False)
    descricao = Column(String, nullable=False)
    foto_url = Column(String, nullable=False)
    data_criacao = Column(DateTime, default=datetime.now, nullable=False)
    data_atualizacao = Column(DateTime, default=datetime.now, onupdate=datetime.now, nullable=False)