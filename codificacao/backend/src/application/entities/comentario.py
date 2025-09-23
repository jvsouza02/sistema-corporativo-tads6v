from datetime import datetime
from uuid import uuid4

class Comentario:
    def __init__(self, comentario: str):
        self.id_comentario = str(uuid4())
        self.comentario = comentario

    def verificar_comentario(self) -> bool:
        return bool(self.comentario and self.comentario.strip())
