<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['email', 'cpf', 'nome'];

    protected $primaryKey = 'id_cliente';

    public function solicitacoes() {
        return $this->hasMany(Solicitacao::class);
    }
}
