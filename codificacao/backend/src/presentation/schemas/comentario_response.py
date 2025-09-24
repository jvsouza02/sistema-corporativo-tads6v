from pydantic import BaseModel

class ComentarioResponse(BaseModel):
    id_comentario: str
    comentario: str
    data_atualizacao: str