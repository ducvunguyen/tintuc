<?php

namespace App\Policies;

use App\User;
use App\Model\Banner;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    // public function view(User $user, Banner $banner){
    //     return $user->id == $banner->user_id;
    // }
    public function banner(User $user, Banner $banner)
    {
        return $user->id === $banner->user_id;
    }
}
