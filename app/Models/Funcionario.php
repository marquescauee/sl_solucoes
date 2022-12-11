<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['id_funcionario', 'cargo'];

    protected $primaryKey = 'id_funcionario';

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }

    public function servicos() {
        return $this->hasMany(Servico::class);
    }
}
