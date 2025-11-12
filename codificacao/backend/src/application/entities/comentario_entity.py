from uuid import uuid4
from datetime import datetime

class Comentario:
    def __init__(
        self, 
        comentario: str, 
        servico: str | None, 
        produto: str | None, 
        valor_total: float | None, 
        id_barbearia: str
    ):
        self.id_comentario: str = str(uuid4())
        self.comentario: str = comentario
        self.servico: str | None = servico
        self.produto: str | None = produto
        self.valor_total: float | None = valor_total
        self.id_barbearia: str = id_barbearia
        self.data_criacao: datetime = datetime.now()
        self.data_atualizacao: datetime = datetime.now()

        self._validar()
    
    def _validar(self):

        if not self.servico and not self.produto:
            raise ValueError("É obrigatório escolher pelo menos um serviço ou produto")
        

        if self.valor_total is not None and self.valor_total < 0:
            raise ValueError("Não é permitido adicionar itens com valor negativo")
        

        if self.valor_total is None:
            self.valor_total = 0.0
    
    def calcular_valor_total(self) -> float:
        if self.valor_total is None:
            return 0.0
        return round(self.valor_total, 2)
    
    def verificar_comentario(self) -> bool:
        return bool(self.comentario and self.comentario.strip())