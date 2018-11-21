<?php

namespace App\Http\Controllers\Center;

use App\Http\Requests\CenterRegistrationRequest;
use App\Models\Center;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class Registration extends Controller
{
    public function __invoke(CenterRegistrationRequest $request) : RedirectResponse
    {
        $data = $request->post();
        $data['slug'] = str_slug($data['name']);

        $center = Center::create($data);

        return redirect()->route('center.detail', compact('center'));
    }
}
