<?php

namespace Modules\Lgu\Http\Controllers\Product\Category;

use App\Http\Requests\CategoryRegistrationRequest;
use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use Illuminate\Http\RedirectResponse;

class Registration extends Controller
{
    public function __invoke(CategoryRegistrationRequest $request) : RedirectResponse
    {
        Category::firstOrCreate([
            'name' => $request->post('name'),
        ]);

        return redirect()->route('product.categories.listing');
    }
}
