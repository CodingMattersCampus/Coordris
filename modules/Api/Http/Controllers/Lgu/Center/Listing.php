<?php

namespace Modules\Api\Http\Controllers\Lgu\Center;

use App\Models\Center;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use Modules\Api\Transformers\Lgu\Center\Center as CenterResource;
use Modules\Api\Transformers\Lgu\Center\CenterCollection;
use Yajra\DataTables\DataTables;

class Listing extends Controller
{
    public function __invoke(User $lgu)
    {
        return DataTables::of(
            Collection::make(
                new CenterCollection(
                    new CenterResource(
                        Center::where(['city_id' => $lgu->getCityId()])->get()
                    )
                )
            )
        )->make(true);
    }
}
