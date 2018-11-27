<?php

declare(strict_types = 1);

namespace Modules\Lgu\Http\Controllers\User\Authentication;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

final class Login extends Controller
{
    public function __invoke(Request $request) : RedirectResponse
    {
        if ($this->isAuthorized($request->email, $request->password)) {
            return redirect()->route('lgu.home');
        }

        return redirect()
            ->back()
            ->withInput($request->only('email'))
            ->withErrors('These credentials do not match our records.');
    }

    private function isAuthorized(string $email, string $password) : bool
    {
        return Auth::guard('lgu')->attempt(\compact('email', 'password'));
    }
}
