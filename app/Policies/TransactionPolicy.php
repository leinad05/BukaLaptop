<?php

namespace App\Policies;

use App\User;
//use Facade\FlareClient\Http\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TransactionPolicy
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

    public function access(User $user)
    {
        return ($user->sebagai == 'pegawai' || $user->sebagai == 'owner'
                ? Response::allow() 
                : Response::deny('Access denied.')
        );
    }
}
