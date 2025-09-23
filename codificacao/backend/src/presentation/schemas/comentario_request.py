from pydantic import BaseModel
from typing import Optional

class ComentarioRequest(BaseModel):
    id_comentario: Optional[str] = None
    comentario: str