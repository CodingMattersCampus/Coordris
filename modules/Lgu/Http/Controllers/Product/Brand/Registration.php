<?php

namespace Modules\Lgu\Http\Controllers\Product\Brand;

use App\Http\Requests\BrandRegistrationRequest;
use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use Illuminate\Http\RedirectResponse;

class Registration extends Controller
{
    public function __invoke(BrandRegistrationRequest $request) : RedirectResponse
    {
        Brand::firstOrCreate([
            'name' => $request->post('name'),
        ]);

        return redirect()->route('product.brands.listing');
    }
}
