<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'asc')->get();
        return view('usuarios.index', ['usuarios' => $usuarios, 'pagina' => 'usuarios']);
    }

    public function create()
    {
        return view('usuarios.create', ['pagina' => 'usuarios']);
    }

    public function insert(Request $form)
    {
        $usuario = new Usuario();

        $usuario->nome = $form->nome;
        $usuario->email = $form->email;
        $usuario->usuario = $form->usuario;
        $usuario->password = Hash::make($form->password);
        $usuario->save();
        event(new Registered($usuario));
        $this->login($form);
        return redirect()->route('verification.notice');
    }

    // Ações de login
    public function login(Request $form)
    {
        // Está enviando o formulário
        if ($form->isMethod('POST'))
        {
            $credenciais = $form->validate([
                'usuario' => ['required'],
                'password' => ['required'],
                ]);
               
                // Tenta o login
                if (Auth::attempt($credenciais, $form->remeber == "remember-me"))
                {
                    session()->regenerate();
                    return redirect()->route('home');
                }
                else 
                {
                    return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos.');
                }

        }

        return view('usuarios.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function show()
    {
        return view('usuarios.show', ['pagina' => 'usuarios']);
    }

    public function edit(Request $form)
    {
        if ($form->isMethod('POST'))
        {
            $usuario = Auth::user();
            if($form->email != Auth::user()->email)
            {
                $usuario->email_verified_at = null;
                event(new Registered($usuario));
            }
            $usuario->nome = $form->nome;
            $usuario->email = $form->email;
            $usuario->usuario = $form->usuario;
          
            $usuario->save();
            return view('usuarios.show', ['pagina' => 'usuarios']);
        } else {
            return view('usuarios.edit', ['pagina' => 'usuarios']);
        }
    }

    public function password(Request $form)
    {
        if ($form->isMethod('POST'))
        {
            $usuario = Auth::user();
         
            if (!Hash::check($form->oldPassword, Auth::user()->password))
            {
                return view('usuarios.password', ['pagina' => 'password', 'erro' => "Senha antiga incorreta"]);
            }

            if ($form->newPassword != $form->newPasswordConfirm)
            {
                return view('usuarios.password', ['pagina' => 'password', 'erro' => "As senhas digitadas não conferem"]);
            }

            $usuario->password = Hash::make($form->newPassword);         
            $usuario->save();

            return view('usuarios.show', ['pagina' => 'usuarios']);
        } else {
            return view('usuarios.password', ['pagina' => 'usuarios', 'erro' => "Senha antiga incorreta"]);
        }
    }
}
