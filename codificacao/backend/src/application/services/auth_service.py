from src.data.repositories.usuario_repository import UsuarioRepository

repository = UsuarioRepository()

class AuthService:
    def login(self, email: str):
        usuario = repository.get_by_email(email)
        if not usuario:
            raise ValueError("Usuario nao encontrado.")
        return usuario