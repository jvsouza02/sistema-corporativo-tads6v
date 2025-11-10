from pydantic import BaseModel

class ComentarioRequest(BaseModel):
    comentario: str
    servico: str | None = None
    produto: str | None = None
    valor_total: float | None = None
    id_barbearia: str