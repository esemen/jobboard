<?php


namespace App\Services\Oauth;


use App\Models\OauthAccount;
use App\Models\OauthProvider;
use App\Models\User;
use Hash;
use Laravel\Socialite\Contracts\User as OauthUser;
use Str;

class Oauth
{
    protected OauthProvider $oauthProvider;
    protected OauthUser $oauthUser;

    public function __construct(OauthProvider $oauthProvider, OauthUser $oauthUser)
    {
        $this->oauthProvider = $oauthProvider;
        $this->oauthUser = $oauthUser;
    }

    public function findOrRegisterUser()
    {
        // Check if the account exist in the database
        $account = $this->oauthProvider
            ->oauthAccounts()
            ->with('user')
            ->firstWhere('account_id', $this->oauthUser->getId());

        if ($account) {
            // User already exist, return user
            if (!$account->user->hasVerifiedEmail()) {
                $account->user->markEmailAsVerified();
            }

            return $account->user;
        } else {
            // Get or create local user
            $user = $this->getLocalUser();

            // Create OauthAccount record
            $account = new OauthAccount([
                'account_id' => $this->oauthUser->getId(),
                'token' => $this->oauthUser->token
            ]);
            $account
                ->user()->associate($user)
                ->oauthProvider()->associate($this->oauthProvider)
                ->save();

            return $user;
        }
    }

    protected function getLocalUser()
    {
        $user = User::firstOrNew([
            'email' => $this->oauthUser->getEmail()
        ], [
            'name' => $this->oauthUser->getName(),
            'password' => Hash::make(Str::random()),
        ]);

        if (!$user->id || !$user->hasVerifiedEmail()) {
            // Register user first
            $user->save();
            $user->markEmailAsVerified();
        }

        return $user;
    }
}
