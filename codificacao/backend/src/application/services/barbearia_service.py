from src.application.entities.barbearia_entity import Barbearia
from src.data.repositories.barbearia_repository import BarbeariaRepository

repository = BarbeariaRepository()
class BarbeariaService:

    def cadastrar_barbearia(self, nome, email, endereco, telefone, horario_funcionamento,
                             horario_fechamento, descricao, foto_url, id_proprietario):
        existentes = repository.listar_todos()
        for b in existentes:
            if b.nome == nome or b.email == email:
                raise ValueError("Já existe uma barbearia com esse nome ou email.")
        barbearia = Barbearia(nome, email, endereco, telefone, horario_funcionamento,
                              horario_fechamento, descricao, id_proprietario, foto_url)
        if not barbearia.verificar_nome():
            raise ValueError("Barbearia inválida.")
        return repository.salvar(barbearia)
    
    def listar_barbearias_por_proprietario(self, id_proprietario):
        barbearias = repository.listar_por_proprietario(id_proprietario)
        if not barbearias:
            raise ValueError("Nenhuma barbearia encontrada para este proprietário.")
        return barbearias