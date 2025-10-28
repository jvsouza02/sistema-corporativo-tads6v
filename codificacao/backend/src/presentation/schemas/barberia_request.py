from pydantic import BaseModel

class BarbeariaRequest(BaseModel):
    nome: str
    email: str
    endereco: str
    telefone: str
    descricao: str
    horario_abertura: str
    horario_fechamento: str
    foto_url: str | None = None
    id_proprietario: str
