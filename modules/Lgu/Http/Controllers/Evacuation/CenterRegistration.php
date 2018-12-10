<?php

namespace Modules\Lgu\Http\Controllers\Evacuation;

use App\Models\Center;
use App\Models\DisasterCenter;
use App\Models\Forum\Channel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class CenterRegistration extends Controller
{
    public function __invoke(Request $request)
    {
        $user = Auth::guard('lgu')->user();
        $data = $request->post();
        unset($data['_token']);

        $center = Center::where(['code' => $data['center_code']])->first();
        $data['city_id'] = $center->city_id;
        $data['capacity'] = $center->capacity;

        $evacuationCenter = DisasterCenter::UpdateOrCreate($data, ['code' => Uuid::uuid4()->toString()]);

        Channel::firstOrCreate([
            'code' => Uuid::uuid4()->toString(),
            'name' => $center->name,
            'center_code' => $evacuationCenter->code,
            'lgu_id' => $user->getCityId(),
        ]);

        return redirect()->route('evacuation.center.detail', compact('evacuationCenter'));

    }
}
