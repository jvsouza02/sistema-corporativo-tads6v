from uuid import uuid4

class Profissional:
    def __init__(self, nome, email, horario_inicio, horario_fim, id_barbearia):
        self.id_profissional = str(uuid4())
        self.nome = nome
        self.email = email
        self.horario_inicio = horario_inicio
        self.horario_fim = horario_fim
        self.id_barbearia = id_barbearia

    def vefificar_nome(self):
        return bool(self.nome and self.nome.strip())
    
    def verificar_horario(self):
        return bool(self.horario_inicio and self.horario_fim)