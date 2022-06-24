<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use App\Models\OauthProvider;
use App\Services\Oauth\Oauth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class OauthController extends Controller
{
    protected function redirect(OauthProvider $provider): RedirectResponse
    {
        return Socialite::driver($provider->slug)->redirect();
    }

    protected function callback(OauthProvider $provider)
    {
        try {
            $oauthUser = Socialite::driver($provider->slug)->user();

            if ($oauthUser) {
                $user = (new Oauth($provider, $oauthUser))->findOrRegisterUser();

                if ($user) {
                    auth()->login($user);
                    return response()->redirectToRoute('home');
                }
            }
        }
        catch (\Exception $ex) {
            session()->flash('error', 'Login attempt failed');
        }

        return response()->redirectToRoute('login');
    }
}
