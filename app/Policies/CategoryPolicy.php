<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
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
        : Response::deny('Access denied.'));
    }
}
