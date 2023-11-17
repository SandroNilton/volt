<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Contest;

class ContestPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function participating(User $user, Contest $contest)
    {
      return $contest->participants->contains('user_id', $user->id);
    }
}
