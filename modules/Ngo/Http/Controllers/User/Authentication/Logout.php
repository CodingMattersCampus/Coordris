<?php

declare(strict_types = 1);

namespace Modules\Ngo\Http\Controllers\User\Authentication;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

final class Logout extends Controller
{
    public function __invoke(Request $request) : RedirectResponse
    {
        Auth::guard('ngo')->logout();
        $request->session()->flush();

        return redirect()->route('ngo.login');
    }
}
