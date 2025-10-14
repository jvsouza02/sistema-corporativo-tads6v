from uuid import uuid4

class Profissional:
    def __init__(self, nome, horario_trabalho):
        self.id_profissional = str(uuid4())
        self.nome = nome
        self.horario_trabalho = horario_trabalho

    def vefificar_nome(self):
        return bool(self.nome and self.nome.strip())
    
    def verificar_horario(self):
        return bool(self.horario_trabalho and self.horario_trabalho.strip())