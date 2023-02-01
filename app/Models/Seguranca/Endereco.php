<?php

namespace App\Models\Seguranca;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public $timestamps = false;
    protected $table = "tb_endereco";
    protected $primaryKey = "id_endereco";
}
