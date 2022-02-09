<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabalhos extends Model
{
    public $timestamps = false;
    public $table = "trabalhos";

    public function portfolio()
    {
        return $this->belongsTo(Portfolios::class, "portfolio_id");
    }
}
