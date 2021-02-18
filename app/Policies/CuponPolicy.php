<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cupon;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CuponPolicy
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

    public function author(User $user, Cupon $cupon){
        if(auth()->user()->id == $cupon->establecimiento->usuario->id)
            return true;
        else {
            return false;
        }
    }

    public function published(?User $user, Cupon $cupon){
        return $cupon->estado == 'activo'
                                    ? Response::allow()
                                    : Response::deny('Upss, El cupón aún no esta activo espera a que el administrador lo active para que pueda ser visible.');
    }
}
