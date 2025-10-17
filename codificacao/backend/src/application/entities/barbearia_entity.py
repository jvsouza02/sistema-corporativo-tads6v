from uuid import uuid4
from datetime import datetime, time

class Barbearia:
    def __init__(self, nome, email, endereco, telefone, horario_abertura, horario_fechamento, descricao, foto_url=None):
        self.id_barbearias = str(uuid4())
        self.nome = nome
        self.email = email
        self.endereco = endereco
        self.telefone = telefone
        self.horario_abertura = horario_abertura
        self.horario_fechamento = horario_fechamento
        self.descricao = descricao
        self.foto_url = foto_url
        self.data_cadastro = datetime.now()
        self.data_atualizacao = datetime.now()

    # --- Métodos de verificação ---
    def verificar_nome(self):
        return bool(self.nome and self.nome.strip())

    def verificar_email(self):
        return bool(self.email and "@" in self.email and "." in self.email)

    def verificar_endereco(self):
        return bool(self.endereco and self.endereco.strip())

    def verificar_telefone(self):
        return bool(self.telefone and len(self.telefone.strip()) >= 8)

    def verificar_horario_abertura(self):
        return isinstance(self.horario_abertura, time)

    def verificar_horario_fechamento(self):
        return isinstance(self.horario_fechamento, time)

    def verificar_descricao(self):
        return bool(self.descricao and self.descricao.strip())

    def verificar_foto_url(self):
        return self.foto_url is None or self.foto_url.startswith("http")

    # --- Método principal ---
    def cadastrar_barbearia(self):
        return all([
            self.verificar_nome(),
            self.verificar_email(),
            self.verificar_endereco(),
            self.verificar_telefone(),
            self.verificar_horario_abertura(),
            self.verificar_horario_fechamento(),
            self.verificar_descricao(),
            self.verificar_foto_url()
        ])
