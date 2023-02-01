<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabalhos extends Model
{
    public $timestamps = false;
    public $table = "tb_trabalho";

    public function portfolio()
    {
        return $this->belongsTo(Portfolios::class, "id_portfolio");
    }
}
