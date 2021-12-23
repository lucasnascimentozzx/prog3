<?php

namespace App\Http\Controllers;

use App\Models\Recado;
use Illuminate\Http\Request;

class RecadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //listagem geral

    public function index()
    {
        $recados = Recado::orderBy('created_at', 'desc')->get();

        return view('recados.index', ['recados' => $recados, 'pagina' => 'recados']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //página de formulário para criação de recados
    public function create()
    {
        return view('recados.create', ['pagina' => 'recados']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //recebe os dados dos recados e salva no banco
    public function store(Request $form)
    {
        $recado = new Recado();
        $recado->nome = $form->nome;
        $recado->comentario = $form->comentario;

        $recado->save();

        return redirect()->route('recados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //criei mas acabei não utilizando
    public function show(Recado $recado)
    {
        return view('recados.show', ['recado' => $recado, 'pagina' => 'recados']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //retorna página para editar um recado em específico
    public function edit(Recado $recado)
    {
        return view('recados.edit', ['recado' => $recado, 'pagina' => 'recados']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //recebe os dados editas e atualiza no banco
    public function update(Request $form, Recado $recado)
    {
        $recado->nome = $form->nome;
        $recado->comentario = $form->comentario;

        $recado->save();

        return redirect()->route('recados');
    }

    //retorna página para confirmar remoção do recado
    public function remove(Recado $recado)
    {
        //confirma que o usuário está logado para impedir que ele acessse pela url
        if (session('usuario') == null) {
            return redirect()->route('recados');
        }
        return view('recados.remove', ['recado' => $recado, 'pagina' => 'recados']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //recebe a confirmação e remove o recado do banco
    public function destroy(Recado $recado)
    {
        
        //confirma que o usuário está logado para impedir que ele acessse pela url
        if (session('usuario') == null) {
            return redirect()->route('recados');
        }

        $recado->delete();
        return redirect()->route('recados');
    }
}
