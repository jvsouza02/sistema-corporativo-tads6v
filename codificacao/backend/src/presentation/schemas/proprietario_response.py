from pydantic import BaseModel
from uuid import UUID

class ProprietarioResponse(BaseModel):
    id_proprietario: UUID              
    nome: str
    email: str
    senha: str

    class Config:
        from_attributes = True 
