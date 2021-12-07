<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProductPolicy
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
        return (($user->sebagai == 'employee' && $user->status =='active') || $user->sebagai == 'owner'
                ? Response::allow() 
                : Response::deny('Access denied.')
        );
    }

    public function cart(User $user)
    {
        return (($user->sebagai == 'employee' && $user->status =='active') || $user->sebagai == 'owner' || $user->sebagai == 'member'
                ? Response::allow() 
                : Response::deny('Access denied.')
        );
    }
}
