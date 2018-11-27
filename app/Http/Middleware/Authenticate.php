<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            switch ($this->subdomain($request->getHost())) {
                case "lgu":
                    $loginPath = 'lgu.login';
                    break;
                case "ngo":
                    $loginPath = 'ngo.login';
                    break;
                default:
                    $loginPath = 'ngo.login';
                    break;
            }

            return route($loginPath);
        }
    }

    protected function subdomain(string $domain) : string
    {
        return substr($domain, 0, strpos($domain, '.'));
    }
}
