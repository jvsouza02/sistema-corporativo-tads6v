from ast import List
from src.data.repositories.barbearia_repository import BarbeariaRepository
from src.application.services.barbearia_service import BarbeariaService
from src.presentation.schemas.barberia_request import BarbeariaRequest
from src.presentation.schemas.barbearia_response import BarbeariaResponse
from sqlalchemy.orm import Session

class BarbeariaController:
    def __init__(self):
        self.repository = BarbeariaRepository()
        self.service = BarbeariaService()
    
    def cadastrar_barbearia(self, barbearia_request) -> BarbeariaResponse:
        return self.service.cadastrar_barbearia(barbearia_request.nome, barbearia_request.email, barbearia_request.endereco, barbearia_request.telefone, barbearia_request.horario_abertura,
                              barbearia_request.horario_fechamento, barbearia_request.descricao, barbearia_request.foto_url, barbearia_request.id_proprietario)
    
    # def obter_barbearia_por_id(self, barbearia_id: str) -> BarbeariaResponse:
    #     return self.service.obter_barbearia(barbearia_id)
    
    # def listar_barbearias(self) -> List[BarbeariaResponse]:
    #     return self.service.listar_barbearias()
    
    # def verificar_email_disponivel(self, email: str) -> bool:
    #     return self.service.verificar_email_disponivel(email)
