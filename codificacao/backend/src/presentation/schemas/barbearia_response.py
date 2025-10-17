from pydantic import BaseModel
from typing import Optional
from uuid import UUID
from datetime import time

class BarbeariaResponse(BaseModel):
    id_barbearias: UUID              
    nome: str
    email: str
    endereco: str
    telefone: str
    horario_abertura: str           
    horario_fechamento: str         
    descricao: str
    foto_url: Optional[str]

    class Config:
        from_attributes = True 
