from src.application.services.auth_service import AuthService
from src.application.services.profissional_service import ProfissionalService
from src.application.services.proprietario_service import ProprietarioService

class AuthController:
    def __init__(self):
        self.service = AuthService()

    def cadastrar_usuario(self, usuario_request):
        usuario = {}
        if usuario_request['papel'] == 'proprietario':
            proprietario_service = ProprietarioService()
            usuario = proprietario_service.cadastrar_proprietario(usuario_request['nome'], usuario_request['email'], usuario_request['senha'])
        elif usuario_request['papel'] == 'profissional':
            profissional_service = ProfissionalService()
            usuario = profissional_service.cadastrar_profissional(usuario_request['nome'], usuario_request['email'], usuario_request['horario_inicio'], usuario_request['horario_fim'], usuario_request['id_barbearia'])

        return usuario

    def login(self, email: str):
        usuario = self.service.login(email)
        if usuario['papel'] == 'proprietario':
            proprietario_service = ProprietarioService()
            return proprietario_service.buscar_proprietario(usuario['id_usuario'])
        elif usuario['papel'] == 'profissional':
            profissional_service = ProfissionalService()
            return profissional_service.buscar_profissional(usuario['id_usuario'])
            
            
            

        
        