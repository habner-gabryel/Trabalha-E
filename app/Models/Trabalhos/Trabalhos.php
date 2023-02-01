<?php

namespace App\Models\Trabalhos;

use Illuminate\Database\Eloquent\Model;

class Trabalhos extends Model
{
    public $timestamps = false;
    public $table = "tb_trabalho";
    protected $primaryKey = "id_trabalho";

    public function portfolio()
    {
        return $this->belongsTo(Portfolios::class, "id_portfolio");
    }
}
