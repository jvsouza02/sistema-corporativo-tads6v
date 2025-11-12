from pydantic import BaseModel

class ComentarioRequest(BaseModel):
    """
    Schema de request para comentários
    Permanece EXATAMENTE igual ao seu código original
    """
    comentario: str
    servico: str | None = None
    produto: str | None = None
    valor_total: float | None = None
    id_barbearia: str