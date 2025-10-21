from config.database import SessionLocal
from sqlalchemy import select as Select
from src.application.entities.barbearia_entity import Barbearia
from src.data.models.barbearia_model import BarbeariaModel

class BarbeariaRepository():
    def __init__(self):
        self.db = SessionLocal()

    def _to_entity(self, model: BarbeariaModel):
        return (str(model.id_barbearia), str(model.nome), str(model.email), str(model.endereco),
                str(model.telefone), str(model.horario_abertura), str(model.horario_fechamento),
                str(model.descricao), str(model.foto_url), str(model.id_proprietario), model.data_cadastro, model.data_atualizacao)

    def salvar(self, nova_barbearia):
        nova_barbearia = BarbeariaModel(
            id_barbearia=nova_barbearia.id_barbearia,
            nome=nova_barbearia.nome,
            email=nova_barbearia.email,
            endereco=nova_barbearia.endereco,
            telefone=nova_barbearia.telefone,
            horario_abertura=nova_barbearia.horario_abertura,
            horario_fechamento=nova_barbearia.horario_fechamento,
            descricao=nova_barbearia.descricao,
            foto_url=nova_barbearia.foto_url,
            id_proprietario=nova_barbearia.id_proprietario
        )
        try:
            self.db.add(nova_barbearia)
            self.db.commit()
        except Exception as e:
            self.db.rollback()
            raise e
        return nova_barbearia

    def listar_todos(self):
        result = self.db.execute(Select(BarbeariaModel).order_by(BarbeariaModel.data_atualizacao.desc()))
        return result.scalars().all()

    # def buscar_por_id(self, comentario_id: str):
    #     return self.db.query(ComentarioModel).filter(ComentarioModel.id_comentario == comentario_id).first()

    # def atualizar(self, id_comentario, comentario):
    #     comentario_model = self.db.query(ComentarioModel).filter(ComentarioModel.id_comentario == id_comentario).first()
    #     if not comentario_model:
    #         return None
    #     comentario_model.comentario = comentario
    #     try:
    #         self.db.merge(comentario_model)
    #         self.db.commit()
    #         self.db.refresh(comentario)
    #     except Exception as e:
    #         self.db.rollback()
    #         raise e
    #     return comentario

    # def deletar(self, comentario_id: str):
    #     comentario = self.buscar_por_id(comentario_id)
    #     if comentario:
    #         try:
    #             self.db.delete(comentario)
    #             self.db.commit()
    #         except Exception as e:
    #             self.db.rollback()
    #             raise e
    #     return comentario