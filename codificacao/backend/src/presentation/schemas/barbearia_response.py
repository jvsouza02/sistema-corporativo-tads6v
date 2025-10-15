from pydantic import BaseModel
from typing import Optional
from datetime import datetime, time

class BarbeariaResponse(BaseModel):
    id: str
    nome: str
    email: str
    endereco: str
    telefone: str
    horario_abertura: str
    horario_fechamento: str
    descricao: str
    foto_url: Optional[str]
    data_cadastro: datetime
    
    class Config:
        from_attributes = True
    
    @classmethod
    def from_orm(cls, obj):
        return cls(
            id=obj.id,
            nome=obj.nome,
            email=obj.email,
            endereco=obj.endereco,
            telefone=obj.telefone,
            horario_abertura=obj.horario_abertura.strftime("%H:%M"),
            horario_fechamento=obj.horario_fechamento.strftime("%H:%M"),
            descricao=obj.descricao,
            foto_url=obj.foto_url,
            data_cadastro=obj.data_cadastro
        )