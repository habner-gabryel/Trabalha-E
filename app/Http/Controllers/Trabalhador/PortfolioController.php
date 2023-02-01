<?php

namespace App\Http\Controllers\Trabalhador;

use App\Categorias;
use App\Http\Controllers\Controller;
use App\Portfolios;
use App\Trabalhos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function create()
    {
        $categorias = Categorias::get();

        return view("pages/trabalhador/cadastrar_portfolio", compact("categorias"));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'categoria' => 'required',
            'descricao' => 'required'
        ]);

        $user = Auth::user();

        $portf = new Portfolios();

        $portf->id_usuario      = $user->id_usuario;
        $portf->id_categoria    = $request->categoria;
        $portf->status          = 1;
        $portf->descricao       = $request->descricao;
        $portf->save();

        return redirect(route("show_portfolio",$portf->id))->with("sucesso", "Portfolio Criado com Sucesso!");
    }

    public function show($id)
    {
        $portf = Portfolios::find($id);

        $trabalhos = Trabalhos::where("id_portfolio",$portf->id_portfolio)->get();

        return view("pages/trabalhador/portfolio_show", compact("portf","trabalhos"));
    }

}
