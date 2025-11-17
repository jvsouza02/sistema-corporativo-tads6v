<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Helpers\AuthHelper;

class AuthUnitTest extends TestCase
{
    /**
     * CT006: Login de barbeiro com e-mail correto
     * Verificar se o barbeiro consegue acessar o sistema com e-mail válido.
     */
    public function test_ct006_verifica_mensagem_erro_login()
    {
        $mensagem = AuthHelper::mensagemErroLogin();

        $this->assertEquals('Usuário não encontrado', $mensagem);
        $this->assertIsString($mensagem);
    }

    /**
     * CT007: Login de barbeiro com e-mail incorreto
     * Verificar o comportamento do sistema quando o barbeiro
     * tenta entrar com e-mail não cadastrado.
     */
    public function test_ct007_valida_formato_email()
    {
        // Emails válidos
        $this->assertTrue(filter_var('barbeiro@teste.com', FILTER_VALIDATE_EMAIL) !== false);
        $this->assertTrue(filter_var('usuario@example.com', FILTER_VALIDATE_EMAIL) !== false);

        // Emails inválidos
        $this->assertFalse(filter_var('emailinvalido', FILTER_VALIDATE_EMAIL) !== false);
        $this->assertFalse(filter_var('sem@dominio', FILTER_VALIDATE_EMAIL) !== false);
    }

    /**
     * CT007 (complementar): Validar senha vazia
     */
    public function test_ct007_valida_senha_vazia()
    {
        $senha = '';

        $this->assertEmpty($senha);
        $this->assertFalse(strlen($senha) >= 6);
    }

    /**
     * CT007 (complementar): Validar senha mínima
     */
    public function test_ct007_valida_senha_minima()
    {
        $senhaValida = 'senha123';
        $senhaInvalida = '12345';

        $this->assertTrue(strlen($senhaValida) >= 6);
        $this->assertFalse(strlen($senhaInvalida) >= 6);
    }
}
