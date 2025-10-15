from pydantic import BaseModel

class BarbeariaRequest(BaseModel):
    nome: str
    email: str
    endereco: str
    telefone: str
    descricao: str
    horario_abertura: str
    horario_fechamento: str
    foto: str | None = None
