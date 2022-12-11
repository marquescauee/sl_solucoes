<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['nome'];

    protected $primaryKey = 'id_equipamento';

    public function solicitacoes() {
        return $this->hasMany(Solicitacao::class);
    }
}
