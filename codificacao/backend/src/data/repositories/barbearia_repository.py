from tokenize import String
from config.database import SessionLocal
from sqlalchemy import UUID, select as Select
from src.application.entities.barbearia_entity import Barbearia
from src.data.models.barbearia_model import BarbeariaModel

class BarbeariaRepository:
    def __init__(self):
        self.db = SessionLocal()

    def _to_entity(self, model: BarbeariaModel):
        return {
            "id_barbearia": str(model.id_barbearia),
            "nome": model.nome,
            "email": model.email,
            "endereco": model.endereco,
            "telefone": model.telefone,
            "horario_abertura": model.horario_abertura,
            "horario_fechamento": model.horario_fechamento,
            "descricao": model.descricao,
            "foto_url": model.foto_url,
            "id_proprietario": str(model.id_proprietario),
            "data_cadastro": model.data_cadastro.isoformat(),
            "data_atualizacao": model.data_atualizacao.isoformat()
        }

    def salvar(self, barbearia_entity):
        model = BarbeariaModel(
            nome=barbearia_entity.nome,
            email=barbearia_entity.email,
            endereco=barbearia_entity.endereco,
            telefone=barbearia_entity.telefone,
            horario_abertura=barbearia_entity.horario_abertura, 
            horario_fechamento=barbearia_entity.horario_fechamento,
            descricao=barbearia_entity.descricao,
            foto_url=barbearia_entity.foto_url,
            id_proprietario=barbearia_entity.id_proprietario
        )
        try:
            self.db.add(model)
            self.db.commit()
            self.db.refresh(model)
            return self._to_entity(model)
        except Exception as e:
            self.db.rollback()
            raise e

    def listar_todos(self):
        try:
            result = self.db.query(BarbeariaModel).all()
            return [self._to_entity(m) for m in result]
        except Exception as e:
            raise e
        
    def listar_por_proprietario(self, id_proprietario: str):
        try:
            barbearias = (
                self.db.query(BarbeariaModel)
                .filter(BarbeariaModel.id_proprietario == id_proprietario)
                .all()
            )
            return [self._to_entity(b) for b in barbearias]
        except Exception as e:
            raise e
        
    def buscar_por_id(self, id_barbearia: str):
        try:
            result = self.db.query(BarbeariaModel).filter(BarbeariaModel.id_barbearia == id_barbearia).first()
            return self._to_entity(result)
        except Exception as e:
            raise e