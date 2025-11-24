<?php

namespace App\Helpers;

use App\Models\User;

class AuthHelper
{
    /**
     * CT006 e CT007: Valida credenciais de login
     */
    public static function validarCredenciais(string $email, string $password): bool
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return false;
        }

        return password_verify($password, $user->password);
    }

    /**
     * CT006: Verifica se o email existe
     */
    public static function emailExiste(string $email): bool
    {
        return User::where('email', $email)->exists();
    }

    /**
     * CT007: Retorna mensagem de erro para credenciais inválidas
     */
    public static function mensagemErroLogin(): string
    {
        return 'Usuário não encontrado';
    }
}
