from ast import List
from src.data.repositories.barbearia_repository import BarbeariaRepository
from src.application.services.barbearia_service import BarbeariaService
from src.presentation.schemas.barberia_request import BarbeariaRequest
from src.presentation.schemas.barbearia_response import BarbeariaResponse
from sqlalchemy.orm import Session

class BarbeariaController:
    def __init__(self, db: Session = None):
        self.db = db or next(get_db())
        self.repository = BarbeariaRepository(self.db)
        self.service = BarbeariaService(self.repository)
    
    def cadastrar_barbearia(self, barbearia_request: BarbeariaRequest) -> BarbeariaResponse:
        return self.service.cadastrar_barbearia(barbearia_request)
    
    # def obter_barbearia_por_id(self, barbearia_id: str) -> BarbeariaResponse:
    #     return self.service.obter_barbearia(barbearia_id)
    
    # def listar_barbearias(self) -> List[BarbeariaResponse]:
    #     return self.service.listar_barbearias()
    
    # def verificar_email_disponivel(self, email: str) -> bool:
    #     return self.service.verificar_email_disponivel(email)
