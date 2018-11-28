<?php

namespace Modules\Lgu\Http\Controllers\Center;

use App\Http\Requests\CenterRegistrationRequest;
use App\Models\Center;
use App\Models\User\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Registration extends Controller
{
    public function __invoke(CenterRegistrationRequest $request) : RedirectResponse
    {
        $user = Auth::guard('lgu')->user();

        $data = $request->post();
        $data['slug'] = str_slug($data['name']);
        $data['city_id'] = $user->getCityId();
        unset ($data['_token']);

        $center = Center::firstOrCreate($data);

        return redirect()->route('center.detail', compact('center'));
    }
}
