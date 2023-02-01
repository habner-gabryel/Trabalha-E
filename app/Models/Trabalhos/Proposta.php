<?php

namespace App\Models\Trabalhos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proposta extends Model
{
    public $table = "tb_proposta";
    protected $primaryKey = "id_proposta";

    public function users()
    {
        return $this->belongsTo(User::class,"id_usuario");
    }

    public function trabalhos()
    {
        return $this->belongsTo(Trabalhos::class, "id_trabalho");
    }

    public function status()
    {
        return $this->belongsTo(StatusPropostas::class, "id_proposta_status");
    }
}
