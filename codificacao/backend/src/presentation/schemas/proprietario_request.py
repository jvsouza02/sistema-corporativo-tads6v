from pydantic import BaseModel

class ProprietarioRequest(BaseModel):
    nome: str
    email: str
    senha: str
