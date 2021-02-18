<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Establecimiento;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EstablecimientoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function author(User $user, Establecimiento $establecimiento){
        if(auth()->user()->id == $establecimiento->usuario->id)
            return true;
        else {
            return false;
        }
    }

    public function published(?User $user, Establecimiento $establecimiento){
        return $establecimiento->estado == 'activo'
                                    ? Response::allow()
                                    : Response::deny('Upss, El establecimiento aún no esta activo espera a que el administrador lo active para que pueda ser visible.');
    }
}
