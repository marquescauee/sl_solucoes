<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['codigo', 'data_criacao', 'id_cliente', 'id_equipamento'];

    protected $table = 'solicitacoes';

    protected $primaryKey = 'id_solicitacao';

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function equipamento() {
        return $this->belongsTo(Equipamento::class);
    }

    public function servico() {
        return $this->hasOne(Servico::class);
    }
}
