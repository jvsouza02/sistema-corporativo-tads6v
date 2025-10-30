from pydantic import BaseModel

class ComentarioRequest(BaseModel):
    comentario: str
    id_barbearia: str