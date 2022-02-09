<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proposta extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class,"users_id");
    }

    public function trabalhos()
    {
        return $this->belongsTo(Trabalhos::class, "trabalhos_id");
    }

    public function status()
    {
        return $this->belongsTo(StatusPropostas::class, "status_propostas_id");
    }
}
