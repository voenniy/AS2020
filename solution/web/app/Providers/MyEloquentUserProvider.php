<?php


namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class MyEloquentUserProvider extends EloquentUserProvider
{
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'] . $user->salt;

        return $this->hasher->check($plain, $user->getAuthPassword());
    }
}
