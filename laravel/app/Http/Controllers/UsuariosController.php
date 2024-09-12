<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index() {
        // Concatenar comandos para ordenar e filtrar por nome
        // $dados = Usuario::orderBy('name', 'asc')->where('name', 'fulano')->get();
        $dados = Usuario::orderBy('name', 'asc')->get();
        return view('usuarios/index', [
            'usuarios' => $dados,
        ]);
    }

    public function cadastrar() {
        return view('usuarios/cadastrar');
    }

    public function gravar(Request $form) {
        $dados = $form->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email',
            'username' => 'required|max:255|unique:usuarios,username',
            'password' => 'required|min:6',
            'admin' => 'nullable|boolean'  // Admin opcional, pois na migration tem um default
        ]);

        // Codificando a senha
        $dados['password'] = Hash::make($dados['password']);

        // Definindo o valor padrão para admin se não for fornecido
        $dados['admin'] = $dados['admin'] ?? false;

        // Criando um registro dentro da model Usuario
        Usuario::create($dados);
        
        return redirect()->route('usuarios')->with('sucesso', 'Usuário criado com sucesso!');
    }

    public function apagar(Usuario $usuario) {
        $usuario->delete();
        return redirect()->route('usuarios')->with('sucesso', 'Usuário excluído com sucesso!');
    }

    public function login(Request $form) {
        if($form->isMethod('POST')) {
            $credenciais = $form->validate([
                'username' => 'required',
                'password' => 'required'
            ]);

            // Tentar fazer o login
            if (Auth::attempt($credenciais)) {
                return redirect()->intended(route('index'));
            } else {
                return redirect()->route('login')
                    ->with('erro', 'Usuário ou senha inválidos');
            }
        }

        return view('usuarios.login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index')->with('sucesso', 'Logout realizado com sucesso!');
    }
}
