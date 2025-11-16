<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proprietario;
use App\Models\Barbeiro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPOST(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
        return redirect()->route('login')->with('error', 'Credenciais inválidas');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPOST(Request $request)
    {
        $dados = $request->all();
        try {
            $newUser = User::create([
                'name' => $dados['nome'],
                'email' => $dados['email'],
                'password' => bcrypt($dados['senha']),
                'role' => $dados['role']
            ]);

            switch ($newUser->role) {
                case 'proprietario':
                    Proprietario::create([
                        'id_proprietario' => Str::uuid(),
                        'nome' => $dados['nome'],
                        'user_id' => $newUser->id
                    ]);
                    break;
                case 'barbeiro':
                    Barbeiro::create([
                        'id_barbeiro' => Str::uuid(),
                        'nome' => $dados['nome'],
                        'horario_inicio' => $dados['horario_inicio'],
                        'horario_fim' => $dados['horario_fim'],
                        'id_barbearia' => $dados['id_barbearia'],
                        'user_id' => $newUser->id
                    ]);
                    return redirect()->back()->with('success', 'Barbeiro cadastrado com sucesso');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        Auth::login($newUser);
        return redirect()->route('home');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
