<?php

namespace App\Http\Controllers\Trabalhador;

use App\Http\Controllers\Controller;
use App\Portfolios;
use App\Proposta;
use App\Trabalhos;
use DateTime;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class TrabalhosController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        
        $portfolios = Portfolios::where("users_id", $user->id)->get();
        
        return view("pages/trabalhador/cadastrar_trabalho", compact("portfolios"));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            "nome"      => "required",
            "descricao" => "required",
            "imagem"    => "required",
            "portfolio" => "required"
        ]);


        $user = Auth::user();
        
        
        $trab = new Trabalhos();
        $trab->nome         = $request->nome;
        $trab->descricao    = $request->descricao;
        $trab->status       = 1;
        $trab->portfolio_id = $request->portfolio;
        
        
        if($request->hasFile("imagem")){
            
            $img = $request->imagem;
            $extensao = $img->extension();
            
            if($extensao != "png" || $extensao == "jpg" || $extensao == "jpeg"){
                return redirect(route("cadastrar_trabalho"))->with("error", "O arquivo enviado deve ser .PNG ou .JPG");
            }
            
            
            $nome_imagem = $user->id."_trabalho".$request->portfolio.$trab->id;
            
            $nom_ext = $nome_imagem.".".$extensao;
            
            $request->imagem->move(public_path("imagens/trabalhos"), $nom_ext);
            
            $trab->save();
            $trab->image_url   = $nome_imagem;
            $trab->image_type  = $extensao;
        }else{
            return redirect(route("cadastrar_trabalho"))->with("error", "O arquivo enviado não é válido.");
        }
        $trab->save();
        
        return redirect(route("show_portfolio",$request->portfolio))->with("sucesso","Trabalho cadastrado com Sucesso!");
    }
    
    public function show($id)
    {
        $user = Auth::user();
        $trabalho = Trabalhos::find($id);

        return view("pages/trabalhador/trabalho_show", compact("trabalho", "user"));
    }

    public function proposta($id)
    {
        $proposta = Proposta::find($id);

        $created_at = date_format($proposta->created_at,"d/m/Y H:i:s");

        if($proposta->updated_at !== null){
            $updated_at = date_format($proposta->updated_at,"d/m/Y H:i:s");
        }else{
            $updated_at = "Não houve resposta.";
        }

        return view("pages/trabalhador/proposta", compact("proposta","created_at","updated_at"));

    }
}
