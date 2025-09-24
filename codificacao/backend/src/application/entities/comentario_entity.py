from uuid import uuid4
from dataclasses import dataclass, field
from datetime import datetime

class Comentario:
    def __init__(self, comentario: str):
        self.id_comentario: str = str(uuid4())
        self.comentario: str = comentario
        self.data_criacao: datetime = datetime.now()
        self.data_atualizacao: datetime = datetime.now()

    def verificar_comentario(self) -> bool:
        return bool(self.comentario and self.comentario.strip())
