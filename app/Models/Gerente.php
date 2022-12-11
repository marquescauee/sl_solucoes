<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerente extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['id_gerente'];

    protected $primaryKey = 'id_gerente';

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }
}
