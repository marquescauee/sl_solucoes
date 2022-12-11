<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Gerente;
use Illuminate\Auth\Access\HandlesAuthorization;

class GerentePolicy
{
    use HandlesAuthorization;

    public function funcionario(User $user)
    {
        $gerente = Gerente::find($user->id);

        if ($gerente == null) {
            return false;
        } else {
            return $user->id == $gerente->id;
        }
    }
}
