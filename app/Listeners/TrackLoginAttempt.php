<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\UserLoginAttempt;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Support\Facades\Hash;

class TrackLoginAttempt
{
    public function handle(Attempting $event): void
    {
        /** @var $user User */
        if (!$user = User::where(['email' => $event->credentials['email'] ?? null])->first()) {
            return;
        }

        $userLoginAttempt = new UserLoginAttempt;
        $userLoginAttempt->ip = request()->ip();
        $userLoginAttempt->user_id = $user->id;
        $userLoginAttempt->success = (int) Hash::check($event->credentials['password'], $user->password);
        $userLoginAttempt->save();
    }
}
