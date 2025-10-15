from sqlalchemy import Column, String, Text, Time, DateTime, func
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()

class Barbearia(Base):
    __tablename__ = "barbearias"

    id = Column(String(36), primary_key=True, index=True)
    nome = Column(String(255), nullable=False)
    email = Column(String(255), unique=True, nullable=False)
    endereco = Column(Text, nullable=False)
    telefone = Column(String(20), nullable=False)
    horario_abertura = Column(Time, nullable=False)
    horario_fechamento = Column(Time, nullable=False)
    descricao = Column(Text, nullable=False)
    foto_url = Column(String(500), nullable=True)
    data_cadastro = Column(DateTime, default=func.now())
    data_atualizacao = Column(DateTime, default=func.now(), onupdate=func.now())

    def cadastrar_barbearia(self):
        return all([
            self.verificar_nome(),
            self.verificar_email(),
            self.verificar_endereco(),
            self.verificar_telefone(),
            self.verificar_horario_funcionamento(),
            self.verificar_horario_fechamento(),
            self.verificar_descricao(),
            self.verificar_foto_url()
        ])