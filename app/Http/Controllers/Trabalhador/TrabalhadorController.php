<?php

namespace App\Http\Controllers\Trabalhador;

use App\Models\Seguranca\Endereco;
use App\Http\Controllers\Controller;
use App\Models\Trabalhos\Portfolios;
use App\Models\Trabalhos\Proposta;
use App\Models\Trabalhos\Trabalhos;
use App\Models\Seguranca\User;
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
            'email'         => 'required|email|unique:tb_usuario',
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
        $user->senha            = Hash::make($request->senha);
        $user->status           = 1;
        $user->celular          = $request->telefone;
        $user->id_tipo_usuario  = 2;
        $user->save();


        $endereco = new Endereco();
        $endereco->cidade       = $request->cidade;
        $endereco->cep          = $request->cep;
        $endereco->bairro       = $request->bairro;
        $endereco->rua          = $request->rua;
        $endereco->numero       = $request->num_casa;
        $endereco->complemento  = $request->complemento;
        $endereco->id_usuario   = $user->id_usuario;
        $endereco->save();

        return redirect( route("login"))->with("sucesso", "Registro efetuado com sucesso!");
    }

    public function perfil_privado()
    {
        $user = Auth::user();

        $propostas = null;

        $portfolios = null;

        if($user->id_tipo_usuario !== 2){
            return redirect( route("home"))->with("error", "Seu usuário não pode acessar esta página.");
        }

        $endereco = Endereco::where("id_usuario",$user->id_usuario)->first();

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

        $portfolios = Portfolios::where("id_usuario",$user->id_usuario)->get();

        foreach($portfolios as $port){
            $trabalhos = Trabalhos::where("id_portfolio",$port->id_portfolio)->get();
            foreach($trabalhos as $trab){
                $props[] = Proposta::where("id_trabalho",$trab->id_trabalho)->orderBy("created_at")->get();
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

        if($proposta->id_proposta_status !== 1 && $proposta->trabalhos->portfolio->id_usuario !== $user->id_usuario){
            return redirect()->back()->with("error", "Você não pode executar esta ação.");
        }

        $proposta->id_proposta_status = 2;
        $proposta->save();

        return redirect()->back()->with("sucesso","Proposta Aceita com sucesso! Seu contato será liberado para o cliente.");

    }

    public function recusar_proposta($id)
    {
        $proposta = Proposta::find($id);

        $user = Auth::user();

        if($proposta->id_proposta_status !== 1 && $proposta->trabalhos->portfolio->id_usuario !== $user->id_usuario){
            return redirect()->back()->with("error", "Você não pode executar esta ação.");
        }

        
        $proposta->id_proposta_status = 3;
        $proposta->save();

        return redirect()->back()->with("sucesso","Proposta Recusada com sucesso!");

    }


    public function portfolio($id){
        
    }
}
