from src.application.entities.proprietario_entity import Proprietario
from src.data.repositories.proprietario_repository import ProprietarioRepository

repository = ProprietarioRepository()
class ProprietarioService:
    def cadastrar_proprietario(self, nome, email, senha):
        proprietario = Proprietario(nome, email, senha)
        if not proprietario.verificar_proprietario():
            raise ValueError("Proprietário Inválido.")
        return repository.salvar(proprietario)
    
    def listar_proprietarios(self):
        return repository.listar_todos()
    
    def editar_proprietario(self, id_proprietario, nome, email, senha):
        return repository.atualizar(id_proprietario, nome, email, senha)
    
    def deleter_proprietario(self, id_proprietario):
        proprietario = repository.deletar(id_proprietario)
        if not proprietario:
            raise ValueError("Proprietário nao encontrado.")
        return proprietario