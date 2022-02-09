<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolios extends Model
{
    public $timestamps = false;
    public $table = "portfolio";

    public function trabalhos()
    {
        return $this->hasMany(Trabalhos::class, "trabalhos", "portfolio_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "users_id");
    }

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, "categorias_id");
    }
}
