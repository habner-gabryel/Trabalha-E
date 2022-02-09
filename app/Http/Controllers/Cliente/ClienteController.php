<?php

namespace App\Http\Controllers\Cliente;

use App\Endereco;
use App\Http\Controllers\Controller;
use App\Proposta;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function register()
    {
        return view("pages/cliente/register");
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
        $user->tipo_usuarios_id = 3;
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

    public function efetuar_proposta(Request $request)
    {
       $this->validate($request, [
           'cliente_id'     => 'required',
           'trabalhos_id'   => 'required',
           'proposta'       => 'required',
           'titulo'         => 'required'
       ]);

       $date = new DateTime();
       $date->format('Y-m-d H:i:s');

       $proposta = new Proposta();
       $proposta->nome_proposta         = $request->titulo;
       $proposta->descricao             = $request->proposta;
       $proposta->trabalhos_id          = intval($request->trabalhos_id);
       $proposta->users_id              = $request->cliente_id;
       $proposta->created_at            = $date;
       $proposta->updated_at            = null;
       $proposta->status_propostas_id   = 1;
       $proposta->save();

       return redirect()->back()->with("sucesso", "Sua Proposta foi enviada com sucesso!");
    }

    public function perfil_privado()
    {
        
        $user = Auth::user();

        if($user->tipo_usuarios_id !== 3){
            return redirect( route("home"))->with("error", "Seu usuário não pode acessar esta página.");
        }

        $endereco = Endereco::where("users_id",$user->id)->first();

        $cidade_id = $endereco->cidade;

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
        }

        $propostas = Proposta::where("users_id",$user->id)->orderBy("created_at")->get();

        return view("pages/cliente/perfil", compact("user", "endereco","cidade","propostas"));
    }
}
