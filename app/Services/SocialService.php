<?php


namespace App\Services;


use App\Models\User;

class SocialService
{
    public function setUser($user): bool {
        $email = $user->getEmail();
        $authUser = User::where('email', $email)->first();
        $authUser->name = $user->getName();
        $authUser->avatar = $user->getAvatar();
        if ($authUser) {
            \Auth::login($authUser);
            $authUser->name = $user->getName();
            $authUser->avatar = $user->getAvatar();

            return $authUser->save();
        }
        return false;
    }
}
