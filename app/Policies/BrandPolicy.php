<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BrandPolicy
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
        : Response::deny('Access denied.'));
    }
}
