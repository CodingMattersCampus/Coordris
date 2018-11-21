<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Models\Center;
use Illuminate\View\View;

class Detail extends Controller
{
    public function __invoke(Center $center) : View
    {
        return \view('center.detail', compact('center'));
    }
}
