<?php

namespace Modules\Lgu\Http\Controllers\Center;

use App\Http\Requests\CenterRegistrationRequest;
use App\Models\Center;
use App\Models\Forum\Channel;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class Registration extends Controller
{
    public function __invoke(CenterRegistrationRequest $request) : RedirectResponse
    {
        $user = Auth::guard('lgu')->user();

        $data = $request->post();
        $data['code'] = Uuid::uuid4()->toString();
        $data['slug'] = str_slug($data['name']);
        $data['city_id'] = $user->getCityId();
        unset ($data['_token']);

        $center = Center::firstOrCreate($data);

        Channel::firstOrCreate([
            'code' => Uuid::uuid4()->toString(),
            'name' => $center->name,
            'center_code' => $center->code,
            'lgu_id' => $user->getCityId(),
        ]);

        return redirect()->route('center.detail', compact('center'));
    }
}
