from ast import List
from src.data.repositories.barbearia_repository import BarbeariaRepository
from src.application.services.barbearia_service import BarbeariaService
from src.presentation.schemas.barberia_request import BarbeariaRequest
from src.presentation.schemas.barbearia_response import BarbeariaResponse
from sqlalchemy.orm import Session

class BarbeariaController:
    def __init__(self):
        self.service = BarbeariaService()

    def cadastrar_barbearia(self, barbearia_request: BarbeariaRequest) -> BarbeariaResponse:
        return self.service.cadastrar_barbearia(
            nome=barbearia_request.nome,
            email=barbearia_request.email,
            endereco=barbearia_request.endereco,
            telefone=barbearia_request.telefone,
            horario_abertura=barbearia_request.horario_abertura,
            horario_fechamento=barbearia_request.horario_fechamento,
            descricao=barbearia_request.descricao,
            foto_url=barbearia_request.foto_url,
            id_proprietario=barbearia_request.id_proprietario
        )

    def listar_barbearias_por_proprietario(self, id_proprietario: str):
        return self.service.listar_barbearias_por_proprietario(id_proprietario)