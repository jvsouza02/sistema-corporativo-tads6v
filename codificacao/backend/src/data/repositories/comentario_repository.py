from datetime import datetime, time, timedelta
from config.database import SessionLocal
from sqlalchemy import select as Select
from src.application.entities.comentario_entity import Comentario
from src.data.models.comentario_model import ComentarioModel

class ComentarioRepository():
    def __init__(self):
        self.db = SessionLocal()

    def _to_dict(self, comentario: Comentario):
        """Converte entidade Comentario para dicionário"""
        return {
            "id_comentario": comentario.id_comentario,
            "comentario": comentario.comentario,
            "servico": comentario.servico,
            "produto": comentario.produto,
            "valor_total": comentario.valor_total,
            "id_barbearia": comentario.id_barbearia,
            "data_criacao": comentario.data_criacao,
            "data_atualizacao": comentario.data_atualizacao
        }

    def salvar(self, comentario: Comentario):
        """Salva um novo comentário no banco de dados"""
        comentario_salvo = ComentarioModel(
            id_comentario=comentario.id_comentario,
            comentario=comentario.comentario,
            servico=comentario.servico,
            produto=comentario.produto,
            valor_total=comentario.valor_total,
            id_barbearia=comentario.id_barbearia,
            data_criacao=comentario.data_criacao,
            data_atualizacao=comentario.data_atualizacao
        )
        try:
            self.db.add(comentario_salvo)
            self.db.commit()
            self.db.refresh(comentario_salvo)
        except Exception as e:
            self.db.rollback()
            raise e
        return self._to_dict(comentario)

    def listar_todos(self):
        """Lista todos os comentários ordenados por data de atualização"""
        result = self.db.execute(
            Select(ComentarioModel).order_by(ComentarioModel.data_atualizacao.desc())
        )
        return result.scalars().all()
    
    def listar_atendimentos_por_barbearia(self, id_barbearia: str):
        """
        Lista comentários da semana (domingo a domingo) para a barbearia informada.
        Retorna a contagem de atendimentos.
        """
        # referência: hoje em data (sem hora)
        ref_date = datetime.now().date()

        days_since_sunday = (ref_date.weekday() + 1) % 7
        start_sunday = ref_date - timedelta(days=days_since_sunday)
        next_sunday = start_sunday + timedelta(days=7)                       

        # converte para datetimes (início do dia)
        start_dt = datetime.combine(start_sunday, time.min)
        end_dt = datetime.combine(next_sunday, time.min)

        # consulta filtrando pelo intervalo [start_dt, end_dt)
        query = (
            self.db.query(ComentarioModel)
                   .filter(
                       ComentarioModel.id_barbearia == id_barbearia,
                       ComentarioModel.data_criacao >= start_dt,
                       ComentarioModel.data_criacao < end_dt
                   )
                   .order_by(ComentarioModel.data_criacao.desc())
        )

        return query.count()
    
    def buscar_por_id(self, comentario_id: str) -> ComentarioModel | None:
        """Busca um comentário pelo ID"""
        return self.db.query(ComentarioModel).filter(
            ComentarioModel.id_comentario == comentario_id
        ).first()

    def atualizar(self, id_comentario, comentario_texto, servico, produto, valor_total) -> ComentarioModel | None:
        """Atualiza um comentário existente"""
        comentario = self.buscar_por_id(id_comentario)
        if not comentario:
            return None
        
        comentario.comentario = comentario_texto
        comentario.servico = servico
        comentario.produto = produto
        comentario.valor_total = valor_total

        try:
            self.db.merge(comentario)
            self.db.commit()
            self.db.refresh(comentario)
        except Exception as e:
            self.db.rollback()
            raise e
        
        return comentario

    def deletar(self, comentario_id: str) -> ComentarioModel | None:
        """Deleta um comentário"""
        comentario = self.buscar_por_id(comentario_id)
        if comentario:
            try:
                self.db.delete(comentario)
                self.db.commit()
            except Exception as e:
                self.db.rollback()
                raise e
        return comentario