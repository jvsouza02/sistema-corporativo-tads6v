from ast import List
from src.data.repositories.barbearia_repository import BarbeariaRepository
from src.application.services.barbearia_service import BarbeariaService
from src.application.services.profissional_service import ProfissionalService
from src.application.services.comentario_service import ComentarioService
from src.presentation.schemas.barberia_request import BarbeariaRequest
from src.presentation.schemas.barbearia_response import BarbeariaResponse
from sqlalchemy.orm import Session

class BarbeariaController:
    def __init__(self):
        self.service_barbearia = BarbeariaService()
        self.service_profissional = ProfissionalService()
        self.service_comentario = ComentarioService()

    def cadastrar_barbearia(self, barbearia_request: BarbeariaRequest) -> BarbeariaResponse:
        return self.service_barbearia.cadastrar_barbearia(
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
        barbearias = self.service_barbearia.listar_barbearias_por_proprietario(id_proprietario)
        for barbearia in barbearias:
            if not barbearia:
                raise ValueError("Nenhuma barbearia cadastrada.")
            
            profissionais = self.service_profissional.listar_profissionais_por_barbearia(barbearia['id_barbearia'])
            barbearia['total_profissionais'] = len(profissionais) if profissionais else 0

            comentarios = self.service_comentario.listar_atendimentos_por_barbearia(barbearia['id_barbearia'])
            barbearia['total_atendimentos'] = comentarios

        return barbearias

    def buscar_barbearia(self, id_barbearia: str):
        return self.service_barbearia.buscar_barbearia(id_barbearia)