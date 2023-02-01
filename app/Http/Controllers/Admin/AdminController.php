<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trabalhos\Categorias;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create()
    {
        return view("pages/admin/cadastrar_categoria");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome'      => 'required|unique:tb_categoria',
            'descricao' => 'required'
        ]);

        $cat = new Categorias();
        $cat->nome      = $request->nome;
        $cat->descricao = $request->descricao;
        $cat->save();

        return redirect(route("home"))->with("sucesso", "Categoria Adicionada com Sucesso!");
    }

}
