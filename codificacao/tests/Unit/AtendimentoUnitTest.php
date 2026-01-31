<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Atendimento;
use App\Models\Servico;
use Illuminate\Database\Eloquent\Collection;
use Mockery;

class AtendimentoUnitTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /**
     * CT001: Registrar atendimento sem itens
     * Verificar o que acontece quando o barbeiro tenta registrar
     * um atendimento sem escolher nenhum serviço ou produto.
     */
    public function test_ct001_verifica_se_atendimento_tem_servico()
    {
        // Atendimento COM serviço
        $atendimentoComServico = new Atendimento(['valor_total' => 30.00]);

        // Mock da relação servicos com 1 item
        $servicoMock = Mockery::mock(Servico::class);
        $collectionComServico = new Collection([$servicoMock]);
        $atendimentoComServico->setRelation('servicos', $collectionComServico);

        $this->assertTrue($atendimentoComServico->temServico());

        // Atendimento SEM serviço
        $atendimentoSemServico = new Atendimento(['valor_total' => 0.00]);

        // Mock da relação servicos vazia
        $collectionSemServico = new Collection([]);
        $atendimentoSemServico->setRelation('servicos', $collectionSemServico);

        $this->assertFalse($atendimentoSemServico->temServico());
    }

    /**
     * CT002: Registrar atendimento com itens de valor zero
     * Verificar se o sistema calcula corretamente o total
     * quando há itens com preço igual a zero.
     */
    public function test_ct002_aceita_valor_zero()
    {
        $atendimento = new Atendimento([
            'valor_total' => 0.00
        ]);

        $this->assertEquals(0.00, $atendimento->calcularValorTotal());
        $this->assertTrue($atendimento->valorEhValido());
    }

    /**
     * CT003: Calcular valor total com casas decimais
     * Confirmar se o sistema soma corretamente os valores
     * quando há números com centavos.
     */
    public function test_ct003_calcula_valores_decimais_corretamente()
    {
        $atendimento = new Atendimento([
            'valor_total' => 45.75
        ]);

        $this->assertEquals(45.75, $atendimento->calcularValorTotal());
        $this->assertTrue($atendimento->valorComDecimaisCorreto());

        // Aceita string ou numeric devido ao cast decimal:2
        $this->assertIsNumeric($atendimento->valor_total);
    }

    /**
     * CT004: Precisão com múltiplos valores decimais
     */
    public function test_ct004_precisao_com_multiplos_decimais()
    {
        $atendimento = new Atendimento([
            'valor_total' => 73.50
        ]);

        $valorCalculado = $atendimento->calcularValorTotal();

        $this->assertEquals(73.50, $valorCalculado);
        $this->assertEquals('73.50', number_format($valorCalculado, 2, '.', ''));
    }

    /**
     * CT005: Editar atendimento e atualizar valor total
     * Verificar se o sistema recalcula o valor total automaticamente
     * quando o atendimento é editado.
     */
    public function test_ct005_atualiza_valor_ao_editar()
    {
        $atendimento = new Atendimento([
            'valor_total' => 30.00
        ]);

        $this->assertEquals(30.00, (float) $atendimento->valor_total);

        // Editar o valor (sem salvar no banco em teste unitário)
        $atendimento->atualizarValor(52.00);

        $this->assertEquals(52.00, (float) $atendimento->valor_total);
        $this->assertEquals(52.00, $atendimento->calcularValorTotal());
    }

    /**
     * CT006: Impedir valor negativo no atendimento
     * Garantir que o sistema não aceite itens com valor negativo.
     */
    public function test_ct006_detecta_valor_negativo()
    {
        $atendimento = new Atendimento([
            'valor_total' => -50.00
        ]);

        $this->assertTrue($atendimento->valorEhNegativo());
        $this->assertFalse($atendimento->valorEhValido());
    }

    /**
     * CT007: Aceitar valores positivos
     */
    public function test_ct007_aceita_valor_positivo()
    {
        $atendimento = new Atendimento([
            'valor_total' => 50.00
        ]);

        $this->assertFalse($atendimento->valorEhNegativo());
        $this->assertTrue($atendimento->valorEhValido());
    }
}
