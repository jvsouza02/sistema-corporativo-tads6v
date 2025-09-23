from pydantic import BaseModel
from typing import Optional

class ComentarioResponse(BaseModel):
    comentario: str
    data_criacao: str
    data_atualizacao: Optional[str] = None