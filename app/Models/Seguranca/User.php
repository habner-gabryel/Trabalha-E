<?php

namespace App\Models\Seguranca;  

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public $timestamps = false;
    protected $table="tb_usuario";
    protected $primaryKey = "id_usuario";

    use Notifiable;

    public function portfolios()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function enderecos()
    {
        return $this->belongsTo(Endereco::class);   
    }

    public function proposta()
    {
        return $this->belongsTo(Proposta::class);
    }

    public function tipo_usuario()
    {
        return $this->belongsTo(TipoUsuario::class);
    }
}
