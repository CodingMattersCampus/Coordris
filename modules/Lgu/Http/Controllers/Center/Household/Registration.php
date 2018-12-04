<?php

namespace Modules\Lgu\Http\Controllers\Center\Household;

use Modules\Lgu\Http\Requests\Center\HouseholdRegistrationRequest;
use App\Models\Center;
use Illuminate\Routing\Controller;
use App\Models\Household;

class Registration extends Controller
{
    public function __invoke (HouseholdRegistrationRequest $request, Center $center)
    {
        $data = $request->post();
        unset($data["_token"]);

        $total = 1;
        if(!is_null($data['spouse'])) {
            $total += 1;
        } 
        if(!is_null($data['child'])) {
            $total += 1;
        }
        if(!is_null($data['child2'])) {
            $total += 1;
        }
        if(!is_null($data['dependent1'])) {
            $total += 1;
        }
        if(!is_null($data['dependent2'])) {
            $total += 1;
        }

        Household::firstOrCreate([
            'HH_number' => md5($data['head'].$data['spouse']),
            'head' => $data['head'],
            'spouse' => $data['spouse'] ?? "",
            'total_members' => $total,
        ]);

        return redirect()->route('center.detail', compact('center'));
    }
}
