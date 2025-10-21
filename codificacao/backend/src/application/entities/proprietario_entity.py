from uuid import uuid4

class Proprietario:
    def __init__(self, nome, email, senha):
        self.id_proprietario = str(uuid4())
        self.nome = nome
        self.email = email
        self.senha = senha
    
    def verificar_proprietario(self):
        return bool(self.nome and self.email and self.senha)
    