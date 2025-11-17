<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Atendimento;

class AtendimentoUnitTest extends TestCase
{
    /**
     * CT001: Registrar atendimento sem itens
     * Verificar o que acontece quando o barbeiro tenta registrar
     * um atendimento sem escolher nenhum serviço ou produto.
     */
    public function test_ct001_verifica_se_atendimento_tem_servico()
    {
        // Atendimento COM serviço
        $atendimentoComServico = new Atendimento(['servico' => 'Corte Social']);
        $this->assertTrue($atendimentoComServico->temServico());

        // Atendimento SEM serviço
        $atendimentoSemServico = new Atendimento(['servico' => '']);
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
            'servico' => 'Corte Social',
            'produto' => 'Nenhum',
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
            'servico' => 'Corte + Barba',
            'produto' => 'Pomada',
            'valor_total' => 45.75
        ]);

        $this->assertEquals(45.75, $atendimento->calcularValorTotal());
        $this->assertTrue($atendimento->valorComDecimaisCorreto());
        $this->assertIsFloat($atendimento->valor_total);
    }

    /**
     * CT003 (complementar): Precisão com múltiplos valores decimais
     */
    public function test_ct003_precisao_com_multiplos_decimais()
    {
        $atendimento = new Atendimento([
            'servico' => 'Corte Degradê',
            'produto' => 'Gel',
            'valor_total' => 73.50
        ]);

        $valorCalculado = $atendimento->calcularValorTotal();

        $this->assertEquals(73.50, $valorCalculado);
        $this->assertEquals('73.50', number_format($valorCalculado, 2, '.', ''));
    }

    /**
     * CT004: Editar atendimento e atualizar valor total
     * Verificar se o sistema recalcula o valor total automaticamente
     * quando o atendimento é editado.
     */
    public function test_ct004_atualiza_valor_ao_editar()
    {
        $atendimento = new Atendimento([
            'servico' => 'Corte Social',
            'produto' => 'Nenhum',
            'valor_total' => 30.00
        ]);

        $this->assertEquals(30.00, $atendimento->valor_total);

        // Editar o valor
        $atendimento->atualizarValor(52.00);

        $this->assertEquals(52.00, $atendimento->valor_total);
        $this->assertEquals(52.00, $atendimento->calcularValorTotal());
    }

    /**
     * CT005: Impedir valor negativo no atendimento
     * Garantir que o sistema não aceite itens com valor negativo.
     */
    public function test_ct005_detecta_valor_negativo()
    {
        $atendimento = new Atendimento([
            'servico' => 'Corte Social',
            'valor_total' => -50.00
        ]);

        $this->assertTrue($atendimento->valorEhNegativo());
        $this->assertFalse($atendimento->valorEhValido());
    }

    /**
     * CT005 (complementar): Aceitar valores positivos
     */
    public function test_ct005_aceita_valor_positivo()
    {
        $atendimento = new Atendimento([
            'servico' => 'Corte Social',
            'valor_total' => 50.00
        ]);

        $this->assertFalse($atendimento->valorEhNegativo());
        $this->assertTrue($atendimento->valorEhValido());
    }
}
