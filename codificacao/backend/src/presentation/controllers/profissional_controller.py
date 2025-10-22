from src.application.services.profissional_service import ProfissionalService

class ProfissionalController:
    def __init__(self):
        self.profissional_service = ProfissionalService()

    def cadastrar_profissional(self, nome, horario_inicio, horario_fim, id_barbearia):
        return self.profissional_service.cadastrar_profissional(nome, horario_inicio, horario_fim, id_barbearia)
    
    def buscar_profissional(self, id_profissional):
        return self.profissional_service.buscar_profissional(id_profissional)

    def listar_profissionais(self):
        return self.profissional_service.listar_profissionais()

    def editar_horario(self, id_profissional, horario_inicio, horario_fim):
        return self.profissional_service.editar_horario(id_profissional, horario_inicio, horario_fim)

    def deletar_profissional(self, id_profissional):
        return self.profissional_service.deletar_profissional(id_profissional)