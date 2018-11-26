<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\ProductRegistrationRequest;
use App\Models\Product\Product;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class Registration extends Controller
{
    public function __invoke(ProductRegistrationRequest $request) : RedirectResponse
    {
        $data = $request->post();
        unset($data['_token']);

        Product::firstOrCreate($data);

        return redirect()->route('products.listing');
    }
}
