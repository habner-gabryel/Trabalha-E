<?php

namespace App\Models\Trabalhos;

use Illuminate\Database\Eloquent\Model;

class Portfolios extends Model
{
    public $timestamps = false;
    public $table = "tb_portfolio";
    protected $primaryKey = "id_portfolio";

    public function trabalhos()
    {
        return $this->hasMany(Trabalhos::class, "tb_trabalho", "id_portfolio");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "id_usuario");
    }

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, "id_categoria");
    }
}
