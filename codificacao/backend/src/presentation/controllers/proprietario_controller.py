from src.application.services.proprietario_service import ProprietarioService

class ProprietarioController:
    def __init__(self):
        self.proprietario_service = ProprietarioService()

    def cadastrar_proprietario(self, nome, email, senha):
        return self.proprietario_service.cadastrar_proprietario(nome, email, senha)

    def listar_profissionais(self):
        return self.proprietario_service.listar_proprietarios()

    def editar_horario(self, id_proprietario, nome, email, senha):
        return self.proprietario_service.editar_proprietario(id_proprietario, nome, email, senha)

    def deletar_profissional(self, id_proprietario):
        return self.proprietario_service.deleter_proprietario(id_proprietario)