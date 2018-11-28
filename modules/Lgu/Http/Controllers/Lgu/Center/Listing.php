<?php

namespace Modules\Lgu\Http\Controllers\Lgu\Center;

use App\Http\Resources\Center\Center as CenterResource;
use App\Http\Resources\Center\CenterCollection;
use App\Models\Center;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller;
use Yajra\DataTables\DataTables;

class Listing extends Controller
{
    public function getAllAsResourceCollection(User $lgu)
    {
        return DataTables::of(
            Collection::make(
                new CenterCollection(
                    new CenterResource(
                        Center::where(['city_id' => $lgu->getCityId()])->get()
                    )
                )
            )
        )->make();
    }
}
