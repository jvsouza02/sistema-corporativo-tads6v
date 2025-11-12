import uuid
from config.database import SessionLocal
from sqlalchemy import select as Select
from codificacao.backend.src.application.entities.comentario_entity import Comentario
from src.data.models.proprietario_model import ProprietarioModel
from src.data.models.usuario_model import UsuarioModel

class ProprietarioRepository():
    def __init__(self):
        self.db = SessionLocal()

    def salvar(self, proprietario):
        try:
            # Criar usuário
            usuario_model = UsuarioModel(
                email=proprietario.email,
                papel="proprietario"
            )
            self.db.add(usuario_model)
            self.db.flush()  # Flush para gerar o ID sem fazer commit
            
            # Criar proprietário com o id_usuario
            proprietario_model = ProprietarioModel(
                id_proprietario=proprietario.id_proprietario,
                nome=proprietario.nome,
                email=proprietario.email,
                senha=proprietario.senha,
                id_usuario=usuario_model.id_usuario
            )
            self.db.add(proprietario_model)
            
            # Commit de tudo junto
            self.db.commit()
            
            # Refresh para garantir que temos todos os dados atualizados
            self.db.refresh(usuario_model)
            self.db.refresh(proprietario_model)
            
            # Retornar dicionário com dados atualizados
            return {
                'id_proprietario': proprietario_model.id_proprietario,
                'id_usuario': proprietario_model.id_usuario,
                'nome': proprietario_model.nome,
                'email': proprietario_model.email,
                'papel': 'proprietario'
            }
            
        except Exception as e:
            self.db.rollback()
            raise e

    def listar_todos(self):
        result = self.db.execute(Select(ProprietarioModel).order_by(ProprietarioModel.data_atualizacao.desc()))
        return result.scalars().all()

    def model_to_entity(self, model: ProprietarioModel):
        return {
            'id_proprietario': model.id_proprietario,
            'id_usuario': model.id_usuario,
            'nome': model.nome,
            'email': model.email,
            'papel': 'proprietario'
        }

    def buscar_por_id(self, id_usuario: str):
        proprietario = self.db.query(ProprietarioModel).filter(ProprietarioModel.id_usuario == id_usuario).first()
        return self.model_to_entity(proprietario)

    def atualizar(self, id_proprietario, nome, email, senha):
        proprietario_model = self.db.query(ProprietarioModel).filter(ProprietarioModel.id_proprietario == id_proprietario).first()
        if not proprietario_model:
            return None
        proprietario_model.nome = nome
        proprietario_model.email = email
        proprietario_model.senha = senha
        try:
            self.db.merge(proprietario_model)
            self.db.commit()
            self.db.refresh(nome, email, senha)
        except Exception as e:
            self.db.rollback()
            raise e
        return nome, email, senha

    def deletar(self, id_proprietario):
        proprietario = self.buscar_por_id(id_proprietario)
        if proprietario:
            try:
                self.db.delete(proprietario)
                self.db.commit()
            except Exception as e:
                self.db.rollback()
                raise e
        return proprietario