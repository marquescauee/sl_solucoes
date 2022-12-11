<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoProblema extends Model
{
    use HasFactory;

    public $table = 'servicos_problemas';
    public $timestamps = false;

    protected $fillable = ['id_servico', 'id_problema'];

    public function servicos() {
        return $this->belongsTo(Servico::class);
    }

    public function problemas() {
        return $this->belongsTo(Problema::class);
    }
}
