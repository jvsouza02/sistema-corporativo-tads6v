import unittest
from unittest.mock import Mock
from src.application.services.comentario_service import ComentarioService

class TestComentario(unittest.TestCase):
    
    def setUp(self):
        self.mock_repository = Mock()
        self.service = ComentarioService(self.mock_repository)
    
    def test_ct001_registrar_atendimento_sem_itens(self):
        comentario_texto = "Atendimento teste"
        servico = None
        produto = None
        valor_total = 0.0
        id_barbearia = "barber-123"
        
        with self.assertRaises(ValueError) as context:
            self.service.adicionar_comentario(
                comentario_texto, servico, produto, valor_total, id_barbearia
            )
        
        self.assertIn(
            "É obrigatório escolher pelo menos um serviço ou produto",
            str(context.exception)
        )
        
        self.mock_repository.salvar.assert_not_called()
    
    def test_ct002_registrar_atendimento_com_itens_valor_zero(self):
        
        comentario_texto = "Atendimento com itens gratuitos e pagos"
        servico = "Corte gratuito + Barba"
        produto = "Pomada gratuita"
        valor_total = 25.00
        id_barbearia = "barber-123"
        
        self.mock_repository.salvar.return_value = {
            "id_comentario": "test-id",
            "comentario": comentario_texto,
            "servico": servico,
            "produto": produto,
            "valor_total": 25.00,
            "id_barbearia": id_barbearia
        }
        
        resultado = self.service.adicionar_comentario(
            comentario_texto, servico, produto, valor_total, id_barbearia
        )
        
        self.mock_repository.salvar.assert_called_once()
        self.assertEqual(resultado["valor_total"], 25.00)
    
    def test_ct003_calcular_valor_total_com_casas_decimais(self):
        comentario_texto = "Atendimento com valores decimais"
        servico = "Corte + Barba"
        produto = "Pomada"
        valor_total = 77.15
        id_barbearia = "barber-123"
        
        self.mock_repository.salvar.return_value = {
            "id_comentario": "test-id",
            "comentario": comentario_texto,
            "servico": servico,
            "produto": produto,
            "valor_total": 77.15,
            "id_barbearia": id_barbearia
        }
        
        # Act
        resultado = self.service.adicionar_comentario(
            comentario_texto, servico, produto, valor_total, id_barbearia
        )
        
        # Assert
        self.assertEqual(resultado["valor_total"], 77.15)
        self.assertIsInstance(resultado["valor_total"], float)
    
    def test_ct004_editar_atendimento_e_atualizar_valor_total(self):
        comentario_id = "coment-123"

        comentario_existente = Mock()
        comentario_existente.id_comentario = comentario_id
        comentario_existente.comentario = "Atendimento original"
        comentario_existente.servico = "Corte + Barba"
        comentario_existente.produto = None
        comentario_existente.valor_total = 60.00
        
        self.mock_repository.buscar_por_id.return_value = comentario_existente
        self.mock_repository.atualizar.return_value = comentario_existente

        novo_valor = 55.00  # Corte (35.00) + Pomada (20.00)
        self.service.editar_comentario(
            comentario_id,
            novo_texto="Atendimento editado",
            servico="Corte",
            produto="Pomada",
            valor_total=novo_valor
        )
        
        self.mock_repository.buscar_por_id.assert_called_once_with(comentario_id)
        self.mock_repository.atualizar.assert_called_once()
        self.assertEqual(comentario_existente.valor_total, 55.00)
    
    def test_ct005_impedir_valor_negativo_no_atendimento(self):
        comentario_texto = "Tentativa com valor negativo"
        servico = "Corte"
        produto = None
        valor_total = -10.00
        id_barbearia = "barber-123"

        with self.assertRaises(ValueError) as context:
            self.service.adicionar_comentario(
                comentario_texto, servico, produto, valor_total, id_barbearia
            )
        
        # Verificar mensagem de erro
        self.assertIn("valor negativo", str(context.exception).lower())
        
        self.mock_repository.salvar.assert_not_called()

if __name__ == '__main__':
    unittest.main(verbosity=2)