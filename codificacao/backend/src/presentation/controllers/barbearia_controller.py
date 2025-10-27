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
    
    def listar_barbearias_por_proprietario(self, id_proprietario):
        return self.service.listar_barbearias_por_proprietario(id_proprietario)