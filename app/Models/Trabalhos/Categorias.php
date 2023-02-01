<?php

namespace App\Models\Trabalhos;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    public $table = "tb_categoria";
    public $timestamps = false;
    protected $primaryKey = "id_categoria";
    
}
