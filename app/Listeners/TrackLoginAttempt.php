<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\UserLoginEntry;
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

        $userLoginEntry = new UserLoginEntry;
        $userLoginEntry->ip = request()->ip();
        $userLoginEntry->user_id = $user->id;
        $userLoginEntry->success = (int) Hash::check($event->credentials['password'], $user->password);
        $userLoginEntry->save();
    }
}
