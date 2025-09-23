from uuid import uuid4
from dataclasses import dataclass, field

@dataclass
class Comentario:
    id_comentario: str = field(default_factory=lambda: str(uuid4()))
    comentario: str = ""

    def verificar_comentario(self) -> bool:
        return bool(self.comentario and self.comentario.strip())
