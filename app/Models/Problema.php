<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problema extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $primaryKey = 'id_problema';

    protected $fillable = ['descricao'];

    public function servicos_problemas() {
        return $this->hasMany(ServicoProblema::class);
    }
}
