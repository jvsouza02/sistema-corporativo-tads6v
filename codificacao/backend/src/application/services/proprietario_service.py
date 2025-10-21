from src.application.entities.proprietario_entity import Proprietario
from src.data.repositories.proprietario_repository import ProprietarioRepository

class ProprietarioService:
    def __init__(self, repository):
        self.repository = ProprietarioRepository

    def cadastrar_proprietario(self, nome, email, senha):
        proprietario = Proprietario(nome, email, senha)
        if not proprietario.vefificar_nome() or not proprietario.verificar_horario():
            raise ValueError("Proprietário Inválido.")
        return ProprietarioRepository.salvar(proprietario)
    
    def listar_proprietarios(self):
        return ProprietarioRepository.listar_todos()
    
    def editar_proprietario(self, id_proprietario, nome, email, senha):
        return ProprietarioRepository.atualizar(id_proprietario, nome, email, senha)
    
    def deleter_proprietario(self, id_proprietario):
        proprietario = ProprietarioRepository.deletar(id_proprietario)
        if not proprietario:
            raise ValueError("Proprietário nao encontrado.")
        return proprietario