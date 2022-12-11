<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = ['id_gerente'];

    protected $primaryKey = 'id_servico';

    public $timestamps = false;

    public function solicitacao() {
        return $this->belongsTo(Solicitacao::class);
    }

    public function servico_problemas() {
        return $this->hasMany(ServicoProblema::class);
    }

    public function funcionario() {
        return $this->belongsTo(Funcionario::class);
    }
}
