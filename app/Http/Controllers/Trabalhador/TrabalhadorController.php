<?php

namespace App\Http\Controllers\Trabalhador;

use App\Endereco;
use App\Http\Controllers\Controller;
use App\Portfolios;
use App\Proposta;
use App\Trabalhos;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TrabalhadorController extends Controller
{
    public function register()
    {
        return view("pages/trabalhador/register");
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nome_completo' => 'required',
            'email'         => 'required|email|unique:users',
            'telefone'      => 'required',
            'senha'         => 'required|min:8',
            'cidade'        => 'required',
            'cep'           => 'required',
            'bairro'        => 'required',
            'rua'           => 'required',
            'num_casa'      => 'required',
            'complemento'   => 'nullable'
        ]);

        $user = new User();
        $user->nome             = $request->nome_completo;
        $user->email            = $request->email;
        $user->password         = Hash::make($request->senha);
        $user->status           = 1;
        $user->celular          = $request->telefone;
        $user->tipo_usuarios_id = 2;
        $user->save();


        $endereco = new Endereco();
        $endereco->cidade       = $request->cidade;
        $endereco->cep          = $request->cep;
        $endereco->bairro       = $request->bairro;
        $endereco->rua          = $request->rua;
        $endereco->numero       = $request->num_casa;
        $endereco->complemento  = $request->complemento;
        $endereco->users_id     = $user->id;
        $endereco->save();

        return redirect( route("login"))->with("sucesso", "Registro efetuado com sucesso!");
    }

    public function perfil_privado()
    {
        $user = Auth::user();

        $propostas = null;

        $portfolios = null;

        if($user->tipo_usuarios_id !== 2){
            return redirect( route("home"))->with("error", "Seu usuário não pode acessar esta página.");
        }

        $endereco = Endereco::where("users_id",$user->id)->first();

        if($endereco !== null){
            $cidade_id = $endereco->cidade;
        }else{
            $cidade_id = 0;
        }

        if($cidade_id == 1){
            $cidade = "Medianeira-PR";
        }elseif($cidade_id == 2){
            $cidade = "Matelândia-PR";
        }elseif($cidade_id == 3){
            $cidade = "São Miguel do Iguaçu-PR";
        }elseif($cidade_id == 4){
            $cidade = "Missal-PR";
        }elseif($cidade_id == 5){
            $cidade = "Serranópolis-PR";
        }elseif($cidade_id == 6){
            $cidade = "Itaipulândia-PR";
        }else{
            $cidade = "";
        }

        $portfolios = Portfolios::where("users_id",$user->id)->get();

        foreach($portfolios as $port){
            $trabalhos = Trabalhos::where("portfolio_id",$port->id)->get();
            foreach($trabalhos as $trab){
                $props[] = Proposta::where("trabalhos_id",$trab->id)->orderBy("created_at")->get();
                foreach($props as $proposta){
                    foreach($proposta as $p){
                        $propostas[] = $p;
                    }
                }
            }
        }

        return view("pages/trabalhador/perfil", compact("user", "endereco","cidade","propostas","portfolios"));
    }

    public function aceitar_proposta($id)
    {
        $proposta = Proposta::find($id);

        $user = Auth::user();

        if($proposta->status_propostas_id !== 1 && $proposta->trabalhos->portfolio->users_id !== $user->id){
            return redirect()->back()->with("error", "Você não pode executar esta ação.");
        }

        $proposta->status_propostas_id = 2;
        $proposta->save();

        return redirect()->back()->with("sucesso","Proposta Aceita com sucesso! Seu contato será liberado para o cliente.");

    }

    public function recusar_proposta($id)
    {
        $proposta = Proposta::find($id);

        $user = Auth::user();

        if($proposta->status_propostas_id !== 1 && $proposta->trabalhos->portfolio->users_id !== $user->id){
            return redirect()->back()->with("error", "Você não pode executar esta ação.");
        }

        
        $proposta->status_propostas_id = 3;
        $proposta->save();

        return redirect()->back()->with("sucesso","Proposta Recusada com sucesso!");

    }


    public function portfolio($id){
        
    }
}
