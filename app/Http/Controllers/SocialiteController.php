<?php

namespace App\Http\Controllers;

use App\Services\SocialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use const http\Client\Curl\AUTH_ANY;

class SocialiteController extends Controller
{
    public function init() {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback(SocialService $service) {
        $user = Socialite::driver('vkontakte')->user();
        $authUser = $service->setUser($user);
        if ($authUser) {
            return redirect()->route('account');
        }
        throw new \Exception('User not found');
    }
}
