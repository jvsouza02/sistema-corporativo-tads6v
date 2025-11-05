from src.presentation.schemas.barbearia_response import BarbeariaResponse
from src.application.entities.barbearia_entity import Barbearia
from src.data.repositories.barbearia_repository import BarbeariaRepository

repository = BarbeariaRepository()

class BarbeariaService:

    def cadastrar_barbearia(self, nome, email, endereco, telefone, horario_abertura,
                             horario_fechamento, descricao, foto_url, id_proprietario):

        existentes = repository.listar_todos()
        for b in existentes:
            if not b:
                raise ValueError("Nenhuma barbearia cadastrada.")
            if b["nome"] == nome or b["email"] == email:
                raise ValueError("Já existe uma barbearia com esse nome ou email.")

        barbearia = Barbearia(
            nome=nome,
            email=email,
            endereco=endereco,
            telefone=telefone,
            horario_abertura=horario_abertura,
            horario_fechamento=horario_fechamento,
            descricao=descricao,
            id_proprietario=id_proprietario,
            foto_url=foto_url
        )

        if not barbearia.verificar_nome():
            raise ValueError("Barbearia inválida.")

        nova_barbearia = repository.salvar(barbearia)

        if nova_barbearia is None:
            raise ValueError("Erro ao salvar barbearia no banco.")

        return BarbeariaResponse(**nova_barbearia)

    def listar_barbearias_por_proprietario(self, id_proprietario: str):
        return repository.listar_por_proprietario(id_proprietario)
    
    def buscar_barbearia(self, id_barbearia: str):
        return repository.buscar_por_id(id_barbearia)
