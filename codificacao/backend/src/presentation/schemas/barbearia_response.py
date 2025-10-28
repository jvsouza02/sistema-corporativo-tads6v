from pydantic import BaseModel
from typing import Optional
from uuid import UUID
from datetime import datetime, time

class BarbeariaResponse(BaseModel):
    id_barbearia: str
    nome: str
    email: str
    endereco: str
    telefone: str
    horario_abertura: Optional[str] = None
    horario_fechamento: Optional[str] = None
    descricao: Optional[str] = None
    foto_url: Optional[str] = None
    id_proprietario: str
    data_cadastro: Optional[datetime] = None
    data_atualizacao: Optional[datetime] = None

    class Config:
        orm_mode = True
