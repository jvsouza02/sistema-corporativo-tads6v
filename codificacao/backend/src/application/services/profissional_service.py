from src.application.entities.profissional_entity import Profissional
from src.data.repositories.profissional_repository import ProfissionalRepository
from src.data.repositories.barbearia_repository import BarbeariaRepository

repository = ProfissionalRepository()
barbearia_repository = BarbeariaRepository()
class ProfissionalService:
    def cadastrar_profissional(self, nome, email, horario_inicio, horario_fim, id_barbearia):
        profissional = Profissional(nome, email, horario_inicio, horario_fim, id_barbearia)
        if not profissional.vefificar_nome() or not profissional.verificar_horario():
            raise ValueError("Profissional inválido.")
        return repository.cadastrar_profissional(profissional)
    
    def buscar_profissional(self, id_usuario):
        return repository.buscar_profissional(id_usuario)
    
    def listar_profissionais(self):
        return repository.listar_todos()
    
    def editar_horario(self, id_profissional, horario_inicio, horario_fim):
        return repository.editar_horario(id_profissional, horario_inicio, horario_fim)
    
    def deletar_profissional(self, id_profissional):
        profissional = repository.deletar(id_profissional)
        if not profissional:
            raise ValueError("Profissional nao encontrado.")
        return profissional
    
    def listar_profissionais_por_barbearia(self, id_barbearia: str):
        return repository.listar_profissionais_por_barbearia(id_barbearia)
    
    def transferir_profissional(self, id_profissional, id_barbearia_destino):
        profissional = repository.buscar_profissional(id_profissional)
        if not profissional:
            raise ValueError("Profissional não encontrado")

        origem = barbearia_repository.buscar_por_id(profissional["id_barbearia"])
        if not origem:
            raise ValueError("Barbearia origem inválida")

        destino = barbearia_repository.buscar_por_id(id_barbearia_destino)

        if not destino:
            raise ValueError("Barbearia destino inválida")

        if origem["id_proprietario"] != destino["id_proprietario"]:
            raise ValueError("Operação não permitida")

        repository.atualizar_barbearia(id_profissional, id_barbearia_destino)
        return {"mensagem": "Profissional transferido com sucesso!"}
