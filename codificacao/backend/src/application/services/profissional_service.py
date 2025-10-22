from src.application.entities.profissional_entity import Profissional
from src.data.repositories.profissional_repository import ProfissionalRepository

repository = ProfissionalRepository()
class ProfissionalService:
    def cadastrar_profissional(self, nome, horario_inicio, horario_fim, id_barbearia):
        profissional = Profissional(nome, horario_inicio, horario_fim, id_barbearia)
        if not profissional.vefificar_nome() or not profissional.verificar_horario():
            raise ValueError("Profissional inválido.")
        return repository.cadastrar_profissional(profissional)
    
    def buscar_profissional(self, id_profissional):
        return repository.buscar_profissional(id_profissional)
    
    def listar_profissionais(self):
        return repository.listar_todos()
    
    def editar_horario(self, id_profissional, horario_inicio, horario_fim):
        return repository.editar_horario(id_profissional, horario_inicio, horario_fim)
    
    def deletar_profissional(self, id_profissional):
        profissional = repository.deletar(id_profissional)
        if not profissional:
            raise ValueError("Profissional nao encontrado.")
        return profissional