<?php

namespace App\Models\Seguranca;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    public $table = "tb_tipo_usuario";
    protected $primaryKey = "id_tipo_usuario";
}
